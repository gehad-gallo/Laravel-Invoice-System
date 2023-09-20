@extends('layouts.admin')
@section('content')
  


      <!-- Content wrapper -->
      <div class="content-wrapper">

        <!-- Content -->
        
          <div class="container-xxl flex-grow-1 container-p-y">
                        
                        
            <h4 class="fw-bold py-3 mb-4">
              <span class="text-muted fw-light">Invoice /</span> List
            </h4>

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
            <!-- Invoice List Table -->
            <div class="card">
              <div class="card-datatable table-responsive">
                <table class="invoice-list-table table border-top">
                  <thead>
                    <tr>
                      <th></th>
                      <th>#ID</th>
                      <th>Client</th>
                      <th>Sales Person</th>
                      <th>Date</th>
                      <th>Costs</th>
                    </tr>
                  </thead>
                  <tbody>
                @isset($all_orders)
                @foreach($all_orders as $order)
                    <tr>
                        <td></td>
                        <td><a href="{{route('perview.invoice',$order->id)}}"> # {{$order -> id}}</a></td></td>
                        <td>{{$order -> hisClient -> company_name}}</td>
                        <td>{{$order -> salesPerson -> name}}</td>
                        <td>{{$order -> date}}</td>              
                        <td>{{$order -> orderTotalCost()}}</td>                                              
                    </tr>
                @endforeach
                @endisset
                                                   
              </tbody>
                </table>
              </div>
            </div>


            
          </div>
          <!-- / Content -->

          
@stop