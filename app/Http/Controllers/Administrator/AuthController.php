<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }


    /**
     * 	METHOD TO LOG IN FROM ADMIN
     */
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required',
        ]);

        $users = User::where('email', $request->email)->first();
        if (empty($users)) {
            return redirect()->back()->with('error', 'Admin not registered');
        } else {
            if (($users->role_id == 1) || ($users->role_id == 2)) {
                if ($users->status == 'Active') {
                    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                        Session::put('user', $users);
                        if (Session::get('url.intended')) {
                            return Redirect::to(Session::get('url.intended'));
                        } else {
                            return redirect()->route('dashboard')->with('success', 'You have successfully logged in.');
                        }
                    } else {
                        return back()->with('error', 'Email Address or Password does not match.');
                    }
                } else {
                    return back()->with('error', 'Account is not active');
                }
            } else {
                return back()->with('error', 'You are not authorized to access this page');
            }
        }
    }


    public function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect()->route('admin.login')->with('success', 'You have successfully logged out.');
    }

    
    public function ForgetPassword()
    {
        return view('Administrator.auth.password_reset');
    }


    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $user = DB::table('users')
        ->where('email',$request->email)
        ->first();
        if(empty($user)){
            return redirect()->back()->with('error','Email account is not exists!');
        }

        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $request->email, 
            'token' => $token, 
            'created_at' => Carbon::now()
          ]);

        $action_link = route('reset.password.getForm',['token' => $token,'email'=>$request->email]);  
        $body = "We are received a request to rest the pasword for <b> Your App Name </b> account associated with ".$request->email.". You can reset your password by clicking the link below";
        
        Mail::send('Administrator.email.forgetPassword',['action_link'=>$action_link, 'body'=>$body], function($message) use($request){
            $message->from(env('MAIL_USERNAME'));
            $message->to($request->email,'Your name');
            $message->subject('Reset Password');
        });
        return back()->with('success', 'We have e-mailed your password reset link!');
    }


    public function getresetPasswordForm(Request $request, $token = null)
    {
        return view('Administrator.email.forgetPasswordForm',['token'=>$token,'email'=>$request->email]);
    }

    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_resets')
                            ->where([
                              'email' => $request->email, 
                              'token' => $request->token
                            ])
                            ->first();

        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }

        User::where('email', $request->email)
                    ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        return redirect()->route('admin.login')->with('success', 'Your password has been changed!')->with('verifiedEmail', $request->email);
    }
}
