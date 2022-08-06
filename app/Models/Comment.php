<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\Product;

class Comment extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'comment', 'comment_name', 'comment_date','comment_status','comment_reply','product_id'
    ];
    protected $primaryKey = 'comment_id';
 	protected $table = 'tb_comment';


    public function product(){
        // 1 binh luan se thuoc ve 1 san pham
        return $this->belongsTo("App\Models\Product", 'product_id');
    }

}
