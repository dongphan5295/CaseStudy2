@extends('main2')

@section('title', '| All Categories')

@section('content')


<div class="container pt-4">

    <div class="col-md-12 pt-2">
        <table class="table" id="category">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </thead>
            @foreach ($tags as $tag)
            <tbody>
            <td>{{ $tag->id}}</td>
            <td>{{ $tag->name}}</td>
            <td><a href="{{route('tags.force', $tag->id)}}" class=""><i class="fa fa-trash"></i></a>&emsp;
                <a href="{{route('tags.restore',$tag->id)}}" class=""><i class="fa fa-sync"></i></a></td>
            </tbody>
            @endforeach

        </table>
    </div>
</div>
@stop
