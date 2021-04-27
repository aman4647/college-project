<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Dashboard- Indoor Utilities</title>
  <!-- Bootstrap core CSS-->
  <link href="{{URL::to('backend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="{{URL::to('backend/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="{{URL::to('backend/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="{{URL::to('backend/css/sb-admin.css')}}" rel="stylesheet">
</head>

<body class="fixed-nav bg-dark sticky-footer" id="page-top" style="background-color: #217ed3;">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark  fixed-top" id="mainNav" style="background-color: #217ed3;">
    <a class="navbar-brand" href="{{route('home')}}">Home</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion" style="backround:rgb(0 123 255 / 29%);">
        @if(@Auth::user()->role)
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="{{route('admin.dashboard')}}">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        @endif
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="{{route('customer.profile')}}">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Profile</span>
          </a>
        </li>
        
        @if(@Auth::user()->role)
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">Customers</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti">
            <li>
              <a href="{{route('user.index')}}">View</a>
            </li>
            <li>
              <a href="{{route('user.create')}}">Create</a>
            </li>
            
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">Services</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti2">
            <li>
              <a href="{{route('service.index')}}">View</a>
            </li>
            <li>
              <a href="{{route('service.create')}}">Create</a>
            </li>
            
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti1" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">Professionals</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti1">
            <li>
              <a href="{{route('professional.index')}}">View</a>
            </li>
            <li>
              <a href="{{route('professional.create')}}">Create</a>
            </li>
            
          </ul>
        </li>

        

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti3" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">Orders</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti3">
            <li>
              <a href="{{route('booking.index')}}">View</a>
            </li>
            
            
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti4" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-folder"></i>
            <span class="nav-link-text">Sliders</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti4">
            <li>
              <a href="{{route('slider.index')}}">View</a>
            </li>
            <li>
              <a href="{{route('slider.create')}}">Create</a>
            </li>
            
          </ul>
        </li>
        @else

        
         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMultif" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-folder"></i>
            <span class="nav-link-text">Orders</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMultif">
            <li>
              <a href="{{route('customerbooking.index')}}">View</a>
            </li>
            <li>
              <a href="{{route('customerbooking.create')}}">Create</a>
            </li>
            <li>
              <a href="{{route('customerfeedback')}}">Feedbacks</a>
            </li>
            
          </ul>
        </li>

        @endif
      </ul>


      <ul class="navbar-nav sidenav-toggler" style="background-color: rgb(0 123 255 / 29%); ">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        @if(@Auth::user()->role)
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="d-lg-none">Messages
              <span class="badge badge-pill badge-primary">12 New</span>
            </span>
            <span class="indicator text-danger d-none d-lg-block" style="font-size: 16px;">
              {{Helper::contact()}} new
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">New Messages:</h6>
            <div class="dropdown-divider"></div>
      <?php $contacts= Helper::contacts(); ?>
             @foreach($contacts as $con)
            <a class="dropdown-item" >
              <strong>{{$con->fname}} {{$con->lname}} </strong>
              <span class="small float-right text-muted">{{$con->created_at}}</span>
              <div class="dropdown-message small">{{$con->description}}</div>
            </a>
            @endforeach
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="{{route('contact.index')}}">View all messages</a>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alerts
              <span class="badge badge-pill badge-warning">6 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              {{Helper::feedback()}} new
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">Feedbacks:</h6>
            <div class="dropdown-divider"></div>
<?php $feedbacks= Helper::feedbacks(); ?>
@foreach($feedbacks as $feed)
            <a class="dropdown-item">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-down fa-fw"></i>{{$feed->professional['name']}}</strong>
              </span>
              <span class="small float-right text-muted">{{$feed->created_at}}</span>
              <div class="dropdown-message small">{{$feed->description}}</div>
            </a>
            <div class="dropdown-divider"></div>
            @endforeach
            
            <a class="dropdown-item small" href="{{route('feedback.index')}}">View all feedbacks</a>
          </div>
        </li>
        
        <li class="nav-item">
          <form method="post" action="{{route('backend.search')}}"class="form-inline my-2 my-lg-0 mr-lg-2">
            @csrf
            <div class="input-group">
              <input class="form-control" required name="search" type="text" placeholder="Search for...">
              <span class="input-group-append">
                <button class="btn btn-primary" type="submit">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li>
        @endif
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      @yield('body')
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>© <?php $d= date("Y");?>{{$d}} Indoor Utilities</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            



             <a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <button class="btn btn-primary" type="button">Logout</button>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="{{URL::to('backend/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{URL::to('backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{URL::to('backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <!-- Page level plugin JavaScript-->
    <script src="{{URL::to('backend/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{URL::to('backend/vendor/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{URL::to('backend/vendor/datatables/dataTables.bootstrap4.js')}}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{URL::to('backend/js/sb-admin.min.js')}}"></script>
    <!-- Custom scripts for this page-->
    <script src="{{URL::to('backend/js/sb-admin-datatables.min.js')}}"></script>
    <script src="{{URL::to('backend/js/sb-admin-charts.min.js')}}"></script>
  </div>
</body>

</html>
