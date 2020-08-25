@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Category Create
                        <a href="{{route('categories.index')}}" class="btn btn-warning btn-sm float-right">Back</a>
                    </div>

                    <div class="card-body">

                        {{Form::open(['route' => 'categories.store', 'method' => 'POST' ])}}
                            <div class="form-group">
                                <label for="name">Category Name</label>
                                <input type="text" name="name" class="form-control" id="name">
                                <span class="text-danger ">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                            </div>


                            <button type="submit" class="btn btn-primary">Create</button>
                        {{Form::close()}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
