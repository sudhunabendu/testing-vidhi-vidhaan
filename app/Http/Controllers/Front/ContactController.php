<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\libraries\emailHelpers;
use App\libraries\helpers;
use App\Models\Contact;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contactUs(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'mobile_number' => 'required|string|max:12|min:8',
            'message' => 'required',
        ]);

        try {
            $contact = new Contact();
            $contact->name = !empty($request->name) ? $request->name : "";
            $contact->email = !empty($request->email) ? $request->email : "";
            $contact->mobile_number = !empty($request->mobile_number) ? $request->mobile_number : "";
            $contact->message = !empty($request->message) ? $request->message : "";
            $contact->save();

            $searchArr = array(
				'[FULLNAME]',
			);

			$replaceArr = array(
                $contact->name
			);

            $emailData = helpers::emailTemplate("Template 1", $searchArr, $replaceArr);

            if (!empty($emailData)) {
				$toEmail = !empty($contact->email) ? $contact->email : "";
				$toName  = !empty($contact->name) ? $contact->name : "";
				$subject = $emailData['subject'];
                emailHelpers::sendEmailNotification($emailData, $toEmail, $toName, $subject);
                return redirect()->back()->with('success', 'Your message has been sent successfully');
			}else {
                return redirect()->back()->with('error', 'Something went wrong');
            }
            
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong' . $th->getMessage());
        }
    }
}
