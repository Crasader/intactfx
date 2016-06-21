<!DOCTYPE HTML>
<html lang="en">
    
    <head>
        
        @include('partials.headerStatic')
        <!-- BEGIN STYLESHEETS -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
        <link href='https://fonts.googleapis.com/css?family=Didact+Gothic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="{{ asset('css/smart_template/font-awesome.min.css') }}">
        
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/all.css') }}">

        <!-- Additional CSS includes -->
        @yield('override_css')
        <!-- END STYLESHEETS -->
        @include('scripts.globals')
    </head>
    
    <body>
        <div id="intactfx-app" v-cloak>
        
            @yield('content')
                          
            <!-- BEGIN JAVASCRIPT -->
            <!--JS lib-->
            <script src="{{ URL::asset('js/app.js') }}"> </script> 
            <!-- Other JS -->

            <!-- END JAVASCRIPT -->
            <script src="{{ URL::asset('js/bootstrap-datetimepicker.js') }}"> </script> 
            
            @yield('override_js')

        </div>

        @yield('footer')
    </body>
</html>