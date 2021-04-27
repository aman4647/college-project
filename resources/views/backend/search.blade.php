  @extends('backend.master')

  @section('body')
  <!-- Breadcrumbs-->
 
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
  </li>
  
  <li class="breadcrumb-item active">{{$search}} </li>
</ol>
  @include('alert')
<div class="card mb-3" style="padding:20px;">
  <div class="container-fluid" >
    <?php $index= 0; 
     $val= count($customer);
     $val+= count($professional);
     $val+= count($service); 
      ?>
  
      <p style="color:blue; font-size:30px;">'{{$search}}' Related {{$val}} @if($val>1) Results are @else Result is @endif Found ...............</p>

               
         @if(count($customer)>0)
         <div class="container-fluid row" style="padding-bottom: 10px;"><a href="{{route('user.index')}}"><h4> Customers  </h4> </a></div>
       <div class="row"> 
            @foreach($customer as $co)
           <div class="col-lg-3 col-md-4 row-eq-height">
          <div class="news-item bxw">
            
            <div class="news-item-content">
     
              <a href="{{route('user.edit',$co->id)}}">
                
                <h4>{{ $co->name }}</h4>

              </a>
            </div>
          </div>
        </div>
         @endforeach
       </div>
         @endif
     
      @if(count($professional)>0)
         <hr/>
         <div class="container-fluid row" style="padding-bottom: 10px;"><a href="{{route('professional.index')}}"><h4> Professional </h4></a></div>
       <div class="row"> 
            @foreach($professional as $use)
           <div class="col-lg-3 col-md-4 row-eq-height">
          <div class="news-item bxw">
            <div class="news-item-img">
                 @if($use->image !="")
                    <img src="{{ URL::to('gallery/'.$use->image) }}" alt="{{ $use->name }}" height="200" width="200" />
                @endif
            </div>
            <div class="news-item-content">
     
              <a href="{{route('professional.edit',$use->id)}}">
                
                <h4>{{ $use->name }}</h4>

              </a>
            </div>
          </div>
        </div>
         @endforeach
         </div>
         @endif

    
    @if(count($service)>0)
    <hr/>
         <div class="container-fluid row" style="padding-bottom: 10px;"><a href="{{route('service.index')}}"><h4> Services  </h4></a></div>
       <div class="row"> 
            @foreach($service as $cat)
           <div class="col-lg-3 col-md-4 row-eq-height">
          <div class="news-item bxw">
            <div class="news-item-img">
                 @if($cat->image !="")
                    <img src="{{ URL::to('gallery/'.$cat->image) }}" alt="{{ $cat->name }}" height="200" width="200" />
                @endif
            </div>
            <div class="news-item-content">
     
              <a href="{{route('service.edit',$cat->id)}}">
                
                <h4>{{ $cat->name }}</h4>

              </a>
            </div>
          </div>
        </div>
         @endforeach
       </div>
         @endif
     
                  

                        
 </div>
</div>
 
@endsection