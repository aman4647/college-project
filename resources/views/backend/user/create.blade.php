@extends('backend.master')
@section('body')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
  </li>
  <li class="breadcrumb-item">
    <a href="{{ route('user.index') }}"> Customers </a>
  </li>
  <li class="breadcrumb-item active">Create </li>
</ol>
@include('alert')
<div class="card mb-3" style="padding:20px;">
<form class="form-horizontal" method="POST"  action="{{ route('user.store') }}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <div class="form-group">
                <div class="row">
                    <div class="col-md-2">
                        <label class="control-label " for="academic">Full Name: <span style="color: red">*</span></label> 
                    </div>
                    <div class="col-md-5">
                        <input required type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                    </div>

                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-2">
                        <label class="control-label " for="academic">Email: <span style="color: red">*</span></label> 
                    </div>
                    <div class="col-md-5">
                        <input required type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                    </div>

                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2">
                        <label class="control-label " for="academic">Phone: <span style="color: red">*</span></label> 
                    </div>
                    <div class="col-md-5">
                        <input required type="number" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                    </div>

                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2">
                        <label class="control-label " for="academic">Address: <span style="color: red">*</span></label> 
                    </div>
                    <div class="col-md-5">
                        <input required type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
                    </div>

                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2">
                        <label class="control-label " for="academic">Password: <span style="color: red">*</span></label> 
                    </div>
                    <div class="col-md-5">
                        <input required type="password" class="form-control" id="password" name="password" value="{{ old('password') }}">
                    </div>

                </div>
            </div>


             <div class="form-group">
                    <div class="row">
                        <div class="col-md-2">
                            <label class="control-label " for="academic">Description </label>
                        </div>
                        <div class="col-md-8">
                            <textarea required class="form-control" name="description" id="description" cols="45">{{ old('description') }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-2">
                            <label class="control-label " for="academic">Role <span style="color: red">*</span></label>
                        </div>
                        <div class="col-md-4">
                            <input type="radio" @if(old('role')==1) checked="checked" @endif id="admin" name="role" value="1">
                            <label for="admin">Admin</label>
                            <input type="radio" @if(old('role')!=1) checked="checked" @endif id="customer" name="role" value="0">
                            <label for="customer">Customer</label><br>
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