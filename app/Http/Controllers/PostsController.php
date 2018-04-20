<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function __construct() {

    }

    public function index() {
        return view ('posts/index');
    }

    public function create() {
        return view ('posts/create');
    }

    public function store(Request $request) {
        // Create a post using the input request
        $post = new Post();

        //validate the input data from the form
        // If validation fails, it redirects back 
        // to the previous page
        $this->validate(request(), [
            'title' => 'required|max:10',
            'body' => 'required'
        ]);

        $post->title = request('title');
        $post->body = request('body');

        // Save it to the database
        $post->save();

        /* Might create MassAssignmentException
            requires the model object to have a 

            protected $fillable = ['title', 'body'];

            or the alternative is, everything but the user_id

            protected $guarded = ['user_id];

        Post::create([
            'title' => request('title'),
            'body' => request('body')
        ]);
        */

        // Redirect to home page
        redirect('/');
    }
}
