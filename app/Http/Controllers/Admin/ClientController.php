<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Sales_person;

class ClientController extends Controller
{

    public function allClients(){

    	$all_clients = Client::get();
    	return view('admin.clients.index',compact('all_clients'));
    }


    public function deleteClient(Request $request){

    	$client = Client::find($request -> id);
        $client -> delete();
        return response('Client deleted successfully');
    }


    public function editClient($id){

        $client = Client::select()->find($id);        
    	$sales_persons = Sales_person::get();
        return view('admin.clients.edit', compact('client','sales_persons'));

    }

    public function saveEditClient(Request $request,$id){

        $request->validate([
            'company_name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'contact_personal' => 'required',
            'sales_id' => 'required',
       ]);

        $client = client::select()->find($id);
        $client -> update($request->all());
        return redirect()->route('all.clients')->with(['success' => 'Client updated successfully!']);

    }



    public function addNewClient(){
    	$sales_persons = Sales_person::get();
    	return view('admin.clients.new',compact('sales_persons'));
    }


    public function insertNewClient(Request $request){

       $request->validate([
            'company_name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'contact_personal' => 'required',
            'sales_id' => 'required',
            'whatsapp' => 'required',
       ]);

        Client::create([
            'company_name' => $request->company_name,
            'phone' => $request->phone,
            'address' => $request->address,
            'contact_personal' => $request->contact_personal,
            'sales_id' => $request->sales_id,
            'whatsapp' => $request->whatsapp,
        ]);

        return redirect()->route('all.clients')->with('success', 'order created successfully!');


    }

  
}