@extends('layouts.base')

@section('content')
    <style>
        .wrapper{height:100%;position:relative;overflow-x:hidden;overflow-y:auto}
    </style>
    <!-- Page content-->
    <div class="content-wrapper mt-2">
        <div class="content-heading">
            <div class="card-header">
                Edit Product
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-body">
                        @include('layouts.error')
                        <form class="form-horizontal" method="post" action="{{route('products.update',$product->id)}}" enctype="multipart/form-data">
                            @method('put')
                            {{csrf_field()}}
                            <div class="form-group row">
                                <div class="col-xl-6">
                                    <label class="col-xl-4 col-form-label"><strong>Name</strong></label>
                                    <input class="form-control" type="text" name="name" value="{{$product->name}}">
                                </div>
                            </div>

                            <!-- category dropdown -->
                            <div class="form-group row">
                                <div class="col-xl-6">
                                    <label class="col-xl-4 col-form-label"><strong>Category</strong></label>
                                    <select name="category" id="category" class="browser-default custom-select">
                                        <option value="category_select">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}"
                                                @if($product->categories->id == $category->id)
                                                    selected
                                                @endif
                                            >{{ $category->category_name }}</option>>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- types -->
                                <div class="col-xl-6">
                                    <label class="col-xl-4 col-form-label"><strong>Types</strong></label>
                                    <select class="form-control" name="type" id="type">
                                        <option value="{{$product->type_id}}">{{$product->type->name}}</option>
                                    </select>
                                </div>
                            </div>
                            
                            <!-- images -->
                            <div class="form-group">
                                <h3 class="col-xl-4 col-form-label"><strong>Images</strong></h3>
                                @foreach($images as $image)
                                <img src="{{asset('public/images/products/thumbnail/'.$image)}}"  class="img img-responsive" width="200" height="200"; alt="">
                                @endforeach
                                <p class="text-danger">! if you want to change images choose new files. !</p>
                                <input type="file" name="images[]" multiple class="form-control" accept="image/*">
                                @if ($errors->has('files'))
                                @foreach ($errors->get('files') as $error)
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $error }}</strong>
                                </span>
                                @endforeach
                                @endif
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label class="form-group"><strong>Instock Price</strong></label>
                                    <div class="form-group">
                                    <input type="radio" name="instock" id="instock" value="false" {{$product->instock == 'false' ? 'checked' : ''}}> false &nbsp;&nbsp;
                                    <input type="radio" name="instock" id="noinstock" value="true" {{$product->instock == 'true' ? 'checked' : ''}}> true <span class="text-danger">(Choose false! if no instock!)</span>
                                    <div class="false instock">
                                    <input id="" type="number" name="normal_price" class="form-control" value="{{$product->normal_price}}">
                                    </div> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <label class="form-group"><strong>Customize Price</strong></label>
                                    <div class="form-group">
                                    <input type="radio" onclick="javascript:analysis();" name="customize" id="customize" value="false" {{$product->customize == 'false' ? 'checked' : ''}}> false &nbsp;&nbsp;
                                    <input type="radio" onclick="javascript:analysis();" name="customize" id="customize" value="true" {{$product->customize == 'true' ? 'checked' : ''}}> true
                                    <div class="false customize">
                                    <input type="number" name="customize_price" class="form-control" value="{{$product->customize_price}}">  
                                    </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="quantity">
                                        <label class="form-group"><strong>Instock No</strong></label>
                                        <input type="number" name="quantity" class="form-control" value="{{$product->instock_no}}">
                                    </div>
                                </div>
                                <div class="time col-md-6">
                                    <div class="time">
                                        <label class="form-group"><strong>Customize Waiting Time</strong></label>
                                        <input type="number" name="waiting_time" class="form-control" value="{{$product->waiting_time}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-2"></div>
                                <div class="col-xl-10">
                                    <button class="btn btn-sm btn-primary" type="submit">update</button>
                                    <a href="{{route('products.index')}}" class="btn btn-sm btn-secondary" type="reset">back</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        $('#category').change(function(){
            var sid = $(this).val();
            // console.log(sid);
            if(sid){
            $.ajax({
                type:"get",
                url:"/laravel/miracle/miracle77/type_get/"+sid,
                success:function(res){
                    if(res){
                        $("#type").empty();
                        $("#type").append('<option>Select Types</option>');
                        $.each(res,function(key,value){
                            // console.log(value);
                            //$("#city").append('<option value="'+key+'">'+value.city_name+'</option>');
                            $("#type").append('<option value="'+value.id+'">'+value.name+'</option>');
                        });
                    }else{
                        console.log("Data Empty");
                    }
                }
            });
            }
        });
    </script>

    <!-- // script for  radio box -->
    <script>
        $('input:radio[name="instock"]').change(function() {
            if ($(this).val() == 'true') {
                $(".instock").show();
                $('.quantity').show();
            } else {
                $('.instock').hide();
                $('.quantity').hide();
            }
            });
    </script>

    <script>
        $('input:radio[name="customize"]').change(function() {
            if ($(this).val() == 'true') {
                $(".customize").show();
                $(".time").show();
            } else {
                $('.customize').hide();
                $(".time").hide();
            }
            });
    </script>
@endsection
@section('script')
@endsection