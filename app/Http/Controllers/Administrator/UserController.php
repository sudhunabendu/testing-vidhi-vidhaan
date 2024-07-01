<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){}

    public function index(){
        
        if(Auth::check()){
            $users = User::where('role_id',3)->orderBy('id', 'DESC')->get();
            return view('administrator.user.index',compact('users'));
        }else{
            return redirect()->route('admin.login');
        }
    }

    public function deleteUser($id){
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

    public function userStatusChange(Request $request){
        // return $request->all();
        if ($request->mode == 'true') {
            DB::table('users')->where('id', $request->id)->update(['status' => 'Active']);
        } else {
            DB::table('users')->where('id', $request->id)->update(['status' => 'Inactive']);
        }
        return response()->json(['msg' => 'Successfully status updated', 'status' => true]);
    }
}
