<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use  App\Models\Product;

class OrderDetails extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'order_id','order_code', 'product_id', 'product_name','product_price','product_quantity','product_images','product_size','product_size_price','created_at'
    ];
    protected $primaryKey = 'order_detail_id';
 	protected $table = 'tb_order_detail';

 	public function product(){
           // dem product_id trong order ddi so sach voi product_id trong bang products
 		return $this->belongsTo(OrderDetails::class,'order_code');
 	}
     public function order(){
        return $this->belongsTo(Order::class,'order_id');
    }
}
