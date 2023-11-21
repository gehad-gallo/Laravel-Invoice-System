@extends('layouts.admin')
@section('content')
 <!-- Content wrapper -->
      <div class="content-wrapper">

        <!-- Content -->

        
          <div class="container-xxl flex-grow-1 container-p-y">
            <br><br>
            
<h4 class="fw-semibold mb-4">All trashed Clients</h4>

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
       




    <table class="table ClientsTable datatables-users table border-top"> 
      <a href="{{route('add.client')}}" style="float: right;" >

        <button type="button" class="btn btn-secondary float-start">{{__('clients.add_new_client')}}</button>
      </a> &#160
      <a href="#" style="float: right;" role="button" aria-disabled="true">
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
          <th>{{__('clients.company_name')}}</th>                
          <th>{{__('clients.phone')}}</th>           
          <th>With Sales :</th>           
          <th>Action</th>           
                      
        </tr>
      </thead>

      <tbody>

 
        @isset($all_trashed_clients)

        @foreach($all_trashed_clients as $client)
            <tr>
                <td>{{$client -> company_name}}</td>
                <td>{{$client -> phone}}</td>
                <td>{{$client -> salesPerson->name}}</td>                    
                <td>
                  <a href="{{route('activate.client',$client->id)}}" class="btn btn-label-primary me-3" >activate again!</a>
                </td>                                          
            </tr>
        @endforeach
        @endisset
                                           
      </tbody>
    </table>



   <div>
    
{!! $all_trashed_clients->links() !!}
  </div>
@endif
  </div>
</div>
@stop

@section('scripts')


  @stop