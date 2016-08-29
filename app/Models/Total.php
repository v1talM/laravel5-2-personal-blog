<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Total extends Model
{
    protected $fillable = [ 'month', 'year', 'visit_count' ];
}
