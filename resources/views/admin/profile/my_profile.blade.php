@extends('layouts.admin')
@section('content')
  

<br>
<br>
  <div class="col-12">
    <div class="card">
       <h5 class="card-header">My Profile</h5>
      <div class="card-body">

        <form id="formValidationExamples" class="row g-3" method="POST" action="">
          @csrf
          <input name="id" placeholder="....." type="hidden">
          <!-- Account Details -->

          <div class="col-12">
            <hr class="mt-0" />
          </div>


          <div class="col-md-6">
            <label class="form-label" >Name</label>
            <input type="text" value="" class="form-control" name="name" />
          </div>
          <div class="col-md-6">
            <label class="form-label" >Email</label>
            <input class="form-control" value="" type="email" name="email" />
          </div>

          <div class="col-md-6">
            <label class="form-label">Password</label>
            <input class="form-control" value="" type="password" type="password" name="password"  />
          </div>

          <div class="col-md-6">
            <label class="form-label">Mobile Phone</label>
            <input class="form-control" value="" type="text" name="phone" />
          </div>


          <div class="col-12">
            <button type="submit"  class="btn btn-primary">Update</button>
          </div>
          </div>
        </form>

    </div>
  </div>

      

          
@stop