<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryFeedback extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'feedback_code', 'gallery_image'
    ];
    protected $primaryKey = 'gallery_id';
 	protected $table = 'tb_gallery_feedback';


   }
