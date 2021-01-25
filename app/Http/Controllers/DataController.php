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

	const CMS_API_URL = 'https://pintglassldn.com/admin/api/';
	const CMS_API_TOKEN = 'ca2da9e3e1c959fafe7cfb98e94108';
	
	function getCmsApiUrl()
	{
		return self::CMS_API_URL; 
	}

	function getCmsApiToken()
	{
		return self::CMS_API_TOKEN; 
	}

	function getCollectionAllData($c)
	{
		$jsonUrl = $this->getCmsApiUrl() . 'collections/' . $c . '?token=' . $this->getCmsApiToken(); 
		$request = Http::get($jsonUrl)->getBody(); 
		return $request;
	}

	function getCollectionSingleData($c, $slug)
	{
		$jsonUrl = $this->getCmsApiUrl() . 'collections/' . $c . '?token=' . $this->getCmsApiToken() . '&?filter[slug]=' . $slug; 
		$request = Http::get($jsonUrl); 
		return $request;
	}

	function getSingletonData($slug)
	{
		$jsonUrl = $this->getCmsApiUrl() . 'singletons/' . $slug . '?token=' . $this->getCmsApiToken(); 
		$request = Http::get($jsonUrl); 
		return $request;
	}

	// Blog

	function getAllBlogData()
	{
		return $this->getCollectionAllData('blog'); 
	}
	
	function getBlogData($slug)
	{
		return $this->getCollectionSingleData('blog', $slug); 
	}

	// Beverages

	function getAllBeverageData()
	{
		return $this->getCollectionAllData('beverages'); 
	}
	
	function getBeverageData($slug)
	{
		return $this->getCollectionSingleData('beverages', $slug); 
	}

	// Venues

	function getAllVenueData()
	{
		return $this->getCollectionAllData('venues'); 
	}
	
	function getVenueData($slug)
	{
		return $this->getCollectionSingleData('venues', $slug); 
	}

	// Food

	function getAllFoodData()
	{
		return $this->getCollectionAllData('food'); 
	}
	
	function getFoodData($slug)
	{
		return $this->getCollectionSingleData('food', $slug); 
	}

	// Themes

	function getAllThemeData()
	{
		return $this->getCollectionAllData('themes'); 
	}
	
	function getThemeData($slug)
	{
		return $this->getCollectionSingleData('themes', $slug); 
	}

	// Locations

	function getAllLocationData()
	{
		return $this->getCollectionAllData('locations'); 
	}
	
	function getLocationData($slug)
	{
		return $this->getCollectionSingleData('locations', $slug); 
	}

	// Features

	function getAllFeatureData()
	{
		return $this->getCollectionAllData('features'); 
	}
	
	function getFeatureData($slug)
	{
		return $this->getCollectionSingleData('features', $slug); 
	}

	// Users

	function getAllUserData()
	{
		return $this->getCollectionAllData('users'); 
	}
	
	function getUserData($slug)
	{
		return $this->getCollectionSingleData('users', $slug); 
	}



	// Homepage Data
	
	// function getHomepageData()
	// {
	// 	$jsonUrl = $this->getWpApiUrl() . 'pages?slug=homepage'; 
	// 	$request = Http::get($jsonUrl); 
	// 	return $request; 
	// }
	
	// function getAllBeveragesData()
	// {
	// 	$jsonUrl = $this->getWpApiUrl() . 'beverages'; 
	// 	$request = Http::get($jsonUrl); 
	// 	return $request->getBody()->getContents(); 
	// }
	
	// function getAllBlogData()
	// {
	// 	$jsonUrl = $this->getWpApiUrl() . 'posts'; 
	// 	$request = Http::get($jsonUrl); 
	// 	return $request->getBody()->getContents();
	// }
	
	// function getPageData($slug)
	// {
	// 	$jsonUrl = $this->getWpApiUrl() . 'pages/?slug=' . $slug; 
	// 	$request = Http::get($jsonUrl); 
	// 	return $request; 
	// }
	
	// function getPostData($slug)
	// {
	// 	$jsonUrl = $this->getWpApiUrl() . 'posts/?slug=' . $slug; 
	// 	$request = Http::get($jsonUrl); 
	// 	return $request; 
	// }
	
	// function getPostById($id)
	// {
	// 	$jsonUrl = $this->getWpApiUrl() . 'posts/?id=' . $id; 
	// 	$request = Http::get($jsonUrl); 
	// 	return $request; 
	// }
	
	// function getPageFeatImg($slug)
	// {
	// 	$jsonUrl = $this->getWpApiUrl() . 'pages/?slug=' . $slug . '&_embed'; 
	// 	$request = Http::get($jsonUrl); 
	// 	return $request; 
	// }

}
