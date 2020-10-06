<!--
   =========================================================
   * Argon Dashboard - v1.1.1
   =========================================================
   
   * Product Page: https://www.creative-tim.com/product/argon-dashboard
   * Copyright 2019 Creative Tim (https://www.creative-tim.com)
   * Licensed under MIT (https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md)
   
   * Coded by Creative Tim
   
   =========================================================
   
   * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>
         Argon Dashboard - Free Dashboard for Bootstrap 4 by Creative Tim
      </title>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <!-- Favicon -->
      <link href="{{asset('KMDtemplate/assets/img/brand/favicon.png')}}" rel="icon" type="image/png">
      <!-- Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
      <!-- Icons -->
      <link href="{{asset('KMDtemplate/assets/js/plugins/nucleo/css/nucleo.css')}}" rel="stylesheet" />
      <link href="{{asset('KMDtemplate/assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet" />
      <!-- CSS Files -->
      <link href="{{asset('KMDtemplate/assets/css/argon-dashboard.css?v=1.1.1')}}" rel="stylesheet" />
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
      <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
      <style>
      
  .note-editor .btn-toolbar button[data-event="showImageDialog"] {
          display: none !important;
      }

      .note-editor .btn-toolbar button[data-event="showVideoDialog"] {
          display: none !important;
      }

      .bg-gradient-primary {
    background: linear-gradient(87deg, #081e9e 0, #5e6ce4 100%) !important;
}

.navbar-vertical .navbar-brand-img, .navbar-vertical .navbar-my-brand>img {
    max-width: 100% !important;
    max-height: 5rem!important;
}
@media (max-width: 990px) {
       .navbar-vertical .navbar-brand-img, .navbar-vertical .navbar-my-brand>img {
    max-width: 100% !important;
    max-height: 2rem!important;
}
      
      }

      </style>
   </head>
   <body class="" >
      <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
        <div class="container-fluid">
          <!-- Toggler -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <!-- Brand -->
          <a class="navbar-my-brand pt-0" href="/">
            
             <img src="{{asset('KMDtemplate/image/logo46.png')}}"  >
          </a>
          <!-- User -->
          <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
              <a class="nav-link nav-link-icon d-none" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-bell-55"></i>
              </a>
              <div class="dropdown-menu d-none dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="{{asset('KMDtemplate/assets/img/theme/team-1-800x800.jpg')}}">
                  </span>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                <!-- <div class=" dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <a href="./examples/profile.html" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>My profile</span>
                </a>
                <a href="./examples/profile.html" class="dropdown-item">
                  <i class="ni ni-settings-gear-65"></i>
                  <span>Settings</span>
                </a>
                <a href="./examples/profile.html" class="dropdown-item">
                  <i class="ni ni-calendar-grid-58"></i>
                  <span>Activity</span>
                </a>
                <a href="./examples/profile.html" class="dropdown-item">
                  <i class="ni ni-support-16"></i>
                  <span>Support</span>
                </a>
                <div class="dropdown-divider"></div> -->
                 <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form1').submit();">
                                               <i class="ni ni-user-run"></i>
                        <span>Logout</span>
                                            </a>

                                            <form id="logout-form1" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
              </div>
            </li>
          </ul>
          <!-- Collapse -->
          <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
              <div class="row">
                <div class="col-6 collapse-brand">
                  <a href="/">
                    <img src="{{asset('KMDtemplate/image/logo45.png')}}">
                  </a>
                </div>
                <div class="col-6 collapse-close">
                  <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                    <span></span>
                    <span></span>
                  </button>
                </div>
              </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-none">
              <div class="input-group input-group-rounded input-group-merge">
                <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fa fa-search"></span>
                  </div>
                </div>
              </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">
             @role('superadmin|student|coordinator|manager')
              <li class="nav-item  active ">
                <a class="nav-link  active " href="/">
                  <i class="ni ni-tv-2 text-primary"></i> Dashboard
                </a>
              </li>
              @endrole
               @role('superadmin')
               <li class="nav-item mt-4">
                <a class="nav-link " href="{{route('academic.index')}}">
                  <i class="ni ni-planet text-blue"></i> Academic
                </a>
              </li>
               <li class="nav-item mt-4">
                  <a class="nav-link " href="{{route('faculty.index')}}">
                    <i class="ni ni-planet text-blue"></i> Faculty
                  </a>
                </li>
              <li class="nav-item mt-4">
                <a class="nav-link " href="{{route('supermanager.index')}}">
                  <i class="ni ni-planet text-blue"></i> Marketing Manger
                </a>
              </li>
              <li class="nav-item mt-4">
                <a class="nav-link " href="{{route('coordinator.index')}}">
                  <i class="ni ni-pin-3 text-orange"></i> Faculty-Manager
                </a>
              </li>
              <li class="nav-item mt-4">
                <a class="nav-link " href="{{route('student.index')}}">
                  <i class="ni ni-single-02 text-yellow"></i> Student
                </a>
              </li>
              <li class="nav-item mt-4">
                <a class="nav-link " href="">
                  <i class="ni ni-bullet-list-67 text-red"></i> Guest
                </a>
              </li>
              @endrole
              <li class="nav-item mt-4">
                <a class="nav-link " href="{{route('announcelist')}}">
                  <i class="ni ni-bullet-list-67 text-red"></i> Announce
                </a>
              </li>
            </ul>
            <!-- Divider -->
            <!-- <hr class="my-3">
             Heading
            <h6 class="navbar-heading text-muted">Management</h6>
             Navigation
            <ul class="navbar-nav mb-md-3">
              <li class="nav-item">
                <a class="nav-link" href="{{route('announcelist')}}">
                  <i class="ni ni-spaceship"></i> Announces
                </a>
              </li>
              
            </ul> -->
          </div>
        </div>
      </nav>
      <div class="main-content">
    <!-- Navbar -->
            <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
              <div class="container-fluid">
                <!-- Brand -->
                <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="/dashboard">Dashboard</a>
                <!-- Form -->
                <!-- <form class="navbar-search d-none navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
                  <div class="form-group mb-0">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                      </div>
                      <input class="form-control" placeholder="Search" type="text">
                    </div>
                  </div>
                </form> -->
                <!-- User -->
                <ul class="navbar-nav align-items-center d-none d-md-flex">
                  <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                          <img alt="Image placeholder" src="{{asset('KMDtemplate/assets/img/theme/team-4-800x800.jpg')}}">
                        </span>
                        <div class="media-body ml-2 d-none d-lg-block">
                          <span class="mb-0 text-sm  font-weight-bold">
                            
                            {{Auth::check() ? Auth::user()->name:'unknow'}}
                          </span>
                        </div>
                      </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                      <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome!</h6>
                      </div>
                      
                
                      <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form1').submit();">
                                               <i class="ni ni-user-run"></i>
                        <span>Logout</span>
                                            </a>

                                            <form id="logout-form1" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                    </div>
                  </li>
                </ul>
              </div>
            </nav>
    <!-- End Navbar -->
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <!-- <div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Traffic</h5>
                      <span class="h2 font-weight-bold mb-0">350,897</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-chart-bar"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">New users</h5>
                      <span class="h2 font-weight-bold mb-0">2,356</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="fas fa-chart-pie"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
                    <span class="text-nowrap">Since last week</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Sales</h5>
                      <span class="h2 font-weight-bold mb-0">924</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                    <span class="text-nowrap">Since yesterday</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>
                      <span class="h2 font-weight-bold mb-0">49,65%</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                        <i class="fas fa-percent"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
          </div> -->
        </div>
      </div>
    </div>
    <div class="container-fluid mt--7">
      {{$slot}}
      <!-- Footer -->
    </div>
      <footer class="footer">
        
         
            <div class="copyright text-center text-muted">
              &copy; 2020 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">ewsdcw</a>
            </div>
          
          
        
      </footer> 
    </div>
  </div>
  <!-- <footer class="footer">
        <div class="row align-items-center justify-content-xl-end">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
              &copy; 2020 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">ewsdcw</a>
            </div>
          </div>
          
        </div>
      </footer> -->

      <!--  -->

      
      <!--   Core   -->
  <script src="{{asset('KMDtemplate/assets/js/plugins/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('KMDtemplate/assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <!--   Optional JS   -->
 <!--  <script src="{{asset('KMDtemplate/assets/js/plugins/chart.js/dist/Chart.min.js')}}"></script>
  <script src="{{asset('KMDtemplate/assets/js/plugins/chart.js/dist/Chart.extension.js')}}"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script> -->
  <!-- <script src="https://cdn.jsdelivr.net/gh/emn178/chartjs-plugin-labels/src/chartjs-plugin-labels.js"></script> -->
  <script src="https://rawgit.com/moment/moment/2.2.1/min/moment.min.js"></script>
  <!--   Argon JS   -->
  <!-- <script src="{{asset('KMDtemplate/assets/js/argon-dashboard.js')}}"></script> -->
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script>
  <script>
    $('document').ready(function(){
        $('.summernote').summernote({
                toolbar: [
                  // [groupName, [list of button]]
                  ['style', ['bold', 'italic', 'underline', 'clear']],
                  ['font', ['strikethrough', 'superscript', 'subscript']],
                  ['fontsize', ['fontsize']],
                  ['color', ['color']],
                  ['para', ['ul', 'ol', 'paragraph']],
                  ['height', ['height']]
                ],
                air: [
    ['color', ['color']],
    ['font', ['bold', 'underline', 'clear']],
    ['para', ['ul', 'paragraph']],
    ['table', ['table']],
    ['insert', ['link', 'picture']]
  ]
              });

            //adding announce
            $('.btn-new').click(function(){
              $('#announce-add1').removeClass('d-none');
              
              $('#showTable').addClass('d-none');
            })
    })
  </script> 
  {{$script}}
</body>

</html>