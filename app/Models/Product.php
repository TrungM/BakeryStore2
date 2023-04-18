<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\Comment;

class Product extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'product_name', 'product_price','product_images','product_description','category_id','product_star','product_qty','product_qty_sold'
    ];
    protected $primaryKey = 'product_id';
 	protected $table = 'products';



    public function comment(){
        // 1 san pham se co nhieu comment
        return $this->hasMany("App\Models\Comment");
    }


    public function category(){

        return $this->belongsTo(Category::class,'category_id');
    }

    // public function comment(){
    //     // 1 san pham se co nhieu comment
    //     return $this->hasMany("App\Models\Comment");
    // }




}
