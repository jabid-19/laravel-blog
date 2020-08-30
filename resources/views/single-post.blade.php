
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1 class="display-4">{{$post->title}}</h1>
            <small>Created by {{$post->user->name}}, {{$post->created_at}}</small>
            <p class="lead mt-5">{{$post->body}}</p>
        </div>
        {{--        @auth--}}
        {{Form::open(['route' => ['posts.comments.store', $post->id], 'method' => 'POST' ])}}
        <div class="form-group">
            <textarea name="body" id="" rows="3" class="form-control" placeholder="Type a comment"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        {{Form::close()}}
        {{--        @endauth--}}
        <div class="row mt-5">
            @foreach($post->comments as $comment)
                <div class="media">
                    <img
                        src="http://placehold.it/64x64"
                        alt="Media object image"
                        class="mr-3"
                    />
                    <div class="media-body">
                        <p>
                            <a href="mailto:example@domain.com">{{$comment->user->name}}</a> (Posted
                            on:
                            <time datetime="2021-03-12T10:24"
                            >{{$comment->created_at}}</time
                            >)
                        </p>
                        <p>
                            {{$comment->body}}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection









