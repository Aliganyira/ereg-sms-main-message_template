<?php
/**
 * Created by PhpStorm.
 * User: DennisTamale
 * Date: 30/03/2019
 * Time: 12:03
 */

namespace App\Helpers;

use DB;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Request;

class CustomValidator extends Facade
{

    public static function validate_phase($farm = null, $phase = null)
    {


        return isset($farm) && isset($phase) ? true : false;


    }


    public static function formatPhone($phone, $country = 'UG')
    {
        $phone = str_replace("+", "", $phone);

        try {
            $dialing_code = DB::table('country')->where('a2_iso', $country)->select('dialing_code')->first()->dialing_code;
            $dialing_code = isset($dialing_code) ? trim($dialing_code) : '256';

            preg_match('/^(0|' . $dialing_code . ')?([0-9]{9})$/', $phone, $matches);
            $phone = ($matches[1] && $matches != '0' ? $matches[1] : $dialing_code) . $matches[2];
        } catch (\Exception $e) {

        }
        return $phone;
    }

    public static function validPhone($phone, $country = 'UG')
    {

        $dialing_code = DB::table('country')->where('a2_iso', $country)->select('dialing_code')->first()->dialing_code;
        $dialing_code = isset($dialing_code) ? trim($dialing_code) : '256';


        $phone = str_replace("+", "", $phone);

        preg_match('/^(0|' . $dialing_code . ')?([0-9]{9})$/', $phone, $matches);
        if ($matches) {
            return true;
        }
        return false;
    }

    public static function metMinimumNumbers()
    {
        $numbers = Request::input('contact');
        $no = 0;
        foreach ($numbers as $k => $v) {
            !empty($v) ? $no++ : '';
        }
        return $no;
    }



}
