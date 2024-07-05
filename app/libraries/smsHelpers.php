<?php

namespace App\libraries;


use Twilio;
use Twilio\Rest\Client;
use Twilio\Exceptions\RestException;


class smsHelpers {

    public function __construct()
    {
        
    }

    /**
     * Method used to send message using Twilio
     * @param string $mobileNumberWithMobileCode
     * @param array $searchArr
     * @param array $replaceArr
     * @param string $smsMessage
     * @return boolean
     */
   public static function sendMessageNotification($mobileNumberWithMobileCode, $searchArr, $replaceArr, $smsMessage)
    {
        if (empty($mobileNumberWithMobileCode) || empty($smsMessage)) {
            return false;
        }

        $smsGetway = env("SMS_GETWAY");
        $mobileNumber = str_replace('+', '', $mobileNumberWithMobileCode);
        $checkIsValidNumber = self::validatePhoneNumber($mobileNumber);

        if ($checkIsValidNumber['status'] === 200) {

            if (!empty($smsGetway)) {

                try {
                    if (!empty($searchArr) || !empty($replaceArr)) {
                        $smsMessage = str_replace($searchArr, $replaceArr, $smsMessage);
                    }
                    $receiverNumber = '+' . $mobileNumber;

                    $flag = Twilio::message($receiverNumber, $smsMessage);
                    //dd($flag);
                    return true;
                } catch (RestException $ex) {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


    public static function validatePhoneNumber($mobileNumber)
    {

        if (empty($mobileNumber)) {
            return array('status' => 201, 'message' => 'Mobile number is required.');
        }

        $sid = env("TWILIO_SID");
        $token = env("TWILIO_TOKEN");

        $client = new Client($sid, $token);
        $receiverNumber = '+' . $mobileNumber;

        try {
            $phoneNumberCarrierDetails = $client->lookups->v1->phoneNumbers($receiverNumber)->fetch(array("type" => array("carrier")));
            $status = array('status' => 200, 'message' => 'SUCCESS');
        } catch (RestException $ex) {
			$errorMessage = $ex->getMessage();
			$search = array('[HTTP 404] Unable to fetch record: The requested resource /PhoneNumbers/', 'was not found');
			$replace = array('', ' is not valid');
            $status = array('status' => 201, 'message' => str_replace($search, $replace, $errorMessage));
        }

        return $status;
    }
}


?>