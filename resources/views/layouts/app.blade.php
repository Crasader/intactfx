<!DOCTYPE HTML>
<html lang="en">
    
    <head>
        
        @include('partials.headerStatic')
        <!-- BEGIN STYLESHEETS -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
        <link href='https://fonts.googleapis.com/css?family=Didact+Gothic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="{{ asset('css/smart_template/font-awesome.min.css') }}">
        
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/all.css') }}">

        <!-- <link rel="stylesheet" href="{{ asset('css/smart_template/your_style.css') }}"> -->

        <script type="text/javascript">
            function googleTranslateElementInit() {
            new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, multilanguagePage: true}, 'google_translate_element');
            }
        </script>

        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        
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
            <!-- END JAVASCRIPT -->

            @yield('override_js')

        </div>

        @yield('footer')
    </body>
</html>