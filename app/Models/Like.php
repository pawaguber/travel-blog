<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Like extends Model
{
    use HasFactory;

    protected $guarded = false;

    protected $table = 'likes';

}
