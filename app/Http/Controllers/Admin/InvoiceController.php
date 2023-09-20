<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Order;
use App\Models\ItemOrder;
use App\Models\Sales_person;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
//use PDF;
class InvoiceController extends Controller
{
    

    public function addMore(){
        $all_clients = Client::get();
        return view('admin.invoices.add_more',compact('all_clients'));
       
    }


    public function storeInvoiceData(Request $request){
     
        $data = $request->validate([
            'client' => 'required',
            'date' => 'required',
            'items.*.name' => 'required|string',
            'items.*.price' => 'required|numeric',
            'items.*.quantity' => 'required|integer',
        ]);

        if (empty($data['items'])) {

            return redirect()->route('add.invoice')->with(['error' => 'Cannot create Invoice without items']);

        }

        // add into oders table
        $client_id = $request -> client;
        $sales_id = Client::select('sales_id')->find($client_id);
        $salesIdValue = $sales_id->sales_id;
        
        Order::create([
            'date' => $request ->date,
            'sales_id' => $salesIdValue, 
            'client_id' => $request ->client,

        ]);

        $lastId_item_order = Order::latest('id')->pluck('id')->first();
        

        // add into item_orders table
        foreach ($data['items'] as $itemData) {
            ItemOrder::create([
                'item' => $itemData['name'],
                'price' => $itemData['price'],
                'quantity' => $itemData['quantity'],
                'order_id' => $lastId_item_order,
            ]);
        }
        return redirect()->route('all.invoices')->with(['success' => 'Invoive added successfully']);
        
    }


    public function getAllInvoices(){
        $all_orders = Order::get();
        return view('admin.invoices.index', compact('all_orders'));



    }

    public function perviewInvoice($id){
      
        $order = Order::find($id);
        $invoiceSalesName = $order->getSalesPersonName();
        $items = $order->items;

        return view('admin.invoices.preview_invoice', compact('invoiceSalesName', 'order', 'items'));
    }



    public function invoicePDF($id){

     $order = Order::findOrFail($id);
        $invoiceSalesName = $order->getSalesPersonName();
        $items = $order->items;

        $data = [
            'order' => $order,
            'invoiceSalesName' => $invoiceSalesName,
            'items'=> $items
        ];
        $pdf = PDF::loadView('admin.invoices.pdf2', $data);
        $todayDate = Carbon::now()->format('d-m-Y');
        return $pdf->download('invoice'.$order->id.'-'.$todayDate.'.pdf');

    }


    public function showPDF(){
        return view('admin.invoices.pdf2');
  
    }



}
