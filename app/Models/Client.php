<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Sales_person;
use Illuminate\Database\Eloquent\SoftDeletes;

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


    public static function all_client_ids(){
        
        $all_active_clients = Client::where('is_active','1')->get();
        $idValues = [];
        foreach($all_active_clients as $client){
            $idValues[] = $client->id;
        }

        return $idValues;
    }


    
}
