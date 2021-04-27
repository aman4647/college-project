@extends('backend.master')
@section('body')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
  </li>
 <li class="breadcrumb-item active">Messages </li>
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
                      <th>Name</th>
                      <th>Phone</th>
                      <th>Email</th>
                      <th>Description</th>
                      <th>Opration</th>
                      </tr>
                  </thead>




                  <tfoot>
                    <tr>
                      <th>S.N</th>
                      <th>Name</th>
                      <th>Phone</th>
                      <th>Email</th>
                      <th>Description</th>
                      <th>Operation</th>
                    </tr>
                  </tfoot>

                 <tbody style="text-align:center;">
                  @if(count($slider)>0)
                     @foreach ($slider as $index=>$sli)
                                   
                  
                    
                   <tr>
                      <td>{{ ++$index}} </td>
                      <td>{{$sli->fname}} {{ $sli->lname}}</td>
                       <td>{{ $sli->phone}} </td>
                       <td>{{ $sli->email}} </td>
                        <td>{!! $sli->description!!} </td>
                        <td><button class="btn btn-sm warning" data-toggle="modal"
                            data-target="#m-{{ $sli->id }}" ui-toggle-class="bounce"
                            ui-target="#animate">
                        Delete</i>
                    </button> </td>

                    <div id="m-{{ $sli->id }}" class="modal fade" data-backdrop="true">
    <div class="modal-dialog" id="animate">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation</h5>
            </div>
            <div class="modal-body text-center p-lg">
                <p>
                    Are you sure you want to Delete?
                    <br>
                    <strong>{{$sli->fname}} {{$sli->lname}}</strong>
                </p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" 
                        data-dismiss="modal">Cancel</i></button>
                        <form action="{{route(
                         'contact.destroy', $sli->id)}}" method="POST">
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
  <div class="card-footer small text-muted"></div>
</div>   
          
       

@endsection