<?php

namespace Admin\Messages\Traits;

use Admin\Messages\Models\MessageInbox;

use App\Traits\Sms;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;

trait ProcessSms
{
    use Sms;


    public function receiveParticipantSms()
    {

        $from = Request::input('from');
        $sms = Request::input('sms');
        $sms = urldecode($sms);

        if (!empty($from) && !empty($sms)) {
            $values = array(
                'message' => urldecode($sms),
                'msisdn' => phone(trim($from)),
                //                'other' => trim($to),
                'subject' => 'Participant Response'
            );
            $inserted_sms = MessageInbox::create($values);
            return $this->processInMassage($inserted_sms->id);
        } else {
            echo 'Error Missing parameters';
        }

    }


    public function processInMassage($message_id = null)
    {
        $alert = 'error';
        $alert_message = '';
        if (isset($message_id)) {
            $message = MessageInbox::find($message_id);
            if (isset($message)) {
                $phone = $message->msisdn;
                $response = trim($message->message);
                //Generate Reply
                $response = Str::contains(Str::lower($response), ['story']) ? 'success' : $response;
                $sms = $this->reply($response);
                $subject = 'Response';
                //Sendout SMS
                $this->sendSms($phone, $sms, $subject);
                $alert = 'success';
                $alert_message = $sms;
            } else {
                $alert_message = 'There are no results found';
            }
        } else {
            $alert_message = 'Could not get some Parameters';
        }

        return array(
            'alert' => $alert,
            'message' => $alert_message
        );
    }


    private function reply($customer_input)
    {
        $customer_input = strtolower($customer_input);
        switch ($customer_input) {
            case 'yes':
                $response = "Dear customer, We have received your consent." . PHP_EOL;
                $response .= "Please note." . PHP_EOL;
                $response .= "For your submission to be valid you need to :-" . PHP_EOL;
                $response .= "1. Type STORY <leave a space>  Your story and send to 162." . PHP_EOL;
                $response .= "2. In your story make sure need to include" . PHP_EOL;
                $response .= "*your age," . PHP_EOL;
                $response .= "*Age of business nominated," . PHP_EOL;
                $response .= "*Your nationality," . PHP_EOL;
                $response .= "*Location in Uganda of Business ," . PHP_EOL;
                $response .= "*How business is utilising technology and" . PHP_EOL;
                $response .= "*size of community served by the business.";
                break;
            case 'success':
                $response = "You have successfully submitted your Uganda needs more of you story." . PHP_EOL;
                $response .= "You can visit our website or check local media stations for updates on the campaign to find out if your story has qualified to go to the next round.";
                break;
            default:
                $response = "Dear customer, We have received your submission. By submitting this story you confirm that you have read, understood and hereby consent to the terms and conditions of this campaign which are available at www.airtel.co.ug/UGNeedsMoreOfU." . PHP_EOL;
                $response .= "Type YES and reply to the short code 162 to continue.";
                break;
        }

        return $response;

    }

}
