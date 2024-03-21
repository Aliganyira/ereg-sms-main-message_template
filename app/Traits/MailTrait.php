<?php


namespace App\Traits;

use App\User;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Mail;


trait MailTrait
{

//    use Sms;
//    use SmsInstacom;

    public function send_mail($to_email, $body, $subject = null, $to_name = null)
    {

        $to_name = $to_name ?? '!';
        $to_email = $to_email;
        $subject = $subject ?? config('app.name', 'GovMail');
        $data = array(
            'to_name' => $to_name,
            'to_email' => $to_email,
            'body' => $body,
            'subject' => $subject
        );

        Mail::send('emails.mail', $data, function ($message) use ($to_name, $to_email, $subject) {
            $message
                ->to($to_email, $to_name)
                ->subject($subject);
        });


    }


    public function sendVerificationNotification($notifiable)
    {

        $mail = new MailMessage;
        $mail->line('Your two factor code is ' . $notifiable->two_factor_code)
            //            ->action('Verify Here', route('verify.index'))
            ->line('The code will expire in 10 minutes')
            ->line('If you have not tried to login, ignore this message.');


        $message = $mail;

        $email = $notifiable->email;
        $message_subject = env('APP_NAME') . '-Verification';


        if (env('APP_URL') != 'http://localhost') {
            $phone = $notifiable->phone;
//            $this->send(phone($phone), $message->introLines[0], $message_subject);
        }


        $name = $notifiable->first_name;
        $this->send_mail($email, $message, $message_subject, $name);

    }


    public function sample_email()
    {

        $to_name = 'Dennis Tamale';
        $to_email = 'tamaledns@gmail.com';
        $subject = 'Subject';
        $data = array(
            'to_name' => $to_name,
            'to_email' => $to_email,
            'name' => "Ogbonna Vitalis(sender_name)",
            'body' => "A test mail",
            'subject' => $subject
        );

        Mail::send('emails.mail', $data, function ($message) use ($to_name, $to_email, $subject) {
            $message
                ->to($to_email, $to_name)
                ->subject($subject);
            //$message->from('no-reply@egpuganda.com', 'CYCAD');
        });


    }


    public function sendNotification($user_id, $message, $subject = 'notification')
    {

        $user = User::find($user_id);
        $phone = $user->phone;
        $name = $user->first_name;
        $email = $user->email;
        $this->send_mail($email, $message, $subject, $name);
//        $this->sendSms(phone($phone), $message, $subject);

    }

}
