<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function __constructor() 
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index() {
        /*
        See the filter query scope in Post.php 

        $posts = Post::latest();

        if ($month = request('month'))
        {
            $posts->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if ($year = request('year'))
        {
            $posts->whereYear('created_at', Carbon::parse($year)->year);
        }

        $posts = $posts->get();
        */

        $posts = Post::latest()->filter(request(['month', 'year']))->get();


        // The selectRaw statement will be moved to a view composer because others need
        // access to the archives query because everybody uses the siderbar
        /* Moving this query to a view composer
        $archives = Post::selectRaw('year(created_at) as year, monthname(created_at) as month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get();

            return view ('posts.index', compact('posts', 'archives'));
        */
        return view ('posts.index', compact('posts'));
    }

    public function create() {
        return view ('posts.create');
    }

    public function show(Post $post) {
        return view ('posts.show', compact('post'));
    }

    public function store(Request $request) {
        // Create a post using the input request
        $post = new Post();

        //validate the input data from the form
        // If validation fails, it redirects back 
        // to the previous page
        $this->validate(request(), [
            'title' => 'required|max:30',
            'body' => 'required'
        ]);
        
        /* 
        $post->title = request('title');
        $post->body = request('body');
        $post->user_id = auth()->id();

        // Save it to the database
        $post->save();
        */

        /* Might create MassAssignmentException
            requires the model object to have a 

            protected $fillable = ['title', 'body'];

            or the alternative is, everything but the user_id

            protected $guarded = ['user_id]; 

        Post::create([
            'title' => request('title'),
            'body' => request('body'),
            'user_id' => auth()->id()
        ]); */

        auth()->user()->publish(
            // Because we are newing up a Post here, it means we can just call save in publish() instead of
            // create.
            new Post(request(['title', 'body']))
        );

        session()->flash('message', 'Your post has been published');

        // Redirect to home page
        return redirect()->home();
    }
}
