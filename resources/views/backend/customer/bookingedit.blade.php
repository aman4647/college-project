@extends('backend.master')
@section('body')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
  
  <li class="breadcrumb-item">
    <a href="{{ route('customerbooking.index') }}"> Orders</a>
  </li>
  <li class="breadcrumb-item active">Edit </li>
</ol>
@include('alert')

  <div class="card mb-3" style="padding:20px;">
  <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{route('customerbooking.update',[$booking->id])}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PUT"> 
        
      
            
        <div class="form-group">
          <div class="row">
            <div class="col-md-2">
            <label class="control-label " for="academic">Select Service: <span style="color: red">*</span></label>
            </div>
            <div class="col-md-4" >
              <select class="form-control" id="" name="service_id">
                        @if(old('service_id') == "")
                                <option class="form-control" value="" @if ($booking->service_id == '') selected="selected" @endif>---selete service--</option>         
                            @foreach($service as $item)
                                <option class="form-control" value="{{$item->id}}" @if ($booking->service_id == $item->id) selected="selected" @endif>{{$item->name}} </option>
                            @endforeach
                        @else
                            <option class="form-control" value=""  @if(old('service_id') == '') selected="selected" @endif >----select service-----</option>         
                                @foreach($service as $item)
                                <option class="form-control" value="{{$item->id}}" @if (old('service_id') == $item->id) selected="selected" @endif>{{$item->name}}</option>                                             
                            @endforeach 
                        @endif   
                        
                </select>
             </div>
            </div>
        </div>  
        <div class="form-group">
          <div class="row">
            <div class="col-md-2">
            <label class="control-label " for="academic">Select Professional: <span style="color: red">*</span></label>
            </div>
            <div class="col-md-4" >
              <select class="form-control" id="professional_id" name="professional_id">
                        @if(old('professional_id') == "")
                                <option class="form-control" value="" @if ($booking->professional_id == '') selected="selected" @endif>---selete Professional--</option>         
                            @foreach($professional as $item)
                                <option class="form-control" value="{{$item->id}}" @if ($booking->professional_id == $item->id) selected="selected" @endif>{{$item->name}} </option>
                            @endforeach
                        @else
                            <option class="form-control" value=""  @if(old('professional_id') == '') selected="selected" @endif >----select professional-----</option>         
                                @foreach($professional as $item)
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
                            <label class="control-label " for="academic">Description </label>
                        </div>
                        <div class="col-md-8">
                            <textarea required type="text" class="form-control" name="description" id="description" rows="10" cols="30"value="{{ $booking->description }}">{{ $booking->description }}</textarea>
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