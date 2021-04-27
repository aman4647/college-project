@extends('frontend.master')
@section('body')
<section class="section-40 section-lg-64 bg-gray-lighter">
      <div class="breadcrumbs-wrap">
        <div class="shell text-center">
          <div class="wrap-sm-justify-horizontal">
            <div class="text-sm-left">
              <h1>Search/{{$search}}</h1>
            </div>
            <div class="offset-top-22 offset-sm-top-0 text-sm-right">
              <ul class="breadcrumbs-custom">
                <li><a href="{{route('home')}}">Home</a></li>
                <li class="active ">Search</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="card mb-3" style="padding:20px;">
  <div class="container-fluid" >
    <?php $index= 0; 
     $val= count($service);
     $val+= count($professional);
     
      ?>

      <p style="color:blue; font-size:20px;">'{{$search}}' Related {{$val}} @if($val>1) Results are @else Result is @endif Found ...............</p>

               
         @if(count($service)>0)
         <div class="container-fluid row" style="padding-bottom: 10px;"><h6><u> Services</u>  </h6> </div>
       <div class="row"> 
            @foreach($service as $co)
           <div class="col-lg-3 col-md-4 row-eq-height">
          <div class="news-item bxw">
            
            <div class="news-item-content">
     
              <a href="{{route('service',$co->url)}}">
                
                <h6>{{ $co->name }}</h6>

              </a>
            </div>
          </div>
        </div>
         @endforeach
       </div>
         @endif
     
      @if(count($professional)>0)
         <hr/>
         <div class="container-fluid row" style="padding-bottom: 10px;"><h6><u> Professional </u></h6></div>
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
             <h6>{{ $use->name }}</h6>

              </div>
          </div>
        </div>
         @endforeach
         </div>
         @endif

    
                        
 </div>
</div>
 
    @endsection