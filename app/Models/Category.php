<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
      'name','slug','description','post_count'
    ];

    protected $dates=[
        'deleted_at'
    ];
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
