<?php

namespace Admin\Messages\Http\Controllers;

use Admin\Messages\Traits\MessagesTrait;
use Admin\Messages\Traits\ProcessSms;
use Admin\UserManagement\Traits\UsersTrait;
use App\Http\Controllers\Controller;
use App\Traits\MailTrait;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Admin\Messages\Models\MessageInbox;
use Admin\Messages\Models\MessageOutbox;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MessagesController extends Controller
{
    use ProcessSms;
    use UsersTrait;
    use MessagesTrait;
    use MailTrait;

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data['records'] = MessageOutbox::orderBy('id', 'desc')->get();
        return view('Messages::outbox')->with($data);
    }

    public function inbox(Request $request)
    {
        $records = MessageInbox::with('participant');
        $data['moderators'] = $this->getRoleUsers(['moderator']);
        if (isset($request) && !empty($request->all())) {
            $records->where('created_at', '>=', $request->from_submit . ' 00:00:00')->where('created_at', '<=', $request->to_submit . ' 23:59:59');
            $data['records'] = $records->orderBy('id', 'desc')->get();
            return view('Messages::inbox-without-ajax')->with($data);
        }
        return view('Messages::inbox')->with($data);

    }

    public function outbox()
    {
        $data['records'] = MessageOutbox::orderBy('id', 'desc')->get();
        return view('Messages::outbox')->with($data);
    }

    public function template()
    {
        // $data['records'] = MessageOutbox::orderBy('id', 'desc')->get();
        // return view('Messages::template')->with($data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('Messages::index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $data['moderators'] = $this->getRoleUsers(['moderator']);
        $data['msisdn'] = $id;
        $data['records'] = MessageInbox::with('moderator')->where('msisdn', $id)->get();
        return view('Messages::view')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('Messages::index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
