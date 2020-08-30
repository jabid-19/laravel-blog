@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Post Update
                        <a href="{{route('posts.index')}}" class="btn btn-warning btn-sm float-right">Back</a>
                    </div>


                    <div class="card-body">
                        {{Form::open(['route' => ['posts.update',$post->id], 'method' => 'PUT', 'enctype'=>"multipart/form-data" ])}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" name="title" value="{{$post->title}}" for="title" class="form-control"
                                   id="title">
                            <span class="text-danger ">{{$errors->has('title') ? $errors->first('title') : ''}}</span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Body</label>
                            <input type="textarea" name="body" value="{{$post->body}}" for="body" class="form-control"
                                   id="body">
                            <span class="text-danger ">{{$errors->has('body') ? $errors->first('body') : ''}}</span>
                        </div>

                        <div class="form-group">
                            <select class="custom-select mb-3" name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{$category->id == $post->category_id ? 'selected' : '' }}>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlFile1">Upload Image</label>
                            <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
