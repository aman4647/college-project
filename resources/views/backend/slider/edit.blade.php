@extends('backend.master')
@section('body')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
  </li>
  <li class="breadcrumb-item">
    <a href="{{ route('slider.index') }}"> Slider</a>
  </li>
  <li class="breadcrumb-item active">Edit </li>
</ol>
@include('alert')

  <div class="card mb-3" style="padding:20px;">
  <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{route('slider.update',[$slider->id])}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PUT"> 
        
      
          <div class="form-group">
                <div class="row">
                    <div class="col-md-2">
                        <label class="control-label " for="academic">Title: <span style="color: red">*</span></label> 
                    </div>
                    <div class="col-md-6">
                        <input required type="text" class="form-control" id="name" name="name" value="@if(old('name')==""){{$slider->name}}@else{{old('name')}}@endif">
                    </div>

                     
                    
                </div>
            </div>


          

            <div class="form-group">
                    <div class="row">
                        <div class="col-md-2">
                            <label class="control-label " for="academic">Description <span style="color: red">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <textarea required type="text" class="form-control" name="description" id="description" rows="10" cols="30"value="{{ $slider->description }}">{{ $slider->description }}</textarea>
                        </div>
                    </div>
                </div>



            <div class="form-group">
                    <div class="row">
                       <div class="col-md-2">
                            <label class="control-label " for="academic">Image: <span style="color: red">*</span></label> 
                       <p> Only jpg,jpeg,png,gif</p> </div>
        <div class="col-sm-10">
        @if($slider->image!="")
            <div class="row">
                <div class="col-sm-12">
                    <div id="topic_photo" class="col-sm-4 box p-a-xs">
                        <a target="_blank"
                           href="{{ URL::to('/gallery/'.$slider->image) }}"><img
                                    src="{{ URL::to('/gallery/'.$slider->image) }}"
                                    height="150" width="150">
                            {{ $slider->image }}
                        </a>
                        <br>
                       
                    </div>
                    

                </div>
            </div>
        @endif
        <input type="file" name="image" id="image">
     </div>   
    </div><br/>
                   

            
               
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