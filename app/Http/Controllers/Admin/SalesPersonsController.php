<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sales_person;
use App\Models\Order;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Carbon\Carbon;

class SalesPersonsController extends Controller
{
    public function allSalesPesons(){

    	$all_sales_persons = Sales_person::where('is_active',1)->get();
        if ($all_sales_persons->isEmpty()) {
            return view('admin.sales_persons.index', ['message' => 'There in no Sales Persons']);
        }
    	return view('admin.sales_persons.index',['all_sales_persons' => $all_sales_persons->toQuery()->paginate(4)]);

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


    public function deleteSales(Request $request,$id){

        $sales = Sales_person::find($id);

        if ($sales) {
            $sales->is_active = 0;
            $sales->save();
        return redirect()->route('all.sales.persons')->with(['success' => 'Sales Person moved to Trash!']);
        }else{
             return redirect()->route('all.sales.persons');
        }
    }




    public function salesPersonsTrash(){
        $all_trashed_Sales = Sales_person::where('is_active',0)->get();
        if ($all_trashed_Sales->isEmpty()) {
        // The collection is empty, so return the view with a message
        return view('admin.sales_persons.trash', ['message' => 'Trash is empty']);
    } else {
        return view('admin.sales_persons.trash',['all_trashed_Sales' => $all_trashed_Sales->toQuery()->paginate(4)]);
        }
    }

    public function activateSalesPerson(Request $request,$id){
        $sales = Sales_person::find($id);
        if ($sales) {
            $sales->is_active = 1;
            $sales->save();
            
            return redirect()->route('all.sales.persons')->with(['success' => 'Sales Person activated again successfully!']);
        }else{
            return redirect()->route('all.sales.persons');
        }
        
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


    public function previewSalesPersonINFO(Request $request, $id){
        $saller = Sales_person::find($id);
        $numberOfSales = $saller->allOrders->count(); 
        $allCommisions = $numberOfSales * 50;
        
        // All dates of all orders for this seller 
        $allDates = [];
        $monthOfDates = [];
        $ordersInThisMonth = [];
        $orders = $saller->allOrders;

        foreach ($orders as $order) {
            $allDates[] = $order->date;
        }

        foreach ($allDates as $date) {
            $carbonDate = Carbon::parse($date);
            $monthOfDates[] = $carbonDate->month;
        }

        //return $monthOfDates;
        return view('admin.sales_persons.perview',compact('saller','numberOfSales','allCommisions'));
        
    
    } 

    public function showSalesInMonth(Request $request,$id){
        $saller = Sales_person::find($id);
        $request->validate([
            'month' => 'required',
        ]);

        $allDates = [];
        $monthOfDates = [];
        $ordersInThisMonth = [];
        $orders = $saller->allOrders;

        foreach ($orders as $order) {
            $allDates[] = $order->date;
        }

        foreach ($allDates as $date) {
            $carbonDate = Carbon::parse($date);
            $monthOfDates[] = $carbonDate->month;
        }
/*
        foreach ($monthOfDates as $month) {
            $ordersInThisMonth[] = Order::select('id')->where($monthOfDates,$request->month); 
        }*/
        foreach ($monthOfDates as $month) {
            if ($month == $request->input('month')) {
                $ordersInThisMonth[] = $saller->allOrders()
                    ->select('id')
                    ->whereMonth('date', $request->input('month'))
                    ->get();
            }
        return $ordersInThisMonth;
        //return view('admin.sales_persons.test',compact('monthOfDates'));
    }
        
}
}
