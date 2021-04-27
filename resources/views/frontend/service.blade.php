@extends('frontend.master')
@section('body')
<section class="section-40 section-lg-64 bg-gray-lighter">
      <div class="breadcrumbs-wrap">
        <div class="shell text-center">
          <div class="wrap-sm-justify-horizontal">
            <div class="text-sm-left">
              <h1>Services</h1>
            </div>
            <div class="offset-top-22 offset-sm-top-0 text-sm-right">
              <ul class="breadcrumbs-custom">
                <li><a href="{{route('home')}}">Home</a></li>
                <li class="active">Services</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    

    <section class="section-60 section-sm-top-90 section-sm-bottom-110">
      <div class="shell">
        <div class="range range-sm-right">
          <div class="cell-xs-12">
            <div data-custom-hash="true" class="responsive-tabs responsive-tabs-default responsive-tabs-vertical responsive-tabs-vertical-1 responsive-tabs-primary">
              
              <div class="resp-tabs-container">
              	
                <div class="tab">
                  <div class="box-custom-variant-1">
                    <div class="box-header">
                      <h3>{{$service->name}}</h3>
                    </div>
                    <div class="box-image"><img src="{{URL::to('gallery/'.$service->image)}}" alt="" width="146" height="156"/> </div>
                    <div class="box-content"><button class="btn btn-primary" > <a href="{{route('bookingserpro',['service'=>$service->url,'professor'=>'xyz'])}}" style="color:white;"> order service </a></button>

                      

                      <address class="contact-info-inline">
                      <p>or call us</p>
                      <a href="callto:#" class="link link-md link-dark">9841309709</a>
                      </address>
                    </div>
                  </div>
                  <div class="container-fluid" style="padding-bottom: 5px;"> 
                  {!!$service->description!!}
                  </div>
                </div>

  
                
              </div>
            </div>
          </div>


          @if(count($professional)>0)

          <div class="cell-sm-8 cell-md-12 offset-top-5 offset-sm-top-40">
            <div class="container text-danger">
                  <h4 style="text-align:center;"> Recommendated Professionals </h4>
                </div><br/>
          	<div class="range range-condensed">
              <div data-items="1" data-sm-items="3" data-md-items="3" data-lg-items="4" data-stage-padding="0" data-loop="true" data-margin="30" data-sm-margin="73" data-nav="false" data-dots="true" data-sm-dots-each="2" class="owl-carousel owl-carousel-centered">
                
          @foreach($professional as $profe)
              @if(!is_int($profe))
                <div class="item"><a href="{{route('bookingserpro',['service'=>$service->url,'professor'=>$profe->name])}}" class="link-image link-image-variant-2"><img src="{{URL::to('gallery/'.$profe->image)}}" alt="" width="175" height="39" class="img-responsive"></a><h6> {{$profe->name}} <p style="color:red;font-size: 15px;">Rating: {{$profe->rating}}</p></h6></div>
                @endif
              @endforeach
               
              </div>
            </div>
            
          </div>
          @endif
        </div>
      </div>
    </section>
    



@endsection