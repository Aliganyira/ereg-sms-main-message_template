<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;


use Validator;
use Admin\Mails\Models\Mail;
use Admin\Mails\Models\MailTracking;
use Admin\Mails\Models\MailBag;
use Admin\Mails\Models\MailBagItem;
use Admin\UserManagement\Models\UsersInnerJoin;
use App\User;
use App\Traits\NotificationTrait;


class CallbackController extends Controller
{
    use NotificationTrait;

    /**
     *
     *
     * @param  Request  $request
     * @return Response
     */

    public function index(Request $request)
    {
        # code...
        $json = $request->json()->all();

        if (empty($json)) {
            return response()->json(['status' => 'Failed', 'message' => 'No data received'], 419);
        }

        try {

            $action = $json['action'];
            $bag_number = $json['bag_number'];
            $tracking_number = $json['tracking_number'];
            $description = $json['description'];
            $weight = $json['weight'];
            $status = $json['status'];

            $user = User::where('username','eposta')->first();
            if(empty($user)){
                return response()->json( ['status' => 'Error', 'message' => 'EPosta Account Assigned Not Found'], 404);
            }

            if($action == 'receive_mail'){

                if(empty($bag_number)){
                    return response()->json( ['status' => 'Error', 'message' => 'Provide Bag Number.'], 404);
                }

                $bag = MailBag::where('bag_no', $bag_number)->first();
                if(empty($bag)){
                    return response()->json( ['status' => 'Error', 'message' => 'Bag Details Not Found'], 404);
                }


                if($bag->status == 'received'){
                    return response()->json( ['status' => 'Error', 'message' => 'Bag Already Received'], 404);
                }

                $bag->status = 'received';
                $bag->created_by = $user->id;
                $bag->updated_by = $user->id;
                $bag->save();

                $mail_items =  MailBagItem::where('bag_id', $bag->id)->get();
                foreach($mail_items as $item){

                    $mail = Mail::find($item->id);
                    $mail_status = $mail->status;

                    if($mail_status == 'dispatched'){
                        $mail->status = 'received_at_po';
                        $mail->created_by = $user->id;
                        $mail->updated_by = $user->id;
                        $mail->save();

                        // create tracking record
                        $tracking = new MailTracking;
                        $tracking->description = "Mail Item Received at Post Office";
                        $tracking->mail_id = $mail->id;
                        $tracking->status = 'Received at Post Office';
                        $tracking->created_by = $user->id;
                        $tracking->updated_by = $user->id;
                        $tracking->save();

                        // send notifications
                        $senderObj = user_details($mail->custodian_id);
                        $message = 'A '. $mail->mail_type . ' with tracking number: '.$mail->tracking_no.' has been received at the Post Office. The mail item will now be sent to its destination.';
                        // $this->push($senderObj->phone, $message, $senderObj->email);
                        $this->push('256702856551', $message, 'muwasol@gmail.com');
                    }

                }

                return response()->json( ['status' => 'Success', "message" => 'Dispatch Bag Received Successfully'], 200);



            }

            else if($action == 'track_mail'){

                $mail = Mail::where('tracking_no', $tracking_number)->first();
                if(empty($mail)){
                    return response()->json( ['status' => 'Error', 'message' => 'Mail Item Not Found'], 404);
                }

                // create tracking record
                $tracking = new MailTracking;
                $tracking->description = $description;
                $tracking->mail_id = $mail->id;
                $tracking->status = $status;
                $tracking->created_by = $user->id;
                $tracking->updated_by = $user->id;
                $tracking->save();

                return response()->json( ['status' => 'Success', "message" => 'Tracking Info Added Successfully'], 200);


            }

            else if($action == 'update_mail'){

                $mail = Mail::where('tracking_no', $tracking_number)->first();
                if(empty($mail)){
                    return response()->json( ['status' => 'Error', 'message' => 'Mail Item Not Found'], 404);
                }

                $mail->weight = $weight;
                $mail->updated_by = $user->id;
                $mail->save();

                // create tracking record
                $tracking = new MailTracking;
                $tracking->description = $description;
                $tracking->mail_id = $mail->id;
                $tracking->status = $status;
                $tracking->created_by = $user->id;
                $tracking->updated_by = $user->id;
                $tracking->save();

                return response()->json( ['status' => 'Success', "message" => 'Tracking Info Added Successfully'], 200);


            }

            else {

            }



            return response()->json(['status' => 'Success', 'message' => 'Transaction Processed Successfully'], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Error Occured',
                "error" => $e->getMessage()
            ], 409);
        }
    }


}
