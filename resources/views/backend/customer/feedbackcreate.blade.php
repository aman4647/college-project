@extends('backend.master')
@section('body')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
  
  <li class="breadcrumb-item">
    <a href="{{ route('customerfeedback') }}"> Feedback </a>
  </li>
  <li class="breadcrumb-item active">Create </li>
</ol>
@include('alert')
<div class="card mb-3" style="padding:20px;">
<form class="form-horizontal" method="POST"  action="{{ route('feedback.store') }}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id" value="{{$feedback->id}}">

  
<div class="form-group">
  <div class="row">
      <div class="col-md-2">
          <label class="control-label " for="academic">Professional Name: </label> 
      </div>
      <div class="col-md-3">
          <input type="text" readonly value="{{$feedback->professional['name']}}">
      </div>
  </div>
</div>

<div class="form-group">
  <div class="row">
      <div class="col-md-2">
          <label class="control-label " for="academic">Assign Rating:<span style="color:red">*</span> </label> 
      </div>
      <div class="col-md-3">
          <input required name="rating" type="number" min="0" max="10">
      </div>
  </div>
</div>
       <div class="form-group">
                    <div class="row">
                        <div class="col-md-2">
                            <label class="control-label " for="academic">Description</label>
                        </div>
                        <div class="col-md-8">
                            <textarea  class="form-control" name="description" id="description" cols="45">{{ old('description') }}</textarea>
                        </div>
                    </div>
                </div>

    
   
      
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        </div>
                        <div class="col-md-3">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">Submit</button>
          

          </div>
        </div>
      </div>
  </div>
 </form>

</div>
    </script>
    <script src="/vendor/jquery/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
    <script>
            CKEDITOR.replace('description');
        </script>

                 
                            
              
@endsection