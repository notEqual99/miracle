@extends('account')

@section('content')
    <div class="col-md-9">
        <div class="title m-3"><h4>Cart ID - {{$data->unique_key}}</h4></div>
        @include('includes.alert')
        <div class="table-wrapper">
            <table class="fl-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>price</th>
                        <th>Quanty</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($cartItem->count() > 0)
                        @php $i=1; @endphp
                        @foreach($cartItem as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>
                                    <a href=""></a>
                                    {{$product->product->name}}
                                </td>
                                <td>
                                    @if($product->sell_type == 'normal')
                                        {{$product->product->normal_price}}
                                    @else
                                        {{$product->product->customize_price}}
                                    @endif
                                </td>
                                <td>
                                    <form action="{{route('quantity.update', $product->id)}}" >
                                    {{csrf_field()}}
                                    @method('PUT')
                                    <input class="quan-input" name="quantity" type="number" min="1" max="{{$product->product->instock_no}}" value="{{$product->quantity}}"> 
                                    <button type="submit">
                                        <i class="fas fa-sync-alt"></i>
                                    </button>
                                    </form>
                                </td>
                                <td>{{$product->amount}}</td>
                                <td>
                                    <button class="btn btn-sm mb-2">edit</button><br>
                                    <form action="{{route('product.cancel',$product->id)}}" class="d-inline" method="post">
                                        {{csrf_field()}}
                                        {{method_field('Delete')}}
                                        <button class="btn btn-danger btn-sm" type="submit">Cancle</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else    
                        <tr>
                            <td colspan="5">No Items</td>
                        </tr>
                    @endif
                    <tr class="total-row">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td colspan="2"><h6>Total - <strong>{{$totalAmount}}</strong> <br>MMK</h6></td>
                        <td>
                            <form action="{{route('cart.buy',$data->id)}}" class="d-inline" method="post">
                                {{csrf_field()}}
                                <button type="submit" class="btn" {{$cartItem->count() > 0 ? "" : "disabled"}}><strong>BUY NOW</strong></button>
                            </form>
                        </td>
                    </tr>
                <tbody>
            </table>
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