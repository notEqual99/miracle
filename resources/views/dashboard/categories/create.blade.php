@extends('layouts.base')

@section('content')
    <style>
        .wrapper{height:100%;position:relative;overflow-x:hidden;overflow-y:auto}
    </style>
    <!-- Page content-->
    <div class="content-wrapper">
        <div class="content-heading">
            <div class="card-header">
                Add New Plant
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-body">
                        @include('layouts.error')
                        <form class="form-horizontal" method="post" action="{{route('categories.store')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group row">
                                <label class="col-xl-2 col-form-label">Name</label>
                                <div class="col-xl-10">
                                    <input class="form-control" type="text" name="category_name" value="{{old('class_name')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-xl-2"></div>
                                <div class="col-xl-10">
                                    <button class="btn btn-sm btn-green" type="submit">add</button>
                                    <a href="{{route('categories.index')}}" class="btn btn-sm btn-secondary" type="reset">back</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection