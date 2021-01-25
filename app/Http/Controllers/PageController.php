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
      $dataArray = array('globalData', 'allBevData', 'allBlogData', 'blogFeed', 'beverageFeed');
      return view('index', compact($dataArray));
    }

    function getPage($slug)
    {
    	$data = $this->api->getPageData($slug);
      	$pageData = $data->json()[0]; 
		$pageTitle = $pageData['title']['rendered'];
		$pageSlug = $pageData['slug'];
	  	$bevData = $this->api->getAllBeveragesData(); 
	  	$blogData = $this->api->getAllBlogData(); 
		$pageImg = $this->api->getPageFeatImg($pageSlug)[0]['_embedded']['wp:featuredmedia'][0]['source_url']; 
      	$dataArray = array('pageData', 'pageTitle', 'pageSlug', 'bevData', 'blogData', 'pageImg'); 
      	return view('page', compact($dataArray));
    }

}
