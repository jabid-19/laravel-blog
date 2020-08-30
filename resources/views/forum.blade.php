@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            @foreach($forums as $key => $forums)
                <div class="col-sm-4 mb-3">
                    <div class="card">
                        <img src="{{$forums->image}}" class="card-img-top img-fluid" style=" height: 150px;" alt="Post image">
                        <div class="card-body">
                            <h5 class="card-title">{{$forums->title}}</h5>
                            <p class="card-text">{{substr(strip_tags($forums->body),0,50)}} ...</p>
                            <a href="{{route('get.single.forums', $forums->id)}}" class="btn btn-primary btn-sm stretched-link">Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
{{--        <div class="row justify-content-center">{{$forums->links()}}</div>--}}

    </div>
@endsection
