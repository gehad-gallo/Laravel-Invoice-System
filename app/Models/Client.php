<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Sales_person;

class Client extends Model
{
    use HasFactory;
    protected $table = "clients";
    protected $guarded=[];

    public $timestamps = false; 

    public function salesPerson(){
    	// will return the specific sales person 
    	return $this->belongsTo('App\Models\Sales_person','sales_id','id');
    }

    public function Orders(){
    	return $this->hasMany('App\Models\Order','order_id','id');
    }
}
