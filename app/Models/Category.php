<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = "categories";
    protected $guarded = false;
    protected $withCount = ['Post'];

    public function Post (){

        return $this->hasMany( Post::class, 'category_id', 'id');

    }
}
