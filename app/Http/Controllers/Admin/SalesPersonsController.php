<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sales_person;
use Illuminate\Support\Facades\Hash;

class SalesPersonsController extends Controller
{
    public function allSalesPesons(){

    	$all_sales_persons = Sales_person::get();
    	return view('admin.sales_persons.index',compact('all_sales_persons'));
    }

    public function addNewSales(){
    	return view('admin.sales_persons.new');
    }


    public function saveNewSeles(Request $request){

    	$request->validate([

            'name' => 'required|string|max:255',
		    'phone' => 'required',
		    'email' => 'required|email',
		    'password' => 'required|string|min:8',
       ]);

        Sales_person::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('all.sales.persons')->with('success', 'Sales Person added successfully!');

    }



    public function editSales($id){
        $sales_info = Sales_person::select()->find($id);
        return view('admin.sales_persons.edit',compact('sales_info'));
    	
    }

    public function saveEditSales(Request $request, $id){

        $sales = Sales_person::findOrFail($id);
        $sales->name = $request['name'];
        $sales->email = $request['email'];
        $sales->phone = $request['phone'];
        $sales->password = $request['password'];
        
        $sales->save();

        return redirect()->route('all.sales.persons')->with(['success' => 'Sales Person updated successfully!']);
    }


    public function deleteSales(Request $request){

    	$sales = Sales_person::find($request -> id);
        if ($sales != null) {
            $sales->delete();
            return response('Sales person deleted successfully');
        }   
        
    }
}
