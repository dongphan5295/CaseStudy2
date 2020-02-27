@extends('main2')

@section('title', '| All Categories')

@section('content')


<div class="container pt-4">

    <div class="col-md-12 pt-2">
        <table class="table" id="category">
            <thead>
                <th>Id</th>
                <th>Title</th>
                <th>Action</th>
            </thead>
            @foreach ($posts as $post)
            <tbody>
            <td>{{ $post->id}}</td>
            <td>{{ $post->title}}</td>
            <td><a href="{{route('posts.force', $post->id)}}" class=""><i class="fa fa-trash"></i></a>&emsp;
                <a href="{{route('posts.restore',$post->id)}}" class="btn"><i class="fa fa-sync"></i></a></td>
            </tbody>
            @endforeach

        </table>
    </div>
</div>
@stop
