<?php
use App\Models\Setting;

if (!function_exists('settings')) {
    function settings($key)
    {
        return Setting::where('key',$key)->first()->val;
    }

    function msgdata($request, $status, $key, $data)
    {
        $msg['status'] = $status;
        $msg['msg'] = $key;
        $msg['data'] = $data;
        return $msg;
    }


    function msg($request, $status, $key)
    {
        $msg['status'] = $status;
        $msg['msg'] = $key;
        return $msg;
    }

    function success()
    {
        return 200;
    }

    function failed()
    {
        return 401;
    }

    function not_authoize()
    {
        return 403;
    }

    function not_acceptable()
    {
        return 406;
    }

    function not_found()
    {
        return 404;
    }

    function not_active()
    {
        return 405;
    }
}
