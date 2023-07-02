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
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="">
    <title>Famms - Fashion HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />
    <!-- font awesome style -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.layouts.header')
        <!-- end header section -->

        <div class="content-wrapper">
            <div class="card-body">
                <table class="table table-borderd table-striped">
                    <tr style="background: #f7444e">
                        <th>Product Title</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>

                    <tbody>
                        <?php $total_price = 0; ?>
                        @foreach ($cart as $cart)
                            <tr>
                                <td>{{ $cart->product_title }}</td>
                                <td>{{ $cart->quantity }} <br>
                                </td>
                                <td>{{ $cart->price }}</td>
                                <td><img style="width: 40px; height: 40px; border-radius: 100%;"
                                        src="{{ asset('images/products/' . $cart->product_image) }}" alt="">
                                </td>

                                <td>
                                    <a href="{{ route('cart.delete', $cart->id) }}" class="btn btn-danger"
                                        onclick="return confirm('Are You Sure To Remove This Product?')">Remove Item
                                    </a>
                                </td>

                            </tr>
                            <?php $total_price += $cart->price; ?>
                        @endforeach
                    </tbody>
                </table>
                <div style="text-align: center; background:#f7444e;">
                    <div>
                        <h5><b>Total Price : {{ $total_price }}</b></h5>
                    </div>
                </div>
                <div style="text-align: center;">
                    <form action="{{ route('orders.make_order') }}" method="POST">
                        @csrf
                    <input type="submit" value="Order Now">
                    </form>
                </div>
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
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <!-- custom js -->
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    @livewireScripts
</body>


</html>
