<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

protected $table="tb_category";

protected  $primaryKey="category_id";
protected $fillable=["name"];


function product(){
    return $this->hasMany(Product::class,'category_id');
}
}
