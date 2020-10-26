<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>
    ewsd
  </title>

  <!-- Bootstrap core CSS -->
  <link href="{{asset('KMDtemplate/blog/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{asset('KMDtemplate/blog/blogHome/css/blog-home.css')}}" rel="stylesheet">
  <link href="{{asset('KMDtemplate/assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet" />
  

  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    
  <style type="text/css">
    #more  {display:  none;}
    body{
      min-height: 100vh;
    }
    #page-content{
      flex:1 0 auto;
    }
  </style>
</head>

<body class="d-flex flex-column">
<div id="page-content">
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top" >
    <div class="container">
      
        <img src="{{asset('KMDtemplate/image/llogo.png')}}" style="width: 10%">
      
      
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link text-dark" href="/announce" >Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link text-dark" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="#">Services</a>
          </li> -->
          @if(!Auth::check())
          <li class="nav-item">
            <a class="nav-link text-dark" href="{{route('login')}}">Sign in</a>
          </li>
           <li class="nav-item">
            <a class="nav-link text-dark" href="{{route('register')}}">Sing Up</a>
          </li>
          @else
          
           @role('superadmin|student|coordinator|manager')
              <li class="nav-item  active ">
                <a class="nav-link  active " href="/">
                  <i class="ni ni-tv-2 text-primary"></i> Dashboard
                </a>
              </li>
              @endrole

          <li class="nav-item dropdown">
                                <a id="navbarDropdown " class="nav-link text-dark dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container mt-2">

   {{$slot}}
    <!-- /.row -->

  </div>
  <!-- /.container -->
</div>
  <!-- Footer -->
  <footer class="py-5 mt-2 " style="background-color: #2c4ba0;">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; ewsdcw 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('KMDtemplate/blog/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('KMDtemplate/blog/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
  {{$script}}
</body>


</html>
