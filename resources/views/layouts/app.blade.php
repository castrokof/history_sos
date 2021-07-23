<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Tempus SW') }}</title> --}}
    <title>Tempus SW</title>

<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset("assets/lte/plugins/fontawesome-free/css/all.min.css")}}">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
 <!-- Data tables -->

<!-- Theme style -->
<link rel="stylesheet" href="{{asset("assets/lte/dist/css/adminlte.min.css")}}">

<!-- Theme Toastr -->

<!-- Theme Toastr -->



<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">-->
<link rel="stylesheet" href="{{asset("assets/lte/plugins/toastr/toastr.min.css")}}">

@yield("styles")
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

 <style>

 .loader1 {
  position: fixed;
  left: 0px;
  top: 0px;
  width: 100%;
  height: 100%;
  z-index: 9999;
  background: url(../assets/lte/dist/img/loader.gif) 50% 50% no-repeat rgb(249,249,249);

  opacity: 8;
}

 </style>
</head>
<body>
    <div class="loader1"></div>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    HOME TEMPUS
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/home') }}">Direccionados</a>

                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="{{ url('/programado') }}">Programados</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="{{ url('/entregado') }}">Entregados y form repentregados</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="{{ url('/repentregado') }}">Reporte Entregados y form facturado</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="{{ url('/facturado') }}">Facturado</a>
                              </li>
                        </div>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">

            @yield('content')

        </main>
    </div>

 <!-- jQuery -->
<script src="{{asset("assets/lte/plugins/jquery/jquery.min.js")}}"></script>
<!-- Bootstrap 4 -->

<script src="{{asset("assets/lte/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<!-- AdminLTE App -->
<script src="{{asset("assets/lte/dist/js/adminlte.min.js")}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset("assets/lte/dist/js/demo.js")}}"></script>
<!-- Jq Sweet alert cdn -->

<!-- Jq Validate -->

<script src="{{asset("assets/js/jquery-validation/jquery.validate.min.js")}}"></script>
<script src="{{asset("assets/js/jquery-validation/localization/messages_es.min.js")}}"></script>
<script src="{{asset("assets/js/funciones.js")}}"></script>
<script src="{{asset("assets/js/scripts.js")}}"></script>
<script type="text/javascript">

$(window).on("load",function() {
    $(".loader1").fadeOut("slow");
});

</script>
{{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script> --}}
@yield("scriptsPlugins")
</body>
</html>
