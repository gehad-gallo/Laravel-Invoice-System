@extends('layouts.admin')
@section('content')

<!-- Content wrapper -->
<div class="content-wrapper">
       
  <!-- Content -->
        
  <div class="container-xxl flex-grow-1 container-p-y">
            
            
    <h4 class="fw-semibold mb-4">Departments</h4>

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
        <!-- Basic Layout -->
        <div class="row">
          <div class="col-4">
            <div class="card mb-2">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{__('departments/index.add_new_dep')}}</h5> <small class="text-muted float-end">New</small>
              </div>
              <div class="card-body">    
                <div class="card mb-4">
              
              <div class="card-body">
                <form  id="departmentForm" method="POST" action="{{route('insert.department')}}" enctype="multipart/form-data">
                    @csrf
                
                  <div class="col-12 mb-3">
                    <label class="form-label" for="modalPermissionName">Department Name English</label>
                    <input type="text"  name="name_en" class="form-control" placeholder="Enter Name" autofocus />
                    
                      <small class="form-text text-danger" id="name_en_error"></small>   
                  </div>

                    <div class="col-12 mb-3">
                    <label class="form-label" for="modalPermissionName">Department Name Arabic</label>
                    <input type="text"  name="name_ar" class="form-control" placeholder="Enter Name" autofocus />
                     
                      <small class="form-text text-danger" id="name_ar_error"></small>   
                
                  </div>
                  
                  <div class="col-12 text-center ">
                    <button type="submit" id="save_department" class="btn btn-primary me-sm-3 me-1">Add</button>
                  </div>
                </form>
              </div>
            </div>
                
              </div>
            </div>
          </div>
          <div class="col-8">
            <div class="card mb-6">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">All Departments</h5>

                
              </div>
              <div class="card-body">
                <div class="card">
          <div class="card-datatable table-responsive pt-0">
            <table class="datatables-basic table DepartmentsTable">
              <thead>
                <tr>
                  <th>id</th>
                  <th>Name English</th>
                  <th>Name Arabic</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @isset($all_departments)
                @foreach($all_departments as $department)
                    <tr>
                        <td>{{$department -> id}}</td>
                        <td>{{$department -> name_en}}</td>              
                        <td>{{$department -> name_ar}}</td>              
                        <td>
                          <div class="d-flex flex-column text-start text-lg-end">
                            <div class="d-flex order-sm-0 order-1 mt-3">
                              

                              <a href="{{route('edit.department',$department->id)}}" class="btn btn-label-primary me-3" >Edit</a>
                              

                              <a href="{{route('delete.department',$department->id)}}" id="{{$department -> id}}" class="btn btn-label-secondary delete">Delete</a>
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
              </div>
            </div>
          </div>
        </div>

        <!-- Content -->
@stop



@section('scripts')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
     <script>

      
        $(document).on('click', '.delete', function (e) {
          e.preventDefault();
            var id =  $(this).attr('id');
            if(confirm("are you sure to delete this Department?"))
            {
              $.ajax({
                url:"{{route('delete.department')}}",
                method: "get",
                data:{id:id},
                success:function(data){
                  location.reload();
                  alert(data);
                  $('#DepartmentsTable').DataTable().ajax.reload();
                }
              })
            }

        });


    </script>
@stop