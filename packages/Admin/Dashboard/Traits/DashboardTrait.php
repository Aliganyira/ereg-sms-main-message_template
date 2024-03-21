<?php

namespace Admin\Dashboard\Traits;

use Admin\Mails\Models\Mail;
use Admin\Organisations\Models\Organisation;
use \DateTime as DateTime;
use \DateInterval as DateInterval;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

trait DashboardTrait
{

    public function dashboard()
    {

        return array(
            'users' => $this->users(),
            'mails' => 0,
            'todayMails' =>0,
            'transactions' => 0,
            'transactionStatus' => [],
            'daily_mails' =>[],
            'topMdas' => [],
            'recentTransactions' => [],
        );
    }


    public function users()
    {

        if (Auth::id() !== null && Auth::user()->hasRole(['organisation'])) {
            return User::leftJoin('users_inner_join', 'users_inner_join.user_id', '=', 'users.id')->count();
        } else {
            return User::count();
        }

    }


    public function get_days_of_month($month = null)
    {

        if (isset($month)) {
            $selected_month = isset($month) ? date('Y-' . $month . '-d') : date($this->current_year . '-m-d');

            $dat = new DateTime($selected_month);

            $dat->modify('first day of this month');
            $first_date = $dat->format('Y-m-d 00:00:00');

            $dat->modify('last day of this month');
            $last_date = $dat->format('Y-m-d 23:59:59');

        } else {
            $last_date = date('Y-m-d 00:00:00');
            $first_date = date("Y-m-d 23:59:59", strtotime($last_date . " -30 days "));
        }

        $begin = new DateTime($first_date);

        $end = new DateTime($last_date);

        $interval = DateInterval::createFromDateString('1 day');

        $add_aday = 1;//will determine wetha to add a day or not

        return new \DatePeriod($begin, $interval, $end->modify("+$add_aday day"));
    }


}
