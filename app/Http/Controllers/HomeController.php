<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\DataController; 

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth'); 
    }

    // public function __construct(DataController $dataController)
    // {
    //     $this->middleware('auth');
    //     $this->middleware('auth'); 
    //     $this->api = $dataController; 
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
        // $globalData = $this->api->getSingletonData('globals'); 
        // $allBevData = $this->api->getAllBeverageData(); 
        // $allBlogData = $this->api->getAllBlogData(); 
        // $blogFeed = $this->layout->homeBlogLayout($allBlogData); 
        // $beverageFeed = $this->layout->homeBevLayout($allBevData); 
        // $dataArray = array('globalData', 'blogFeed', 'beverageFeed');
        // return view('index', compact($dataArray));
    }
}
