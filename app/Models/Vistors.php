<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vistors extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    'ip_address	','date_vistor	',
    ];
    protected $primaryKey = 'id';
 	protected $table = 'tb_visitors';



}
