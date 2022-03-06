@extends('layouts.app')

@section('content')
<div class="container product-detail">
    <div class="row">
        <div class="col-lg-8 mr-auto ml-auto">
            <div class="product-info row">
                <div class="col-md-10">
                    <h3 class="mb-4">{{$product->name}}</h3>
                    <!-- Carousel Card -->
                    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                        <div class="carousel-indicators m-2">
                            @for ($i = 0; $i <  ($imgCount); $i++)
                                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="{{$i}}" class="active" aria-current="true" aria-label="Slide 1"></button>
                            @endfor
                        </div>
                        <div class="carousel-inner">
                            @foreach($images as $key=>$image)
                                <div class="carousel-item {{$key == 0 ? 'active' : '' }}" data-bs-interval="2500">
                                <img src="{{asset('/public/images/products/'.$image) }}" style="width:400px;height:300px;"
                                alt="First slide" class="imgDetail d-block img-fluid p-1" alt="...">
                                <!-- <div class="carousel-caption d-none d-md-block">
                                    <h5>First slide label</h5>
                                    <p>Some representative placeholder content for the first slide.</p>
                                </div> -->
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>                        
                    <!-- End Carousel Card -->
                </div>
                
                <div class="col-md-10 m-3">
                    <button class="tag m-2">
                        <span>{{$product->categories->category_name}}</span>
                    </button>
                    <button class="tag m-2">
                        <span>{{$product->type->name}}</span>
                    </button>
                </div>

                <div class="class-md-10">
                    <p>lworren ssi upmg skdjf lsdf kfsldkf kjdfs lsdjk In need of a button, but not the hefty background colors they bring? Replace the default modifier classes with the .btn-outline-* ones to remove all background images and colors on any button.</p>
                </div>
            </div>
        </div>

        <div class="addToCartForm col-lg-4">
            @include('includes.alert')
            <ul class="nav nav-tabs" id="myTab">
                <li class="active">
                    <a href="#normal">
                        <div style="margin: 0;" class="checkbox">
                            <label style="float: left; padding: 15px;">
                                <input style="display: inline-block;" type="checkbox" id="product" value="normal" checked/>
                                <div style="display: inline-block;">Normal</div>
                            </label>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#customize">
                        <div style="margin: 0;" class="checkbox">
                            <label style="float: left; padding: 15px;">
                                <input style="display: inline-block;" type="checkbox" id="product" value="customize" />
                                <div style="display: inline-block;">Customize</div>
                            </label>
                        </div>
                    </a>
                </li>
            </ul>
        
            <div id='content' class="tab-content">
                <div class="tab-pane active" id="normal">
                    <form action="{{route('add.normal', $product->id)}}" method="post">
                        @csrf
                        <!-- @method('PUT') -->
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                Prices - <strong>{{$product->normal_price}}</strong> MMK
                            </li>
                            <li class="list-group-item">
                                Current Instock - <strong>{{$product->instock_no}}</strong> nos
                            </li>
                            <li class="list-group-item">
                                Color - 
                            </li>
                            <li class="list-group-item">
                                Quantity
                                <div class="row mt-2">
                                    <div class="col-sm-6">
                                    <input type="number" name="quantity" class="form-control" min="1" max="{{$product->instock_no}}" {{old('quantity')}} value="1">
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- <a href="#" class="btn">Add To Cart</a> -->
                                        @if($product->instock_no == 0)
                                            <button class="submit" disabled>Add To Cart</button>
                                        @else
                                            <button class="submit">Add To Cart</button>
                                        @endif
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </form>
                    <div class="product-wishlist">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                @if($product->wishlist == "false")
                                    <form action="{{route('add.wishlist', $product->id)}}" method="post">
                                    {{csrf_field()}}
                                    {{method_field('post')}}
                                        <button type="submit">
                                            <i class="heart fa fa-heart"></i>
                                            Add to wishlist
                                        </button>
                                    </form>
                                @else
                                    <form action="{{route('remove.wishlist', $product->id)}}" method="post">
                                    {{csrf_field()}}
                                    {{method_field('Delete')}}
                                        <button type="submit">
                                            <i class="heart-fill fa fa-heart"></i>
                                            Remove from wishlist
                                        </button>
                                    </form>
                                @endif
                            </li>
                        </ul>        
                    </div>
                </div>
                <div class="tab-pane" id="customize">
                    <form action="{{route('add.customize', $product->id)}}" method="post">
                        @csrf
                        <!-- @method('PUT') -->
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                Prices - <strong>{{$product->customize_price}}</strong> MMK
                            </li>
                            <li class="list-group-item">
                                Waiting Time - <strong>{{$product->waiting_time}}</strong> days per piece
                            </li>
                            <li class="list-group-item">
                                Color - 
                            </li>
                            <li class="list-group-item">
                                Quantity
                                <div class="row mt-2">
                                    <div class="col-sm-6">
                                    <input type="number" name="quantity" class="form-control" min="1" max="{{$product->instock_no}}" {{old('quantity')}} value="1">
                                    </div>
                                    <div class="col-sm-6">
                                        @if($product->customize_price == 0)
                                            <button class="submit" disabled>Add To Cart</button>
                                        @else
                                            <button class="submit">Add To Cart</button>
                                        @endif
                                        <!-- <a href="#"  class="btn">Add To Cart</a> -->
                                    </div>
                                </div>
                            </li>
                        </ul>
                    <form>            
                </div>
                <!-- <div class="tab-pane" id="settings"><h1>hello</h1></div> -->
            </div>
        </div>
    </div>
</div>
<script>
    $('#myTab li').click(function (e) {
     // e.preventDefault();
        $(this).find('a').tab('show');
     // $(this).tab('show');
         $(this).closest('ul').find('input[type="checkbox"]').prop('checked','');
         $(this).closest('li').find('input[type="checkbox"]').prop('checked','checked');
       
    });
</script>
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