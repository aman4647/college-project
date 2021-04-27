@extends('backend.master')
@section('body')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
  </li>
 <li class="breadcrumb-item active">Service </li>
</ol>

@include('alert')

            <div class="card mb-3">
            <div class="card-header">
              
            <a class="btn btn-primary" href="{{ route('service.create') }}"> Create</a>   </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                
               
                
                  <thead>
                    <tr>
                      <th>S.N</th>
                      <th>Title</th>
                      <th>Image</th>
                      <th>Description</th>
                      <th>Services</th>
                      <th>Operation</th>
                     </tr>
                  </thead>




                  <tfoot>
                    <tr>
                      <th>S.N</th>
                      <th>Title</th>
                      <th>Image</th>
                      <th>Description</th>
                      <th>Services</th>
                      <th>Operation</th>
                    </tr>
                  </tfoot>

                 <tbody style="text-align:center;">
                  @if(count($slider)>0)
                     @foreach ($slider as $index=>$sli)
                                   
                  
                    
                   <tr>
                      <td>{{ ++$index}} </td>
                       <td>{{ $sli->name}} </td>
                        <td>@if($sli->image!='') <div style="color:green; font-size: 25px;"><img src="{{URL::to('/gallery/'. $sli->image)}}" width="100px" height="80px"> </div>@endif</td>
                       
                        <td>{!! $sli->description!!} </td>
                         <td>{{$sli->services}} </td>
                   
                    <td>
                         <a href="{{route('service.edit',[$sli->id])}}">Edit</a>&nbsp;
                         
                       <button class="btn btn-sm warning" data-toggle="modal"
                            data-target="#m-{{ $sli->id }}" ui-toggle-class="bounce"
                            ui-target="#animate">
                        Delete</i>
                    </button>  
                   
     </td>




<div id="m-{{ $sli->id }}" class="modal fade" data-backdrop="true">
    <div class="modal-dialog" id="animate">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation</h5>
            </div>
            <div class="modal-body text-center p-lg">
                <p>
                    Are you sure you want to delete?
                    <br>
                    <strong>{{$sli->name}}</strong>
                </p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" 
                        data-dismiss="modal">Cancel</i></button>
                        <form action="{{route(
                         'service.destroy', $sli->id)}}" method="POST">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</i></button>
          </form>
            </div>
        </div><!-- /.modal-content -->
    </div>
</div>
                 
     </tr>
             @endforeach
             @endif
          
        </tbody>
      </table>
    </div>
  </div>
  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>   
          
       

@endsection