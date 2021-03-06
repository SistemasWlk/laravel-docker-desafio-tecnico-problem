<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Painel de Controle</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="{{asset('tema/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('tema/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <link href="{{asset('tema/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('tema/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('tema/css/pages/dashboard.css')}}" rel="stylesheet">
    <link href="{{asset('tema/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('tema/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
</head>
<body>
    @yield('conteudo')
    @include('layouts.footer')
    <!-- Le javascript
    ================================================== --> 
    <!-- Placed at the end of the document so the pages load faster --> 
    <script src="{{asset('tema/js/jquery-1.7.2.min.js')}}"></script> 
    <script src="{{asset('tema/js/excanvas.min.js')}}"></script> 
    <script src="{{asset('tema/js/chart.min.js')}}" type="text/javascript"></script> 
    <script src="{{asset('tema/js/bootstrap.js')}}"></script>
    <script src="{{asset('tema/js/jquery-1.2.6.pack.js')}}"></script>
    <script src="{{asset('tema/js/jquery.maskedinput-1.1.4.pack.js')}}"></script>
    <script language="javascript" type="text/javascript" src="{{asset('tema/js/full-calendar/fullcalendar.min.js')}}"></script>
    <script src="{{asset('tema/js/base.js')}}"></script> 

    @hasSection('javascript')
        @yield('javascript')
    @endif
</body>
</html>
