<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
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
     * Method used for administrative panel landing page
     * @return type
     */
    public function index()
    {
        if (empty(Auth::check())) {
            return redirect()->route('admin.login');
            // return view('Administrator.index.index');
        } else {
            $users = User::where('role_id',3)->get();
            $astrologer = User::where('role_id',4)->get();
            return view('Administrator.dashboard.index',compact('users','astrologer'));

        }
    }


    // public function index()
    // {
    //     if (empty(Auth::check())) {
    //         return redirect()->route('admin.login');
    //     } else {
    //         try {
    //             $value = Session::get('user');
    //             // return $value;
    //             $role = $value->role_id;
    //             if($role == 1){
    //                 return view('Administrator.dashboard.index');
    //             }else{
    //                 return view('Administrator.index.index');
    //             }
    //         } catch (\Throwable $th) {
    //             throw $th;
    //         }
           
    //     }
    // }




    public function login()
    {
        if (empty(Auth::check())) {
            return view('Administrator.index.index');
        } else {
            return redirect()->route('dashboard');
        }
    }




    // public function register(){
    //     $user = new User();
    //     $user->first_name = "Nabendu";
    //     $user->last_name = "Admin";
    //     $user->email = "nabendu.bose@pixelconsultancy.in";
    //     $user->role_id = 1;
    //     $user->password = Hash::make(123456);
    //     $user->status = "Active";
    //     $user->save();
    // }

    
}
