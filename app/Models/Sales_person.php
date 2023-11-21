<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Client;

class Sales_person extends Model
{
    use HasFactory;
    protected $table ="sales_persons";
    protected $fillable=[
        'name',
        'email',
        'password',
        'phone',
        'api_token',
    ];

    public $timestamps = false;

    //protected $primaryKey = 'id';

    public function clients(){
        //will return clients whose working with specific sales person
        return $this->hasMany('App\Models\Client','sales_id','id');
    }


    public function orders(){
        return $this->hasMany('App\Models\Order','order_id','id');
    }

    public function allOrders(){
        return $this->hasMany('App\Models\Order','sales_id','id');
    }


    public static function sellersCount() {
    $salesPeople = Sales_person::where('is_active', '1')->get();
    $idValues = [];

    foreach ($salesPeople as $salesPerson) {
        $idValues[] = $salesPerson->id;
    }

    //return $idValues;
    return $idValues;
}
}
