<?php

namespace App\Traits;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;


trait Sms
{


    protected $user_id = '10023652977668526573'; //You need this
    protected $pass = '8xvRpdPUfychqRFyqTtx'; //You need this
    protected $email = '10023652977668526573'; //tony.yawe@finance.go.ugYou need this
    protected $shortcode = '6120'; //This stays the same


    protected $base_sms_path = 'https://msdg.uconnect.go.ug/api/v1/'; //BASE URL JUST INCASE YOU WAN T TO CHANGE IT
    protected $live_auth_link = 'https://msdg.uconnect.go.ug/api/v1/get-jwt-token/';
    protected $live_sms_link = 'https://msdg.uconnect.go.ug/api/v1/sms/';

    public function sendSMS($receiver = null, $text = null)
    {
        $token = $this->getAuthenticationToken();

        $method = 'POST';
        $parameter = [
            'sender' => $this->shortcode,
            'receiver' => $receiver,
            'text' => $text,
            'dlr_url' => '',// Optional
            'external_ref_id' => ''// Optional
        ];
        $end_point = $this->live_sms_link;
        return $this->doPostCall($end_point, $method, $end_point, null, $parameter, $token);
    }


    //Send SMS

    public function getAuthenticationToken()
    {

        $method = 'POST';
        $parameter = [
            'userid' => $this->user_id,
            'password' => $this->pass,
            'email' => $this->email
        ];

        $end_point = $this->live_auth_link;
        $response = $this->doPostCall($end_point, $method, $end_point, null, $parameter);
        try {
            return $response['message']['token'];
        } catch (RequestException $e) {

            if ($e->hasResponse()) {

                Log::channel('sms')->info('Error with Aggregator:: Method:' . '=>' . $e->getResponse()->getBody()->getContents() . PHP_EOL);
                return array(
                    'statusCode' => 'error',
                    'status' => $e->getResponse()->getStatusCode(),
                    'message' => 'SMS Error 002 ' . $e->getResponse()->getStatusCode() . ': ' . $e->getResponse()->getReasonPhrase() . ' : ' . $e->getResponse()->getBody()->getContents()//Server Error on the IFMS service'
                );

            }

        } catch (\Exception $e) {

            // To catch exactly error 400 use
            Log::channel('sms')->info('Error with Aggregator:: Method:' . '=>' . $e->getCode() . ': ' . $e->getMessage() . PHP_EOL);

            return array(
                'statusCode' => 'error',
                'status' => $e->getCode(),
                'message' => 'SMS Error 03 ' . $e->getCode() . ': ' . $e->getMessage(),

            );

        }
    }

    public function doPostCall($end_point = '', $method = 'POST', $param = '', $body = null, $json = null, $token = null)
    {
        if (isset($method)) {
            $url = $end_point;
            $client = new Client(['verify' => false]);
            $options = [
                'headers' => [
                    'Content-Type' => isset($body) ? 'application/x-www-form-urlencoded' : 'application/json; charset=UTF8',
                    'Authorization' => isset($token) ? 'JWT ' . $token : '',
                    'Accept' => 'application/json',
                ],
            ];

            isset($body) ? $options['body'] = $body : "";//Raw Data
            isset($json) ? $options['json'] = $json : "";//json parameters


            try {
                $response = $client->request($method, $url, $options);
                if ($response->getStatusCode() == 200) {
                    return array(
                        'statusCode' => 'success',
                        'status' => '200',
                        'message' => json_decode($response->getBody(), true),
                    );
                } else if ($response->getStatusCode() == 201) {
                    return array(
                        'statusCode' => 'success',
                        'status' => '201',
                        'message' => json_decode($response->getBody(), true),
                    );
                } else {
                    return array(
                        'statusCode' => 'error',
                        'status' => $response->getStatusCode(),
                        'message' => 'Error 001 ' . $response->getStatusCode() . ': ' . $response->getReasonPhrase()//Server Error on the IFMS service'
                    );
                }
            } catch (RequestException $e) {
                if ($e->hasResponse()) {
                    return array(
                        'statusCode' => 'error',
                        'status' => $e->getResponse()->getStatusCode(),
                        'message' => 'Error 002 ' . $e->getResponse()->getStatusCode() . ': ' . $e->getResponse()->getReasonPhrase()//Server Error on the IFMS service'
                    );
                }
            } catch (\Exception $e) {

                // To catch exactly error 400 use
                return array(
                    'statusCode' => 'error',
                    'status' => $e->getCode(),
                    'message' => 'Error 03 ' . $e->getCode() . ': ' . $e->getMessage(),
                );


            }
        } else {
            return false;
        }
    }


}
