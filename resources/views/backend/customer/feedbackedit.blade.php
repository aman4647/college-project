@extends('backend.master')
@section('body')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
  
  <li class="breadcrumb-item">
    <a href="{{ route('customerfeedback') }}"> Feedback and Rating</a>
  </li>
  <li class="breadcrumb-item active">Edit </li>
</ol>
@include('alert')

  <div class="card mb-3" style="padding:20px;">
  <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{route('feedback.update',[$booking->id])}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PUT"> 
        <input type="hidden" name="professional_id" value="{{$booking->professional_id}}">
      
          
        <div class="form-group">
          <div class="row">
            <div class="col-md-2">
            <label class="control-label " for="academic"> Professional Name:</label>
            </div>
            <div class="col-md-3" >
              <input type="text" readonly value="{{$booking->professional['name']}}">
             </div>
            </div>
        </div>  
        <div class="form-group">
          <div class="row">
            <div class="col-md-2">
            <label class="control-label " for="academic"> Assign Rating:<span style="color:red">*</span></label>
            </div>
            <div class="col-md-3" >
              <input type="number" name="rating" min="0" max="10" value="{{$booking->rating}}">
             </div>
            </div>
        </div>         

            <div class="form-group">
                    <div class="row">
                        <div class="col-md-2">
                            <label class="control-label " for="academic">Description </label>
                        </div>
                        <div class="col-md-8">
                            <textarea  type="text" class="form-control" name="description" id="description" rows="10" cols="30"value="{{ $booking->description }}">{{ $booking->description }}</textarea>
                        </div>
                    </div>
                </div>



            
          

            
               
                <div class="form-group ">
                <div class="row">
                    <div class="col-md-3">
                        </div>
                        <div class="col-md-3">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button  class="btn btn-primary" type="submit">Submit</button>

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