<!DOCTYPE HTML>
<html lang="en">
    
    <head>
        @include('partials.headerStatic')
        <!-- BEGIN STYLESHEETS -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
        <link rel="stylesheet" href="{{ asset('css/smart_template/font-awesome.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/all.css') }}">
        <link rel="stylesheet" href="{{ asset('css/smart_template/your_style.css') }}">
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
            <script src="{{ URL::asset('js/custom.js') }}"> </script>
            <script src="{{ asset('js/customscript.js') }}"></script>
            <!-- END JAVASCRIPT -->

        </div>

        @yield('footer')
    </body>
</html>