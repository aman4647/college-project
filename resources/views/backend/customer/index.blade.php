@extends('backend.master')
@section('body')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
  
 <li class="breadcrumb-item active">Orders </li>
</ol>

@include('alert')

            <div class="card mb-3">
            <div class="card-header">
              
            <a class="btn btn-primary" href="{{ route('customerbooking.create') }}"> Create</a>   </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                
               
                
                  <thead>
                    <tr>
                      <th>S.N</th>
                      <th>Service Title</th>
                      <th>Professional Name</th>
                      <th>Condition</th>
                      <th>Description</th>
                      <th>Operation</th>
                     </tr>
                  </thead>




                  <tfoot>
                    <tr>
                      <th>S.N</th>
                      <th>Service Title</th>
                      <th>Professional Name</th>
                      <th> Condition</th>
                      <th>Description</th>
                      <th>Operation</th>
                    </tr>
                  </tfoot>

                 <tbody style="text-align:center;">
                  @if(count($slider)>0)
                     @foreach ($slider as $index=>$sli)
                                   
                  
                    
                   <tr>
                      <td>{{ ++$index}} </td>
                       <td>{{ $sli->service['name']}} </td>
                       <td> @isset($sli->professional_id)
                           @if($sli->professional_id!=0){{ $sli->professional['name']}} @endif @endisset</td>
                        <td><strong>@if($sli->type==1)Cancel @elseif($sli->type==2) Processing @elseif($sli->type==3) Completed @endif</strong></td>
                       
                        <td>{!! $sli->description!!} </td>
                   
                    <td>
                    	@if($sli->type=='')
                         <a href="{{route('customerbooking.edit',[$sli->id])}}">Edit</a>&nbsp;
                         
                         
                       <button class="btn btn-sm warning" data-toggle="modal"
                            data-target="#m-{{ $sli->id }}" ui-toggle-class="bounce"
                            ui-target="#animate">
                        Cancel</i>
                    </button> 
                    @endif 
                    @if($sli->type==3)
                    @if($sli->fbdone==1)
                    <a class="btn btn-primary" href="{{route('feedbackedit',['id'=>$sli->id])}}">FB Edit</a>
                    @else
                    <a class="btn btn-primary" href="{{route('feedbackcreate', ['id'=>$sli->id])}}">FB Send </a>
                    @endif
                    @endif
                   
     </td>




<div id="m-{{ $sli->id }}" class="modal fade" data-backdrop="true">
    <div class="modal-dialog" id="animate">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation</h5>
            </div>
            <div class="modal-body text-center p-lg">
                <p>
                    Are you sure you want to cancel?
                    <br>
                    <strong>{{$sli->service['name']}}</strong>
                </p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" 
                        data-dismiss="modal">No</i></button>
                        <form action="{{route(
                         'customerbooking.destroy', $sli->id)}}" method="POST">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-primary" type="submit">Yes</i></button>
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