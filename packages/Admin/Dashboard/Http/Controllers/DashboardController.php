<?php

namespace Admin\Dashboard\Http\Controllers;

use Admin\Dashboard\Traits\DashboardTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    use DashboardTrait;

    public function index()
    {
        return view('Dashboard::template.index')->with($this->dashboard());
    }

}
