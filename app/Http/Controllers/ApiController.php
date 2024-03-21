<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Admin\Mails\Models\Mail;
use Admin\Mails\Models\MailTracking;
use Admin\Mails\Models\MailBag;
use Admin\Mails\Models\MailBagItem;
use Admin\UserManagement\Models\UsersInnerJoin;
use App\User;
use App\Traits\NotificationTrait;

class ApiController extends Controller
{

    use NotificationTrait;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Callback response from Payments Integration.
     *
     * @param  Request  $request
     * @return Response
     */
    public function get_dispatched_bags()
    {
        $mailbags = MailBag::all();
        $data = array();

        foreach($mailbags as $bag){

            $sender = user_details($bag->sender_id);

            $data[] = array(
                'id' => $bag->id,
                'bag_no' => $bag->bag_no,
                'sender' => $sender->first_name . " " . $sender->last_name,
                'organisation' => organisation_name($bag->organisation_id),
                'department' => department_name($bag->department_id),
                'office' => office_name($bag->office_id),
                'station_id' => $bag->station_id,
                'status' => $bag->status,
                'created_at' => $bag->created_at,

            );

        }
        return response()->json( ['status' => 'Success', 'data' => $data], 200);
    }

    public function get_bag_by_bag_no($bag_no)
    {
        $bag = MailBag::where('bag_no', $bag_no)->first();

        if(empty($bag)){
            return response()->json( ['status' => 'Error', 'message' => 'Bag Details Not Found'], 404);
        }

        $sender = user_details($bag->sender_id);

        $mailbag = array(
            'id' => $bag->id,
            'bag_no' => $bag->bag_no,
            'sender' => $sender->first_name . " " . $sender->last_name,
            'organisation' => organisation_name($bag->organisation_id),
            'department' => department_name($bag->department_id),
            'office' => office_name($bag->office_id),
            'station_id' => $bag->station_id,
            'status' => $bag->status,
            'created_at' => $bag->created_at,

        );

        $mail_items =  MailBagItem::where('bag_id', $bag->id)->get();
        $mail_data = array();
        foreach($mail_items as $item){

            $mail = Mail::find($item->id);

            $mail_created_by = $item->created_by;
            $sender_department_id = UsersInnerJoin::where('join_type','department')->where('user_id',$mail_created_by)->pluck('join_id')->first();
            $sender_organisation_id = UsersInnerJoin::where('join_type','organisation')->where('user_id',$mail_created_by)->pluck('join_id')->first();
            $sender_office_id = UsersInnerJoin::where('join_type','office')->where('user_id',$mail_created_by)->pluck('join_id')->first();

            $senderObj = array(
                'sender_organisation' => organisation_name($sender_organisation_id),
                'sender_department' => department_name($sender_department_id),
                'sender_office' => office_name($sender_office_id),
                'sender_id' => '',
                'sender_title' => '',
                'sender_name' => office_detail($sender_office_id)->office_name,
                'sender_phone' => office_detail($sender_office_id)->phone,
                'sender_address' => office_detail($sender_office_id)->address
            );

            $receiverObj = array(
                'recipient_organisation' => organisation_name($mail->organisation_id),
                'recipient_department' => department_name($mail->department_id),
                'recipient_office' => office_name($mail->office_id),
                'recipient_id' => $mail->recipient_id,
                'recipient_title' => $mail->recipient_title,
                'recipient_name' => !isset($mail->recipient_name) ? '' : office_detail($mail->office_id)->office_name,
                'recipient_phone' => !isset($mail->recipient_phone) ? '' : office_detail($mail->office_id)->phone,
                'recipient_address' => !isset($mail->recipient_address)? '': office_detail($mail->office_id)->address
            );

            $stationObj = array(
                'from' => 1,
                'to' => 1
            );

            $mail_data[] = array(
                'id' => $item->id,
                'mail_type' => $mail->mail_type,
                'mail_class' => $mail->mail_class,
                'mail_description' => $mail->mail_description,
                'mail_category' => $mail->mail_category,
                'reference_no' => $mail->reference_no,
                'tracking_no' => $mail->tracking_no,
                'weight' => $mail->weight,
                'quantity' => $mail->quantity,
                'sender' => $senderObj,
                'receiver'=> $receiverObj,
                'station'=> $stationObj,
                'status'=> $mail->status,
                'created_at'=> $mail->created_at,
                'updated_at'=> $mail->updated_at
            );

        }

        return response()->json( ['status' => 'Success', 'bag' => $mailbag, "mail" => $mail_data], 200);
    }

    public function get_mail_by_tracking_number($tracking_number)
    {
        $mail = Mail::where('tracking_no', $tracking_no)->first();
        return response()->json( ['status' => 'Success', 'data' => $$mail], 200);
    }


}
