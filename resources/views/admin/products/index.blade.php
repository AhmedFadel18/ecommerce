<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    @include('admin.includes.styles')

    <style type="text/css">
        .divCenter {
            text-align: center;
            padding-top: 40px;
        }
    </style>
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
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="content-wrapper">
                    <div class="divCenter">
                        <div>
                            <a href="{{ route('products.create') }}" class="btn btn-primary float-right">Add Product</a>
                        </div>
                        <div class="card-body">
                            <h3>All Products</h3>
                            <table class="table table-borderd table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Category</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Discount</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->title }}</td>
                                            <td>{{ $product->description }}</td>
                                            <td>{{ $product->category }}</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->discount }}</td>
                                            <td>
                                                <img src="{{ asset('images/products/' . $product->image) }}">
                                            </td>
                                            <td>
                                                <a href="{{ route('products.edit' , $product->id) }}"
                                                    class="btn btn-warning btn-sm">Edit</a>
                                                <a onclick="return confirm('Are You Sure To Delete This Category?')"
                                                    href="{{ route('products.delete', $product->id) }}"
                                                    class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- content-wrapper ends -->
                    <!-- partial:partials/_footer.html -->
                    <!-- partial -->
                </div>
                @include('admin.includes.footer')
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
    </div>
        <!-- container-scroller -->


        <!-- plugins:js -->
        @include('admin.includes.scripts')
        @livewireScripts
</body>

</html>
