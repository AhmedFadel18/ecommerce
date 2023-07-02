<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    @include('admin.includes.styles')
    @livewireStyles
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.includes.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin.includes.navbar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="card-body">
                        <h3 style="padding-left: 50%; padding-bottom: 10px;">All Orders</h3>
                        <div style="padding-left:45%; padding-bottom:10px;">
                            <form action="{{ route('orders.search') }}" method="get">
                                @csrf
                                <input type="text" placeholder="write something to search" name="search">
                                <input type="submit" value="search" class="btn btn-info">
                            </form>
                        </div>

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Price</th>
                                    <th>Delivery Status</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                    <th>Print</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total_price=0; ?>
                                @forelse ($order as $order)
                                    <tr>
                                        <td>{{ $order->name }}</td>
                                        <td>{{ $order->phone }}</td>
                                        <td>{{ $order->address }}</td>
                                     <td>{{ $total_price+=$cart->price }}</td>
                                        <td>{{ $order->delivery_status }}</td>
                                        <td>
                                            <img src="{{ asset('images/products/' . $order->image) }}" alt="">
                                        </td>
                                        <td>
                                            @if ($order->delivery_status == 'processing')
                                                <a href="{{ route('orders.delivered', $order->id) }}"
                                                    class="btn btn-primary"
                                                    onclick="return confirm('Are You Sure This Order Has Delivered?')">Delivered</a>
                                            @else
                                                <p style="color: darksalmon;">delivered</p>
                                            @endif
                                            <td>
                                                          <a href="{{ route('orders.print', $order->id) }}"
                                                class="btn btn-secondary">Print Order</a>
                                            </td>

                                        </td>
                                    </tr>

                            @empty
                            <tr style="background: lightskyblue;">
                                <td style="padding-left: 50%;" colspan="16">
                                   Not Data Found
                                </td>
                            </tr>

                            @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    @include('admin.includes.scripts')
    @livewireScripts
</body>

</html>
