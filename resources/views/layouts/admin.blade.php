<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8"> 
    <title>Test Application</title>
    <link rel="icon" href="{{ asset("favicon.png") }}" type="image/x-png" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}" >
          
    <link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("css/main.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("css/icons.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("css/font-awesome.min.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("css/dataTables.bootstrap.css") }}" rel="stylesheet" />
    <link href="{{ asset("css/global.css") }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{ asset("css/summernote.css") }}">
    <link rel="stylesheet" href="{{ asset("css/dropzone.css") }}">

    <script src="{{ asset("js/jquery.min.js") }}" type="text/javascript"></script>
    <script src="{{ asset("js/bootstrap.min.js") }}" type="text/javascript"></script>
    <script src="{{ asset("js/bootstrap-hover-dropdown.min.js") }}" type="text/javascript"></script>
    <script src="{{ asset("js/app.min.js") }}" type="text/javascript"></script>

    <script src="{{ asset("js/jquery.dataTables.min.js") }}"></script>
    <script src="{{ asset("js/dataTables.bootstrap.min.js") }}"></script>
    <script src="{{ asset("js/custom.js") }}" type="text/javascript"></script>
    
    <script src="{{ asset("js/notify.min.js") }}" type="text/javascript"></script>
    <script src="{{ asset("js/notify-metro.js") }}" type="text/javascript"></script>

    <script src="{{ asset("js/summernote.min.js") }}"></script>
    <script src="{{ asset("js/dropzone.js") }}"></script>
    <script src="{{ asset("js/bootstrap-filestyle.min.js") }}"></script>

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
    <link rel="stylesheet" href="{{ asset("css/morris.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("css/chosen.css")}}">
    <script src="{{ asset("js/chosen.jquery.js")}}" type="text/javascript"></script>

    <link rel="stylesheet" href="{{ asset("js/colorbox/colorbox.css")}}" /> 
    <script src="{{ asset("js/colorbox/jquery.colorbox.js")}}"></script>
    @yield('head')
  </head>
  <body class="sidebar-mini">
    <div class="wrapper">        
        <div id="loading-box"></div>
        @section('header')
            @include('admin.partial.header') 
        @show        
       
        @section('navigation')
            @include('admin.partial.navigation')
        @show
  
        @if(Session::has('status'))
            <script type="text/javascript"> 
                $.notify({
                    title: '',
                    text: "{{ Session::get('message') }}"
                }, {
                    style: 'metro',
                    className: "{{ Session::get('status') }}",
                    autoHide: true,
                    clickToHide: true
                });
            </script> 
        @endif
        
        @yield('content')    
      
    </div> 
    
  </body>
</html>
 
 