@extends('main')
@section('title', '|Blog')
@section('content')

<div class="tiledBackground" style="background-image: url('/images/push.jpg'); " data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start"
            data-scrollax-parent="true">
            <div class="col-md-12 ftco-animate">
                <h1 class="mb-4 mb-md-0">Single Blog</h1>
                <div class="row">
                    <div class="col-md-7">
                        <div class="text">
                            <p>"As a travel blogger, I spend most of my time on traveling, photography and writing."</p>
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





<div class="container pt-5">
    <div class="row d-flex">
        @foreach ($posts as $post)
        <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry justify-content-end">
                <a href="{{  route('blog.single', $post->slug)  }}" class="block-20"
                    style="background-image: url('{{ $post->image }}');">
                </a>
                <div class="text p-4 float-right d-block">
                    <div class="topper d-flex align-items-center">
                        <span>{{ date('M j, Y', strtotime($post->updated_at)) }}</span>
                    </div>
                    <h3 class="heading mb-3"><a href="{{  route('blog.single', $post->slug)  }}">{{ $post->title }}</a>
                    </h3>
                    <p>{{ substr(strip_tags($post->body), 0, 250) }}</p>
                    <p><a href="{{  route('blog.single', $post->slug)  }}" class="btn-custom"><span
                                class="ion-ios-arrow-round-forward mr-3"></span>Read more</a></p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


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
