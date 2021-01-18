<?php

use Illuminate\Support\Facades\Http; 

function getPostById($id)
{
	$jsonUrl = 'https://blog.pintglassldn.com/wp-json/wp/v2/posts/?id=' . $id; 
	$request = Http::get($jsonUrl); 
	return $request; 
}

function renderBlogFeed($feed)
{
	$count = 0; 
	$array = explode('{"id":', $feed);
	foreach($array as $a)
	{
		$count++;
		$id = substr($a, 0, strpos($a,",")); 
		if($id > 0)
		{
			if($a == $array[1])
			{
				$item = checkPostData($id);
				renderBlogFeedItems($item, $count);  
			}
		}
	}
}

function getBevType($i)
{
	$jsonUrl = 'https://blog.pintglassldn.com/wp-json/wp/v2/beverage_type?id=' . $id; 
	$request = Http::get($jsonUrl); 
	return $request->json(); 
}
	
function renderBevFeed($feed)
{
	$count = 0; 
	$array = explode('{"id":', $feed);
	foreach($array as $a)
	{
		$count++; 
		$id = substr($a, 0, strpos($a,",")); 
		if($id > 0)
		{
			if($a == $array[1])
			{
				$item = checkBevData($id); 
				renderBevFeedItems($item, $count);
			}
		}
	}
}

function checkBevData($id)
{
	$jsonUrl = 'https://blog.pintglassldn.com/wp-json/wp/v2/beverages?id=' . $id; 
	$request = Http::get($jsonUrl); 
	return $request->json(); 
}

function checkPostData($id)
{
	$jsonUrl = 'https://blog.pintglassldn.com/wp-json/wp/v2/posts?id=' . $id; 
	$request = Http::get($jsonUrl); 
	return $request->json(); 
}

function renderHomeFeed($type, $limit = 8)
{
	$feed = getBevData(); 
	$count = 0; 
	$array = explode('{"id":', $feed);
	foreach($array as $a)
	{
		$count++; 
		if($count > 1)
		{
			$id = substr($a, 0, strpos($a,",")); 
			if($id > 0)
			{
				if($a == $array[1])
				{
					if($type == 'beverage')
					{
						$item = checkBevData($id); 
						renderHomeBevFeedItems($item, $count, 9);
					}
					else
					{
                        $item = checkPostData($id); 
						renderHomeBlogFeedItems($item, $count, 9);
					}
				}
			}
		}
	}
} 

function renderBevFeedItems($post, $c = 0, $limit = 400)
{	
	$total = count($post);
	$stop = $total + 1; 
	$count = 0;  
	foreach($post as $p)
	{
		$count++;
		$image = $p["better_featured_image"]["source_url"]; 
		if($count < $stop && $count < $limit)
		{
			echo '<a class="col-12 col-md-4 mb-3" href="https://pintglassldn.com/beverages/' . $p["slug"] . '">'; 
				echo '<div class="p-0" style="height: 200px; background: url(' . $image . '); background-size: cover; background-position: center center;">'; 
					echo '<p class="col-12 text-white font-weight-bold py-2 bg-dark" style="line-height: 1.3em;">' . $p["title"]["rendered"] . '<br/>
						<span class="font-weight-normal" style="font-size: .8em;">' . $p["acf"]["brewer"] . '</span></p>'; 
				echo '</div>'; 
			echo '</a>';
		}
	}
}

function renderHomeBevFeedItems($post, $c = 0, $limit = 400)
{	
	$total = count($post);
	$stop = $total + 1; 
	$count = 0;  
	foreach($post as $p)
	{
		$count++;
		$image = $p["better_featured_image"]["source_url"]; 
		if($count < $stop && $count < $limit)
		{
			if($count == 1)
			{
                echo '<a class="col-12 col-md-6 col-xl-3 mb-3" href="https://pintglassldn.com/beverages/' . $p["slug"] . '">
                    <div class="col-12 p-0 m-0">'; 
					echo '<div class="p-0" style="height: 250px; background: url(' . $image . '); background-size: cover; background-position: center center;">'; 
						echo '<p class="col-12 text-white font-weight-bold py-2 bg-dark" style="line-height: 1.3em;">' . $p["title"]["rendered"] . '<br/>
							<span class="font-weight-normal" style="font-size: .8em;">' . $p["acf"]["brewer"] . '</span></p>'; 
					echo '</div>'; 
                echo '</div>
                </a>';
			}
			else 
			{
                if($count == 4)
                {
                    echo '<a class="col-12 col-md-3 mb-3" href="https://pintglassldn.com/beverages/' . $p["slug"] . '">';
                }
                else 
                {
                    echo '<a class="col-12 col-md-3 mb-3 pl-0" href="https://pintglassldn.com/beverages/' . $p["slug"] . '">'; 
                }
                echo '<div class="col-12 p-0 m-0">'; 
					echo '<div class="p-0" style="height: 250px; background: url(' . $image . '); background-size: cover; background-position: center center;">'; 
						echo '<p class="col-12 text-white font-weight-bold py-2 bg-dark" style="line-height: 1.3em;">' . $p["title"]["rendered"] . '<br/>
							<span class="font-weight-normal" style="font-size: .8em;">' . $p["acf"]["brewer"] . '</span></p>'; 
					echo '</div>'; 
                echo '</div>
                </a>';
			}
		}
	}
}

function renderHomeBlogFeedItems($post, $c = 0, $limit = 400)
{	
	$total = count($post);
	$stop = $total + 1; 
	$count = 0;  
	foreach($post as $p)
	{
		$count++;
		$image = $p["better_featured_image"]["source_url"]; 
		if($count < $stop && $count < $limit)
		{
			if($count == 1)
			{
				echo '<a class="col-12 col-md-6 col-xl-3 mb-3" href="https://pintglassldn.com/beverages/' . $p["slug"] . '">
                    <div class="col-12 p-0 m-0">'; 
					echo '<div class="p-0" style="height: 250px; background: url(' . $image . '); background-size: cover; background-position: center center;">'; 
						echo '<p class="col-12 text-white font-weight-bold py-2 bg-dark" style="line-height: 1.3em;">' . $p["title"]["rendered"] . '</p>'; 
					echo '</div>'; 
                echo '</div>
                </a>';
			}
			else 
			{
				echo '<a class="col-12 col-md-3 mb-3 pl-0" href="https://pintglassldn.com/beverages/' . $p["slug"] . '">
                <div class="col-12 p-0 m-0">'; 
					echo '<div class="p-0" style="height: 250px; background: url(' . $image . '); background-size: cover; background-position: center center;">'; 
						echo '<p class="col-12 text-white font-weight-bold py-2 bg-dark" style="line-height: 1.3em;">' . $p["title"]["rendered"] . '</p>'; 
					echo '</div>'; 
                echo '</div>
                </a>';
			}
		}
	}
}

function renderBlogFeedItems($post, $c = 0, $limit = 400)
{	
	$total = count($post);
	$stop = $total + 1; 
	$count = 0; 
	foreach($post as $p)
	{
		$count++;
		$image = $p["better_featured_image"]["source_url"]; 
		if($count < $stop && $count < $limit)
		{
			echo '<a class="col-12 col-md-4" href="https://pintglassldn.com/beverages/' . $p["slug"] . '">'; 
				echo '<div class="p-0" style="height: 200px; background: url(' . $image . '); background-size: cover; background-position: center center;">'; 
					echo '<p class="col-12 text-white font-weight-bold py-2 bg-dark" style="line-height: 1.3em;">' . $p["title"]["rendered"] . '</p>'; 
				echo '</div>'; 
			echo '</a>';
		}
	}
}

function homepageRender()
{
	$bev = getLatestBev(); 
	$blog = getLatestBlog(); 
	echo '<h3 class="col-12 py-3">Beverages</h3>';  
	renderHomeFeed('beverage');
	echo '<h3 class="col-12 py-3">Blog</h3>'; 
	renderHomeFeed('blog');
}

function getLatestBev()
{
	$jsonUrl = 'https://blog.pintglassldn.com/wp-json/wp/v2/beverages'; 
	$request = Http::get($jsonUrl); 
	$firstBevId = $request->json()[0]["id"]; 
	$firstBev = checkBevData($firstBevId); 
	return $firstBev[0]; 
}

function getLatestBlog()
{
	$jsonUrl = 'https://blog.pintglassldn.com/wp-json/wp/v2/posts'; 
	$request = Http::get($jsonUrl); 
	$firstBlogId = $request->json()[0]["id"]; 
	$firstBlog = checkPostData($firstBlogId); 
	return $firstBlog[0]; 
}

function renderMainSingleItem($item)
{
	$image = $item["better_featured_image"]["source_url"]; 
	echo '<div class="col-12 col-md-6">'; 
		echo '<div class="p-0" style="height: 350px; background: url(' . $image . '); background-size: cover; background-position: center center;">'; 
			echo '<p class="col-12 text-white font-weight-bold py-2 bg-dark" style="line-height: 1.3em;">' . $item["title"]["rendered"]; 
			if(isset($item["acf"]["brewer"]) && isset($item["acf"]["place_of_origin"]) && isset($item["acf"]["country_of_origin"]))
			{
				echo '<br/><span class="font-weight-normal" style="font-size: .8em;">' . $item["acf"]["brewer"] . '</span>'; 
			}
			echo '</p>'; 
		echo '</div>'; 
	echo '</div>';
}

function getBevData()
{
	$jsonUrl = 'https://blog.pintglassldn.com/wp-json/wp/v2/beverages'; 
	$request = Http::get($jsonUrl); 
	return $request->getBody()->getContents(); 
}

/*function getPostData($url)
{
	$request = Http::get($url); 
	return $request->json(); 
}

function slug()
{
	$url = \Request::getRequestUri();
	$slugs = explode ("/", $url);
	$latestslug = $slugs [(count ($slugs) - 1)];
	return $latestslug; 
}

function friend_and_block_btn($user, $profile)
{
	$usr = DB::table('users')
		->where('id', $user)
		->first();
	$pro = DB::table('users')
		->where('id', $profile)
		->first(); 
	if($user !== $profile)
	{
		echo '<div class="col-6 text-center" style="display: inline-block;">
				<form action="/friend_requests" method="get" id="friend_request_form" target="friend_requests">	
					<input type="hidden" value="'.$user.'" name="user_1" />
					<input type="hidden" value="'.$profile.'" name="user_2" />
					<input type="submit" id="friend_status" style="width: 90%;" value="Add as Friend" />
				</form>
			</div>
			<div class="col-6 text-center" style="display: inline-block;">
				<button id="block_status" style="width: 90%;" value="">Block</button>
		</div>';
	}
}

function user_list($query)
{
	echo '<div class="col-12 row">';
		foreach($query as $item)
		{
			user_card($item);
		}
	echo '</div>';
}

function get_users($list = 'all')
{
	$list = DB::table('users')
		->get();
	return $list;
}

function get_friends_by_user($u)
{
	$friends = DB::table('user_connections')
		->where('status', 2)
		->get();
	$all_array = array(); 
	foreach($friends as $fr)
	{
		array_push($all_array, $fr); 
	}
	$fr_array = array(); 
	foreach($all_array as $a)
	{
		if($a->user_id_1 == $u || $a->user_id_2 == $u) 
		{
			array_push($fr_array, $a); 
		}
	}
	return $fr_array; 
}

function user_card($q)
{
	echo $q->firstname; 
}

function get_groups_by_user($u)
{
	$q = DB::table('groups')
		->get();
	return $q; 
}

function get_groups()
{
	$q = DB::table('groups')
		->get();
	return $q; 
}

function display_groups_query($q)
{
	if(count($q) == 0)
	{
		echo '<p>There are no groups to show here</p>';
	}
	else
	{
		print_r($q);
	}
}

function friends_block($arr, $usr_id)
{
	echo '<div style="width: 100%;"><p class="text-center" style="font-weight: 600;">Friends</p>'; 
	foreach($arr as $f)
	{
		if($f->user_id_1 == $usr_id)
		{
			$friend_id = $f->user_id_2; 
		} 
		elseif ($f->user_id_2 == $usr_id)
		{
			$friend_id = $f->user_id_1; 
		}
		$u = DB::table('users')
			->where('id', $friend_id)
			->get(); 
		echo '<a href="https://pintglassldn.com/users/'.$u[0]->username.'" style="height: 50px;"><div style="display: inline-block; height: 50px; width: 50px; background: url(https://pintglassldn.com/storage/app/avatars/'.$u[0]->id.'/'.$u[0]->avatar.'); background-size: cover; background-position: center-center;"></div></a>';
	}
	echo '</div>'; 
}

function get_user_by_slug($s)
{
	$user = DB::table('users')
			->where('username', $s)
			->first();
	return $user; 
}

function get_user_by_id($i)
{
	$user = DB::table('users')
			->where('id', $i)
			->first();
	return $user; 
}*/