@extends('layouts.admin')
@section('content')

      <!-- Content wrapper -->
      <div class="content-wrapper">

        <!-- Content -->

        
          <div class="container-xxl flex-grow-1 container-p-y">
            
            
<h4 class="fw-semibold mb-4">Add Sales person</h4>


 <div class="col-12">
    <div class="card">
      <h5 class="card-header">Sales person info</h5>
      <div class="card-body">

        <form id="formValidationExamples" class="row g-3" method="POST" action="{{route('save.new.sales.person')}}">
          @csrf
         

          <div class="col-12">
            <hr class="mt-0" />
          </div>


          <div class="col-md-6">
            <label class="form-label" >Name</label>
            <input type="text" placeholder="" class="form-control" name="name" />
             @error('name')
                <span class="text-danger">{{$message}}</span>
             @enderror
          </div>
          <div class="col-md-6">
            <label class="form-label" >Email</label>
            <input class="form-control" placeholder="a@a.a" type="email" name="email" />
            @error('email')
              <span class="text-danger">{{$message}}</span>
            @enderror
          </div>

          <div class="col-md-6">
            <label class="form-label">Password</label>
            <input class="form-control" placeholder="****" type="text" name="password"  />
             @error('password')
              <span class="text-danger">{{$message}}</span>
            @enderror
          </div>

          <div class="col-md-6">
            <label class="form-label">Phone</label>
            <input class="form-control" placeholder="+20" type="text" name="phone" />
             @error('phone')
              <span class="text-danger">{{$message}}</span>
            @enderror
          </div>


          <div class="col-12">
            <button type="submit"  class="btn btn-primary">Submit</button>
          </div>
          </div>
        </form>

    </div>
  </div>




            
          </div>
@stop