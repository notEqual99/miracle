@extends('layouts.app')

@section('content')
<div class="blog-posts">
    <div class="container">
        <div class="wrapper">
            <div class="blog">
                <div class="mb-3"">
                    <h3 class="card-title">Blogs</h3>
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
                    <hr>
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
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection