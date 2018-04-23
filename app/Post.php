<?php

namespace App;
use Carbon\Carbon;

class Post extends Model
{
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, $filters) 
    {
        if (isset($filters['month']) && $month = $filters['month'])
        {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if (isset($filters['year']) && $year = $filters['year'])
        {
            $query->whereYear('created_at', Carbon::parse($year)->year);
        }
    }

    public static function archives() 
    {
        return static::selectRaw('year(created_at) as year, monthname(created_at) as month, count(*) published')
        ->groupBy('year', 'month')
        ->orderByRaw('min(created_at) desc')
        ->get();
    }

    // If I do App\Post::with('tags')->get(), Laravel will 
    // eager load the posts and tags together. But if I only
    // do App\Post::get(), it won't return any tags unless I
    // also do this tags method.

    // To attach an existing tag to a post (in a many to many 
    // relationship), you use this syntax (ie. attach, not make
    // and not save): 
    //
    // $post->tags()->attach($tag); 
    //
    // or
    //
    // $post->tags()->attach($tag->id);
    // 
    // Note there is also a detach method as well.
    public function tags() 
    {
        // Any post may have many tags.
        // Any tag may be applie to many posts.
        // Thus, tags to posts is a many to many relationship.
        return $this->belongsToMany(Tag::class);
    }
}