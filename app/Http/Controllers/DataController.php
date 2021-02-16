<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
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
		$jsonUrl = $this->getCmsApiUrl() . 'collections/get/' . $c . '?token=' . $this->getCmsApiToken(); 
		$request = Http::get($jsonUrl); 
		return $request->json();
	}

	function getCollectionSingleData($c, $slug)
	{
		$jsonUrl = $this->getCmsApiUrl() . 'collections/get/' . $c . '?token=' . $this->getCmsApiToken() . '&?filter[slug]=' . $slug; 
		$request = Http::get($jsonUrl); 
		$collectionData = $request->json(); 
		$item = array(); 
		foreach($collectionData['entries'] as $c)
		{
			if($c['slug'] == $slug)
			{
				array_push($item, $c); 
			}
		}
		return $item;
	}

	function getSingletonData($slug)
	{
		$jsonUrl = $this->getCmsApiUrl() . 'singletons/get/' . $slug . '?token=' . $this->getCmsApiToken(); 
		$request = Http::get($jsonUrl); 
		return $request->json();
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

	function newUser($data)
	{

		return Http::post($this->getCmsApiUrl() . 'collections/post/users?token=' . $this->getCmsApiToken(), [
			"first_name" : $data['first_name'],
			"last_name" : $data['last_name'],
			"email" : $data['email'], 
			"display_name" : $data['first_name'], 
			"username" : str_replace(" ", "", $data['username']),
			"fav_beverage" : $data['favbev'], 
			"fav_venue" : $data['favbar'], 
			"bio" : $data['bio'], 
		]);

		// ); 
		// first_name 

		// last_name

		// email

		// display_name

		// username

		// fav_beverage

		// fav_venue

		// slug

		// bio
	
	}

	function getAllUserData()
	{
		return $this->getCollectionAllData('users'); 
	}
	
	function getUserData($slug)
	{
		return $this->getCollectionSingleData('users', $slug); 
	}

	// Pages
	
	function getPageData($slug)
	{
		return $this->getCollectionSingleData('pages', $slug); 
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
