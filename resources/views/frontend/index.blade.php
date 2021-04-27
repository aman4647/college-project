@extends('frontend.master')
@section('body')

<div data-autoplay="false" data-slide-effect="fade" class="swiper-container swiper-slider">
      <div class="swiper-wrapper">
   @if(count($slider)>0)
   @foreach($slider as $sli)
        <div class="swiper-slide"><img src="{{URL::to('gallery/'.$sli->image)}}" alt="" width="1920" height="600"/>
          <div class="swiper-slide-caption">
            <div class="shell text-center text-sm-left">
              <div class="range"style="margin-left: 0px;">
            <div class="cell-sm-8 cell-md-8 cell-lg-9">
                  <h1><br class="veil reveal-sm-block">
                    {{$sli->name}}</h1>
                  <div class="swiper-slide-text">
                    <h5 class="text-style-1">{!!$sli->description!!}</h5>
                  </div>
                  <div class="offset-top-35"><a href="#" class="btn btn-primary btn-mod-1">Make An Appointment</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
	@endforeach
	@endif
        
      </div>
      <div class="swiper-pagination-wrap">
        <div class="shell">
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </div>
    <section class="section-md-80">
      <div class="shell">
        <div class="range">
          <div class="cell-xs-6 cell-sm-3">
            <div class="counter-wrap"><span class="icon icon-lg icon-primary linecons-like"></span>
              <div class="counter-value">
                <p class="h3"><span data-from="0" data-to="100" class="counter">100%</span><span class="symbol">%</span></p>
              </div>
              <div class="divider-center divider-md divider-denim"></div>
              <div class="counter-text">
                <p class="text-style-2">Satisfaction Guaranteed</p>
              </div>
            </div>
          </div>
          <div class="cell-xs-6 cell-sm-3 offset-top-45 offset-xs-top-0">
            <div class="counter-wrap"><span class="icon icon-lg icon-primary linecons-small58"></span>
              <div class="counter-value">
                <p class="h3"><span data-from="0" data-to="10" class="counter">10</span></p>
              </div>
              <div class="divider-center divider-md divider-denim"></div>
              <div class="counter-text">
                <p class="text-style-2">Years on Market</p>
              </div>
            </div>
          </div>
          <div class="cell-xs-6 cell-sm-3 offset-top-45 offset-sm-top-0">
            <div class="counter-wrap"><span class="icon icon-lg icon-primary linecons-user12"></span>
              <div class="counter-value">
                <p class="h3"><span data-from="0" data-to="{{$all['happy']}}" class="counter">{{$all['happy']}}</span></p>
              </div>
              <div class="divider-center divider-md divider-denim"></div>
              <div class="counter-text">
                <p class="text-style-2">Happy Customers</p>
              </div>
            </div>
          </div>
          <div class="cell-xs-6 cell-sm-3 offset-top-45 offset-sm-top-0">
            <div class="counter-wrap"><span class="icon icon-lg-variant-1 icon-primary linecons-tv1"></span>
              <div class="counter-value">
                <p class="h3"><span data-from="0" data-to="{{$all['completed']}}" class="counter">{{$all['completed']}}</span></p>
              </div>
              <div class="divider-center divider-md divider-denim"></div>
              <div class="counter-text">
                <p class="text-style-2">Items of Equipment Repaired</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    @if(count($service)>0)
    <section>
      <div class="section-60 bg-gradient-denim">
        <div class="bg-diamond-element"></div>
        <div class="shell text-center">
          <div class="range">
            <div class="cell-xs-12">
              <h2>Our Services</h2>
              <p class="big">You can rest assured that repairs are only performed with your prior approval of the work</p>
            </div>
          </div>
        </div>
      </div>
      <div class="section-top-40 section-bottom-1 section-sm-bottom-1">
        <div class="shell-wide shell-mod-1">
          <div class="range">
            <div data-arrows="true" data-loop="true" data-dots="false" data-swipe="true" data-items="1" data-sm-items="3" data-md-items="3" data-lg-items="4" data-xl-items="6" data-slide-to-scroll="1" data-mobile-center-mode="true" data-sm-center-mode="false" data-center-padding="30px" data-sm-center-padding="0.5" class="slick-slider slick-slider-style-1">
            @foreach($service as $servi)
              <div class="item height-fill">
                <div class="product"><a href="{{route('service',$servi->url)}}" class="product-image"><img src="{{URL::to('gallery/'.$servi->image)}}" alt="{{$servi->name}}" width="340" height="227"/></a>
                  <div class="product-caption">
                    <div class="divider divider-sm divider-primary"></div>
                    <div class="product-title">
                      <h5><a href="{{route('service',$servi->url)}}">{{$servi->name}} </a></h5>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
              
              
            </div>
          </div>
        </div>
        
      </div>
    </section>
    @endif
    
    @if(count($professional)>0)
    <section class="section-1 section-sm-top-1 section-sm-bottom-100">
      <div class="shell">
        <div class="range text-center">
          <div class="cell-xs-12">
            <h2 style="font-size: 25px;color:white;"><u>Our Professionals</u></h2>
            <!-- <div class="divider divider-md divider-primary"></div> -->
          </div>
        </div>
        <div class="range">
          <div data-items="1" data-sm-items="2" data-md-items="3" data-lg-items="4" data-stage-padding="15" data-loop="true" data-margin="30" data-nav="false" data-dots="true" data-md-dots-each="2" class="owl-carousel">
         @foreach($professional as $pro)
            <div class="item">
              <blockquote class="quote-variant-1">
                <div class="quote-meta">
                  <div class="unit unit-spacing-xs unit-middle unit-horizontal">
                    <div class="unit-left">
                      <img src="{{URL::to('gallery/'.$pro->image)}}" alt="" width="60" height="60" class="img-circle"/>
                    <!-- <figure class="quote-image"><img src="{{URL::to('frontend/images/47x47.jpg')}}" alt="" width="47" height="47"/> </figure> -->
                    </div>
                    <div class="unit-body"> <cite style="color:#d5f5f5;">{{$pro->name}}</cite>
                      <p class="small" style="color:black;">{{$pro->services}}</p>
                    </div>
                  </div>
                </div>
                <div class="quote-body">
                  <p> <q>{!!$pro->description!!}</q> </p>
                </div>
              </blockquote>
            </div>
       @endforeach
            
          </div>
        </div>
      </div>
    </section>
    @endif
@endsection