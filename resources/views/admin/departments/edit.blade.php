@extends('layouts.admin')
@section('content')


      <!-- Content wrapper -->
      <div class="content-wrapper">

        <!-- Content -->

        
      <div class="container-xxl flex-grow-1 container-p-y">
            
                  
      <h4 class="fw-semibold mb-4">{{__('departments/index.update_dep')}}</h4>


      <!-- Multi Column with Form Separator -->
<div class="card mb-4">
  <form class="card-body" action="{{route('save.department.edit', $department->id)}}" method="POST">
    @csrf
      <div class="row g-3">
      <div class="col-md-6">
        <input name="id" value="{{$department->id}}" type="hidden">
        <label class="form-label" for="multicol-first-name">Name English</label>
        <input type="text" name="name_en" id="multicol-first-name" class="form-control" value="{{$department -> name_en}}" />
      </div>
      <div class="col-md-6">
        <label class="form-label" for="multicol-last-name">Name Arabic</label>
        <input type="text" name="name_ar" id="multicol-last-name" class="form-control" value="{{$department -> name_ar}}" />
      </div>
     
    </div>
    <div class="pt-4">
      <button type="submit" class="btn btn-primary me-sm-3 me-1">Save edit</button>
      <a href="{{route('departments')}}" class="btn btn-label-secondary">Cancel</a>
    </div>

    </div>
   
</div>

     
          </div>
          <!-- / Content -->
@stop