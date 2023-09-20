@extends('layouts.admin')
@section('content')
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

            

<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Invoices/</span>
  Add new
</h4>
<!-- Sticky Actions -->
<div class="row">
  <div class="col-12">
    <div class="card">
      <form action="{{route('store.invoice')}}" method="post">
      @csrf
      <div class="card-body">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <!-- 1. Delivery Address -->
            <br>
            <h5 class="mb-4">Invoice Data</h5>
           
             <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label" for="fullname">Client</label>
                <select id="formValidationSelect2" name="client" class="form-select select2" data-allow-clear="true">
                  @if(isset($all_clients) && $all_clients -> count() > 0)
                  @foreach($all_clients as $client)
                    <option value="{{$client -> id}}">{{$client -> company_name}}</option>
                  @endforeach
                  @endisset
                 
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label" for="date">Date</label>
                <div class="input-group input-group-merge">
                  <input class="form-control" type="date" id="date" name="date"  aria-describedby="email3" />
                </div>  
                @error('date')
                      <span class="text-danger">{{$message}}</span>
                   @enderror
              </div>
     
           
            
            <br><hr>
           
            <div class="row gy-3">
              <div class="col-md">
                <div id="item-list">
        <!-- Item inputs will be dynamically added here -->
                </div>
                <button type="button" id="add-item-btn" class="btn btn-primary">Add Item</button>
                <button type="submit" class="btn btn-primary">Submit Invoice</button>
            </div>
          </div>
        
        </div>
      </div>
    </div>
  </form>
    </div>
  </div>
</div>
<!-- /Sticky Actions -->
            
          </div>
          <!-- / Content -->




  @stop

@section('scripts')  

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addItemBtn = document.getElementById('add-item-btn');
        const itemList = document.getElementById('item-list');

        let itemIndex = 0;

        addItemBtn.addEventListener('click', function() {
            const itemTemplate = `
                <div class="item">
                    <input type="text" name="items[${itemIndex}][name]" placeholder="Item Name">
                    <input type="text" name="items[${itemIndex}][price]" placeholder="Price">
                    <input type="number" name="items[${itemIndex}][quantity]" placeholder="Quantity">
                </div><br>
            `;
            itemList.insertAdjacentHTML('beforeend', itemTemplate);
            itemIndex++;
        });
    });
</script>
  @stop