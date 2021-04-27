@extends('backend.master')
@section('body')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
  
 <li class="breadcrumb-item active">Feedback and Rating </li>
</ol>

@include('alert')

            <div class="card mb-3">
            <div class="card-header">
              
              </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                
               <thead>
                    <tr>
                      <th>S.N</th>
                      <th>Professional Name</th>
                      <th>Rating</th>
                      <th>Description</th>
                      <th>Opration</th>
                      </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>S.N</th>
                      <th>Professional Name</th>
                      <th>Rating</th>
                      <th>Description</th>
                      <th>Opration</th>
                    </tr>
                  </tfoot>

                 <tbody style="text-align:center;">
                  @if(count($slider)>0)
                     @foreach ($slider as $index=>$sli)
                                   
                  
                    
                   <tr>
                      <td>{{ ++$index}} </td>
                      <td>  {{ $sli->professional['name']}} </td>
                       <td>{{ $sli->rating}} </td>
                        <td>{!! $sli->description!!} </td>
                        <td><a href="{{route('feedback.edit',[$sli->id])}}">Edit</a></td>
                </tr>
             @endforeach
             @endif
          
        </tbody>
      </table>
    </div>
  </div>
  <div class="card-footer small text-muted"></div>
</div>   
          
       

@endsection