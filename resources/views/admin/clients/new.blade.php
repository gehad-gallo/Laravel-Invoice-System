@extends('layouts.admin')
@section('content')

      <!-- Content wrapper -->
      <div class="content-wrapper">

        <!-- Content -->

        
          <div class="container-xxl flex-grow-1 container-p-y">
            
            
<h4 class="fw-semibold mb-4">{{__('clients.add_client')}}</h4>


 <div class="col-12">
    <div class="card">
      <h5 class="card-header">{{__('clients.client_info')}}</h5>
      <div class="card-body">

        <form id="formValidationExamples" class="row g-3" method="POST" action="{{route('save.add.client')}}">
          @csrf
          <input name="id" placeholder="....." type="hidden">
          <!-- Account Details -->

          <div class="col-12">
            <hr class="mt-0" />
          </div>


          <div class="col-md-6">
            <label class="form-label" >{{__('clients.company_name')}}</label>
            <input type="text" placeholder="....." class="form-control" name="company_name" />
          </div>
          <div class="col-md-6">
            <label class="form-label" >{{__('clients.client_phone')}}</label>
            <input class="form-control" placeholder="....." type="text" name="phone" />
          </div>

          <div class="col-md-6">
            <label class="form-label">{{__('clients.client_address')}}</label>
            <input class="form-control" placeholder="....." type="text" name="address"  />
          </div>

          <div class="col-md-6">
            <label class="form-label">{{__('clients.client_whatsapp')}}</label>
            <input class="form-control" placeholder="....." type="text" name="whatsapp" />
          </div>



          <div class="col-md-6">
            <label class="form-label">{{__('clients.personal_connect')}}</label>
            <input class="form-control" placeholder="....." type="text" name="contact_personal" />
          </div>

          
          <div class="col-md-6">
            <label class="form-label" for="formValidationSelect2">With sales</label>
            <select id="formValidationSelect2" name="sales_id" class="form-select select2" data-allow-clear="true">
              @if(isset($sales_persons) && $sales_persons -> count() > 0)
              @foreach($sales_persons as $sales)
                <option value="{{$sales -> id}}">{{$sales -> name}}</option>
              @endforeach
              @endisset
             
            </select>
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