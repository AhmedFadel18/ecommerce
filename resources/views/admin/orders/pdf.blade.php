<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order</title>
</head>
<body>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Product Title</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Delivery Status</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{ $order->address }}</td>
                                <td>{{ $order->product_title }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->price }}</td>
                                <td>{{ $order->delivery_status }}</td>
                                <td>
                                    <img src="{{ asset('images/products/' . $order->image) }}" alt="">
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    @include('admin.includes.scripts')

</body>
</html>
