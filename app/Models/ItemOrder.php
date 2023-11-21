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
    	return $this->belongsTo('App\Models\Order','order_id','id');
    }

    public static function all_items_ids(){
    	$all_items = ItemOrder::select('id')->get();
    	$idValues = [];
    	foreach ($all_items as $key => $item) {
    		$idValues[] = $item;
    	}
    	return $idValues;
    }
}