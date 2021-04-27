@extends('backend.master')
@section('body')

<!-- Breadcrumbs-->
<ol class="breadcrumb">
  
  
  <li class="breadcrumb-item active">Your Profile </li>
</ol>


@include('alert')

  <div class="card mb-3" style="padding:20px;">
  	<div class="container">
  		<strong><u> Your Profile:</u></strong><br/>
  		<span>Name: {{$user->name}}</span><br/>
  		<span>Contact: @isset($user->phone){{$user->phone}},@endisset {{$user->email}}</span><br/>
  		<span>Address: {{$user->address}}</span><br/><br/>
  		<span> {!!$user->description!!}</span>

  	</div>

  	<hr/>
  	<strong><u>Edit Your profile:</u></strong><br/>
  	
  <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{route('user.update',[$user->id])}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PUT"> 
        
      
          <div class="form-group">
                <div class="row">
                    <div class="col-md-2">
                        <label class="control-label " for="academic">Full Name: <span style="color: red">*</span></label> 
                    </div>
                    <div class="col-md-3">
                        <input required type="text" class="form-control" id="name" name="name" value="@if(old('name')==""){{$user->name}}@else{{old('name')}}@endif">
                    </div>
              
                    <div class="col-md-1">
                        <label class="control-label " for="academic">Email: <span style="color: red">*</span></label> 
                    </div>
                    <div class="col-md-4">
                        <input required type="email" class="form-control" id="email" name="email" value="@if(old('email')==""){{$user->email}}@else{{old('email')}}@endif">
                    </div>
                 </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2">
                        <label class="control-label " for="academic">Phone: <span style="color: red">*</span></label> 
                    </div>
                    <div class="col-md-3">
                        <input required type="number" class="form-control" id="phone" name="phone" value="@if(old('phone')==""){{$user->phone}}@else{{old('phone')}}@endif">
                    </div>

                    <div class="col-md-1">
                        <label class="control-label " for="academic">Password: </label> 
                    </div>
                    <div class="col-md-4">
                        <input  type="password" class="form-control" id="password" name="password" value="@if(old('password')=="")@else{{old('password')}}@endif">
                    </div>
                 </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2">
                        <label class="control-label " for="academic">Address: <span style="color: red">*</span></label> 
                    </div>
                    <div class="col-md-6">
                        <input required type="text" class="form-control" id="address" name="address" value="@if(old('address')==""){{$user->address}}@else{{old('address')}}@endif">
                    </div>
                 </div>
            </div>
            


          

            <div class="form-group">
                    <div class="row">
                        <div class="col-md-2">
                            <label class="control-label " for="academic">Description </label>
                        </div>
                        <div class="col-md-8">
                            <textarea required type="text" class="form-control" name="description" id="description" rows="10" cols="30"value="{{ $user->description }}">{{ $user->description }}</textarea>
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