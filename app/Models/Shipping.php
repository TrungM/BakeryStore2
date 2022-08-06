<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'shipping_name', 'shipping_address', 'shipping_phone','shipping_note','shipping_time_day','shipping_time_hour','shipping_payment'
    ];
    protected $primaryKey = 'shipping_id';
 	protected $table = 'tb_shipping';
}
