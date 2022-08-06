<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\GalleryFeedback;
use App\Models\Product;
use App\Models\Rating;

class Feedback extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'feedback', 'customer_id','feedback_date','feedback_status','feedback_reply','product_id','feedback_code','feedback_image','order_code','rating_avg'
    ];
    protected $primaryKey = 'feedback_id';
 	protected $table = 'tb_feedback';

     public function product(){
        // 1 danh gia  se thuoc ve 1 san pham
        return $this->belongsTo("App\Models\Product", 'product_id');
    }
    public function rating(){
        return $this->belongsTo("App\Models\Rating", 'order_code');
    }
    public function gallery_img(){
        // 1 feedback se co nhieu hinh
        return $this->hasMany("App\Models\GalleryFeedback");
    }

    public function customer(){
        return $this->belongsTo("App\Models\Customer", 'customer_id');
    }
}
