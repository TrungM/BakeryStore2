<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\Feedback;

class Rating extends Model
{
    public $timestamps = false; //set time to false

    protected $fillable = [
    	'product_id_star', 'rating','rating_time','order_code'
    ];
    protected $primaryKey = 'rating_id';
 	protected $table = 'tb_rating';

     public function feedback(){
        return $this->hasMany("App\Models\Feedback");
    }
}
