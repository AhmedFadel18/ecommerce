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

        .tableCenter {
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 30px;
            border: 3px solid white;
        }
    </style>
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
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <div class="divCenter">
                        <h3>Add Category</h3>
                        <form action="{{ route('category.store') }}" method="POST">
                            @csrf
                            <input type="text" name="name" placeholder="Enter category name">
                            <input class="btn btn-success" type="submit" name="submit" value="Add Category">
                        </form>
                    </div>
                    <div class="divCenter">
                        <h3>All Categories </h3>
                        <div class="row">
                            <table class="tableCenter">
                                <tr>
                                    <td>Name</td>
                                    <td>Action</td>
                                </tr>
                                @foreach ($data as $data)
                                    <tr>
                                        <td>
                                            {{ $data->name }}
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-primary btn-sm">Edit</a>
                                            <a onclick="return confirm('Are You Sure To Delete This Category?')"
                                                href="{{ route('category.delete', $data->id) }}"
                                                class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                @include('admin.includes.footer')
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    @include('admin.includes.scripts')

</body>

</html>
