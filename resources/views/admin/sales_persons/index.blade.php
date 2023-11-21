@extends('layouts.admin')
@section('content')
 
      <!-- Content wrapper -->
      <div class="content-wrapper">

        <!-- Content -->

        
          <div class="container-xxl flex-grow-1 container-p-y">
            <br><br>
            
<h4 class="fw-semibold mb-4">{{__('sales_person.all_persons')}}</h4>
      
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


<!-- Permission Table -->
<div class="card">
  <div class="card-datatable table-responsive">
    <table class="table salesTable datatables-users table border-top">
      <a href="{{route('add.new.sales.person')}}" style="float: right;" >

        <button type="button" class="btn btn-secondary float-start">Add new Sales person</button>
      </a> &#160
      <a href="{{route('sales.trash')}}" style="float: right;" role="button" aria-disabled="true">
       <button type="button" class="btn btn-secondary float-start">Trash</button>
     </a>

@if(isset($message))

<figure class="text-center">
  <blockquote class="blockquote"><br>
     <p>{{ $message }}</p>
  </blockquote>
</figure>

@else         
      <thead>
        <tr>
          <th>{{__('sales_person.name')}}</th>                
          <th></th>                
          <th></th> 
          <th></th>                
          <th></th>  
          <th></th>                
          <th></th> 
          <th></th>                
          <th></th>  
          <th></th>                
          <th></th> 
          <th></th>                
          <th></th>
          <th></th>                
          <th></th> 
          <th></th>                
          <th></th>               
          <th>{{__('sales_person.oprations')}}</th>              
        </tr>
      </thead>

      <tbody>
        @isset($all_sales_persons)
        @foreach($all_sales_persons as $sales)
            <tr>
                <td><a href="{{route('perview.sales.person',$sales->id)}}">{{$sales -> name}}</a></td>
                <td></td>              
                <td></td>  
                <td></td>              
                <td></td> 
                <td></td>              
                <td></td>  
                <td></td>              
                <td></td>    
                <td></td>              
                <td></td>  
                <td></td>              
                <td></td>    
                <td></td>              
                <td></td>  
                <td></td>              
                <td></td>              
                <td>

                      <a href="{{route('edit.sales',$sales->id)}}" class="btn btn-label-primary me-3" >{{__('sales_person.Edit')}}</a>
 
                      <a href="{{route('delete.sales',$sales->id)}}" id="{{$sales -> id}}" class="btn btn-label-secondary delete">{{__('sales_person.Delete')}}</a>
                   
                </td>               
            </tr>
        @endforeach
        @endisset
                                           
      </tbody>
    </table>
  </div>

{!! $all_sales_persons->links() !!}
  </div>
@endif
  </div>
</div>
@stop


@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 
  @stop