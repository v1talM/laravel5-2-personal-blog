<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'slug','name','description'
    ];

    public function articles()
    {
        return $this->belongsToMany('App\Models\Article','article_tag_pivot')->withTimestamps();
    }
}
