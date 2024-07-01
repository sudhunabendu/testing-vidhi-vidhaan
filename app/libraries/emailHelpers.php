<?php

namespace App\libraries;

use Illuminate\Support\Facades\Mail;

class emailHelpers {

    public function __construct() {  
    }

      /**
     * Method used to send mail
     * @param type $emailData
     * @param type $toEmail
     * @param type $toName
     * @param type $subject
     * @param type $attachment
     * @return boolean
     */
    public static function sendEmailNotification($emailData, $toEmail, $toName, $subject, $attachment = '', $attachment2 = '') {

        if (empty($emailData) || empty($toEmail) || empty($toName) || empty($subject))
            return false;

        $emailGetway = env("EMAIL_GETWAY");
        if (!empty($emailGetway)) {
            try {
                if (!empty($attachment)) {
                    Mail::send('frontend.contact.mail', $emailData, function ($message) use($toEmail, $toName, $subject, $attachment , $attachment2) {
                        $message->from(env("MAIL_FROM_ADDRESS"), 'Vidhi Vidhaan');
                        $message->to($toEmail, $toName);
                        $message->subject($subject);
                        $message->attach($attachment);
                        if (!empty($attachment2)) {
                            $message->attach($attachment2);
                        }
                    });
                } else {
                    Mail::send('frontend.contact.mail', $emailData, function ( $message) use($toEmail, $toName, $subject) {
                        $message->from(env("MAIL_FROM_ADDRESS"), 'Vidhi Vidhaan');
                        $message->to($toEmail, $toName);
                        $message->subject($subject);
                    });
                }

                return true;
            } catch (\Swift_TransportException $e) {
                return false;
            }
        } else {
            return false;
        }
    }


}