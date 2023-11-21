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
use App\Mail\InvoiceMail;
use Illuminate\Support\Facades\Mail;
//use PDF;
//use Mail;
use App\Mail\MyTestMail;
class InvoiceController extends Controller
{
    

    public function addMore(){
        $all_clients = Client::where('is_active',1)->get();
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
        return redirect()->route('all.invoices')->with(['success' => 'Invoice added successfully']);
        
    }


    public function getAllInvoices(){
        $all_orders = Order::paginate(4);
        return view('admin.invoices.index', compact('all_orders'));
    }

    

    public function perviewInvoice($id){
      
       
        $order = Order::find($id); 
        if ($order) { 
            $items = $order->items;
            if ($items->count() === 0) {  
                $order->delete();
                return redirect()->route('all.invoices');
            }
            $invoiceSalesName = $order->getSalesPersonName();
            return view('admin.invoices.preview_invoice', compact('invoiceSalesName', 'order', 'items'));
        } else {
            return redirect()->route('all.invoices');
        }
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
 
   
    public function sendEmail(Request $request, $id)
    {
        $request->validate([
            'send_to' => 'required|email',
       ]);

        $send_to = $request['send_to'];


        $order = Order::findOrFail($id);
        $invoiceSalesName = $order->getSalesPersonName();
        $items = $order->items;

        $data = [
            'order' => $order,
            'invoiceSalesName' => $invoiceSalesName,
            'items'=> $items
        ];

        $pdf = PDF::loadView('admin.invoices.pdf2', $data);

        $data["email"] = $send_to;
        $data["title"] = "Invoice system ";
        $data["body"] = "That is your invoice";

        Mail::send('admin.invoices.pdf2', $data, function ($message) use ($data, $pdf) {
            $message->to($data["email"], $data["email"])
                ->subject($data["title"])
                ->attachData($pdf->output(), "test.pdf");
        });

        return redirect()->back()->with(['success' => 'email send successfully !!']);

    }



    public function editInvoice($id){


        // invoice data
        #######################
        $order = Order::findOrFail($id);
        $all_order_items = $order->items()->select('item', 'price', 'quantity')->get();
      

        $salesPerson = $order->salesPerson()->select('id','name');
        $all_sales_persons = Sales_person::select('id','name')->where('is_active',1)->get();

        $client = $order->hisClient()->select('id','company_name');
        $all_clients = Client::select('id','company_name')->where('is_active',1)->get();



        //validation coming data
        ############################
        return view('admin.invoices.edit_invoice',compact('order','all_order_items','salesPerson','all_sales_persons','client','all_clients'));

    }



    public function saveEditInvoice(Request $request, $id){

        ////validate coming data
        $request->validate([           
            'all_order_items.*.item' => 'required|string',
            'all_order_items.*.price' => 'required|numeric',
            'all_order_items.*.quantity' => 'required|integer',
            'sales_id' => 'required',
            'client_id' => 'required',
           
       ]);

        
        $order = Order::find($id); 
        $order_id = $order->id;


         if (!$order) {
            // Handle the case where the order is not found
            return redirect()->back()->with('error', 'Order not found');
        }
        

        ////// update in order table
        $order->update([
            'sales_id' => $request->input('sales_id'),
            'client_id' => $request->input('client_id'),
        ]);
 
        ////// update in itemOrders table
       
        $items = $request->input('item');
        $prices = $request->input('price');
        $quantities = $request->input('quantity');


        $items_ids = $order->items_ids;
        $array = json_decode($items_ids, true);
        $idValues = array();
        if ($array) {
            $idValues = array(); // Create an array to store the "id" values

            foreach ($array as $item) {
                if (isset($item['id'])) {
                    $idValues[] = $item['id']; // Add the "id" value to the new array
                }
            }
        }

        $new_itemData = array_map(null, $items, $prices, $quantities); // new data
   
        for ($i = 0; $i < count($idValues); $i++) {
            if (isset($new_itemData[$i]) && is_array($new_itemData[$i])) {
                ItemOrder::where('id', $idValues[$i])->update([
                    'item' => $new_itemData[$i][0],
                    'price' => $new_itemData[$i][1],
                    'quantity' => $new_itemData[$i][2],
                ]);
            }
        }

     return redirect()->route('perview.invoice',$id)->with(['success' => 'Invoice Edit successfully']);
            
         
   }



   public function deleteInvoice($orderId) {
    // Find the order by ID
    $order = Order::find($orderId);

    // Check if the order exists
    if ($order) {
        // delete items in the order 
        $items=$order->items;
        // Delete each item individually
        foreach ($items as $item) {
            $item->delete();
        }

        // Delete the invoice
        $order->delete();

        // Redirect to a page or return a response as needed
        return redirect()->route('all.invoices')->with('success', 'Invoice deleted successfully');
    } else {
        // Order not found, handle the error (e.g., show a 404 page)
        abort(404);
    }
}




    public function stockingPage(){
        return view('admin.invoices.stocking');
    }


 /*   public function stockingPageResult($month){
        $order = Order::all()->where(date("m",strtotime('date'),$month))->get();
    }
*/
    public function stockingPageResult(Request $request) {
    $month = $request->input('month');
    $orders = Order::whereMonth('date', $month)->select('id')->get();
    
    return view('admin.invoices.stocking')->with([
        'orders' => $orders,
        'success' => 'Invoices IDS: ' . count($orders)
    ]);


}
}


