<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\DataController;

class PageController extends Controller
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

    function getHomepage()
    {
      $globalData = $this->api->getSingletonData($slug); 
      $dataArray = array('globalData');
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
