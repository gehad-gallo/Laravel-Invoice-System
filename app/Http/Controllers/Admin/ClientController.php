<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Sales_person;
use Illuminate\Http\RedirectResponse;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class ClientController extends Controller
{
    public function allClients(){

    	$all_clients = Client::where('is_active',1)->get(); 
        if ($all_clients->isEmpty()) {
        // The collection is empty, so return the view with a message
             return view('admin.clients.index', ['message' => 'There in no clients']);
         } else {
        return view('admin.clients.index', ['all_clients' => $all_clients->toQuery()->paginate(4)]);
        }  

    }


    public function deleteClient(Request $request,$id){

    	$client = Client::find($id);
        $client -> update(['is_active'=>0,]);
        return redirect()->route('all.clients')->with(['success' => 'Client moved to Trash!']);
    }

    public function clientTrash(){
        $all_trashed_clients = Client::where('is_active',0)->get();
        if ($all_trashed_clients->isEmpty()) {
        // The collection is empty, so return the view with a message
        return view('admin.clients.trash', ['message' => 'Trash is empty']);
    } else {
        return view('admin.clients.trash',['all_trashed_clients' => $all_trashed_clients->toQuery()->paginate(4)]);
        }
    }


    public function activateClient(Request $request,$id){
        $client = Client::find($id);
        $client -> update(['is_active'=>1,]);
        return redirect()->route('all.clients')->with(['success' => 'Client activated again successfully!']);
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
            'sales_id' => 'required',
       ]);

        Client::create([
            'company_name' => $request->company_name,
            'phone' => $request->phone,
            'sales_id' => $request->sales_id,
        ]);

        return redirect()->route('all.clients')->with('success', 'Client added successfully!');


    }

  
}