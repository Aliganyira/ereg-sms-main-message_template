<?php

namespace App\Http\Controllers;

use Admin\Dashboard\Traits\DashboardTrait;
use App\Traits\NotificationTrait;
use App\Traits\Sms;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Traits\MailTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
//    use MailTrait;
//    use Sms;
    use DashboardTrait;
    use NotificationTrait;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        if (isset($user->UserPermissionGroup->group->name) && ($user->UserPermissionGroup->group->name == 'admin' || $user->UserPermissionGroup->group->name == 'organisation' || $user->UserPermissionGroup->group->name == 'Super Administrator')) {

            if (Auth::id() !== null && Auth::user()->hasRole(['organisation']) && !isset(Auth::user()->organisation->id)) {
                Session::flush();
                Auth::logout();
                return redirect('login')->with(['message'=>'You don\'t belong to any Organisation please contact administrator']);
            }
//            return view('ui::templates.limitless.layout_2'); //vertical menu
            return view('Dashboard::template.index')->with($this->dashboard());
        }
        abort(403, 'Un authorised access');
        //            return view('ui::templates.limitless.layouts.layout_5'); //horizontal menu
    }

    public function sms()
    {

        $this->sendSms('256703970431', 'Testing SMS Dennis at =>'.Carbon::now(), 'Dennis');

    }

    public function notification()
    {
        $this->push('Testing Dennis Notification', '256703970431', 'tamaledns@gmail.com',[]);


    }

    public function showNotifications()
    {
       return $notifications = auth()->user()->unreadNotifications;

//        return view('home', compact('notifications'));
    }

}
