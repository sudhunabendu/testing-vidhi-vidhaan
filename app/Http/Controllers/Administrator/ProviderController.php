<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\libraries\emailHelpers;
use App\libraries\helpers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProviderController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){}

    public function index(){
        if(Auth::check()){
            $providers = User::where('role_id',4)->orderBy('id', 'DESC')->get();
            return view('administrator.providers.index',compact('providers'));
        }else{
            return redirect()->route('admin.login');
        }
    }


    public function providerStatusChange(Request $request){
        $provider_id = !empty($request->provider_id) ? $request->provider_id : "";
        $status= !empty($request->status) ? $request->status : "";
        if(!empty($provider_id) && !empty($status)){
            $user = User::where('id',$provider_id)->first();
            DB::table('users')->where('id', $provider_id)->update(['status' => $status]);
            $fullName = $user->first_name.' '.$user->last_name;
            $email = $user->email;
            $searchArr = array('[FULLNAME]', '[NAME]', '[STATUS]', '[EMAIL]','[SIGNATURE]');
            $replaceArr = array($fullName, $fullName, $status, $email, "Vidhi Vidhaan");
            $emailData = helpers::emailTemplate("Template 4", $searchArr, $replaceArr);
            if (!empty($emailData)) {
                $toEmail = $user->email;
                $toName = $user->first_name;
                $subject = !empty($emailData['subject']) ? $emailData['subject'] : '';
                emailHelpers::sendEmailNotification($emailData, $toEmail, $toName, $subject);
                return response()->json(['msg' => 'Successfully status updated', 'status' => true]);
            }
            
            // return response()->json(['msg' => 'Successfully status updated', 'status' => true, 'data'=>$user]);
        }else{
            return response()->json(['msg' => 'Something went wrong', 'status' => false]);
        }
    }


    public function deleteProvider($id){
        $user = User::find($id);
        if (!empty($user)) {
            $status = $user->delete();
            if ($status) {
                return redirect()->back()->with('success', 'Successfully deleted User');
            } else {
                return back()->with('error', 'Somthing went wrong');
            }
        } else {
            return back()->with('error', 'Data Not Found');
        }
    }

   
}
