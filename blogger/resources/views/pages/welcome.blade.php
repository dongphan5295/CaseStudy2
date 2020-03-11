@extends('main')

@section('title', '| Homepage')

@section('content')
<div style="background-image: url('/images/image1.png');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start"
            data-scrollax-parent="true">
            <div class="col-md-12 ftco-animate">
                <h2 class="subheading">Hello! Welcome to</h2>
                <h1 class="mb-4 mb-md-0">Travel Blog</h1>
                <div class="row">
                    <div class="col-md-7">
                        <div class="text">
                            <p>"As a travel blogger, I spend most of my time on traveling, photography and writing."</p>
                            <div class="mouse">
                                <a href="#" class="mouse-icon">
                                    <div class="mouse-wheel"><span class="ion-ios-arrow-round-down"></span></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="container pt-4">
    <div class="row">
        <div class="col-md-12">
            @foreach($posts as $post)
            <div class="case">
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-xl-8 d-flex">
                        <a href="{{ url('blog/'.$post->slug) }}" class="img w-100 mb-3 mb-md-0"
                            style="background-image: url({{ $post->image }});"></a>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-4 d-flex">
                        <div class="text w-100 pl-md-3">
                            <span class="subheading">{{ $post->category->name }}</span>
                            <h2><a href="{{ url('blog/'.$post->slug) }}">{{ $post->title }}</a></h2>
                            <ul class="media-social list-unstyled">
                                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                                <li class="ftco-animate"><a
                                        href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url('zblog/'.$post->slug)) }}"><span
                                            class="icon-facebook"></span></a></li>
                                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                            </ul>
                            <div class="meta">
                                <p class="mb-0"><a href="#"><span class="icon-time"></span>
                                        {{ date('M j, Y', strtotime($post->created_at)) }} </a> |
                                    <a href="#"><span class="icon-person"></span> Admin</a> | <a href=""><span
                                            class="icon-comment"> {{$post->comments()->count()}}</span></a>
                                    |<a href=""><span class="icon-eye"> {{$post->view_count}}</span></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
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
@stop
