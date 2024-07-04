<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ProductServiceBooking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductServiceBookingController extends Controller
{
    public function serviceBooking(Request $request){
        // return $request->all();
        if(empty(Auth::check())){
            return response()->json(['res_code' => 201, 'response' => 'You are not logged in.'], 200);
        }else{
            $astrologer_id = $request->input('astrologer');
            $astro_date = $request->input('astro_date');
            $time_slot = $request->input('time_slot');
            $price = $request->input('price');
            $user = Auth::user();
            $userId = $user->id;
            if(!empty($astrologer_id) && !empty($astro_date) && !empty($time_slot) && !empty($price)){
                $astrologer = User::where('id', $astrologer_id)->first();
                $product_service_booking = new ProductServiceBooking();
                $internalBookNumber = "AST" . time();
                $product_service_booking->user_id = $userId;
                $product_service_booking->astro_id = $astrologer_id;
                $product_service_booking->booking_number = $internalBookNumber;
                $product_service_booking->booking_product_service_name = "Booking for Astrologer";
                $product_service_booking->price = $price;
                // $product_service_booking->status = 'Pending';
                // $product_service_booking->service_status = 'Not Started';
                $product_service_booking->booking_payment_type = 'Offline';
                $product_service_booking->payment_status = 'Unpaid';
                $product_service_booking->service_date = $astro_date;
                $product_service_booking->service_time = $time_slot;
                $product_service_booking->booking_category = 'Astrologer';
                $product_service_booking->save();
                // return $product_service_booking;
                return response()->json(['res_code' => 200, 'response' => 'Service Booking Successful.'], 200);
            }

        }


        
    }
}
