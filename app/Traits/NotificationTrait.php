<?php

namespace App\Traits;

use App\Notifications\NewMailNotification;
use App\User;
use Illuminate\Support\Facades\Notification;

trait NotificationTrait
{

    use Sms;
    use MailTrait;

    public function push($phone, $message, $email_address, $data_array=null)
    {

        $this->send($phone, $message, 'GovMail');
        $this->send_mail($email_address, $message, 'GovMail');

        $data = [
            'phone' => $phone,
            'email' => $email_address,
            'message' => $message
        ];
        if(isset($data_array)){
            $data[] = $data_array;
        }

        $this->sendMailNotification($data);

        // function to send email and sms
        return "Notification Sent Successfully";
    }


    public function getInternalNotifications()
    {
        return auth()->user()->unreadNotifications;
    }


    public function sendMailNotification($data)
    {
        $admins = User::whereHas('roles', function ($query) {
            $query->where('id', 1);
        })->get();

        Notification::send($admins, new NewMailNotification($data));
    }


}
