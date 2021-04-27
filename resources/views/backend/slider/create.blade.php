@extends('backend.master')
@section('body')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
  </li>
  <li class="breadcrumb-item">
    <a href="{{ route('slider.index') }}"> Slider </a>
  </li>
  <li class="breadcrumb-item active">Create </li>
</ol>
@include('alert')
<div class="card mb-3" style="padding:20px;">
<form class="form-horizontal" method="POST"  action="{{ route('slider.store') }}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <div class="form-group">
                <div class="row">
                    <div class="col-md-2">
                        <label class="control-label " for="academic">Slider Title: <span style="color: red">*</span></label> 
                    </div>
                    <div class="col-md-5">
                        <input required type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                    </div>

                </div>
            </div>

             <div class="form-group">
                    <div class="row">
                        <div class="col-md-2">
                            <label class="control-label " for="academic">Description <span style="color: red">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <textarea required class="form-control" name="description" id="description" cols="45">{{ old('description') }}</textarea>
                        </div>
                    </div>
                </div>



            <div class="form-group">
                    <div class="row">
                       <div class="col-md-3">
                            <label class="control-label " for="academic">Image: <span style="color: red">*</span></label> 
                            <p>Only jpg, png, jpeg, gif</p>
                        </div>
         <div class="col-md-3">
         <input required type="file" class="form-control" name="image" placeholder="image" id ="image">{{ old('image') }}
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