<!DOCTYPE HTML>
<html lang="en">
    
    <head>
        @include('partials.headerStatic')
        <!-- BEGIN STYLESHEETS -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/all.css') }}">
        <!-- Additional CSS includes -->
        @yield('override_css')
        <!-- END STYLESHEETS -->
    </head>
    
    <body>

        @yield('content')
                      
        <!-- BEGIN JAVASCRIPT -->
        <!--JS lib-->
        <script src="{{ URL::asset('js/app.js') }}"> </script> 
        <!-- Other JS -->
        <script src="{{ URL::asset('js/custom.js') }}"> </script>   
        <!-- END JAVASCRIPT -->

        @yield('footer')
        
    </body>
</html>