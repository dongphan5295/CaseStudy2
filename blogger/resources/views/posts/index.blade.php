@extends('main')

@section('title', '| All Posts')

@section('stylesheet')
<link rel="stylesheet" type="text/css" href="/DataTables/datatables.css">

@endsection
@section('content')

<div class="hero-wrap" style="background-image: url('/images/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
        <div class="col-md-12 ftco-animate">
            {{-- <h2 class="subheading">Hello! Welcome to</h2> --}}
            <h1 class="mb-4 mb-md-0">All Post</h1>
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

	<div class="container pt-4">

		<div class="col-md-3">
			<a href="{{ route('posts.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Create New Post</a>
		</div>
		<div class="col-md-12">
		</div>
	</div>

	<div class="container pt-4">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th>No</th>
					<th>Title</th>
                    <th>Body</th>
                    <th>Slug</th>
					<th>Created At</th>
					<th>Action</th>
				</thead>

				<tbody>

					@foreach ($posts as $post)

						<tr>
							<th>{{ $post->id }}</th>
							<td>{{ $post->title }}</td>
                            <td>{{ substr(strip_tags($post->body), 0, 50) }}{{ strlen(strip_tags($post->body)) > 50 ? "..." : "" }}</td>
                            <td>{{ $post->slug }}</td>
							<td>{{ date('M j, Y', strtotime($post->created_at)) }}</td>
                            <td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-success btn-sm">View</a>
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                {{-- <a href="{{ route('posts.destroy', $post->id) }}" class="btn btn-xs btn-sm">Delete</a></td> --}}
						</tr>

					@endforeach

				</tbody>
			</table>

			{{-- <div class="text-center">
				{!! $posts->links(); !!}
			</div> --}}
		</div>
	</div>

@stop
