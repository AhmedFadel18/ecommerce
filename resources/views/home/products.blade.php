<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="{{asset ('images/favicon.png') }}" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset ('css/bootstrap.css') }}" />
      <!-- font awesome style -->
      <link href="{{asset ('css/font-awesome.min.css') }}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset ('css/style.css') }}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset ('css/responsive.css') }}" rel="stylesheet" />
   </head>
   <body>
      <div class="hero_area">
   
         <!-- header section strats -->
         @include('home.layouts.header')
         <!-- end header section -->

        <!-- product section -->
        @include('home.layouts.product')
        <!-- end product section -->

        <!-- subscribe section -->

        <!-- footer start -->
        @include('home.layouts.footer')
        <!-- footer end -->
        <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

         </p>
      </div>
      <!-- jQery -->
     <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
      <!-- popper js -->
      <script src="{{ asset ('js/popper.min.js') }}"></script>
      <!-- bootstrap js -->
      <script src="{{ asset ('js/bootstrap.js') }}"></script>
      <!-- custom js -->
      <script type="text/javascript">

document.addEventListener("DOMContentLoaded", function(event) {
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>

      <script src="{{ asset ('js/custom.js') }}"></script>
      <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

      @livewireScripts
   </body>
</html>
