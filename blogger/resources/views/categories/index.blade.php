@extends('main')

@section('title', '| All Categories')

@section('content')

<div  style="background-image: url('/images/image1.png'); height: 100px;" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
        <div class="col-md-12 ftco-animate">
            {{-- <h1 class="mb-4 mb-md-0">Create New Category</h1> --}}
            </div>
        </div>
      </div>
    </div>
</div>

<div class="container">

    <div class="col-md-4 pt-4 pb-4">
        <div class="well">
            {!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}
            <h2>Create New Category</h2>
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', null, ['class' => 'form-control']) }}
            {!! Form::submit('Create New Category', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) !!}
            {!! Form::close() !!}

        </div>
    </div>

    <div class="col-md-8">
        <h1>Categories</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Action</th>

                </tr>
            </thead>

            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <th> {{ $category->id }}</th>
                    <td> {{ $category->name }}</td>
                    <td><a href="{{ route('categories.edit', $category->id ) }}" class="btn btn-success">Edit</a>
                        <a href="{{ route('categories.destroy', $category->id ) }}" class="btn btn-danger">Delete</a></td>
                </tr>

                @endforeach
        </table>
    </div>

</div>

@endsection
