@extends('layouts.app')

@section('override_css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/main-style.css') }}">
@endsection
    
@section('content')

    @include('intactfx.header')

    <section id="main">

        @include('intactfx.main')

        @include('intactfx.account_tabs_head')

        @include('intactfx.account_tabs_content')

    </section><!--/ section main -->

    @include('intactfx.footer') 


    <!-- main modals -->

    <!-- Social Media Modal -->
   @include('modal.social-modal')

    <!-- TransferOut Modal -->
    @include('modal.transferout-modal')    
    
    <!-- TransferIn Modal -->
    @include('modal.transferin-modal')        
   
    <!-- Create Account Modal -->
    @include('modal.createaccount-modal')            

    <!-- Main Wallet Modal -->
    @include('modal.main_wallet_modal')   

    <!-- Commission Wallet Modal -->
    @include('modal.commisionwallet-modal')           

    <!-- Commission Wallet 2 Modal -->
    @include('modal.commisionwallet2-modal')           
    
    <!-- setting modal -->
    @include('modal.setting-modal')           


    <!-- mt4 account modal -->
     @include('modal.miniaccount.mini-account-modal')        
     @include('modal.miniaccount.standard-account-modal')        
     @include('modal.miniaccount.iprofit-account-modal')        
     @include('modal.miniaccount.iprofit-high-account-modal')        
     @include('modal.miniaccount.broker-account-modal')        

     <!-- change pass-->
     @include('modal.changepass-modal')        
    <!-- /main modals -->

@endsection

@section('override_js')

 <script type="text/javascript">

            $(function () {
                $('#datetimepicker1').datetimepicker({
                  format: 'MM/DD/YYYY'
                });
                $('#datetimepicker2').datetimepicker({
                  format: 'MM/DD/YYYY'
                });

                  //dropzone
     //Dropzone.js Options - Upload an image via AJAX.
    // $btn = $('.upload-submit');
    var stat = $('.upload-state-p');

    Dropzone.options.myDropzone = {
        uploadMultiple: false,
        // previewTemplate: '',
        addRemoveLinks: false,
        maxFilesize: 2,
        dictDefaultMessage: '',
        acceptedFiles: '.jpg, .jpeg, .png, .bmp',
        accept: function(file, done) {
                $('.dz-image-preview, .dz-file-preview').hide();
                img = new Image();
                img.src = window.URL.createObjectURL( file );
                img.onload = function() {
                    var width = img.naturalWidth,
                    height = img.naturalHeight;
                    if (width<=1600 && height<=1000 && width>=200 && height>=200){
                        done();                         
                    }else{
                        stat.text('Please upload image less than 1600x1000 or greater than 200x200');
                        $btn.button('reset');
                    }
                }
        },
        init: function() {
            this.on("addedfile", function(file) {
                $btn.button('loading');
            });
            this.on("sending", function(file, xhr, formData) {
              // Will send the filesize along with the file as POST data.
              formData.append("id", $btn.val());
            });
            this.on("thumbnail", function(file, dataUrl) {
                $('.dz-image-preview, .dz-file-preview').hide();
            });
            this.on("success", function(file, res) {
                // $('#img-thumb').attr('src', res.path);
                stat.text('Upload Success')
                $btn.button('reset');
                $btn.html('Uploaded')
                $('.dz-image-preview, .dz-file-preview').hide();

            });
            this.on("error", function(file, res) {
                stat.text(res)
                $btn.button('reset');
                alert(res)
                $('.dz-image-preview, .dz-file-preview').hide();
            })
        }
    };

    var myDropzone = new Dropzone(".my-dropzone");
    
        $('.upload-submit').on('click', function(e) {
            e.preventDefault();
            //trigger file upload select
            $btn = $(this)
            $(".my-dropzone").trigger('click');
        });
        //we want to manually init the dropzone.
        Dropzone.autoDiscover = false;



            });


  
      $(document).ready(function(){
 
            var contentLastMarginLeft = 460;
            $(".toggle-button").click(function() {
 

              var box = $(".sidetab-box-content");
              var newValue = contentLastMarginLeft;
              contentLastMarginLeft = box.css("margin-left");
              box.animate({
                "margin-left": newValue
              }, 500);

              $("a.toggle-button").css("display", "inline-block");
              $("#MainWalletModal #side-tabs").css("bottom", "-7px");


              $("a.toggle-button3").css("display", "none");
              $("a.toggle-button4").css("display", "none");
              $("a.toggle-button5").css("display", "none");
              $("a.toggle-button6").css("display", "none");
              $("a.toggle-button7").css("display", "none");

            });
  
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
 
            var contentLastMarginLeft = 525;
            $(".toggle-button3").click(function() {
 

              var box = $(".sidetab-box-content3");
              var newValue = contentLastMarginLeft;
              contentLastMarginLeft = box.css("margin-left");
              box.animate({
                "margin-left": newValue
              }, 500);

              $("a.toggle-button3").css("display", "inline-block");
              $("#MainWalletModal #side-tabs").css("bottom", "-7px");

              $("a.toggle-button").css("display", "none");
              $("a.toggle-button4").css("display", "none");
              $("a.toggle-button5").css("display", "none");
              $("a.toggle-button6").css("display", "none");
              $("a.toggle-button7").css("display", "none");

            });
  
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
 
            var contentLastMarginLeft = 525;
            $(".toggle-button4").click(function() {
 

              var box = $(".sidetab-box-content4");
              var newValue = contentLastMarginLeft;
              contentLastMarginLeft = box.css("margin-left");
              box.animate({
                "margin-left": newValue
              }, 500);

              $("a.toggle-button4").css("display", "inline-block");
              $("#MainWalletModal #side-tabs").css("bottom", "-7px");

              $("a.toggle-button").css("display", "none");
              $("a.toggle-button3").css("display", "none");
              $("a.toggle-button5").css("display", "none");
              $("a.toggle-button6").css("display", "none");
              $("a.toggle-button7").css("display", "none");

            });
  
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
 
            var contentLastMarginLeft = 525;
            $(".toggle-button5").click(function() {
 

              var box = $(".sidetab-box-content5");
              var newValue = contentLastMarginLeft;
              contentLastMarginLeft = box.css("margin-left");
              box.animate({
                "margin-left": newValue
              }, 500);

              $("a.toggle-button5").css("display", "inline-block");
              $("#MainWalletModal #side-tabs").css("bottom", "-7px");

              $("a.toggle-button").css("display", "none");
              $("a.toggle-button3").css("display", "none");
              $("a.toggle-button4").css("display", "none");
              $("a.toggle-button6").css("display", "none");
              $("a.toggle-button7").css("display", "none");

            });
  
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
 
            var contentLastMarginLeft = 525;
            $(".toggle-button6").click(function() {
 

              var box = $(".sidetab-box-content6");
              var newValue = contentLastMarginLeft;
              contentLastMarginLeft = box.css("margin-left");
              box.animate({
                "margin-left": newValue
              }, 500);

              $("a.toggle-button6").css("display", "inline-block");
              $("#MainWalletModal #side-tabs").css("bottom", "-7px");

              $("a.toggle-button").css("display", "none");
              $("a.toggle-button3").css("display", "none");
              $("a.toggle-button4").css("display", "none");
              $("a.toggle-button5").css("display", "none");
              $("a.toggle-button7").css("display", "none");

            });
  
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
 
            var contentLastMarginLeft = 525;
            $(".toggle-button7").click(function() {
 

              var box = $(".sidetab-box-content7");

            /*  $(".sidetab-box-content6").animate({
                "margin-left": 0
              }, 500);
*/
              var newValue = contentLastMarginLeft;
              contentLastMarginLeft = box.css("margin-left");
              box.animate({
                "margin-left": newValue
              }, 500);

              $("a.toggle-button7").css("display", "inline-block");

              $("#MainWalletModal #side-tabs").css("bottom", "157px");

              $("a.toggle-button").css("display", "none");
              $("a.toggle-button3").css("display", "none");
              $("a.toggle-button4").css("display", "none");
              $("a.toggle-button5").css("display", "none");
              $("a.toggle-button6").css("display", "none");

            });
  
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
 
            var contentLastMarginLeft = 460;
            $(".next-toggle-button").click(function() {
 

              var box = $(".sidetab-box-withdraw-content");
              var newValue = contentLastMarginLeft;
              contentLastMarginLeft = box.css("margin-left");
              box.animate({
                "margin-left": newValue
              }, 500);

              $("a.next-toggle-button").css("display", "inline-block");

              $("a.next-toggle-button2").css("display", "none");
              $("a.next-toggle-button3").css("display", "none");
              $("a.next-toggle-button4").css("display", "none");
              $("a.next-toggle-button5").css("display", "none");
              $("a.next-toggle-button6").css("display", "none");
            });
  
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
 
            var contentLastMarginLeft = 460;
            $(".next-toggle-button2").click(function() {
 

              var box = $(".sidetab-box-withdraw-content2");
              var newValue = contentLastMarginLeft;
              contentLastMarginLeft = box.css("margin-left");
              box.animate({
                "margin-left": newValue
              }, 500);

              $("a.next-toggle-button2").css("display", "inline-block");

              $("a.next-toggle-button").css("display", "none");
              $("a.next-toggle-button3").css("display", "none");
              $("a.next-toggle-button4").css("display", "none");
              $("a.next-toggle-button5").css("display", "none");
              $("a.next-toggle-button6").css("display", "none");
            });
  
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
 
            var contentLastMarginLeft = 460;
            $(".next-toggle-button3").click(function() {
 

              var box = $(".sidetab-box-withdraw-content3");
              var newValue = contentLastMarginLeft;
              contentLastMarginLeft = box.css("margin-left");
              box.animate({
                "margin-left": newValue
              }, 500);

              $("a.next-toggle-button3").css("display", "inline-block");

              $("a.next-toggle-button").css("display", "none");
              $("a.next-toggle-button2").css("display", "none");
              $("a.next-toggle-button4").css("display", "none");
              $("a.next-toggle-button5").css("display", "none");
              $("a.next-toggle-button6").css("display", "none");

            });
  
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
 
            var contentLastMarginLeft = 460;
            $(".next-toggle-button4").click(function() {
 

              var box = $(".sidetab-box-withdraw-content4");
              var newValue = contentLastMarginLeft;
              contentLastMarginLeft = box.css("margin-left");
              box.animate({
                "margin-left": newValue
              }, 500);

              $("a.next-toggle-button4").css("display", "inline-block");

              $("a.next-toggle-button").css("display", "none");
              $("a.next-toggle-button2").css("display", "none");
              $("a.next-toggle-button3").css("display", "none");
              $("a.next-toggle-button5").css("display", "none");
              $("a.next-toggle-button6").css("display", "none");

            });
  
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
 
            var contentLastMarginLeft = 460;
            $(".next-toggle-button5").click(function() {
 

              var box = $(".sidetab-box-withdraw-content5");
              var newValue = contentLastMarginLeft;
              contentLastMarginLeft = box.css("margin-left");
              box.animate({
                "margin-left": newValue
              }, 500);

              $("a.next-toggle-button5").css("display", "inline-block");

              $("a.next-toggle-button").css("display", "none");
              $("a.next-toggle-button2").css("display", "none");
              $("a.next-toggle-button3").css("display", "none");
              $("a.next-toggle-button4").css("display", "none");
              $("a.next-toggle-button6").css("display", "none");
            });
  
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
 
            var contentLastMarginLeft = 460;
            $(".next-toggle-button6").click(function() {
 

              var box = $(".sidetab-box-withdraw-content6");
              var newValue = contentLastMarginLeft;
              contentLastMarginLeft = box.css("margin-left");
              box.animate({
                "margin-left": newValue
              }, 500);

              $("a.next-toggle-button6").css("display", "inline-block");

              $("a.next-toggle-button").css("display", "none");
              $("a.next-toggle-button2").css("display", "none");
              $("a.next-toggle-button3").css("display", "none");
              $("a.next-toggle-button4").css("display", "none");
              $("a.next-toggle-button5").css("display", "none");
            });
  
      });
    </script>

    <script type="text/javascript">
      $(document).ready(function(){
 
            var contentLastMarginLeft = 535;
            $(".next-toggle-button7").click(function() {
 

              var box = $(".sidetab-box-withdraw-content7");
              var newValue = contentLastMarginLeft;
              contentLastMarginLeft = box.css("margin-left");
              box.animate({
                "margin-left": newValue
              }, 500);

              $("a.next-toggle-button7").css("display", "inline-block");

              $("a.next-toggle-button").css("display", "none");
              $("a.next-toggle-button2").css("display", "none");
              $("a.next-toggle-button3").css("display", "none");
              $("a.next-toggle-button4").css("display", "none");
              $("a.next-toggle-button5").css("display", "none");
              $("a.next-toggle-button6").css("display", "none");
            });
  
      });
    </script>

@endsection



    
