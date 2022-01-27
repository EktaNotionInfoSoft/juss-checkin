<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\SiteSetting;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    function __construct()
    {
        $this->getSettingDetail();
    }
    function getSettingDetail()
    {
        $query = SiteSetting::find(1);
        if ($query) {
            define("SITE_NAME", $query['site_name']);
            define("SITE_LOGO", $query['site_logo']);
        }
    }
}
