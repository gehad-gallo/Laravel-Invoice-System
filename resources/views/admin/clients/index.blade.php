@extends('layouts.admin')
@section('content')
 <!-- Content wrapper -->
      <div class="content-wrapper">

        <!-- Content -->

        
          <div class="container-xxl flex-grow-1 container-p-y">
            
            
<h4 class="fw-semibold mb-4">{{__('clients.all_clients')}}</h4>


<div class="content-body"> <a href="{{route('add.client')}}" class="btn btn-secondary btn-lg float-right" role="button" aria-disabled="true">{{__('clients.add_new_client')}}</a>
               </div><br>

<!-- Permission Table -->
<div class="card">
  <div class="card-datatable table-responsive">
    <table class="table ClientsTable datatables-users table border-top">
      <thead>
        <tr>
          <th>{{__('clients.company_name')}}</th>                
          <th>{{__('clients.phone')}}</th>                
          <th>{{__('clients.whatsapp')}}</th>    
          <th>{{__('clients.address')}}</th>                
          <th>{{__('clients.contact_personal')}}</th>                
          <th>{{__('clients.attach_file')}}</th>              
          <th>{{__('clients.oprations')}}</th>              
        </tr>
      </thead>

      <tbody>
        @isset($all_clients)
        @foreach($all_clients as $client)
            <tr>
                <td>{{$client -> company_name}}</td>
                <td>{{$client -> phone}}</td>              
                <td>{{$client -> whatsapp}}</td>              
                <td>{{$client -> address}}</td>              
                <td>{{$client -> contact_personal}}</td>              
                <td>{{$client -> attach_file}}</td>              
                <td>
                  <div class="d-flex flex-column text-start text-lg-end">
                    <div class="d-flex order-sm-0 order-1 mt-3">
                      

                      <a href="{{route('edit.client',$client->id)}}" class="btn btn-label-primary me-3" >{{__('clients.Edit')}}</a>
 
                      <a href="{{route('delete.client',$client->id)}}" id="{{$client -> id}}" class="btn btn-label-secondary delete">{{__('clients.Delete')}}</a>
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

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
   
        $(document).on('click', '.delete', function (e) {
          e.preventDefault();
            var id =  $(this).attr('id');
            if(confirm("are you sure to delete this Client?"))
            {
              $.ajax({
                url:"{{route('delete.client')}}",
                method: "get",
                data:{id:id},
                success:function(data){
                  location.reload();
                  alert(data);
                  $('#ClientsTable').DataTable().ajax.reload();
                }
              })
            }

        });


  </script>

  @stop