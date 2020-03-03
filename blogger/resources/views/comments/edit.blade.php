@extends('main2')

@section('title', '| Edit Comment')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1>Edit Comment</h1>

        <form action="{{ route('comments.update', $comment->id)}}" method="POST">
            @csrf
            @method('PUT')

            <label>Name* : </label>
            <input type="text" name="name" class="form-control" disabled>
            @error('name')
            <p class="text-danger">{{ $errors->first('name') }}</p>
            @enderror

            <label>Email*</label>
            <input type="text" name="email" class="form-control" disabled>
            @error('email')
            <p class="text-danger">{{ $errors->first('email') }}</p>
            @enderror

            <label>Comment*</label>
            <textarea name="comment" cols="30" rows="10" class="form-control"></textarea>
            @error('comment')
            <p class="text-danger">{{ $errors->first('comment') }}</p>
            @enderror

            <input type="submit" value="Update Comment" class="btn btn-block btn-success" style="margin-top: 15px;">

        </form>
    </div>
</div>

@endsection
