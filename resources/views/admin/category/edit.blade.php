@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Category Update
                        <a href="{{route('categories.index')}}" class="btn btn-warning btn-sm float-right">Back</a>
                    </div>

                    <div class="card-body">
                        {{Form::open(['route' => ['categories.update', $category->id], 'method' => 'PUT' ])}}
                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" name="name" value="{{$category->name}}" class="form-control" id="name" >
                            <span class="text-danger ">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
