@extends('backend.master')
@section('body')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
  
  <li class="breadcrumb-item">
    <a href="{{ route('customerbooking.index') }}"> Orders </a>
  </li>
  <li class="breadcrumb-item active">Create </li>
</ol>
@include('alert')
<div class="card mb-3" style="padding:20px;">
<form class="form-horizontal" method="POST"  action="{{ route('customerbooking.store') }}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

          
 <div class="form-group">
  <div class="row">
      <div class="col-md-2">
          <label class="control-label " for="academic">Select Service: <span style="color: red">*</span></label> 
      </div>
      <div class="col-md-4">
          <select name="service_id" id="" class="form-control">
                    @if(old('service_id') == "")
                <option class="form-control" value="">---select Service--</option>
           @if($sservice=='0')
                @foreach ($service as $item)
                <option class="form-control" value="{{$item->id}}" @if(old('service_id') == $item->id) selected="selected" @endif>{{$item->name}} </option> 
                @endforeach   
              @else
              @foreach ($service as $item)
                <option class="form-control" value="{{$item->id}}" @if($sservice->id==$item->id) selected="selected" @endif>{{$item->name}} </option> 
                @endforeach 
              @endif
            @else
                <option class="form-control" value="" @if (old('service_id') == '') selected="selected" @endif>---select Service---</option>         
                @foreach ($service as $item)
                    <option class="form-control" value="{{$item->id}}" @if (old('service_id') == $item->id) selected="selected" @endif>{{$item->name}} </option>
                @endforeach 
            @endif    
            </select>
      </div>
  </div>
</div> 
<div class="form-group">
  <div class="row">
      <div class="col-md-2">
          <label class="control-label " for="academic">Select Professional: </label> 
      </div>
      <div class="col-md-4">
          <select name="professional_id" id="professional_id" class="form-control">
                    @if(old('professional_id') == "")
                <option class="form-control" value="0">---select Professional--</option>

               @if($sprofessor=='0')
                @foreach ($professional as $item)
                <option class="form-control" value="{{$item->id}}" @if(old('professional_id') == $item->id) selected="selected" @endif>{{$item->name}} </option> 
                @endforeach
                @else
                @foreach ($professional as $item)
                <option class="form-control" value="{{$item->id}}" @if($sprofessor->id == $item->id) selected="selected" @endif>{{$item->name}} </option> 
                @endforeach 
                @endif         
            @else
                <option class="form-control" value="0" @if (old('professional_id') == 0) selected="selected" @endif>---select Professional---</option>         
                @foreach ($service as $item)
                    <option class="form-control" value="{{$item->id}}" @if (old('professional_id') == $item->id) selected="selected" @endif>{{$item->name}} </option>
                @endforeach 
            @endif    
            </select>
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
</section>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script>
$(function(){
  $( "#service_id" ).change(function () {
   var ids=''
    $("#service_id option:selected" ).each(function() {
     var id = $(this).val();
      ids= parseInt(id);
    });
   
   url = '{{route('professionalchange',["id"=>'ids'])}}';
    url = url.replace('ids',ids);
    
   // url: "ajax.aspx?ajaxid=4",
 //url = '{{route('professionalchange',["id"=>'ids'])}}';
    
    $.ajax({
      url: url,
      type: 'get',
      dataType: 'json',
      data: {
      
        "_token": "{{ csrf_token() }}" },
      success: function(response){
        
        var html='';
        html+='<option class="form-control" value="">......Select ' + response[0].name + ' .......</option>';
       
       
       for(var i=0;i<response[0].topic.length;i++){
           
          html+='<option class="form-control" value="'
           + response[0].topic[i].id  +'">' + response[0].topic[i].name + '</option>';
       }
    $('#professional_id').html(html);
                                
          
      }
    });
    });
  });

</script>
                 
                            
              
@endsection