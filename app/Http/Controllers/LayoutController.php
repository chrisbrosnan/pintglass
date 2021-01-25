<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
use Config;

class LayoutController extends Controller
{

    public function homeBlogLayout($data)
    {
        return $data; 
    }

    public function homeBevLayout($data)
    {
        return $data; 
    }

}
