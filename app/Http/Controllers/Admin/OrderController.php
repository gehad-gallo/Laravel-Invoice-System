<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;

class OrderController extends Controller
{
   /* public function orderForm(){
    	$clients = Client::get();
    	return view('admin.orders.index',compact('clients'));
    }


    public function addNewOrder(){

       $request->validate([
            'sales_id' => 'required',
            'date' => 'required',
            'item' => 'required',
            'quantity' => 'required',
            'price' => 'required',
       ]);

        Client::create([
            'sales_id' => $request->sales_id,
            'date' => $request->date,
            'item' => $request->item,
            'quantity' => $request->quantity,
            'sales_id' => $request->sales_id,
            'price' => $request->price,
        ]);

        return redirect()->route('all.clients')->with('success', 'Client created successfully!');

    }*/
}
