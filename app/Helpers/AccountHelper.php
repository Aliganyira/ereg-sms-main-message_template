<?php
if (!function_exists('accountStatus')) {
    function accountStatus($id)
    {

        switch ($id) {
            case 1:
                $alert = 'btn-success';
                $text_alert = 'text-success';
                $name = 'Active';
                break;
            case 2:
                $alert = 'bg-gray';
                $text_alert = 'text-gray';
                $name = 'Inactive';
                break;
            case 3:
                $alert = 'btn-warning';
                $text_alert = 'text-warning';
                $name = 'Redundant and Dormant';
                break;
            case 4:
                $alert = 'btn-danger';
                $text_alert = 'text-danger';
                $name = 'Blocked';
                break;
            case 5:
                $alert = 'btn-success';
                $text_alert = 'text-success';
                $name = 'Re-Activated';
                break;
            case 6:
                $alert = 'bg-light';
                $text_alert = 'text-light';
                $name = 'Closed Accounts';
                break;
            case 7://PENDING
            default:
                $alert = 'btn-primary';
                $text_alert = 'text-primary';
                $name = 'Pending';
                break;
        }
        $output = array(
            'alert' => $alert,
            'text_alert' => $text_alert,
            'name' => $name,
            'id' => $id
        );
        return json_decode(json_encode($output));
    }
}

if (!function_exists('mailStatus')) {
    function mailStatus($status)
    {
        //enum('in_custody', 'in_transit', 'pending_transfer', 'pending_dispatch', 'delivered')

        $name = humanize($status);
        switch ($status) {
            case 'in_custody':
                $alert = 'btn-primary';
                $text_alert = 'text-primary';
                $color = 'primary';

                break;
            case 'in_transit':
                $alert = 'bg-grey';
                $text_alert = 'text-grey';
                $color = 'grey';
                break;
            case 'pending_transfer':
                $alert = 'btn-warning';
                $text_alert = 'text-warning';
                $color = 'warning';
                break;
            case 'pending_dispatch':
                $alert = 'btn-danger';
                $text_alert = 'text-danger';
                $color = 'danger';
                break;
            case 'delivered':
                $alert = 'btn-success';
                $text_alert = 'text-success';
                $color = 'success';
                break;
            default:
                $alert = 'btn-teal';
                $text_alert = 'text-teal';
                $color = 'teal';
                break;
        }
        $output = array(
            'alert' => $alert,
            'text_alert' => $text_alert,
            'color' => $color,
            'name' => $name,
            'status' => $status
        );
        return json_decode(json_encode($output));
    }
}


if (!function_exists('requestProgress')) {
    function requestProgress($stage = null)
    {

        $status = 'bg-gray';
        $percentage = 0;

//'officiated', 'submitted', 'commissioned', 'accepted', 'created', 'closed', 'directed'
        if (isset($stage)) {

            if ($stage == 'officiated') {
                $status = 'bg-primary';
                $percentage = 5;
            }

            if ($stage == 'submitted') {
                $status = 'bg-info';
                $percentage = 10;
            }

            if ($stage == 'reviewed') {
                $status = 'bg-success';
                $percentage = 25;
            }

            if ($stage == 'accepted') {
                $status = 'bg-primary';
                $percentage = 10;
            }

            if ($stage == 'recommended') { //commissioned
                $status = 'bg-warning';
                $percentage = 50;
            }
            if ($stage == 'directed') {
                $status = 'bg-info';
                $percentage = 80;
            }
            if ($stage == 'created') {
                $status = 'bg-success';
                $percentage = 100;
            }
            if ($stage == 'closed') {
                $status = 'bg-danger';
                $percentage = 100;
            }


        }

        return '<div class="progress progress-lg">
                <div class="progress-bar progress-bar-striped  ' . $status . '" data-progress="' . $percentage . '">' . $percentage . '%</div>
            </div>';
//        return $progress;

    }
}
