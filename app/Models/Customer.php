<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'customer_name', 'customer_password', 'customer_phone', 'cutomer_email','customer_address','role'
    ];
    protected $primaryKey = 'customer_id';
 	protected $table = 'tb_customer';
     public function feedback(){
        // 1 san pham se co nhieu feedback
        return $this->hasMany("App\Models\Feedback");
    }

}
