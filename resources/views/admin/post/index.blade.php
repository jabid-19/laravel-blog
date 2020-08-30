@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Posts
                        <a href="{{route('posts.create')}}" class="btn btn-success btn-sm float-right">Add New Post</a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table text-center" id="posts">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Body</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Image</th>
{{--                                <th scope="col">Status</th>--}}
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i = 1)
                            @foreach($posts as $post)
                                <tr>
                                    <td scope="row">{{$i++}}</td>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->body}}</td>
                                    {{--                                    <td>{{$post->user->name}}</td>--}}
                                    <td>{{$post->category->name}}</td>
                                    <td><img src="{{ asset('images/'.$post->image) }}" width="100px" height="100px"
                                             alt="image"/></td>

{{--                                    <td>--}}
{{--                                        <a href="{{route('posts.status.update', $post->id)}}"--}}
{{--                                           onclick="return confirm('Are you sure to change!!!')">--}}
{{--                                            {{$post->status == 1 ? 'Active' : 'Inactive'}}--}}
{{--                                        </a>--}}
{{--                                    --}}
{{--                                    </td>--}}
                                    <td>
                                        <a href="{{route('posts.edit', $post->id)}}"
                                           class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{route('posts.show', $post->id)}}"
                                           class="btn btn-info btn-sm">View</a>

                                        {{Form::open(['route' => ['posts.destroy', $post->id], 'method'=>'DELETE', 'class' => 'd-inline'])}}
                                        <button type="submit"
                                                title="Delete"
                                                onclick="return confirm('Are you sure to delete!!!')"
                                                class="btn btn-sm btn-danger">Delete
                                        </button>
                                        {{Form::close()}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            $('#posts').DataTable();--}}
{{--        });--}}
{{--    </script>--}}

    <script>
    $(document).ready( function () {
        $('#posts').DataTable({
            "columnDefs": [
                { "orderable": false, "targets": [5, 4] }
            ]
        });
    } );
    </script>

@endsection
