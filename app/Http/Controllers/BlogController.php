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
    	$data = $this->api->getPostData($slug);
      	$pageData = $data->json()[0]; 
		$pageTitle = $pageData['title']['rendered'];
		$pageSlug = $pageData['slug'];
	  	$bevData = $this->api->getAllBeveragesData(); 
	  	$blogData = $this->api->getAllBlogData(); 
		$dataFields = $pageData['acf'];
		//$pageImg = $this->api->getPageFeatImg($pageSlug)[0]['_embedded']['wp:featuredmedia'][0]['source_url']; 
      	$dataArray = array('pageData', 'pageTitle', 'pageSlug', 'bevData', 'blogData', 'dataFields'); 
      	return view('blog', compact($dataArray));
    }

}
