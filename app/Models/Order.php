<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
use App\Models\Sales_person;
use App\Models\ItemOrder;
class Order extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $guarded=[];

    public $timestamps = true;


   public function hisClient(){
   	  return $this->belongsTo('App\Models\Client','client_id','id');
   }

   public function salesPerson() {
    return $this->belongsTo('App\Models\Sales_person', 'sales_id', 'id');
  }


   public function getSalesPersonName(){

     if ($this->salesPerson) {
        return $this->salesPerson->name;
      } else {
          return null;
      } 
   }

   public function items(){
      return $this->hasMany('App\Models\ItemOrder','order_id','id');
      
   }

   public function orderTotalCost(){
   
      $totalCost = 0;
      foreach ($this->items as $item) {
        $eachItem = $item->price * $item->quantity;
        $totalCost += $eachItem;
      }

      return $totalCost;
  }
}
