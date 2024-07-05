<?php

namespace App\libraries;

class helpers {
     /**
     * Method used print array value
     */
    public static function pr($arr, $e = 1) {
        if (is_array($arr)) {
            echo "<pre>";
            print_r($arr);
            echo "</pre>";
        } else {
            echo "<br>Not an array...<br>";
            echo "<pre>";
            var_dump($arr);
            echo "</pre>";
        }

        if ($e == 1) {
            exit();
        } else {
            echo "<br>";
        }
    }


    /**
     * Method used to format output value of array
     * @param array $arr
     * @param string $Type
     * @param boolean $htmlEntitiesEncode
     * @return array
     */
    public static function outputEscapeArray($arr, $Type = 'DB', $htmlEntitiesEncode = true) {
        if (count($arr) == 0) {
            return $arr;
        }

        $escapeArray = array();
        $count = 0;
        foreach ($arr as $key => $val) {
            foreach ($val as $key => $val) {
                $escapeArray[$count][$key] = self::outputEscapeString($val, $Type, $htmlEntitiesEncode);
            }
            $count++;
        }
        return $escapeArray;
    }


     /**
     * Method used to format output value of string
     * @param array $str
     * @param string $Type
     * @param boolean $htmlEntitiesDecode
     * @return array
     */
    public static function outputEscapeString($str, $Type = 'INPUT', $htmlEntitiesDecode = true) {
        $str = html_entity_decode($str);

        if ($Type == 'INPUT') {
            $str = $str;
        } elseif ($Type == 'TEXTAREA') {
            $str = $str;
        } elseif ($Type == 'HTML') {
            $str = nl2br($str);
        } else {
            $str = htmlspecialchars($str);
        }

        $str = trim($str);

        return $str;
    }


     /**
     * Method used to get email template
     * @param string $toEmail
     * @param array $templateArray
     * @param array $searchText
     * @param array $replaceText
     */
    public static function emailTemplate($templateCode = '', $searchText = array(), $replaceText = array()) {
       
        $emailBody = array();
        if (!empty($templateCode)) {
            $data = dbHelpers::templateData($templateCode);
            $emailSubject = (!empty($data['subject']) && $data['subject'] != 'New Notification From Vidhi Vidhaan') ? $data['subject'] : $templateArray[1];
            // $smsBody = (!empty($data['sms_body'])) ? $data['sms_body'] : '';
            // $isSms = (!empty($data['is_sms'])) ? $data['is_sms'] : '';
            // $pushBody = (!empty($data['push_body'])) ? $data['push_body'] : '';
            // $isPush = (!empty($data['is_push'])) ? $data['is_push'] : '';
            if (count($searchText) > 0) {
                $subject = str_replace($searchText, $replaceText, $emailSubject);
                // $sms = str_replace($searchText, $replaceText, $smsBody);
                $body = str_replace($searchText, $replaceText, $data['email_body']);
            }
            $emailBody = array('body' => $body, 'subject' => $subject);
            // $emailBody = array('body' => $body, 'subject' => $subject, 'sms' => $sms, 'isSms' => $isSms, 'pushBody' => $pushBody, 'isPush' => $isPush);
        } else {
            return false;
        }
        return $emailBody;
    }


        /**
     * Use for generate a password with lowercase letter,uppercase letter, digits  and special character.
     * @param int $length
     * @param string $available_sets
     * @return string
     */
    public static function generatePassword($length = 8, $available_sets = 'luds')
    {
        $sets = array();

        if (strpos($available_sets, 'l') !== false) {
            $sets[] = 'abcdefghjkmnpqrstuvwxyz';
        }

        if (strpos($available_sets, 'u') !== false) {
            $sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
        }

        if (strpos($available_sets, 'd') !== false) {
            $sets[] = '23456789';
        }

        if (strpos($available_sets, 's') !== false) {
            $sets[] = '@#$%^&*()-_=+?/';
        }

        $all = '';
        $password = '';
        foreach ($sets as $set) {
            $password .= $set[array_rand(str_split($set))];
            $all .= $set;
        }

        $all = str_split($all);

        for ($i = 0; $i < $length - count($sets); $i++) {
            $password .= $all[array_rand($all)];
        }

        $password = str_shuffle($password);
        return $password;
    }
}