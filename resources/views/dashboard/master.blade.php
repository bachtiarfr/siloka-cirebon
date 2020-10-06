<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SILOKA Admin - Sistem Informasi Pengelolaan Kalibrasi Peralatan</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

    {{-- select 2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel"">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse"">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li>
                        <a href="{{('/master-data')}}"> <i class="menu-icon fa fa-tasks"></i>Master Data</a>
                    </li>
                    <li>
                        <a href="{{url('/data-eksternal')}}"> <i class="menu-icon fa fa-building-o"></i>Perusahaan Eksternal</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{asset('assets/images/logo1.png')}}" alt="LOGO">
                    </a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        {{ Auth::user()->name }}

                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="{{asset('assets/images/user.png')}}" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            @guest
                            <div class="nav-link">
                                <a class="connection-item" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </div>
                            @if (Route::has('register'))
                            <div class="nav-link">
                                <a class="connection-item" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </div>
                            @endif
                            @else
                            @endguest 
                            <div class="nav-link">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"> {{ __('Logout') }}
                                </a>
                                <form class="nav-link" id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- /#header -->
        <!-- Content -->
        <div class="content" style="margin-bottom: -40px">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <a href="{{url('/lab-pengujian')}}">
                            <div class="card" style="background: rgb(79, 182, 241 , 0.4);">
                                <div class="card-body lab-menu">
                                    <div class="stat-widget-five">
                                        <div class="stat-icon dib flat-color-1">
                                            <img src="{{asset('assets/images/noun_Microscope_3456683.svg')}}" alt="" style="height: 70px">
                                            {{-- <i class="pe-7s-cash"></i> --}}
                                        </div>
                                        <div class="stat-content">
                                            <div class="text-left dib">
                                                <div class="stat-text">Laboratorium</div>
                                                <div class="stat-text">Pengujian</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </a>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <a href="{{url('/lab-kalibrasi')}}">
                            <div class="card" style="background:rgb(111, 207, 151, 0.4)">
                                <div class="card-body lab-menu">
                                    <div class="stat-widget-five">
                                        <div class="stat-icon dib flat-color-2">
                                            <img src="{{asset('assets/images/noun_balance_2486642 (1) 1.svg')}}" alt="" style="height: 70px">
                                        </div>
                                        <div class="stat-content">
                                            <div class="text-left dib">
                                                <div class="stat-text">Laboratorium</div>
                                                <div class="stat-text">Kalibrasi</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <a href="{{url('/early-warning-system')}}">
                            <div class="card" style="background:rgb(242, 153, 74, 0.4)">
                                <div class="card-body lab-menu">
                                    <div class="stat-widget-five">
                                        <div class="stat-icon dib flat-color-4">
                                            <img src="{{asset('assets/images/warning.svg')}}" alt="" style="height: 70px">
                                        </div>
                                        <div class="stat-content">
                                            <div class="text-left dib">
                                                <div class="stat-text">Early Warning</div>
                                                <div class="stat-text">Systems</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- /Widgets -->
                <!-- /#add-category -->
            </div>
            <!-- .animated -->
        </div>
        @yield('content')
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; 2020 SILOKA
                    </div>
                    <div class="col-sm-6 text-right">
                        Designed by <a href="https://https://bachtiarfr.github.io/">Bachtiar Fatur Rohim</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    {{-- chart js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>
    <script src="{{asset('assets/js/init/chartjs-init.js')}}"></script>
    

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="{{asset('assets/js/init/fullcalendar-init.js')}}"></script>
    <script src="{{asset('js/jquery.js')}}"></script>
    
    <script src="{{asset('assets/js/lib/data-table/datatables.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/jszip.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('assets/js/init/datatables-init.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.js"></script>
</body>
<script>
(function ($) {
    // console.log(audio_url);  
    
    EarlyWarningSystem()
    
    function EarlyWarningSystem() {
      var audio_url = "{{asset('assets/audio/alarm.mpeg')}}";
      var audioElement = document.createElement('audio');
      audioElement.setAttribute('src', 'http://www.soundjay.com/misc/sounds/bell-ringing-01.mp3');
      
      audioElement.addEventListener('ended', function() {
          this.play();
      }, false);
      
      audioElement.addEventListener("canplay",function(){
          $("#length").text("Duration:" + audioElement.duration + " seconds");
          $("#source").text("Source:" + audioElement.src);
          $("#status").text("Status: Ready to play").css("color","green");
      });
      
      audioElement.addEventListener("timeupdate",function(){
          $("#currentTime").text("Current second:" + audioElement.currentTime);
      });
      
      $('.play').click(function() {
          console.log('clicked');
          audioElement.play();
          Swal.fire({
            title: 'STOP?',
            text: "STOP ALARM!",
            icon: 'warning',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Stop Alarm!'
          }).then((result) => {
            audioElement.pause();
            audioElement.currentTime = 0;
          })
        });
      
      $('#stop').click(function() {
          audioElement.pause();
          audioElement.currentTime = 0;
          $("#status").text("Status: Paused");
      });    
    }

})(jQuery);

</script>
</html>
