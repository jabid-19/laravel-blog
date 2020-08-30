@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Tag
                        <a href="#" class="btn btn-success btn-sm float-right" data-toggle="modal"
                           data-target="#createTag">Add New</a>
                    </div>

                    <div class="card-body">
                        {{--                        @if (session('status'))--}}
                        {{--                            <div class="alert alert-success" role="alert">--}}
                        {{--                                {{ session('status') }}--}}
                        {{--                            </div>--}}
                        {{--                        @endif--}}

                        <table class="table text-center">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i = 1)
                            @foreach($tags as $tag)
                                <tr>
                                    <td scope="row">{{$i++}}</td>
                                    <td>{{$tag->name}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

        <!-- Button trigger modal -->
    {{--        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createTag">--}}
    {{--            Add Tag--}}
    {{--        </button>--}}

    <!-- Modal -->
        <div class="modal fade" id="createTag" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {{Form::open(['route' => 'tags.store', 'method' => 'POST' ])}}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Tag Name</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                            <span class="text-danger ">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                        </div>

                        {{--                        <button type="submit" class="btn btn-primary">Create</button>--}}

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Add</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>

                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
@endsection
