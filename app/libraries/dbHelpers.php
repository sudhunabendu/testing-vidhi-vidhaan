<?php

namespace App\libraries;

use App\libraries\helpers;
use Illuminate\Support\Facades\DB;

class dbHelpers {

    /**
     * Function used to fetch template data
     * @param integer $template_id
     * @return array
     */
    public static function templateData($templateCode)
    {
        if (empty($templateCode)) {
            return false;
        }

        $data = array();

        $resultData = DB::table('email_templates')->where('template_code', $templateCode)->first();

        if (!empty($resultData)) {
            foreach ($resultData as $key => $val) {
                $data[$key] = helpers::outputEscapeString($val, 'TEXTAREA');
            }
        }
        return $data;
    }



        /**
     * Unique Code
     * @return array
     */
    public static function uniqueCode($length, $table, $col, $available_sets = 'ud')
    {

        $code = helpers::generatePassword($length, $available_sets);
        $existRecords = self::isExist($table, $col, $code);
        if (empty($existRecords)) {
            return $code;
        } else {
            self::uniqueCode($length, $table, $col);
        }
    }



        /**
     * Function used to check whether member exists
     * @param string $table
     * @param string $col
     * @param mix $value
     * @param integer $id
     * @return boolean
     */
    public static function isExist($table, $col, $value, $id = '')
    {

        if (empty($table) || empty($col)) {
            return false;
        }

        $where = $col . "='" . $value . "'";
        if (!empty($id)) {
            $where .= " AND id!='" . $id . "'";
        }

        $resultSet = DB::table($table)->selectRaw('COUNT(id) AS CNT')->whereRaw($where)->first();
        if (!empty($resultSet->CNT)) {
            return true;
        } else {
            return false;
        }
    }

}