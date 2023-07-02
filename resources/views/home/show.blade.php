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
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto; width: 50%; padding: 30px">

            <div class="box">
                <div class="img-box" style="padding: 20px; margin: auto;">
                    <img src="{{ asset('images/products/' . $product->image) }}" style="place-items: center" alt="">
                </div>
                <div class="detail-box">
                    <h5>
                        {{ $product->title }}
                    </h5>
                    @if ($product->discount != null)
                        <h5 style="color: #f7444e">

                            ${{ $product->discount }}
                        </h5>
                        <h6 style="text-decoration: line-through; color:blue">
                            ${{ $product->price }}
                        </h6>
                    @else
                        <h5 style="color: #f7444e">
                            ${{ $product->price }}
                        </h5>
                    @endif
                    <h6>Product Category: {{ $product->category }}</h6>
                    <h6>Product Description: {{ $product->description }}</h6>
                    <form action="{{ route('cart.add',$product->id) }}" method="POST">
                        @csrf
                        <div class="row">
                                 <div class="col-md-4">
                            <input style="width: 100px;" type="number" name="quantity" value="1" min="1">
                        </div>
                        <div class="col-md-4">
                            <input type="submit" value="Add To Cart">
                        </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
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
      <script src="{{ asset ('js/custom.js') }}"></script>
      <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
      @livewireScripts
   </body>
</html>
