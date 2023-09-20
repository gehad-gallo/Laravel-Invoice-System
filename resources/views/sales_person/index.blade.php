@extends('layouts.admin')
@section('content')
 
      <!-- Content wrapper -->
      <div class="content-wrapper">

        <!-- Content -->

        
          <div class="container-xxl flex-grow-1 container-p-y">
            
            
<h4 class="fw-semibold mb-4">{{__('sales_person.all_persons')}}</h4>


<div class="content-body"> <a href="{{route('add.new.sales.person')}}" class="btn btn-secondary btn-lg float-right" role="button" aria-disabled="true">{{__('sales_person.add_new')}}</a>
               </div><br>

<!-- Permission Table -->
<div class="card">
  <div class="card-datatable table-responsive">
    <table class="table SalestsTable datatables-users table border-top">
      <thead>
        <tr>
          <th>{{__('sales_person.name')}}</th>                
          <th>{{__('sales_person.email')}}</th>                
          <th>{{__('sales_person.phone')}}</th>               
          <th>{{__('sales_person.oprations')}}</th>              
        </tr>
      </thead>

      <tbody>
        @isset($all_sales_persons)
        @foreach($all_sales_persons as $sales)
            <tr>
                <td>{{$sales -> name}}</td>
                <td>{{$sales -> email}}</td>              
                <td>{{$sales -> phone}}</td>              
                <td>
                  <div class="d-flex flex-column text-start text-lg-end">
                    <div class="d-flex order-sm-0 order-1 mt-3">
                      

                      <a href="{{route('edit.sales',$sales->id)}}" class="btn btn-label-primary me-3" >{{__('sales_person.Edit')}}</a>
 
                      <a href="{{route('delete.sales.person',$sales->id)}}" id="{{$sales -> id}}" class="btn btn-label-secondary delete">{{__('sales_person.Delete')}}</a>
                    </div>
                  </div>
                </td>               
            </tr>
        @endforeach
        @endisset
                                           
      </tbody>
    </table>
  </div>
</div>
  @stop