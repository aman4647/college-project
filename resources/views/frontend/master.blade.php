<!DOCTYPE html>
<html lang="en" class="wide wow-animation">
<head>
<title>Indoor Utilities</title>
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta charset="utf-8">

<meta name="keywords" content="Indoor Utilities">
    <meta name="description" content="Indoor Utilities">
    <link rel="shortcut icon" href="{{url('/gallery/icone.png')}}" type="image/x-icon">
    <link rel="icon" href="{{url('/gallery/icone.png')}}" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->
    
<link rel="icon" href="{{URL::to('frontend/images/favicon.ico')}}" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="{{URL::to('frontend/css/css.css?family=Open+Sans:400,700,400italic,600italic,900')}}">
<link rel="stylesheet" href="{{URL::to('frontend/css/style.css')}}">
<!--[if lt IE 10]>
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="https://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <script src="js/html5shiv.min.js"></script>
		<![endif]-->
</head>
<body>
<div class="page">
  <header class="page-head">
    <div class="rd-navbar-wrap">
      <nav data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-md-layout="rd-navbar-static" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-static" data-stick-up-clone="false" data-md-stick-up-offset="199px" data-lg-stick-up-offset="199px" class="rd-navbar rd-navbar-corporate rd-navbar-dark">
        <div class="rd-navbar-inner">
          <div class="rd-navbar-middle-panel">
            <div class="rd-navbar-panel">
              <button data-rd-navbar-toggle=".rd-navbar-outer-panel" class="rd-navbar-toggle"><span></span></button>
              <img src="{{url('/gallery/logo.png')}}" alt="logo" height="70" width="70">
              <a href="{{route('home')}}" class="rd-navbar-brand">
              <div class="rd-navbar-fixed--hidden"> <span class="logotxt">Indoor Utilities</span> </div>
              <div class="rd-navbar-fixed--visible"> <span class="logotxt">Indoor Utilities</span> </div>
              </a> </div>
            <div class="rd-navbar-aside">
              <div data-rd-navbar-toggle=".rd-navbar-aside" class="rd-navbar-aside-toggle"><span></span></div>
              <div class="rd-navbar-aside-content">
                <ul class="block-wrap-list">
                  <li class="block-wrap">
                    <div class="unit unit-sm-horizontal unit-align-center unit-middle unit-spacing-xxs">
                      <div class="unit-left"><span class="icon icon-circle-sm icon-sm-variant-1 icon-venice-blue-filled icon-white mdi mdi-map-marker"></span></div>
                      <div class="unit-body">
                        <address class="contact-info">
                        <a href="#"><span>Kathmandu, </span><br>
                        <span>Nepal</span></a>
                        </address>
                      </div>
                    </div>
                  </li>
                  <li class="block-wrap">
                    <div class="unit unit-sm-horizontal unit-align-center unit-middle unit-spacing-xxs">
                      <div class="unit-left"><span class="icon icon-circle-sm icon-sm-variant-1 icon-venice-blue-filled icon-white fa-clock-o"></span></div>
                      <div class="unit-body">
                        <address class="contact-info">
                        <span>Mon-Fri: 9:00am-6:30pm</span><span>Sat-Sun: 10:00am-6:00pm</span>
                        </address>
                      </div>
                    </div>
                  </li>
                  <li class="block-wrap">
                    <div class="unit unit-sm-horizontal unit-align-center unit-middle unit-spacing-xxs">
                      <div class="unit-left"><span class="icon icon-circle-sm icon-sm-variant-1 icon-venice-blue-filled icon-white mdi mdi-phone"></span></div>
                      <div class="unit-body">
                        <address class="contact-info">
                        <span><a href="callto:#">9841309709</a></span><span><a href="callto:#">9841309709</a></span>
                        </address>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="rd-navbar-outer-panel">
            <div class="rd-navbar-nav-wrap">
              <ul class="rd-navbar-nav">
                <li class="active"><a href="{{route('home')}}">Home</a> </li>
                <li><a href="#">Services</a>
                  <?php $menu= Helper::sermenu();?>
                  <ul class="rd-navbar-dropdown tabs-nav">
                    @if(count($menu)>0)
                    @foreach($menu as $men)
                    <li><a href="{{route('service', ['service'=>$men->url])}}">{{$men->name}}</a></li>
                    @endforeach
                    @endif
                  </ul>
                </li>
                <li><a href="{{route('contact')}}">Contact</a></li>
                @if (Auth::check())
                <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                @else
                <li><a href="{{route('login')}}">Login</a></li>
                <li><a href="{{route('register')}}">Sign Up As Customer</a></li>
                @endif
				
              </ul>
              <div class="rd-navbar-search">
                <form action="{{route('frontend.search')}}" method="post" data-search-live="rd-search-results-live" class="rd-search">
                  @csrf
                  <div class="form-group">
                    <label for="rd-search-form-input" class="form-label">Search...</label>
                    <input required id="rd-search-form-input" type="text" name="search" autocomplete="off" class="form-control">
                    <div id="rd-search-results-live" class="rd-search-results-live"></div>
                    <button type="submit" class="rd-navbar-search-submit"></button>
                  </div>
                </form>
                <button data-rd-navbar-toggle=".rd-navbar-search" class="rd-navbar-search-toggle"></button>
              </div>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </header>
<main class="page-content">
    @yield('body')
    
 
  </main>
  <footer class="page-foot bg-gray-dark">
    <div class="shell text-center text-sm-left">
      <div class="range range-sm-center">
        <div class="cell-sm-10 cell-md-12">
          <div class="range range-md-justify">
            <div class="cell-sm-6 cell-md-3 wrap-lg-justify-vertical">
              <div class="offset-top-30 offset-sm-top-65">
                <ul class="list-inline list-inline-xs">
                  <li><a href="#" class="icon icon-xs icon-gray fa-facebook"></a></li>
                  <li><a href="#" class="icon icon-xs icon-gray fa-twitter"></a></li>
                  <li><a href="#" class="icon icon-xs icon-gray fa-pinterest-p"></a></li>
                  <li><a href="#" class="icon icon-xs icon-gray fa-vimeo"></a></li>
                  <li><a href="#" class="icon icon-xs icon-gray fa-google"></a></li>
                  <li><a href="#" class="icon icon-xs icon-gray fa-rss"></a></li>
                </ul>
              </div>
            </div>
            <div class="cell-sm-6 cell-md-4 offset-top-55 offset-sm-top-0">
              <div class="max-width-300">
                <h5 class="h5-variant-1">Newsletter</h5>
                <hr>
                <p class="offset-top-22">Keep up with the latest news, special offers and other discount information. Enter your e-mail and subscribe to our newsletter.</p>
                <form data-form-output="form-output-global" data-form-type="subscribe" method="post" action="#" class="rd-mailform rd-mailform-inline rd-mailform-inline-sm offset-top-10">
                  <div class="form-group">
                    <label for="footer-subscribe-email" class="form-label">Enter your e-mail...</label>
                    <input id="footer-subscribe-email" type="email" name="email" data-constraints="@Email @Required" class="form-control">
                  </div>
                  <button type="submit" class="btn btn-xs btn-primary btn-no-shadow">subscribe</button>
                </form>
              </div>
            </div>
            <div class="cell-md-4 cell-lg-5 offset-top-55 offset-md-top-0">
              <div class="range">
                <div class="cell-xs-12">
                  <h5 class="h5-variant-1">Contact Us</h5>
                  <hr>
                </div>
                <div class="cell-xs-5 cell-sm-6 cell-md-12 cell-lg-6 offset-top-18 text-xs-left">
                  <address class="contact-info contact-info-contrast">
                  <div class="unit unit-xs-horizontal unit-spacing-xs">
                    <div class="unit-left icon-adjust-vertical"><span class="icon icon-xs icon-white mdi mdi-phone"></span></div>
                    <div class="unit-body"><span><a href="callto:#">9846564576</a></span><span><a href="callto:#">9818765434</a></span></div>
                  </div>
                  <div class="unit unit-xs-horizontal unit-middle unit-spacing-xs offset-top-22 offset-xs-top-18">
                    <div class="unit-left icon-adjust-vertical"><span class="icon icon-xs icon-white mdi mdi-email-outline"></span></div>
                    <div class="unit-body"><a href="#" class="link-primary-contrast"><span class="__cf_email__" data-cfemail="ed84838b82ad8988808281848386c3829f8a">santosh2020@gmail.com</span></a></div>
                  </div>
                  </address>
                </div>
                <div class="cell-xs-7 cell-sm-6 cell-md-12 cell-lg-6 offset-top-22 offset-xs-top-18 inset-lg-left-9 text-xs-left">
                  <address class="contact-info contact-info-contrast">
                  <div class="unit unit-xs-horizontal unit-spacing-xs">
                    <div class="unit-left icon-adjust-vertical"><span class="icon icon-xs icon-white mdi mdi-map-marker"></span></div>
                    <div class="unit-body"><a href="#" class="nowrap">Pepsicola <br>
                      Kathmandu, Nepal</a></div>
                  </div>
                  <div class="unit unit-xs-horizontal unit-spacing-xs offset-top-22">
                    <div class="unit-left icon-adjust-vertical"><span class="icon icon-xs icon-white mdi fa-clock-o"></span></div>
                    <div class="unit-body"><span>Mon-Fri: 9:00am-6:30pm</span><span>Sat-Sun: 10:00am-6:00pm</span></div>
                  </div>
                  </address>
                </div>
              </div>
            </div>
          </div>
          <div class="range offset-top-55 offset-sm-top-60 offset-lg-top-88">
            <div class="cell-xs-12">
              <p class="text-center">&#169;&nbsp;<span id="copyright-year"></span>&nbsp;All Rights Reserved&nbsp;<a  class="link-gray">Terms of Use and Privacy Policy</a> </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
</div>
<!-- <div id="form-output-global" class="snackbars"></div> -->
<div tabindex="-1" role="dialog" aria-hidden="true" class="pswp">
  <div class="pswp__bg"></div>
  <div class="pswp__scroll-wrap">
    <div class="pswp__container">
      <div class="pswp__item"></div>
      <div class="pswp__item"></div>
      <div class="pswp__item"></div>
    </div>
    <div class="pswp__ui pswp__ui--hidden">
      <div class="pswp__top-bar">
        <div class="pswp__counter"></div>
        <button title="Close (Esc)" class="pswp__button pswp__button--close"></button>
        <button title="Share" class="pswp__button pswp__button--share"></button>
        <button title="Toggle fullscreen" class="pswp__button pswp__button--fs"></button>
        <button title="Zoom in/out" class="pswp__button pswp__button--zoom"></button>
        <div class="pswp__preloader">
          <div class="pswp__preloader__icn">
            <div class="pswp__preloader__cut">
              <div class="pswp__preloader__donut"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
        <div class="pswp__share-tooltip"></div>
      </div>
      <button title="Previous (arrow left)" class="pswp__button pswp__button--arrow--left"></button>
      <button title="Next (arrow right)" class="pswp__button pswp__button--arrow--right"></button>
      <div class="pswp__caption">
        <div class="pswp__caption__cent"></div>
      </div>
    </div>
  </div>
</div>
<script src="{{URL::to('frontend/js/core.min.js')}}"></script> 
<script src="{{URL::to('frontend/js/script.js')}}"></script>
</body>
<!-- End Google Tag Manager -->



<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> -->
</html>