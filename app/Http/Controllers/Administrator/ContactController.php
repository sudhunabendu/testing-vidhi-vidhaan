<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index(){
        if(Auth::check()){
            $contacts = Contact::orderBy('id', 'DESC')->get();
            return view('Administrator.contact.index',compact('contacts'));
        }else{
            return redirect()->route('admin.login');
        }
    }

    public function deleteContact($id){
        $contact = Contact::find($id);
        if (!empty($contact)) {
            $status = $contact->delete();
            if ($status) {
                return redirect()->back()->with('success', 'Contact deleted successfully');
            } else {
                return back()->with('error', 'Somthing went wrong');
            }
        } else {
            return back()->with('error', 'Data Not Found');
        }
    }
}
