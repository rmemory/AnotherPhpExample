<?php

namespace App\Repositories;

use App\Post;

// A place to extract common functionality, scope queries, common database
// code related to Posts.
class Posts 
{
	protected $redis;

	/*
	 * Laravel tries to figure this one out too
	 */
	public function __construct(MyRedis $redis)
	{
		$this->redis = $redis;
	}

	/*
	 * To use this function in any controller, you can do this 
	 * 
	 * use App\Repositories\Posts;
	 * public function myControllerFunction(Posts $posts)
	 * {
	 * 	$posts = $posts->all();
	 * }
	 */
	public function all() 
	{
		return Post::all();
	}
}