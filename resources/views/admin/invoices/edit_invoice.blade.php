@extends('layouts.admin')
@section('content')
     <!-- Content wrapper -->
      <div class="content-wrapper">

        <!-- Content -->
        
          <div class="container-xxl flex-grow-1 container-p-y">

            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif
            @if(Session::has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('error') }}
                </div>
            @endif  
            

<div class="row invoice-preview">
  <!-- Invoice -->
  <div class="col-xl-9 col-md-8 col-12 mb-md-0 mb-4">
    <h2>Edit order #{{$order->id}}</h2><br>
    <div class="col-12">
    <div class="card">
      <h5 class="card-header">Items </h5>
      <div class="card-body">
      
          
        <form id="formValidationExamples" class="row g-3" method="POST" action="{{route('save.edit.invoice',$order->id )}}">
          @csrf
          <input name="id" placeholder="....." type="hidden">
          <!-- Account Details -->

          <div class="col-12">
            <hr class="mt-0" />
          </div>
    
    <div class="col-md-12">
    @isset($all_order_items)
    @foreach ($all_order_items as $item)

        <div class="row">
            <div class="col-md-4">
                <label class="form-label">Item name</label>
                <input type="text" value="{{$item->item}}" class="form-control" name="item[] " />
            </div>

            <div class="col-md-4">
                <label class="form-label">Price</label>
                <input class="form-control" value="{{$item->price}}" type="text" name="price[]" />
            </div>

            <div class="col-md-4">
                <label class="form-label">Quantity</label>
                <input class="form-control" value="{{$item->quantity}}" type="text" name="quantity[]" />
            </div>
        </div>

    @endforeach
    @endisset
</div>
          <h5 class="card-header">Sales Person</h5>

          <div class="col-md-6">
            <label class="form-label" for="formValidationSelect2">With sales</label>
            <select id="formValidationSelect2" name="sales_id" class="form-select select2" data-allow-clear="true">
             @isset($salesPerson)
                 @foreach ($salesPerson as $xx)            
                <option value="{{$xx -> id;}}" selected>{{ $xx->name; }}</option>

                 @endforeach
                 @endisset


                 @isset($all_sales_persons)
                 @foreach ($all_sales_persons as $sales) 
                 <option value="{{$sales -> id;}}" >{{$sales -> name;}}</option>
                 @endforeach
                 @endisset
            </select>
          </div><br>

           <h5 class="card-header">Client</h5>
            <div class="col-md-6">
            <label class="form-label" for="formValidationSelect2">With sales</label>
            <select id="formValidationSelect2" name="client_id" class="form-select select2" data-allow-clear="true">
                 @isset($client)
                 @foreach ($client as $xx)            
                <option value="$xx -> id;" selected>{{ $xx->name; }}</option>

                 @endforeach
                 @endisset


                 @isset($all_clients)
                 @foreach ($all_clients as $xx) 
                 <option value="{{$xx -> id;}}" >{{$xx -> company_name;}}</option>
                 @endforeach
                 @endisset
             
            </select>
          </div><hr>
         
          <div class="d-grid gap-2 col-6 mx-auto">
            <button type="submit" class="btn btn-primary" type="button">Update</button>
          </div>

          </div>
        </form>

    </div>
  </div>

  </div>
  <!-- /Invoice -->

  <!-- Invoice Actions -->
  <div class="col-xl-3 col-md-4 col-12 invoice-actions">
    
  </div>
  <!-- /Invoice Actions -->
</div>

<!-- /Offcanvas -->


            
          </div>
          <!-- / Content -->
  @stop

