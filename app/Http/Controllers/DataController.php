<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
use Config;

class DataController extends Controller
{

	const WP_API_URL = 'https://blog.pintglassldn.com/wp-json/wp/v2/';
	
	function getWpApiUrl()
	{
		return self::WP_API_URL; 
	}
	
	function getBeverageData($slug)
	{
		$jsonUrl = $this->getWpApiUrl() . 'beverages?slug=' . $slug; 
		$request = Http::get($jsonUrl); 
		return $request; 
	}
	
	function getHomepageData()
	{
		$jsonUrl = $this->getWpApiUrl() . 'pages?slug=homepage'; 
		$request = Http::get($jsonUrl); 
		return $request; 
	}
	
	function getAllBeveragesData()
	{
		$jsonUrl = $this->getWpApiUrl() . 'beverages'; 
		$request = Http::get($jsonUrl); 
		return $request->getBody()->getContents(); 
	}
	
	function getAllBlogData()
	{
		$jsonUrl = $this->getWpApiUrl() . 'posts'; 
		$request = Http::get($jsonUrl); 
		return $request->getBody()->getContents();
	}
	
	function getPageData($slug)
	{
		$jsonUrl = $this->getWpApiUrl() . 'pages/?slug=' . $slug; 
		$request = Http::get($jsonUrl); 
		return $request; 
	}
	
	function getPostData($slug)
	{
		$jsonUrl = $this->getWpApiUrl() . 'posts/?slug=' . $slug; 
		$request = Http::get($jsonUrl); 
		return $request; 
	}
	
	function getPostById($id)
	{
		$jsonUrl = $this->getWpApiUrl() . 'posts/?id=' . $id; 
		$request = Http::get($jsonUrl); 
		return $request; 
	}
	
	function getPageFeatImg($slug)
	{
		$jsonUrl = $this->getWpApiUrl() . 'pages/?slug=' . $slug . '&_embed'; 
		$request = Http::get($jsonUrl); 
		return $request; 
	}

}
