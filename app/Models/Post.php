<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'post_title', 'post_desc', 'post_content', 'post_images'
    ];
    protected $primaryKey = 'post_id';
    protected $table = 'tb_posts';
}
