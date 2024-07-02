<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\libraries\dbHelpers;
use App\libraries\emailHelpers;
use App\libraries\helpers;
use App\Models\Country;
use App\Models\User;
use App\Models\UserCode;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public $_frontendUrl;

    public function __construct()
    {
        $this->_frontendUrl = env("FRONTEND_URL");
    }

   /**
    * The login function checks if the user is authenticated and either displays the login view or
    * redirects to the home page.
    * 
    * @return If the user is not authenticated (not logged in), the function will return the view
    * 'frontend.auth.login'. If the user is already authenticated, the function will redirect to the
    * 'home' route.
    */
    public function login()
    {
        if (empty(Auth::check())) {
            return view('frontend.auth.login');
        } else {
            return redirect()->route('home');
        }
    }

   /**
    * The `registration` function checks if the user is not authenticated and then either displays the
    * registration form with a list of countries or redirects to the home page.
    * 
    * @return If the user is not authenticated (not logged in), the function will return the view
    * 'frontend.auth.register' with the countries data passed to it. If the user is already
    * authenticated, the function will redirect to the 'home' route.
    */
    public function registration()
    {
        if (empty(Auth::check())) {
            $countries = Country::all();
            return view('frontend.auth.register', compact('countries'));
        } else {
            return redirect()->route('home');
        }
    }

    /**
     * The function userLogin handles user authentication based on email and password, checking for
     * registration, role, status, and login success.
     * 
     * @param Request request The `userLogin` function you provided is a part of a Laravel controller
     * and is responsible for handling user login requests. It first validates the incoming request
     * data to ensure that the email is in the correct format and the password meets the minimum length
     * requirement.
     * 
     * @return The function `userLogin` is returning different responses based on certain conditions:
     */
    public function userLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);


        $users = User::where('email', $request->email)->first();
        if (empty($users)) {
            return redirect()->back()->with('error', 'You are not registered');
        } else {
            if (($users->role_id == 3)) {
                if ($users->status == 'Active') {
                    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                        Session::put('user', $users);
                        if (Session::get('url.intended')) {
                            return Redirect::to(Session::get('url.intended'));
                        } else {
                            return redirect()->route('home')->with('success', 'You have successfully logged in.');
                        }
                    } else {
                        return back()->with('error', 'Email Address or Password does not match.');
                    }
                } else {
                    return back()->with('error', 'Account is not active');
                }
            } else {
                return back()->with('error', 'You are not authorized.');
                // return back()->with('error', 'Something unexpected happened. Try again later.');
            }
        }
    }


  /**
   * The userRegister function in PHP validates user registration data, creates a new user account,
   * generates a verification code and registration token, sends a verification email, and handles
   * error cases.
   * 
   * @param Request request The `userRegister` function is a controller method that handles the
   * registration process for a user. It takes input data from a `Request` object, validates the input
   * fields, creates a new user record in the database, generates a verification code and registration
   * token, sends a verification email to the user,
   * 
   * @return The function `userRegister` is returning a redirect response. If the registration is
   * successful, it redirects the user to the login route with a success message. If there is an error
   * during the registration process, it redirects the user back with an error message.
   */
    public function userRegister(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            // 'dial_code' => 'required',
            'mobile_number' => 'required|string|max:12|min:8|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6'
        ]);

        $users = User::where('email', $request->email)->first();
        if (!empty($users)) {
            return redirect()->back()->with('error', 'Already Registered');
        } else {
            try {
                $user = new User();
                $user->first_name = !empty($request->first_name) ? $request->first_name : "";
                $user->last_name = !empty($request->last_name) ? $request->last_name : "";
                // $user->dial_code = !empty($request->dial_code) ? $request->dial_code : "";
                // $user->mobile_number = !empty($request->mobile_number) ? $request->mobile_number : "";
                $user->mobile_number = !empty($request->full) ? $request->full : "";
                $user->email = !empty($request->email) ? $request->email : "";
                $user->password = Hash::make($request->password);
                $user->role_id = 3;
                $user->save();
                $userId = $user->id;
                /* GENERATE VERIFICATION CODE */
                $verificationCode = dbHelpers::uniqueCode(4, 'user_codes', 'code', 'd');
                if (!empty($verificationCode)) {
                    $userCode = new UserCode();
                    $userCode->user_id = $userId;
                    $userCode->type = 'Registration';
                    $userCode->code = $verificationCode;
                    $userCode->created_at = date('Y-m-d H:i:s');
                    $userCode->save();
                }
                /* GENERATE REGISTRATION TOKEN */
                $registrationToken = md5('3A5TM4P7' . $userId . $verificationCode);
                $fullName = $user->first_name . ' ' . $user->last_name;
                $email = $user->email;
                User::where('id', $userId)->update(array('registration_token' => $registrationToken));
                $verificationLink = $this->_frontendUrl . 'user/account-verification/' . $email . '/' . $registrationToken;
                $link = "<a href='" . $verificationLink . "'>Verify Account</a>";
                $searchArr = array('[FULLNAME]', '[NAME]', '[EMAIL]', '[PASSWORD]', '[LINK]', '[VERIFICATIONCODE]', '[SIGNATURE]');
                $replaceArr = array($fullName, $fullName, $user->email, $request->password, $link, $verificationCode, "Vidhi Vidhaan");
                $emailData = helpers::emailTemplate("Template 3", $searchArr, $replaceArr);
                if (!empty($emailData)) {
                    $toEmail = $user->email;
                    $toName = $user->first_name;
                    $subject = !empty($emailData['subject']) ? $emailData['subject'] : '';

                    /* SEND EMAIL */
                    emailHelpers::sendEmailNotification($emailData, $toEmail, $toName, $subject);
                    return redirect()->route('login')->with('success', 'Congratulations, Your account has been successfully created. Please verify your email address.');
                }

                // $searchArr = array(
                //     '[NAME]',
                //     '[FULLNAME]',
                // );
                // $replaceArr = array(
                //     $user->email,
                //     $user->first_name . ' ' . $user->last_name,
                // );

                //  $emailData = helpers::emailTemplate("Template 2", $searchArr, $replaceArr);

                // if (!empty($emailData)) {
                //     $fullName = $user->first_name . " " . $user->last_name;
                //     $toEmail = !empty($user->email) ? $user->email : "";
                //     $toName  = !empty($fullName) ? $fullName : "";
                //     $subject = $emailData['subject'];
                //     emailHelpers::sendEmailNotification($emailData, $toEmail, $toName, $subject);
                //     return redirect()->route('login')->with('success', 'Congratulations, Your account has been successfully created.');

                // }
                else {
                    return redirect()->back()->with('error', 'Something went wrong');
                }
            } catch (\Throwable $th) {
                // throw $th;
                return redirect()->back()->with('error', $th->getMessage());
            }
        }
    }


  /**
   * The function logs out the user, clears session data, and redirects to the home page with a success
   * message.
   * 
   * @return A redirection to the 'home' route with a success message "Logout Successfully" is being
   * returned.
   */
    public function logout()
    {
        Session::forget(['user','provider']);
        Session::forget('url.intended');
        // Cart::destroy();
        Auth::logout();
        return Redirect()->route('home')->with('success', 'Logout Successfully');
    }


    /**
     * The function `accountVerification` verifies a user's email address based on the provided token
     * and updates the user's status accordingly.
     * 
     * @param email The `accountVerification` function you provided is used to verify a user's email
     * address based on the email and token provided. It checks if the email and token are not empty,
     * then retrieves the user from the database based on the token. If the user is found, it updates
     * the user's email
     * @param token The `accountVerification` function you provided is used to verify a user's email
     * account based on the email and token provided. The token is a unique identifier sent to the
     * user's email for verification purposes.
     * 
     * @return The `accountVerification` function returns a redirect response to the 'login' route with
     * either a success message 'Your email has been successfully verified.' if the user is found and
     * the email is verified, or an error message 'Your email address already verified' if the user is
     * not found. If the email and token parameters are empty, it returns a redirect response with an
     * error message 'Something went wrong
     */
    public function accountVerification($email, $token)
    {
        if (!empty($email) && !empty($token)) {
            $user = DB::table('users')->where('registration_token', $token)->first();
            if (!empty($user)) {
                User::where('email', $email)->update(['email_verified_at' => Carbon::now(), 'registration_token' => null, 'status' => 'Active']);
                return redirect()->route('login')->with('success', 'Your email has been successfully verified.');
            } else {
                return redirect()->route('login')->with('error', 'Your email address already verified');
            }

            // $userEmail = !empty($email) ? $email : "";
            // $userToken = !empty($token) ? $token : "";

            // return view('frontend.auth.account_verification', compact('userEmail', 'userToken'));

        }else{
            return redirect()->route('login')->with('error', 'Something went wrong');
        }
    }
}
