<?php

namespace App\Http\Controllers;

use Admin\Dashboard\Traits\DashboardTrait;
use Illuminate\Http\Request;
use App\Traits\MailTrait;

class AdminController extends Controller
{
    use MailTrait;
    use DashboardTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('Dashboard::template.index')->with($this->dashboard());
    }

    public function calender()
    {
        return view('ui::templates.limitless.layout_2-calender');
    }
}
