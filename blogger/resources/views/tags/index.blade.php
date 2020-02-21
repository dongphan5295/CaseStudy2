@extends('main')

@section('title', '| All Tags')

@section('content')

<div class="hero-wrap" style="background-image: url('/images/image1.png');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
        <div class="col-md-12 ftco-animate">
            {{-- <h2 class="subheading">Hello! Welcome to</h2> --}}
            <h1 class="mb-4 mb-md-0">All Tags</h1>
            <div class="row">
                <div class="col-md-7">
                    {{-- <div class="text">
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                    </div> --}}
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>

<div class="container">
    <div class="col-md-3">
        <div class="well">
            {!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}
            <h2>New Tag</h2>
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', null, ['class' => 'form-control']) }}
            {!! Form::submit('Create New Tags', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) !!}
            {!! Form::close() !!}

        </div>
    </div>

    <div class="col-md-8">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Action</th>

                </tr>
            </thead>

            <tbody>
                @foreach ($tags as $tag)
                <tr>
                    <th> {{ $tag->id }}</th>
                    <td> {{ $tag->name }}</td>
                    <td><a href="{{ route('tags.show', $tag->id ) }}" class="btn btn-default btn-xs">View</a></td>
                </tr>

                @endforeach
        </table>
    </div>


</div>

@endsection
