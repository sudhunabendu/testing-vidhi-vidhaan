<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\libraries\dbHelpers;
use App\libraries\emailHelpers;
use App\libraries\helpers;
use App\Models\User;
use App\Models\UserCode;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ProviderController extends Controller
{
    public $_frontendUrl;

    public function __construct()
    {
        $this->_frontendUrl = env("FRONTEND_URL");
    }


    public function registration()
    {
        if (empty(Auth::check())) {
            return view('frontend.provider.register');
        } else {
            return redirect()->route('home');
        }
    }


    public function providerRegister(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
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
                $user->mobile_number = !empty($request->full) ? $request->full : "";
                $user->email = !empty($request->email) ? $request->email : "";
                $user->password = Hash::make($request->password);
                $user->role_id = 4;
                $user->status = 'Pending';
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
                $verificationLink = $this->_frontendUrl . 'astrologer/account-verification/' . $email . '/' . $registrationToken;
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
                    return redirect()->route('provider.login')->with('success', 'Congratulations, Your account has been successfully created. Please check your email and verify and please wait for your account to be approved.');
                } else {
                    return redirect()->back()->with('error', 'Something went wrong');
                }
            } catch (\Throwable $th) {
                // throw $th;
                return redirect()->back()->with('error', $th->getMessage());
            }
        }
    }


    public function accountVerification($email, $token)
    {
        if (!empty($email) && !empty($token)) {
            $user = DB::table('users')->where('registration_token', $token)->first();
            // return $user;
            if (!empty($user)) {
                User::where('email', $email)->update(['email_verified_at' => Carbon::now(), 'registration_token' => null, 'status' => 'Inactive']);
                return redirect()->route('provider.login')->with('success', 'Your email has been successfully verified. Vidhi Vidhaan team will re-verify your account soon.');
            } else {
                return redirect()->route('provider.login')->with('error', 'Your email address already verified');
            }
        } else {
            return redirect()->route('provider.login')->with('error', 'Something went wrong');
        }
    }


    public function providerLoginPage(){
        if (empty(Auth::check())) {
            return view('frontend.provider.login');
        } else {
            return redirect()->route('home');
        }
    }


    public function providerLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        $provider = User::where('email', $request->email)->first();
        if (empty($provider)) {
            return redirect()->back()->with('error', 'You are not registered');
        } else {
            if (($provider->role_id == 4)) {
                if ($provider->status == 'Approved') {
                    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                        Session::put('provider', $provider);
                        if (Session::get('url.intended')) {
                            return Redirect::to(Session::get('url.intended'));
                        } else {
                            // return view('frontend.provider.profile')->with('success', 'You have successfully logged in.');
                            return redirect()->route('provider.profile')->with('success', 'You have successfully logged in.');
                        }
                    } else {
                        return back()->with('error', 'Email Address or Password does not match.');
                    }
                } else if ($provider->status == 'Pending') {
                    return back()->with('error', 'Account is pendding. Please try again later.');
                } else {
                    return back()->with('error', 'Account is Rejected. please contact vidhi vidhaan admin.');
                }
            } else {
                return back()->with('error', 'Something unexpected happened. Try again later.');
            }
        }
    }

    // public function logout()
    // {
    //     Session::forget('provider');
    //     Session::forget('url.intended');
    //     Auth::logout();
    //     return Redirect()->route('login')->with('success', 'Logout Successfully');
    // }


    public function profilePage(){
        if(!empty(Auth::check())){
            $provider = Auth::user();
            return view('frontend.provider.profile', compact('provider'));
        }else{
            return redirect()->route('provider.login');
        }
    }

}
