<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\ProductServiceBooking;
use App\Models\User;
use Illuminate\Http\Request;

class ProductServiceBookingController extends Controller
{
    public function index(){
        $astro_bookings = ProductServiceBooking::orderBy('id', 'desc')->get();
        return view('Administrator.booking.index', compact('astro_bookings'));
    }

    public function getBookingById($id){
        if(!empty($id)){
            $booking = ProductServiceBooking::find($id);
            if(!empty($booking)){
                $userId = $booking->user_id;
                $astroId = $booking->astro_id;
                $user_details = User::where('id', $userId)->first();
                $astro_details = User::with('userDetails')->where('id', $astroId)->first();
                return view('Administrator.booking.view', compact('booking','user_details','astro_details'));
            }
            
        }
    }
}
