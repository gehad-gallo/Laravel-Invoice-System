<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Sales_person;
use App\Models\Client;
use App\Models\Order;
use App\Models\ItemOrder;

class DashboardController extends Controller
{
    
    public function index(){

    	//all sellers
    	$sellers_array_ids = Sales_person::sellersCount();
    	$sellersCount = count($sellers_array_ids);


    	// all clients 
    	$all_clients_ids = Client::all_client_ids();
    	$clientCount = count($all_clients_ids);
     

        //all orders 
        $all_orders_ids = Order::all_Orders_ids();
        $OrdersCount = count($all_orders_ids); 


        //all Items in all orders 
        $all_items_ids = ItemOrder::all_items_ids();
        $itemsCount = count($all_items_ids);

        return view('admin.dashboard.index',compact('sellersCount','clientCount','OrdersCount','itemsCount'));

    }
}
