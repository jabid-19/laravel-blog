@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Post Show
                        <a href="{{route('posts.index')}}" class="btn btn-warning btn-sm float-right">Back</a>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <tbody>
                            <tr>
                                <th>Id</th>
                                <td>{{$post->id}}</td>
                            </tr>
                            <tr>
                                <th>Title</th>
                                <td>{{$post->title}}</td>
                            </tr>
                            <tr>
                                <th>Body</th>
                                <td>{{$post->body}}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{$post->status== 1 ? 'Active' : 'Inactive'}}</td>
                            </tr>

                            <tr>
                                <th>Created at</th>
                                <td>{{$post->created_at}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
