<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>
            </h2>
        </div>

        <form action="{{ route('product.search') }}" method="GET">
            @csrf
            <input type="text" name="search" style="">
            <input type="submit" value="search">
        </form>

        @if (session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{ session()->get('message') }}
            </div>
        @endif

        <div class="row">
            @foreach ($product as $item)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="{{ route('product.show', $item->id) }}" class="option1">
                                    Details
                                </a>
                                <form action="{{ route('cart.add', $item->id) }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input style="width: 100px;" type="number" name="quantity" value="1"
                                                min="1">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="submit" value="Add To Cart">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="{{ asset('images/products/' . $item->image) }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                {{ $item->title }}
                            </h5>
                            @if ($item->discount != null)
                                <h5 style="color: #f7444e">

                                    ${{ $item->discount }}
                                </h5>
                                <h6 style="text-decoration: line-through; color:blue">
                                    ${{ $item->price }}
                                </h6>
                            @else
                                <h5 style="color: #f7444e">
                                    ${{ $item->price }}
                                </h5>
                            @endif

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <span style="padding-top: 10px; ">
            {{ $product->links('pagination::bootstrap-5') }}
        </span>
        <div class="btn-box">
            <a href="">
                View All products
            </a>
        </div>
    </div>
</section>
