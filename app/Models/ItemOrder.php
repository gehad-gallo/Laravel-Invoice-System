<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemOrder extends Model
{
     use HasFactory;
    protected $table = "item_orders";
    protected $guarded=[];

    public $timestamps = false;


    public function order(){
    	return $this->belongsTo('App\Models\order','order_id','id');
    }
}