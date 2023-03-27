<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Order extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'customer_id', 'shipping_id', 'order_total', 'order_status','order_code','created_at'
    ];
    protected $primaryKey = 'order_id';
 	protected $table = 'tb_order';
//  	public function product(){
//       return $this->belongsTo(OrderDetails::class,'order_code');
//   }
function details(){
    return $this->hasMany(OrderDetails::class,"order_id");
    }

}
