@extends('backend.master')
@section('body')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
  </li>
  <li class="breadcrumb-item">
    <a href="{{ route('professional.index') }}"> Professionals</a>
  </li>
  <li class="breadcrumb-item active">Edit </li>
</ol>
@include('alert')

  <div class="card mb-3" style="padding:20px;">
  <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{route('professional.update',[$professional->id])}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PUT"> 
        
      
          <div class="form-group">
                <div class="row">
                    <div class="col-md-2">
                        <label class="control-label " for="academic">Full Name: <span style="color: red">*</span></label> 
                    </div>
                    <div class="col-md-6">
                        <input required type="text" class="form-control" id="name" name="name" value="@if(old('name')==""){{$professional->name}}@else{{old('name')}}@endif">
                    </div>
                 </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2">
                        <label class="control-label " for="academic">Phone: <span style="color: red">*</span></label> 
                    </div>
                    <div class="col-md-6">
                        <input required type="number" class="form-control" id="phone" name="phone" value="@if(old('phone')==""){{$professional->phone}}@else{{old('phone')}}@endif">
                    </div>
                 </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2">
                        <label class="control-label " for="academic">Email: <span style="color: red">*</span></label> 
                    </div>
                    <div class="col-md-6">
                        <input required type="email" class="form-control" id="email" name="email" value="@if(old('email')==""){{$professional->email}}@else{{old('email')}}@endif">
                    </div>
                 </div>
            </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-2">
            <label class="control-label " for="academic">Services: <span style="color: red">*</span></label>
            </div>
            <div class="col-md-6">
                        <input required type="text" class="form-control" id="services" name="services" value="@if(old('services')==""){{$professional->services}}@else{{old('services')}}@endif">
                    </div>
            </div>
        </div>          

            <div class="form-group">
                    <div class="row">
                        <div class="col-md-2">
                            <label class="control-label " for="academic">Description <span style="color: red">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <textarea required type="text" class="form-control" name="description" id="description" rows="10" cols="30"value="{{ $professional->description }}">{{ $professional->description }}</textarea>
                        </div>
                    </div>
                </div>



            <div class="form-group">
                    <div class="row">
                       <div class="col-md-2">
                            <label class="control-label " for="academic">Image: <span style="color: red">*</span></label> 
                       <p> Only jpg,jpeg,png,gif</p> </div>
        <div class="col-sm-10">
        @if($professional->image!="")
            <div class="row">
                <div class="col-sm-12">
                    <div id="topic_photo" class="col-sm-4 box p-a-xs">
                        <a target="_blank"
                           href="{{ URL::to('/gallery/'.$professional->image) }}"><img
                                    src="{{ URL::to('/gallery/'.$professional->image) }}"
                                    height="150" width="150">
                            {{ $professional->image }}
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