@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Category Show
                        <a href="{{route('categories.index')}}" class="btn btn-warning btn-sm float-right">Back</a>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <tbody>
                            <tr>
                                <th>Id</th>
                                <td>{{$category->id}}</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{{$category->name}}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{$category->status== 1 ? 'Active' : 'Inactive'}}</td>
                            </tr>

                            <tr>
                                <th>Created at</th>
                                <td>{{$category->created_at}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
