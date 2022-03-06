@extends('account')

@section('content')
    <div class="col-md-9">
        <div class="container">
            <div class="wrapper">
                @include('includes.alert')
                <div class="wishlist">
                @if(count($products) > 0)
                    <h4>Your Wishlist</h4>
                    <div class="row product-list">
                        @foreach($products as $product)
                        <div class="col-md-4 text-center mb-3">
                            <section class="card product">
                                <div class="pro-img-box">
                                    <a href="#">
                                        <img src="{{asset('/public/images/products/thumbnail/'.$product->firstimage) }}" style="width:250px;height:220px;padding: 0px 3px 0px 3px;" alt="product's photo">
                                        <!-- <img src="https://via.placeholder.com/250x220/FFB6C1/000000" alt="" /> -->
                                    </a>
                                </div>
            
                                <div class="panel-body text-center">
                                    <h6 class="card-title mt-2">
                                        <a class="product-header" href="#">
                                            {{$product->product->name}}
                                        </a>
                                    </h6>
                                    <div class="price m-3">
                                        <span>Normal - {{$product->product->normal_price}} MMK</span><br>
                                        <span>Customize - {{$product->product->customize_price }} MMK</span>
                                    </div>
                                    <a href="{{route('product', $product->product_id)}}" class="btn">details</a>
                                    <div class="my-wishlist" title="remove from wishlist">
                                        <form action="{{route('remove.wishlist', $product->product_id)}}" method="post">
                                        {{csrf_field()}}
                                        {{method_field('Delete')}}
                                            <button type="submit" class="heart-shape">
                                            </button>
                                        </form>
                                    </div>
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
                    <h4>Empty Wishlist.</h4>
                @endif
                </div>
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