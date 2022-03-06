@extends('layouts.base')

@section('content')
    <style>
        .wrapper{height:100%;position:relative;overflow-x:hidden;overflow-y:auto}
        #btn{background-color: red !important; }
    </style>
    <!-- Page content-->
    <div class="content-wrapper">
        <div class="content-heading">
            <div class="card-header">
                Edit Product Type
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-body">
                        @include('layouts.error')
                        <form class="form-horizontal" method="post" action="{{route('types.update',$type->id)}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            @method('PUT')
                            <div class="form-group row">
                                <label class="col-xl-2 col-form-label">Name</label>
                                <div class="col-xl-10">
                                    <input class="form-control" type="text" name="name" value="{{$type->name}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-2 col-form-label">Category</label>
                                <div class="col-xl-10">
                                    <select name="category_id" id="category" class="form-control">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}"
                                                @if($type->category->id == $category->id)
                                                    selected
                                                @endif
                                            >{{ $category->category_name }}</option>>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-xl-2"></div>
                                <div class="col-xl-10">
                                    <button class="btn btn-sm btn-success" type="submit">add</button>
                                    <a href="{{route('types.index')}}" class="btn btn-sm btn-secondary" type="reset">back</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection