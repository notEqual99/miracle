@extends('layouts.app')

@section('content')
<div class="container posts">
    <div class="row">
        <div class="col-md-3">
            <section class="panel">
                <div class="panel-body">
                <form action="{{route('search.products')}}" method="POST" role="search">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" class="form-control" name="q"
                            placeholder="Search products" required> <span class="input-group-btn">
                            <button type="submit" class="btn btn-default">
                            <span class="icon-search"></span>
                            </button>
                        </span>
                    </div>
                </form>
                </div>
            </section>
            <hr>
            
            <section class="panel">
                <header class="panel-heading">
                <h5>Filter</h5>
                </header>
                <div class="panel-body">
                    <form action="{{route('filter.products')}}" role="form product-form" method="post">
                        @csrf
                        <div class="form-group mt-2">
                            <label>Category</label>
                            <select name="category_id" class="browser-default form-control" style="-webkit-appearance: menulist-button; width: 231px; height: 34px; font-size: 12px;">
                                <option value="0">Select Category</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->category_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <label>Type</label>
                            <select name="type_id" class="form-control hasCustomSelect" style="-webkit-appearance: menulist-button; width: 231px; height: 34px; font-size: 12px;">
                            <option value="0">Select Type</option>
                                @foreach($types as $type)
                                <option value="{{ $type->id }}">
                                    {{ $type->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <label>Sell Type</label>
                            <select name="sell_type" class="form-control hasCustomSelect" style="-webkit-appearance: menulist-button; width: 231px; height: 34px; font-size: 12px;">
                                <option value="0">Select Type</option>
                                <option value="normal">Normal</option>
                                <option value="customize">Customize</option>
                                <option value="customize">Both</option>
                            </select>
                        </div>
                        <button class="btn mt-2 mb-5" type="submit">Search</button>
                    </form>
                </div>
            </section>

            <!-- <section class="panel">
                <header class="panel-heading">
                    Category
                </header>
                <div class="panel-body">
                    <ul>
                        <li></li>
                    </ul>
                </div>
            </section>
            <section class="panel">
                <header class="panel-heading">
                    Price Range
                </header>
                <div class="panel-body sliders">
                    <div id="slider-range" class="slider"></div>
                    <div class="slider-info">
                        <span id="slider-range-amount"></span>
                    </div>
                </div>
            </section> -->
            <!-- <section class="panel">
                <header class="panel-heading">
                    Best Seller
                </header>
                <div class="panel-body">
                    <div class="best-seller">
                        <article class="media">
                            <a class="pull-left thumb p-thumb">
                                <img src="https://via.placeholder.com/250x220/FFB6C1/000000" />
                            </a>
                            <div class="media-body">
                                <a href="#" class="p-head">Item One Tittle</a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </article>
                        <article class="media">
                            <a class="pull-left thumb p-thumb">
                                <img src="https://via.placeholder.com/250x220/A2BE2/000000" />
                            </a>
                            <div class="media-body">
                                <a href="#" class="p-head">Item Two Tittle</a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </article>
                        <article class="media">
                            <a class="pull-left thumb p-thumb">
                                <img src="https://via.placeholder.com/250x220/6495ED/000000" />
                            </a>
                            <div class="media-body">
                                <a href="#" class="p-head">Item Three Tittle</a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </article>
                    </div>
                </div>
            </section> -->
        </div>
        @include('includes.alert')
        <div class="col-md-9">
            <!-- <section class="panel">
                <div class="panel-body">
                    <div class="pull-right">
                        <ul class="pagination pagination-sm pro-page-list">
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">»</a></li>
                        </ul>
                    </div>
                </div>
            </section> -->
            @if(count($products) > 0)
                <h4 class="mb-4">Current available craft products</h4>
                <div class="row product-list">
                    @foreach($products as $product)
                    <div class="col-md-4 text-center product-frame">
                        <section class="card product">
                            <div class="pro-img-box">
                                <a href="#">
                                    <img class="product-image" src="{{asset('/public/images/products/thumbnail/'.$product->firstimage) }}" style="width:250px;height:220px;" alt="product's photo">
                                    <!-- <img src="https://via.placeholder.com/250x220/FFB6C1/000000" alt="" /> -->
                                </a>
                            </div>
        
                            <div class="panel-body text-center">
                                <h6 class="card-title mt-2">
                                    <a class="product-header" href="#">
                                        {{$product->name}}
                                    </a>
                                </h6>
                                <div class="price m-3">
                                    <span>Normal - {{$product->normal_price}} MMK</span><br>
                                    <span>Customize - {{$product->customize_price }} MMK</span>
                                </div>
                                <a href="{{route('product', $product->id)}}" class="btn">details</a>
                                <!-- <div class="product-wishlist" title="add to wishlist">
                                    @if($product->wishlist == "false")
                                        <i class="heart fa fa-heart"></i>
                                    @else
                                        <i class="heart-fill fa fa-heart"></i>
                                    @endif
                                </div> -->
                            </div>
                        </section>
                    </div>
                    @endforeach
                </div>
                <br>
                <div class="d-flex justify-content-center">
                    {!! $products->links() !!}
                </div>
            @else
                <h4>Sorry! no posts found.</h4>
            @endif
        </div>
    </div>
</div>

    <!-- toastr.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>
    <script>
        $(document).ready(function() {
            toastr.options.timeOut = 10000;
            @if (Session::has('error'))
                toastr.error('{{ Session::get('error') }}');
            @elseif(Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @endif
        });
    
    </script>
@endsection
