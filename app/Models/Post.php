<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "posts";
    protected $guarded = false;

    public function Category(){

        return $this->belongsTo(Category::class,'category_id','id' );
    }

    public function tags(){

        return $this->belongsToMany( Tag::class, 'post_tags','post_id','tag_id');
    }

    /* Для информации по одному посту*/
    public function comment(){

        return $this->belongsToMany(User::class,'comments','post_id','user_id');
    }

    public function likedUsers(){

        return $this->belongsToMany( User::class,'post_user_likes','post_id','user_id');
    }

}
