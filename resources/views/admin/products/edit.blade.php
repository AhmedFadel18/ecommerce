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

        label {
            display: inline-block;
            width: 200px;
        }

        .div_design {
            padding-bottom: 10px;
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
                <div class="content-wrapper">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <div class="divCenter">
                        <div class="card-body">
                            <h3>Edit Product</h3>
                            <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label>Product Title : </label>
                                    <input type="text" name="title" value="{{ $product->title }}"
                                        placeholder="Enter product title">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Product Discription : </label>
                                    <input type="text" value="{{ $product->description }}" name="description"
                                        placeholder="Enter product discription">
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Product Price : </label>
                                    <input type="number" value="{{ $product->price }}" name="price" min="0"
                                        placeholder="Enter product price">
                                    @error('price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Product Discount Price : </label>
                                    <input type="number" value="{{ $product->discount }}" min="0"
                                        name="discount" placeholder="Enter product discount">
                                </div>
                                <div class="form-group">
                                    <label>Product Quantity : </label>
                                    <input type="number" value="{{ $product->quantity }}" min="0"
                                        name="quantity" placeholder="Enter product quantity">
                                    @error('quantity')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Product Category : </label>
                                    <select name="category">
                                        @foreach ($category as $category)
                                        <option value="{{ $product->category }}" >
                                            {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Corrent Product Image : </label>
                                    <img src="{{ asset('/images/products/' . $product->image) }}"
                                        style="margin: auto; width:100px; height:100px;">
                                </div>
                                <div class="form-group">
                                    <label>Product Image : </label>
                                    <input type="file"  name="image">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" value="Update Product" class="btn btn-success">
                                </div>
                        </div>
                        </form>
                    </div>
                </div>

                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                @include('admin.includes.footer')
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
    </div>
    <!-- page-body-wrapper ends -->
    <!-- container-scroller -->

    <!-- plugins:js -->
    @include('admin.includes.scripts')
    @livewireScripts
</body>

</html>
