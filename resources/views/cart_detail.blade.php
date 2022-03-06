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
                        <th>Type</th>
                        <th>price</th>
                        <th>Quanty</th>
                        <th>Amount</th>
                        <th>Waiting times</th>
                    </tr>
                </thead>
                <tbody>
                    @if($cartItem->count() > 0)
                        @php $i=1; @endphp
                        @foreach($cartItem as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>
                                    <a href="#">
                                        {{$product->product->name}}
                                    </a>
                                </td>
                                <td>
                                    {{$product->sell_type}}
                                </td>
                                <td>
                                    @if($product->sell_type == 'normal')
                                        {{$product->product->normal_price}}
                                    @else
                                        {{$product->product->customize_price}}
                                    @endif
                                </td>
                                <td>
                                    {{$product->quantity}}
                                </td>
                                <td>{{$product->amount}}</td>
                                <td>
                                    @if($product->sell_type == 'customize')
                                        <strong>{{($product->product->waiting_time) * ($product->quantity)}}</strong> days
                                    @else
                                        0
                                    @endif
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
                        <td></td>
                        <td colspan="2"><h6>Total - <strong>{{$totalAmount}}</strong> <br>MMK</h6></td>
                        <td>
                            <strong>{{$waiting_times}}</strong> days
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