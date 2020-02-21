
@extends('main')
@section('title', '|Blog')
@section('content')

<div class="tiledBackground"  style="background-image: url('/images/image1.png'); height: 500px;" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
        <div class="col-md-12 ftco-animate">
            <h1 class="mb-4 mb-md-0">Newest Blog</h1>
            <div class="row">
                <div class="col-md-7">
                    <div class="text">
                        <p>"Creating ideas and building brands that truly matter to people"</p>
                        {{-- <div class="mouse">
                            <a href="#" class="mouse-icon">
                            <div class="mouse-wheel"><span class="ion-ios-arrow-round-down"></span></div>
                            </a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>



{{-- @foreach ($posts as $post)

<div class="container pt-4">
    <div class="col-md-8 col-md-offset-4">
        <h2>{{ $post->title }}</h2>
        <h4> Published: {{ date('M j, Y', strtotime($post->create_at)) }} </h4>

        <p>{{ substr(strip_tags($post->body), 0, 250) }}{{ strlen(strip_tags($post->body)) > 250 ? '...' : "" }}</p>

        <a href="{{  route('blog.single', $post->slug)  }}" class="btn btn-primary">Read more</a>
        <hr>
    </div>
</div>

@endforeach --}}



<div class="container pt-5">
    <div class="row d-flex">
        @foreach ($posts as $post)
      <div class="col-md-4 d-flex ftco-animate">
          <div class="blog-entry justify-content-end">
          <a href="{{  route('blog.single', $post->slug)  }}" class="block-20" style="background-image: url('images/{{ $post->image }}');">
          </a>
          <div class="text p-4 float-right d-block">
              <div class="topper d-flex align-items-center">
                <span>{{ date('M j, Y', strtotime($post->updated_at)) }}</span>
              </div>
              <h3 class="heading mb-3"><a href="{{  route('blog.single', $post->slug)  }}">{{ $post->title }}</a></h3>
            <p>{{ substr(strip_tags($post->body), 0, 250) }}</p>
            <p><a href="{{  route('blog.single', $post->slug)  }}" class="btn-custom"><span class="ion-ios-arrow-round-forward mr-3"></span>Read more</a></p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
</div>


{{-- <div class="row">
    <div class="col-md-12">
        <div class="text-center">
            {!! $posts->links() !!}
        </div>
    </div>
</div> --}}
<div class="row mt-5">
    <div class="col text-center">
        <div class="block-27">
            <ul>
            <li> {!! $posts->links() !!} </li>
            </ul>
        </div>
    </div>
    </div>


@endsection

