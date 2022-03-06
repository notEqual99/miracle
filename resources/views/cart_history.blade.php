@extends('account')

@section('content')
    <div class="col-md-9">
        <div class="container">
            <div class="wrapper">
                <div class="cart-history">
                    @if($carts->count() > 0)
                        @foreach($carts as $cart)
                        <div class="card mb-2">
                            <div class="card-header">
                                Cart ID - <strong>{{$cart->unique_key}}</strong>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-9">
                                        <ul>
                                            <li>Ordered Items - <strong>{{$cart->total_quantity}}</strong> nos</li>
                                            <li>Total Amount - <strong>{{$cart->final_amount}}</strong> MMK</li>
                                            <li>Ordered Date - <strong>{{date('d-m-Y', strtotime($cart->ordered_date));}}</strong></li>
                                            <li>Waiting Times - <strong>{{$cart->waiting_times}}</strong> days</li>
                                        </ul>
                                        <p>Ordered Item will be deliver within waiting times.</p>
                                        <a href="{{route('cart.detail', $cart->id)}}">click to see details</a>
                                    </div>
                                    <div class="col-sm-3">
                                        <button class="cart-status btn btn-success">{{$cart->status}}</button>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <h3>There is no old carts.</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection