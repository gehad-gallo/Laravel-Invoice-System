@extends('layouts.admin')
@section('content')
     <!-- Content wrapper -->
      <div class="content-wrapper">

        <!-- Content -->
        
          <div class="container-xxl flex-grow-1 container-p-y">


<div class="row invoice-preview">
  <!-- Invoice -->
  <div class="col-xl-9 col-md-8 col-12 mb-md-0 mb-4">
    <h2>Stocking</h2><br>
    <div class="col-12">
    <div class="card">
      <div class="card mb-2">
      <h5 class="card-header">All Sales in :</h5>
      <div class="card-body"><br>
       <form method="POST" action="{{route('stocking.result')}}">
      @csrf 
        <select class="form-select mb-2" id="exampleFormControlSelect1" aria-label="Default select example" name="month">
              <option value="">Select Month</option>
              <option value="1" selected>Janaury</option>
              <option value="2" >February</option>
              <option value="3" >March</option>
              <option value="4" >April</option>
              <option value="5" >May</option>
              <option value="6" >June</option>
              <option value="7" >July</option>
              <option value="8">August</option>
              <option value="9">September</option>
              <option value="10">October</option>
              <option value="11">November</option>
              <option value="12">December</option>
          </select><br>
          <div class="col-12">
            <button type="submit"  class="btn btn-primary">Submit</button>
          </div>
      </form>
      </div>

      @if(Session::has('success'))
      @if(count($orders) > 0)
          <div class="alert alert-success" role="alert">
              {{ Session::get('success') }}
              {{ $orders }}
          </div>
      @endif
      @endif
      @if(Session::has('error'))
          <div class="alert alert-danger" role="alert">
              {{ Session::get('error') }}
          </div>
      @endif  

            
    </div>

  </div>

  </div>
  <!-- /Invoice -->

  <!-- Invoice Actions -->
  <div class="col-xl-3 col-md-4 col-12 invoice-actions">
    
  </div>
  <!-- /Invoice Actions -->
</div>

<!-- /Offcanvas -->


            
          </div>
          <!-- / Content -->
  @stop

