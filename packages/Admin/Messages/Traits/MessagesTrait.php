<?php

namespace Admin\Messages\Traits;

use Admin\Messages\Models\MessageInbox;
use Admin\Messages\Models\MessageInboxIvr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait MessagesTrait
{
    public function getDirectoryFiles($startTimstamp = null)
    {
        $allFiles = Storage::allFiles('/ivr-audios', true);
        $files = [];
        //        foreach (array_splice($allFiles, 0, 500) as $f) {
        foreach ($allFiles as $f) {
            $file = pathinfo($f);
            $last_modified = Storage::lastModified($f);
            if (isset($startTimstamp) && $last_modified >= $startTimstamp) {
                if ($file['extension'] == 'wav') {
                    $file['path'] = $f;
                    $file['size'] = number_format(Storage::size($f) / 1048576, 2) . 'MB';;
                    $file['timestamp'] = $last_modified;
                    $dir = explode('/', $file['dirname']);
                    $file['language'] = count($dir) > 1 ? $dir[1] : '';
                    $phone = explode('_', $file['filename']);
                    $file['msisdn'] = phone(count($phone) > 2 ? $phone[2] : $file['filename']);
                    $files[] = $file;
                }
            }
        }
        return $files;//json_decode(json_encode($files), true);

    }


    public function inboxSmsAjax()
    {
        $data = [];
        foreach (MessageInbox::limit(15000)->orderBy('id','desc')->get() as $r) {
            $status = status($r->moderation_status);
            $data[] = array(
                '<input type="checkbox" value="' . $r->msisdn . '" name="id[]" class="form-input-style" data-fou>',
                $r->created_at->toDateTimeString(),
                '<a href="' . route('messages.show-ivr', $r->msisdn) . '"> ' . $r->msisdn . '</a>',
                humanize($r->subject),
                Str::limit($r->message,50),
                '<div class="badge ' . @$status->alert . '">' . $status->name . '</div>',
                '<div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="' . route('messages.show', $r->msisdn) . '" class="dropdown-item"><i class="icon-eye2"></i> View all related Messages</a>
                                            </div>
                                        </div>
                                    </div>'
            );
        }

        return array('data' => $data);
    }

}
