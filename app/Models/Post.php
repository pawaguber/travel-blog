<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = false;

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

//    public function getRouteKeyName(){
//        return 'slug';
//    }

    public function like() {
        return $this->hasMany(Like::class);
    }

    public function comment() {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }
}
