<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\DataController;

class BeverageController extends Controller
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

    function getEntry($slug)
    {
      $bevData = $this->api->getBeverageData($slug)['entries'][0];
      $globalData = $this->api->getSingletonData('globals'); 
      //   	$pageData = $data->json()[0]; 
      // $pageTitle = $pageData['title']['rendered'];
      // $pageSlug = $pageData['slug'];
      // 	$bevData = $this->api->getAllBeveragesData(); 
      // $dataFields = $pageData['acf'];
      // 	$blogData = $this->api->getAllBlogData(); 
      // $pageImg = $pageData['better_featured_image']['media_details']['sizes']['medium']['source_url']; 
      $dataArray = array('bevData', 'globalData'); 
      return view('beverage', compact($dataArray));
    }

}
