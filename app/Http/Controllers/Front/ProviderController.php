<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\libraries\dbHelpers;
use App\libraries\emailHelpers;
use App\libraries\helpers;
use App\Models\City;
use App\Models\Country;
use App\Models\Service;
use App\Models\State;
use App\Models\User;
use App\Models\UserCode;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
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
                $userDetails = new UserDetail();
                $user->first_name = !empty($request->first_name) ? $request->first_name : "";
                $user->last_name = !empty($request->last_name) ? $request->last_name : "";
                $user->mobile_number = !empty($request->full) ? $request->full : "";
                $user->email = !empty($request->email) ? $request->email : "";
                $user->password = Hash::make($request->password);
                $user->role_id = 4;
                $user->status = 'Pending';
                $user->save();
                $userId = $user->id;
                if(!empty( $userId)){
                    $userDetails->user_id = $userId;
                    $userDetails->save();
                }

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


    public function providerLoginPage()
    {
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


    public function profilePage()
    {
        if (!empty(Auth::check())) {
            $providers = Auth::user();
            $provider_id = $providers->id;
            $provider = User::with('userDetails')->find($provider_id);
            $countries = Country::get(["name", "id"]);
            $states = State::where('country_id', $provider->userDetails->country_id)->get();
            $cities = City::where('state_id', $provider->userDetails->state_id)->get();
            return view('frontend.provider.details', compact('provider','countries','states','cities'));
        } else {
            return redirect()->route('provider.login');
        }
    }


    public function profilePhoto(Request $request, $id)
    {
        $request->validate([
            'images' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $user_details = UserDetail::findOrFail($id);

        if ($request->hasFile('images')) {
            // $imagePath = public_path('images/user_images/'.$user_details->images);
            // if(File::exists($imagePath)){
            //     unlink($imagePath);
            // }

            $image_tmp = $request->file('images');
            if ($image_tmp->isValid()) {
                $time = time();
                $image_name = $time . '_' . $image_tmp->getClientOriginalName();
                $extension = $image_tmp->getClientOriginalExtension();
                request()->images->move('images/user_images', $image_name);
                $imageName = $image_name;
                $user_details->images = $imageName;
            }
        }
        $user_details->update();
        return back()->with('success', 'Image Uploaded Successfully');

        // $imageName = time().'.'.$request->images->extension();  
        // $request->images->move(public_path('images'), $imageName);
        // return back()->with('success', 'Image Uploaded Successfully')->with('image', $imageName);


        // if (!empty(Auth::check())) {
        //     return view('frontend.provider.profile', compact('provider'));
        // } else {
        //     return redirect()->route('provider.login');
        // }
    }


    public function profileSetting()
    {
        if (!empty(Auth::check())) {
            $provider = Auth::user();
            $services = Service::all();
            return view('frontend.provider.setting', compact('provider', 'services'));
        } else {
            return redirect()->route('provider.login');
        }
    }


    public function serviceStore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            // 'images' => 'required|image|mimes:jpeg,png,jpg,svg',
            // 'date' => 'required',
            // 'start_time' => 'required',
            // 'end_time' => 'required',
        ]);
        return $request->all();
        $data = Service::where('name', $request->name)->first();
        if (empty($data)) {
            $service = new Service();
            $service->name = !empty($request->name) ? $request->name : "";
            $slugname = str_replace(' ', '-', $request->name);
            $service->slug = !empty($slugname) ? $slugname : "";
            $service->description = !empty($request->description) ? $request->description : "";
            $service->price     = !empty($request->price) ? $request->price     : "";
            $service->save();
        }
    }


    public function serviceDateTimeStore(Request $request)
    {
        $this->validate($request, [
            // 'images' => 'required|image|mimes:jpeg,png,jpg,svg',
            'service' => 'required',
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);
        return $request->all();
    }


   /**
    * The function `providerProfileUpdate` updates a user's profile details based on the provided
    * request data.
    * 
    * @param Request request The `providerProfileUpdate` function takes two parameters: `` and
    * ``.
    * @param id The `` parameter in the `providerProfileUpdate` function represents the unique
    * identifier of the user whose profile is being updated. This identifier is used to fetch the user
    * details from the database using Eloquent's `findOrFail` method. It is typically an integer value
    * that uniquely identifies a specific user record
    * 
    * @return The `providerProfileUpdate` function is updating the user details based on the request
    * data provided. If the user details are found and the update is successful, it will return a
    * success message "Profile updated successfully" using `back()->with('success','Profile updated
    * successfully')`. If the user details are not found or if there is an issue with the update
    * process, it will return an error message "
    */
    public function providerProfileUpdate(Request $request, $id)
    {
        $request->validate([
            'date_of_birth' => 'required|date',
            'price' => 'required',
            'description' => 'required',
            'education' => 'required',
            'experience' => 'required',
            'post_code' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
        ]);
        // return $request->all();

        if (!empty(Auth::check())) {
            // return $request->all();
            $user_details = UserDetail::findOrFail($id);
            if(!empty($user_details)){
                $user_details->address =!empty($request->address)? $request->address : "";
                $user_details->city_id =!empty($request->city)? $request->city : "";
                $user_details->state_id =!empty($request->state)? $request->state : "";
                $user_details->country_id =!empty($request->country)? $request->country : "";
                $user_details->post_code =!empty($request->post_code)? $request->post_code : "";
                // $user_details->dob =!empty($request->date_of_birth)? $request->date_of_birth : "";
                $user_details->dob = date('Y-m-d H:i:s', strtotime($request->date_of_birth));
                // return $user_details;
                $user_details->education =!empty($request->education)? $request->education : "";
                $user_details->experience =!empty($request->experience)? $request->experience : "";
                $user_details->price =!empty($request->price)? $request->price : "";
                $user_details->description =!empty($request->description)? $request->description : "";
                // return $user_details;
                $user_details->update();
                return back()->with('success','Profile updated successfully');
            }else{
                return back()->with('error','Something went wrong');
            }

        }
    }
}
