@extends('layouts.admin')
@section('content')
     <!-- Content wrapper -->
      <div class="content-wrapper">

        <!-- Content -->
        
          <div class="container-xxl flex-grow-1 container-p-y">
            
            

<div class="row invoice-preview">
  <!-- Invoice -->
  <div class="col-xl-9 col-md-8 col-12 mb-md-0 mb-4">
    <div class="card invoice-preview-card">
      <div class="card-body">
        <div class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column m-sm-3 m-0">
          <div class="mb-xl-0 mb-4">
            <div class="d-flex svg-illustration mb-4 gap-2 align-items-center">
              <img src="{{asset('assets/img/icons/brands/slack.png')}}">
      <span class="app-brand-text demo menu-text fw-bold">Pixi</span>
            </div>
            <p class="mb-2">Office 102, ninth Street</p>
            <p class="mb-2">New cairo, Egypt</p>
            <p class="mb-0">+20 222 456 7891</p>
          </div>
          <div>
            <h4 class="fw-semibold mb-2">INVOICE #{{$order->id}}</h4>
            <div class="mb-2 pt-1">
              <span>Date :{{$order->date}}</span>
              <span class="fw-semibold"></span>
            </div>
           
          </div>
        </div>
      </div>
      <hr class="my-0" />
     
      <div class="table-responsive border-top">
        <table class="table m-0">
          <thead>
            <tr>
              <th></th>
              <th>Item</th>
              <th>Price</th>
              <th>Qty</th>
              <th>Cost</th>
            </tr>
          </thead>
          <tbody>
            @isset($items)
                @foreach($items as $item)
              <tr>
                <td class="text-nowrap"></td>
                <td class="text-nowrap">{{$item->item}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->quantity}}</td>
                <td>{{$item->quantity * $item->price}}</td>
              </tr>
          @endforeach
                @endisset
          
            <tr>
              <td colspan="3" class="align-top px-4 py-4">
                <p class="mb-2 mt-3">
                  <span class="ms-3 fw-semibold">Salesperson:</span>
                  <span>{{$invoiceSalesName}}</span>
                </p>
              
              </td>
              <td class="text-end pe-3 py-4">
                <p class="mb-2 pt-3">Subtotal:</p>
                <p class="mb-2">Discount:</p>
                <p class="mb-2">Tax:</p>
                <p class="mb-0 pb-3">Total:</p>
              </td>
              <td class="ps-2 py-4">
                <p class="fw-semibold mb-2 pt-3">{{$order->orderTotalCost()}}</p>
                <p class="fw-semibold mb-2">00.00</p>
                <p class="fw-semibold mb-2">50.00</p>
                <p class="fw-semibold mb-0 pb-3">{{$order->orderTotalCost() + 50}}</p>
              </td>
            </tr>
             
          </tbody>
        </table>
      </div>

      <div class="card-body mx-3">
        <div class="row">
          <div class="col-12">
            <span class="fw-semibold">Note:</span>
            <span>Exchange and return within 14 days. Thank You!</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /Invoice -->

  <!-- Invoice Actions -->
  <div class="col-xl-3 col-md-4 col-12 invoice-actions">
    <div class="card">
      <div class="card-body">
        <button class="btn btn-primary d-grid w-100 mb-2" data-bs-toggle="offcanvas" data-bs-target="#sendInvoiceOffcanvas">
          <span class="d-flex align-items-center justify-content-center text-nowrap"><i class="ti ti-send ti-xs me-1"></i>Send Invoice</span>
        </button>
        <button class="btn btn-label-primary d-grid w-100 mb-2">
          <a href="{{route('pdf.invoice',$order->id)}}" target="_blank">Download</a> 
        </button>
        <a class="btn btn-label-secondary d-grid w-100 mb-2" target="_blank" href="app-invoice-print.html">
          Print
        </a>
        <a href="app-invoice-edit.html" class="btn btn-label-secondary d-grid w-100 mb-2">
          Edit Invoice
        </a>
        
      </div>
    </div>
  </div>
  <!-- /Invoice Actions -->
</div>

<!-- Offcanvas -->
<!-- Send Invoice Sidebar -->
<div class="offcanvas offcanvas-end" id="sendInvoiceOffcanvas" aria-hidden="true">
  <div class="offcanvas-header my-1">
    <h5 class="offcanvas-title">Send Invoice</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body pt-0 flex-grow-1">
    <form>
      <div class="mb-3">
        <label for="invoice-from" class="form-label">From</label>
        <input type="text" class="form-control" id="invoice-from" value="" placeholder="company@email.com" />
      </div>
      <div class="mb-3">
        <label for="invoice-to" class="form-label">To</label>
        <input type="text" class="form-control" id="invoice-to" value="" placeholder="company@email.com" />
      </div>
      <div class="mb-3">
        <label for="invoice-subject" class="form-label">Subject</label>
        <input type="text" class="form-control" id="invoice-subject" value="" />
      </div>
      <div class="mb-3">
        <label for="invoice-message" class="form-label">Message</label>
        <textarea class="form-control" name="invoice-message" id="invoice-message" cols="3" rows="8"></textarea>
      </div>
      <div class="mb-4">
        <span class="badge bg-label-primary">
          <i class="ti ti-link ti-xs"></i>
          <span class="align-middle">Invoice Attached</span>
        </span>
      </div>
      <div class="mb-3 d-flex flex-wrap">
        <button type="button" class="btn btn-primary me-3" data-bs-dismiss="offcanvas">Send</button>
        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
      </div>
    </form>
  </div>
</div>
<!-- /Send Invoice Sidebar -->


<!-- /Offcanvas -->


            
          </div>
          <!-- / Content -->
  @stop

