<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\DataController;
use App\Http\Controllers\LayoutController;

class PageController extends Controller
{
    /**
     * redirect index page
     * @param  Request $request http request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function __construct(DataController $api, LayoutController $layout)
    {
      $this->api = $api;
      $this->layout = $layout; 
    }

    function getHomepage()
    {
      $globalData = $this->api->getSingletonData('globals'); 
      $allBevData = $this->api->getAllBeverageData(); 
      $allBlogData = $this->api->getAllBlogData(); 
      $blogFeed = $this->layout->homeBlogLayout($allBlogData); 
      $beverageFeed = $this->layout->homeBevLayout($allBevData); 
      $dataArray = array('globalData', 'blogFeed', 'beverageFeed');
      return view('index', compact($dataArray));
    }

    function getPage($slug)
    {
      $pageData = $this->api->getPageData($slug)[0];
      $pageSlug = $slug; 
	  	$bevData = $this->api->getAllBeverageData(); 
      $blogData = $this->api->getAllBlogData(); 
      $globalData = $this->api->getSingletonData('globals'); 
      $dataArray = array('pageData', 'pageSlug', 'bevData', 'blogData', 'globalData'); 
      return view('page', compact($dataArray));
    }

}
