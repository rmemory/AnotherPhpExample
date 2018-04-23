<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posts() {
        return $this->belongsToMany(Post::class);
    }

    // Override the index used for route model binding
    public function getRouteKeyName()
    {
        // We want route model binding to use the name
        // column in the database
        return 'name';
    }
}
