@push('css')
@endpush

@extends('layouts.app')

@section('content')
<!-- <div class="content-wrapper mt-5"> -->
    <div class="banner">
            <div class="container">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img class="banner-image d-block img-fluid mt-1" src="{{asset('/public/images/banner/home_banner.png')}}" alt="First slide">
                        </div>
                    </div>
                </div>
            <!-- <h1>Miracle</h1>
            <img src="{{asset('/public/images/banner/home_banner.png')}}" class="banner-image img-fluid" alt="banner image"> -->
        </div>
    </div>
    <div class="new-collection">
        <div class="container">
            <div class="row align-items-start">
                <h3 class="collection-header mt-3 mb-3"><strong>New Collections</strong></h3>
                @foreach($products as $product)
                    <div class="col-xl-3">
                        <img src="{{asset('/public/images/products/thumbnail/'.$product->firstimage) }}" class="ncol-image" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$product->name}}</h5>
                            <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                            <div class="price">
                                <span>Normal - {{$product->normal_price}} MMK</span><br>
                                <span>Customize - {{$product->customize_price }} MMK</span>
                            </div>
                        </div>
                    </div>
                @endforeach
                <p><a href="{{route('product.index')}}">click to see more...</a></p>
            </div>
        </div>
    </div>
    
    <div class="blogs">
        <div class="container">
            <div class="row align-items-start">
                <h3 class="blog-header  mt-3 mb-3"><strong>Blogs</strong></h3>
                    <div class="row g-0">
                        <div class="col-md-10">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="#" class="blog-link">Classicists Crochet</a>
                                </h5>
                                <span>Dec23, 2021</span>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                        <div class="col-md-2 p-3">
                            <img src="https://miro.medium.com/fit/c/112/112/1*UzJ617V0WaUlaWr9-Jr4wA.jpeg" class="img-fluid rounded-start" alt="...">
                        </div>
                    </div>
                    <div class="row g-0">
                        <div class="col-md-10">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="" class="blog-link">How I Crochet My Way Out of Sadness</a>
                                </h5>
                                <span>Dec23, 2021</span>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                        <div class="col-md-2 p-3">
                            <img src="https://miro.medium.com/fit/c/112/112/0*lUiIEcIwo9JvhPqq" class="img-fluid rounded-start" alt="...">
                        </div>
                    </div>
                <p><a href="{{route('blogs')}}">click to see more...</a></p>
            </div>
        </div>
    </div>
<!-- </div> -->

   
@endsection
