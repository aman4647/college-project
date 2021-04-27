@extends('backend.master')
@section('body')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
  </li>
  <li class="breadcrumb-item">
    <a href="{{ route('booking.index') }}"> Orders Service</a>
  </li>
  <li class="breadcrumb-item active">Edit </li>
</ol>
@include('alert')

  <div class="card mb-3" style="padding:20px;">
  <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{route('booking.update',[$booking->id])}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PUT"> 
        
      
            
        <div class="form-group">
          <div class="row">
            <div class="col-md-2">
            <label class="control-label " for="academic">Customer Name: </label>
            </div>
            <div class="col-md-3" >
              <input type="text" Value="{{$booking->user['name']}}" readonly>
             </div>
            
            <div class="col-md-2">
            <label class="control-label " for="academic">Professional Name: </label>
            </div>
            <div class="col-md-3" >
              <input type="text" Value="{{$booking->professional['name']}}" readonly>
             </div>
            </div>
        </div>     

        <div class="form-group">
          <div class="row">
            <div class="col-md-2">
            <label class="control-label " for="academic">Service Title: </label>
            </div>
            <div class="col-md-3" >
              <input type="text" Value="{{$booking->service['name']}}" readonly>
             </div>
            
            <div class="col-md-2">
            <label class="control-label " for="academic">Select Condition:<span style="color: red">*</span> </label>
            </div>
            <div class="col-md-3" >
              <select class="form-control" id="type" name="type">
                       
                                <option class="form-control" value="" @if ($booking->type == '') selected="selected" @endif>---select Condition--</option> 
                                <option class="form-control" value="1" @if ($booking->type == 1) selected="selected" @endif>Cancel</option>  
                                <option class="form-control" value="2" @if ($booking->type == 2) selected="selected" @endif>Processing...</option>  
                                <option class="form-control" value="3" @if ($booking->type == 3) selected="selected" @endif>Completed</option>       
                            
                        
                </select>           
                  </div>
            </div>
        </div>       

            <div class="form-group">
                    <div class="row">
                        <div class="col-md-2">
                            <label class="control-label " for="academic">Description </label>
                        </div>
                        <div class="col-md-8">
                            <textarea required type="text" class="form-control" name="description" id="description" rows="10" cols="30"value="{{ $booking->description }}" readonly>{{ $booking->description }}</textarea>
                        </div>
                    </div>
                </div>

          <div class="form-group ">
                <div class="row">
                    <div class="col-md-3">
                        </div>
                        <div class="col-md-3">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button  class="btn btn-primary" type="submit">Update</button>

                      </div>
               </div>
           </div>
    </div>

   </form> 

     </div>        



    <script src="/vendor/jquery/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
    <script>
			CKEDITOR.replace('description');
		</script>
		 
@endsection