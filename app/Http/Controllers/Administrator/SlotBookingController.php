<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SlotBookingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }


    public function index(){
        if (Auth::check()) {
            return view('Administrator.slot-booking.index');
        } else {
            return redirect()->route('admin.login');
        }
    }
}
