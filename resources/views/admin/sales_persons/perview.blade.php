@extends('layouts.admin')
@section('content')

      <!-- Content wrapper -->
      <div class="content-wrapper">

        <!-- Content -->

        
          <div class="container-xxl flex-grow-1 container-p-y">
            
            
<h4 class="fw-semibold mb-4">{{$saller->name}}</h4>


 <div class="col-12">
    <div class="card">
      <div class="card-body">
<br>
         <p>Email: &nbsp &nbsp<span class="badge badge-pill badge-light">{{$saller->email}}</span></p>
        <p>Phone: &nbsp<span class="badge badge-pill badge-light">{{$saller->phone}}</span></p>
        <p>All of sales: &nbsp &nbsp<span class="badge badge-pill badge-light">{{$numberOfSales}}</span></p>
        <p>commisions: &nbsp &nbsp<span class="badge badge-pill badge-light">{{$allCommisions}}</span></p>


        <hr>
          

<div class="col-xl-6">
    <!-- HTML5 Inputs -->
    <div class="card mb-4">
      <h5 class="card-header">Sales in :</h5>
      <div class="card-body"><br>
       <form method="post" action="{{route('show.orders.in.specific.month',$saller->id)}}">
         @csrf

        <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="month">
              <option value='' >Select Month</option>
              <option value='1'selected>Janaury</option>
              <option value='2'>February</option>
              <option value='3'>March</option>
              <option value='4'>April</option>
              <option value='5'>May</option>
              <option value='6'>June</option>
              <option value='7'>July</option>
              <option value='8'>August</option>
              <option value='9'>September</option>
              <option value='10'>October</option>
              <option value='11'>November</option>
              <option value='12'>December</option>
          </select><br>
          <div class="col-12">
            <button type="submit"  class="btn btn-primary">Submit</button>
          </div>
      </form>
      </div>

   
            
    </div>

    <!-- File input -->
 
  </div>


        <p>commisions: &nbsp &nbsp<span class="badge badge-pill badge-light">{{$allCommisions}}</span></p>

    </div>
  </div>

</div>
@stop