@extends('main2')

@section('title', '| All Categories')

@section('content')


<div class="container pt-4">

    <div class="col-md-12 pt-2">
        <table class="table" id="category">
            <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Action</th>
            </thead>
            @foreach ($categories as $category)
            <tbody>
            <td>{{ $category->id}}</td>
            <td>{{ $category->name}}</td>
            <td><a href="{{route('posts.force', $category->id)}}" class=""><i class="fa fa-trash"></i></a>&emsp;
                <a href="{{route('posts.restore',$category->id)}}" class="btn"><i class="fa fa-sync"></i></a></td>
            </tbody>
            @endforeach

        </table>
    </div>
</div>
@stop
