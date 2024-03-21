<?php //if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This converts the 1000s to Ks
 * converts Millions to Ms
 *
 * */

use App\Traits\Sms;
use App\Traits\SmsInstacom;

if (!function_exists('rg_number_convert')) {
    function rg_number_convert($number, $decimalPlaces = 2)
    {
        // strip any commas
        $number = (0 + str_replace(',', '', $number));

        // make sure it's a number...
        if (!is_numeric($number)) {
            return FALSE;
        }

        // filter and format it
        if ($number > 1000000000000) {
            return round(($number / 1000000000000), $decimalPlaces) . ' T';
        } elseif ($number > 1000000000) {
            return round(($number / 1000000000), $decimalPlaces) . ' B';
        } elseif ($number > 1000000) {
            return round(($number / 1000000), $decimalPlaces) . ' M';
        } elseif ($number > 1000) {
            return round(($number / 1000), $decimalPlaces) . ' K';
        }

        return number_format($number, $decimalPlaces);
    }
}


if (!function_exists('number_convert')) {
    function number_convert($number, $decimalPlaces = 2)
    {
        if ($number < 1000) {
            return round($number, $decimalPlaces);
        } elseif ($number < 1000000) {
            return round(($number / 1000), $decimalPlaces) . 'K';
        } elseif ($number >= 1000000) {
            return round(($number / 1000000), $decimalPlaces) . 'M';
        }
    }
}

if (!function_exists('memory_convert')) {
    function memory_convert($size)
    {
        $unit = array('kb', 'mb', 'gb', 'tb', 'pb');
        return @round($size / pow(1024, ($i = floor(log($size, 1024)))), 2) . ' ' . $unit[$i];
    }
}

if (!function_exists('monthName')) {
    function monthName($x)
    {
        $month = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        return $month[$x];
    }
}

if (!function_exists('monthShortName')) {
    function monthShortName($x)
    {
        $month = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec');
        return $month[$x];
    }
}

if (!function_exists('remove_p')) {
    function remove_p($string)
    {


        $string = str_replace('<p>', '', $string);
        $string = str_replace('</p>', '', $string);
        $string = str_replace('<br/>', '', $string);

        return $string;
    }
}

if (!function_exists('textfom')) {
    function textfom($txt)
    {

        $ftext = htmlspecialchars($txt, ENT_QUOTES);
        return str_replace(array("\r\n", "\n"), array("<br />", "<br />"), $ftext);
    }
}

if (!function_exists('br2nl')) {
    function br2nl($string)
    {
        return preg_replace('/\<br(\s*)?\/?\>/i', "\n", $string);
    }
}

if (!function_exists('stringNumbers')) {
    function stringNumbers($x)
    {
        $nwords = array(
            "zero", "one", "two", "three", "four", "five", "six", "seven",
            "eight", "nine", "ten", "eleven", "twelve", "thirteen",
            "fourteen", "fifteen", "sixteen", "seventeen", "eighteen",
            "nineteen", "twenty", 30 => "thirty", 40 => "forty",
            50 => "fifty", 60 => "sixty", 70 => "seventy", 80 => "eighty",
            90 => "ninety"
        );


        if (!is_numeric($x))
            $w = '#';
        else if (fmod($x, 1) != 0)
            $w = '#';
        else {
            if ($x < 0) {
                $w = 'minus ';
                $x = -$x;
            } else
                $w = '';
            // ... now $x is a non-negative integer.

            if ($x < 21)   // 0 to 20
                $w .= $nwords[$x];
            else if ($x < 100) {   // 21 to 99
                $w .= $nwords[10 * floor($x / 10)];
                $r = fmod($x, 10);
                if ($r > 0)
                    $w .= ' ' . $nwords[$r];
            } else if ($x < 1000) {   // 100 to 999
                $w .= $nwords[floor($x / 100)] . ' hundred';
                $r = fmod($x, 100);
                if ($r > 0) {
                    $w .= ' and ';
                    if ($r < 100) {   // 21 to 99
                        $w .= $nwords[10 * floor($r / 10)];
                        $r = fmod($r, 10);
                        if ($r > 0)
                            $w .= ' ' . $nwords[$r];
                    }
                }
            } else if ($x < 1000000) {   // 1000 to 999999
                $w .= $nwords[floor($x / 1000)] . ' thousand';
                $r = fmod($x, 1000);
                if ($r > 0) {
                    $w .= ' ';
                    if ($r < 100)
                        $w .= ' and ';
                    $w .= $nwords[$r];
                }
            } else {    //  millions
                $w .= stringNumbers(floor($x / 1000000)) . ' million';
                $r = fmod($x, 1000000);
                if ($r > 0) {
                    $w .= ' ';
                    if ($r < 100)
                        $w .= ' and ';
                    $w .= int_to_words($r);
                }
            }
        }
        //echo $w;

        return $w;
    }
}

if (!function_exists('Networks')) {
    function Networks($country = 'UG')
    {

        $country = strtoupper($country);

        switch ($country) {
            case 'UG':

                $u[0]['code'] = '25677';
                $u[0]['title'] = 'MTN_UG';

                $u[1]['code'] = '25678';
                $u[1]['title'] = 'MTN_UG';

                $u[2]['code'] = '25639';
                $u[2]['title'] = 'MTN_UG';

                $u[10]['code'] = '25632';
                $u[10]['title'] = 'MTN_UG';

                $u[11]['code'] = '25633';
                $u[11]['title'] = 'MTN_UG';

                $u[12]['code'] = '25674';
                $u[12]['title'] = 'MTN_UG';

                $u[13]['code'] = '25639';
                $u[13]['title'] = 'MTN_UG';

                $u[14]['code'] = '25635';
                $u[14]['title'] = 'MTN_UG';

                $u[15]['code'] = '25637';
                $u[15]['title'] = 'MTN_UG';

                $u[16]['code'] = '25638';
                $u[16]['title'] = 'MTN_UG';

                $u[17]['code'] = '25638';
                $u[17]['title'] = 'MTN_UG';


                $u[3]['code'] = '25675';
                $u[3]['title'] = 'AIRTEL_UG';


                $u[4]['code'] = '25670';
                $u[4]['title'] = 'AIRTEL_UG';


                $u[5]['code'] = '25679';
                $u[5]['title'] = 'AFRICELL_UG';


                $u[6]['code'] = '25671';
                $u[6]['title'] = 'UTL_UG';


                $u[7]['code'] = '25672';
                $u[7]['title'] = 'VODAFONE_UG';


                $u[8]['code'] = '25674';
                $u[8]['title'] = 'SMART_UG';

                $u[9]['code'] = '25673';
                $u[9]['title'] = 'K2_UG';


                break;


            case 'RW':


                $u[0]['code'] = '25078';
                $u[0]['title'] = 'MTN_RW';

                $u[1]['code'] = '25073';
                $u[1]['title'] = 'AIRTEL_RW';

                $u[2]['code'] = '25072';
                $u[2]['title'] = 'TIGO_RW';

                break;


            default:

                $u = array();

                break;
        }
        return $u;
    }
}

if (!function_exists('getNetwork')) {
    function getNetwork($mobile)
    {
        $substring = substr($mobile, 0, 5);

        if ($substring == "25678" || $substring == "25677" || $substring == "25639" || $substring == "25631" || $substring == "25632" || $substring == "25633" || $substring == "25635" || $substring == "25638") {
            return "MTN_UG";
        } else if ($substring == "25675" || $substring == "25670" || $substring == "25620") {

            return "AIRTEL_UG";
        } else if ($substring == "25674") {

            return "SMART_UG";
        } else if ($substring == "25672") {

            return "VODAFONE_UG";
        } else if ($substring == "25679") {

            return "AFRICELL_UG";
        } else if ($substring == "25671") {

            return "UTL_UG";
        } else if ($substring == "25673") {

            return "K2_UG";
        } else if ($substring == "25078") {

            return "MTN_RW";
        } else if ($substring == "25073") {

            return "AIRTEL_RW";
        } else if ($substring == "25072") {

            return "TIGO_RW";
        } else {
            return "RWANDACELL";
        }
    }
}

if (!function_exists('phone')) {
    function phone($phone)
    {


        if (strstr($phone, ',') or strstr($phone, '/') or strstr($phone, '-')) {
            if (strstr($phone, ',')) {
                $phone = substr($phone, 0, strpos($phone, ','));
            }
            if (strstr($phone, '/')) {
                $phone = substr($phone, 0, strpos($phone, '/'));
            }
            if (strstr($phone, '-')) {
                $phone = substr($phone, 0, strpos($phone, '-'));
            }
            $phone = trim($phone);
        }


        if (strstr($phone, '+')) {
            $phone = substr($phone, 1);
            $mobile = strlen($phone) == 10 ? '256' . substr($phone, 1) : $phone;
            return $mobile;
        } elseif (strlen($phone) == 9) {
            $mobile = strlen($phone) == 9 ? '256' . $phone : $phone;
            return $mobile;
        } else {
            $mobile = strlen($phone) == 10 ? '256' . substr($phone, 1) : $phone;
            return $mobile;
        }
    }
}

if (!function_exists('phone2')) {
    function phone2($phone)
    {
        if (strstr($phone, '+')) {
            //                776716138

            $phone = substr($phone, 1);
            $mobile = strlen($phone) == 10 ? '256' . substr($phone, 1) : $phone;
            return $mobile;
        } else {
            $mobile = strlen($phone) == 9 ? '256' . $phone : $phone;
            return $mobile;
        }
    }
}

if (!function_exists('trending_date')) {
    function trending_date($date)
    {
        return date('Y-m-d') == date('Y-m-d', $date) ? date('H:i:s', $date) : date('d-m-Y', $date);
    }
}

if (!function_exists('trending_date_time')) {
    function trending_date_time($date)
    {
        return date('Y-m-d') == date('Y-m-d', $date) ? date('H:i:s', $date) : date('d-m-Y H:i', $date) . 'hrs';
    }
}

if (!function_exists('code')) {
    function code($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

if (!function_exists('hashValue')) {
    function hashValue($v)
    {

        $mypassword = $v;
        $mypassword = crypt($mypassword, sha1(md5($mypassword)));
        $v = crypt($mypassword, $mypassword); // let the salt be automatically generated

        return $v;
    }
}

if (!function_exists('readJsonFgets')) {
    function readJsonFgets()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        return $data;
    }
}

if (!function_exists('readJson')) {
    function readJson($obj, $type = 'url')
    {
        if ($type == 'url') {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_URL, $obj);
            $result = curl_exec($ch);
            curl_close($ch);
        } else {
            $result = $obj;
        }

        return $obj = json_decode($result);
    }
}

if (!function_exists('local_server')) {
    function local_server()
    {
        if ($_SERVER["SERVER_ADDR"] == "127.0.0.1" || $_SERVER["SERVER_ADDR"] == "localhost" || $_SERVER["SERVER_ADDR"] == "http://localhost/" || $_SERVER["SERVER_ADDR"] == "::1") {
            return True;
        } else {

            return False;
        }
    }
}


if (!function_exists('url_get_contents')) {
    function url_get_contents($url)
    {
        if (function_exists('curl_exec')) {
            $conn = curl_init($url);
            curl_setopt($conn, CURLOPT_SSL_VERIFYPEER, true);
            curl_setopt($conn, CURLOPT_FRESH_CONNECT, true);
            curl_setopt($conn, CURLOPT_RETURNTRANSFER, 1);
            $url_get_contents_data = (curl_exec($conn));
            curl_close($conn);
        } elseif (function_exists('file_get_contents')) {
            $url_get_contents_data = file_get_contents($url);
        } elseif (function_exists('fopen') && function_exists('stream_get_contents')) {
            $handle = fopen($url, "r");
            $url_get_contents_data = stream_get_contents($handle);
        } else {
            $url_get_contents_data = false;
        }
        return $url_get_contents_data;
    }
}

if (!function_exists('week_no')) {
    function week_no($ddate)
    {

        //$ddate = date('Y-m-d');
        $date = new DateTime($ddate);
        $week = $date->format("W");

        return $week;
    }
}

if (!function_exists('getStartAndEndDate')) {
    function getStartAndEndDate($week, $year)
    {
        $week_start = new DateTime();
        $week_start->setISODate($year, $week);
        $return[0] = $week_start->format('Y-m-d');
        $time = strtotime($return[0], time());
        $time += 6 * 24 * 3600;
        $return[1] = date('Y-m-d', $time);
        return $return;
    }
}


if (!function_exists('json_output')) {
    function json_output($data = null)
    {

        header('Content-Type:application/json');

        $no_output = array(
            'response' => 'error',
            'message' => 'Nothing Encoded'
        );

        $response = isset($data) || count($data) > 0 ? $data : $no_output;

        echo json_encode($response, JSON_PRETTY_PRINT);
    }
}

if (!function_exists('change_destination')) {
    function change_destination($destination, $duration = 2)
    {
        echo '<META http-equiv=refresh content=' . $duration . ';URL=' . base_url() . 'index.php/' . $destination . '>';
    }
}


if (!function_exists('extract_file')) {
    function extract_file($file)
    {


        $output = array();
        while (!feof($file)) {

            $dd = fgets($file);

            array_push($output, $dd);
            //                    $parts = explode('"', $dd);
            //                    $statusCode = substr($parts[2], 0, 4);

        }

        return $output;
    }
}


if (!function_exists('get_string_diff')) {
    function get_string_diff($old, $new)
    {
        $from_start = strspn($old ^ $new, "\0");
        $from_end = strspn(strrev($old) ^ strrev($new), "\0");

        $old_end = strlen($old) - $from_end;
        $new_end = strlen($new) - $from_end;

        $start = substr($new, 0, $from_start);
        $end = substr($new, $new_end);
        $new_diff = substr($new, $from_start, $new_end - $from_start);
        $old_diff = substr($old, $from_start, $old_end - $from_start);

        return strlen($new_diff) != strlen($old_diff) ? true : false;


        //$new = "$start<ins style='background-color:#ccffcc'>$new_diff</ins>$end";
        //$old = "$start<del style='background-color:#ffcccc'>$old_diff</del>$end";
        //return array("old"=>$old, "new"=>$new);
    }
}

if (!function_exists('fwrite_stream')) {
    function fwrite_stream($fp, $string)
    {
        for ($written = 0; $written < strlen($string); $written += $fwrite) {
            $fwrite = fwrite($fp, substr($string, $written));
            if ($fwrite === false) {
                return $written;
            }
        }
        return $written;
    }
}


if (!function_exists('sms_time')) {
    function sms_time($time = null)
    {
        if (isset($time)) {
            $year = $substring = substr($time, 0, 2);
            $month = $substring = substr($time, 2, 2);
            $date = $substring = substr($time, 4, 2);
            $hour = $substring = substr($time, 6, 2);
            $min = $substring = substr($time, 8, 2);

            return $old_date = mktime($hour, $min, 00, $month, $date, $year);
        } else {
            return '-';
        }
    }
}


if (!function_exists('split_date')) {
    function split_date($date_range = null, $separator = '~')
    {

        $dates = explode($separator, $date_range);

        return array(
            'date1' => trim($dates[0]),
            'date2' => trim($dates[1])
        );
    }
}


if (!function_exists('period')) {
    function period($fdate = null, $last_day = null, $interval = null)
    {


        $fdate = isset($fdate) ? date($fdate) : date('Y-m-01 00:00:01');
        $ldate = isset($last_day) ? date($last_day) : date('Y-m-d 23:59:59');

        $begin = new DateTime($fdate);
        $end = new DateTime($ldate);

        $add_aday = isset($interval) ? 0 : 0; //$interval;//will determine wetha to add a day or not
        $interval = DateInterval::createFromDateString("$interval day");
        //$period = new DatePeriod($begin, $interval, $end->modify( '+1 day' ));


        return new DatePeriod($begin, $interval, $end->modify("+$add_aday day"));
    }
}


if (!function_exists('message_count')) {
    function message_count($string = null, $single_sms = 160)
    {

        if (isset($string)) {

            $string = strlen($string);

            $actual_count = $string / $single_sms;

            return ceil($actual_count);
        } else {
            return false;
        }
    }
}


if (!function_exists('remove_space')) {
    function remove_space($string)
    {
        $pattern = '/\s+/';
        $replacement = '';
        //            return preg_replace('/\s+/', '', $string);
        return preg_replace($pattern, $replacement, $string);
    }
}


if (!function_exists('get_token')) {

    function get_token($length = 16)
    {

        if (function_exists('random_bytes')) {
            return bin2hex(random_bytes($length));
        }

        if (function_exists('openssl_random_pseudo_bytes')) {
            return bin2hex(openssl_random_pseudo_bytes($length));
        }
    }
}


//this is the function for basic authentication
if (!function_exists('api_auth')) {
    function api_auth($username, $password)
    {

        header('WWW-Authenticate: Basic realm="System API Auth"');

        if (!isset($_SERVER['PHP_AUTH_USER']) && !isset($_SERVER['PHP_AUTH_PW'])) {

            http_response_code(401);

            header('Content-Type:application/json;charset=utf-8');
            $response = 'Authorization failed';
            $response = array(
                'response' => 'error',
                'output' => $response
            );
            json_encode($response);
            exit;
        } elseif (($_SERVER['PHP_AUTH_PW'] != $password && $_SERVER['PHP_AUTH_USER'] != $username)) {


            http_response_code(401);


            header('Content-Type:application/json;charset=utf-8');
            $response = 'Authorization failed';
            $response = array(
                'response' => 'error',
                'output' => $response
            );
            echo json_encode($response);
            exit;
        } elseif (($_SERVER['PHP_AUTH_PW'] == $password && $_SERVER['PHP_AUTH_USER'] == $username)) {
            http_response_code(200);
        }
    }
}


if (!function_exists('http_response_code')) {
    function http_response_code($code = NULL)
    {

        if ($code !== NULL) {

            switch ($code) {
                case 100:
                    $text = 'Continue';
                    break;
                case 101:
                    $text = 'Switching Protocols';
                    break;
                case 200:
                    $text = 'OK';
                    break;
                case 201:
                    $text = 'Created';
                    break;
                case 202:
                    $text = 'Accepted';
                    break;
                case 203:
                    $text = 'Non-Authoritative Information';
                    break;
                case 204:
                    $text = 'No Content';
                    break;
                case 205:
                    $text = 'Reset Content';
                    break;
                case 206:
                    $text = 'Partial Content';
                    break;
                case 300:
                    $text = 'Multiple Choices';
                    break;
                case 301:
                    $text = 'Moved Permanently';
                    break;
                case 302:
                    $text = 'Moved Temporarily';
                    break;
                case 303:
                    $text = 'See Other';
                    break;
                case 304:
                    $text = 'Not Modified';
                    break;
                case 305:
                    $text = 'Use Proxy';
                    break;
                case 400:
                    $text = 'Bad Request';
                    break;
                case 401:
                    $text = 'Unauthorized';
                    break;
                case 402:
                    $text = 'Payment Required';
                    break;
                case 403:
                    $text = 'Forbidden';
                    break;
                case 404:
                    $text = 'Not Found';
                    break;
                case 405:
                    $text = 'Method Not Allowed';
                    break;
                case 406:
                    $text = 'Not Acceptable';
                    break;
                case 407:
                    $text = 'Proxy Authentication Required';
                    break;
                case 408:
                    $text = 'Request Time-out';
                    break;
                case 409:
                    $text = 'Conflict';
                    break;
                case 410:
                    $text = 'Gone';
                    break;
                case 411:
                    $text = 'Length Required';
                    break;
                case 412:
                    $text = 'Precondition Failed';
                    break;
                case 413:
                    $text = 'Request Entity Too Large';
                    break;
                case 414:
                    $text = 'Request-URI Too Large';
                    break;
                case 415:
                    $text = 'Unsupported Media Type';
                    break;
                case 500:
                    $text = 'Internal Server Error';
                    break;
                case 501:
                    $text = 'Not Implemented';
                    break;
                case 502:
                    $text = 'Bad Gateway';
                    break;
                case 503:
                    $text = 'Service Unavailable';
                    break;
                case 504:
                    $text = 'Gateway Time-out';
                    break;
                case 505:
                    $text = 'HTTP Version not supported';
                    break;
                default:
                    exit('Unknown http status code "' . htmlentities($code) . '"');
                    break;
            }

            $protocol = (isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0');

            header($protocol . ' ' . $code . ' ' . $text);

            $GLOBALS['http_response_code'] = $code;
        } else {

            $code = (isset($GLOBALS['http_response_code']) ? $GLOBALS['http_response_code'] : 200);
        }

        return $code;
    }
}


if (!function_exists('log_responses')) {
    function log_responses($string)
    {
        $CI = &get_instance();

        $CI->load->helper("file");

        $path = 'logs/';
        if (!is_dir($path)) //create the folder if it's not already exists
        {
            mkdir($path, 0777, TRUE);
        }
        $date = date('dmY');
        $file = "log_response_$date.txt";

        if (!write_file($path . $file, $string . '-' . date('Y-m-d H:i:s ' . PHP_EOL), "a+")) {
            //echo 'Unable to write the file';
        } else {
            //echo 'File written!';
        }
    }
}


if (!function_exists('run_foreever')) {
    function run_foreever()
    {
        ignore_user_abort(1); // run script in background
        set_time_limit(0); // run script forever
        $interval = 60 * 15; // do every 15 minutes...
        do {
            // add the script that has to be ran every 15 minutes here
            // ...
            sleep($interval); // wait 15 minutes
        } while (true);
    }
}




if (!function_exists('time_elapsed_string')) {
    function time_elapsed_string($datetime, $full = false)
    {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }
}


if (!function_exists('humanize')) {
    function humanize($str)
    {
        return ucwords(str_replace(array('_', '-'), ' ', $str));
    }
}


if (!function_exists('human_date')) {
    function human_date($str, $part = null)
    {

        $date = strtotime($str);

        if ($part == 'date') {

            return date('d-m-Y', $date);
        } elseif ($part == 'time') {
            return date('H:i:s', $date);
        } elseif ($part == 'date time') {
            return date('d-m-Y H:i:s', $date);
        } else {

            return  trending_date($date);
        }
    }
}

if (!function_exists('text_truncates')) {
    function text_truncates($str, $ln = null)
    {
        if (!($ln == null)) {

            $length = $ln;
        } else {

            $length = '170';
        }
        $truncated = Str::limit(strip_tags($str), $length, '  .........');

        return $truncated;
    }
}

if (!function_exists('frm_error')) {
    function frm_error($errors)
    {
        if ($errors->any()) {
            $eror = '<div class="alert alert-danger">';
            foreach ($errors->all() as $error) {
                $eror .= $error;
            }
            $eror .=    '</div>';
        }

        return $eror;
    }
}



if (!function_exists('encode_id')) {
    function encode_id($id)
    {
        return $id * date('Y');
    }
}

if (!function_exists('decode_id')) {
    function decode_id($id)
    {
        return $id / date('Y');
    }
}


if (!function_exists('user_details')) {
    function user_details($_id)
    {
        return \App\User::find($_id);
    }
}

if (!function_exists('organisation_name')) {
    function organisation_name($id)
    {
        return \Admin\Organisations\Models\Organisation::where('id', $id)->get()->pluck('name')->first();
    }
}

if (!function_exists('organisation_detail')) {
    function organisation_detail($id)
    {
        return \Admin\Organisations\Models\Organisation::where('id', $id)->first();
    }
}

if (!function_exists('department_name')) {
    function department_name($id)
    {
        return \Admin\Departments\Models\Department::where('id', $id)->get()->pluck('dept_name')->first();
    }
}

if (!function_exists('office_name')) {
    function office_name($id)
    {
        return \Admin\Offices\Models\Office::where('id', $id)->get()->pluck('office_name')->first();
    }
}

if (!function_exists('office_detail')) {
    function office_detail($id)
    {
        return \Admin\Offices\Models\Office::where('id', $id)->first();
    }
}

function convert_date($date){
    return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->toDayDateTimeString();
}

if (!function_exists('user_organisation_id')) {
    function user_organisation_id($id)
    {
        return \Admin\UserManagement\Models\UsersInnerJoin::where('join_type','organisation')->where('user_id',$id)->get()->pluck('join_id')->first();
    }
}

if (!function_exists('user_office_id')) {
    function user_department_id($id)
    {
        return \Admin\UserManagement\Models\UsersInnerJoin::where('join_type','department')->where('user_id',$id)->get()->pluck('join_id')->first();
    }
}

if (!function_exists('user_office_id')) {
    function user_office_id($id)
    {
        return \Admin\UserManagement\Models\UsersInnerJoin::where('join_type','office')->where('user_id',$id)->get()->pluck('join_id')->first();
    }
}

if (!function_exists('mail_detail')) {
    function mail_detail($id)
    {
        return \Admin\Mails\Models\Mail::find($id);
    }
}


if (!function_exists('send_notification')) {
    function send_notification($message, $phone, $email_address)
    {

      App\Traits\SmsInstacom::send($phone,$message,'GovMail');
      App\Traits\MailTrait::send_mail($email_address,$message,'GovMail');
        // function to send email and sms
        return "Notification Sent Successfully";
    }
}


