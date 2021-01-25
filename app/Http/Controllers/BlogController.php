<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\DataController;

class BlogController extends Controller
{
    /**
     * redirect index page
     * @param  Request $request http request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function __construct(DataController $api)
    {
      $this->api = $api;
    }

    function getPost($slug)
    {
    	$blogData = $this->api->getBlogData($slug)['entries'][0];
      $globalData = $this->api->getSingletonData('globals'); 
      $dataArray = array('bevData', 'globalData'); 
      return view('blog', compact($dataArray));
    }

}
