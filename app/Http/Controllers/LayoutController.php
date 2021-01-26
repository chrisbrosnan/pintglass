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
        $o = '';
        $o .= '<div class="col-12 row mb-4">
            <div class="col-12 pb-3">
                <h1>Blog</h1>
            </div>'; 
        foreach($data['entries'] as $i)
        {
            $o .= '<a class="col-12 col-md-3" href="https://pintglassldn.com/blog/' . $i["slug"] . '">
                <div class="p-0" style="height: 200px; background: url(' . $i["image"]["path"] . '); background-size: cover; background-position: center center;">
                    <p class="col-12 text-white font-weight-bold py-2 bg-dark" style="line-height: 1.3em;">' . $i["name"] . '</p>
                </div>
            </a>';
        }
        $o .= '</div>';
        return $o; 
    }

    public function homeBevLayout($data)
    {
        $o = '';
        $o .= '<div class="col-12 row mb-4">
            <div class="col-12 pb-3">
                <h1>Beverages</h1>
            </div>'; 
        foreach($data['entries'] as $i)
        {
            $o .= '<a class="col-12 col-md-3" href="https://pintglassldn.com/beverages/' . $i["slug"] . '">
                <div class="p-0" style="height: 200px; background: url(' . $i["image"]["path"] . '); background-size: cover; background-position: center center;">
                    <p class="col-12 text-white font-weight-bold py-2 bg-dark" style="line-height: 1.3em;">' . $i["name"] . '(ABV '. $i["abv"] .'%)' . '<br/>
                    <scan style="font-weight: .5em;">' . $i["brewery"] . ' in ' . $i["town_origin"] . ',' . $i["country_origin"] . '</span></p>
                </div>
            </a>';
        }
        $o .= '</div>';
        return $o; 
    }

}
