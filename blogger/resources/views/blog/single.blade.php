@extends('main')
@section('title', "| Blog")

@section('content')

<div style="background-image: url('/images/image1.png'); height : 100px;" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start"
            data-scrollax-parent="true">
            <div class="col-md-12 ftco-animate">
                <h1 class="mb-4 mb-md-0">Blog Single</h1>
                <div class="row">
                    <div class="col-md-7">
                        <div class="text">
                            <p>"Creating ideas and building brands that truly matter to people"</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container pt-4">
    <div class="row">
        <div class="col-lg-8 col-md-offset-2">
            <h1><strong>{{ $post->title }}</strong></h1>

            @if(!empty($post->image))
            <img src="{{asset('/images/' . $post->image)}}" width="800" height="400" />
            @endif
            <p>{!! $post->body !!}</p>
            <hr>
            <strong><span>Posted By :<a href="/about"> {{ Auth::user()->name }}</a></span></strong></br>
            <strong>POSTED ON :</strong><span>  {{ date('M j, Y', strtotime($post->updated_at))}} </span></br>
            <strong>THIS ENTRY WAS POSTED IN:</strong><span> {{  $post->category->name  }}</span>
            <div class="tagcloud">
                @foreach ($post->tags as $tag)
                <a href="#">{{ $tag->name}}</a>
                @endforeach
            </div>
            <hr>
        </div>
        <div class="col-lg-4 sidebar pl-lg-5 ftco-animate">
            <div class="sidebar-box">
                <form action="{{ route('keyword.search')}}" class="search-form" method="GET">
                    {{-- {{ csrf_field() }} --}}
                    <div class="form-group">
                        <input type="text" name="key" class="form-control" placeholder="Type a keyword and hit enter">
                        <button type="submit" class="icon icon-search"></button>
                        {{-- <span class="icon icon-search"></span> --}}
                    </div>
                </form>
            </div>
            <div class="sidebar-box ftco-animate">
                <div class="categories">
                    <h3>Categories</h3>
                    @foreach ($cates as $cate)
                    <li><a href="{{ route('blogs.types', $cate->name). '?id=' .$cate->id }}">{{  $cate->name   }} <span
                                class="ion-ios-arrow-forward"></span></a></li>
                    @endforeach
                </div>
            </div>

            <div class="sidebar-box ftco-animate">
                <h3>Recent Blog</h3>
                @foreach ($pst as $pt)
                <div class="block-21 mb-4 d-flex">
                    <a href="{{  route('blog.single', $pt->slug) }}" class="blog-img mr-4"
                        style="background-image: url('/images/{{ $pt->image }}');"></a>
                    <div class="text">
                        <h3 class="heading"><a href="{{  route('blog.single', $pt->slug)  }}">{{ $pt->title }}</a></h3>
                        <div class="meta">
                            <div><a href="#"><span class="icon-calendar"></span>
                                    {{ date('M j, Y', strtotime($pt->updated_at))}}</a></div>
                            <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                            <div><a href="#"><span class="icon-chat"></span> {{ $pt->comments()->count() }}</a></div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="sidebar-box ftco-animate">
                <h3>Tag Cloud</h3>
                <div class="tagcloud">
                    @foreach ($tags as $tag)
                    <a href="#" class="tag-cloud-link">{{ $tag->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="col-md-8 col-md-offset-2">
        <h3 class="comments-title"><span class="glyphicon glyphicon-comment"></span> Comments
            ({{ $post->comments()->count() }}) </h3>
        @foreach($post->comments as $comment)
        {{-- <div class="comment"> --}}
            <article>
        <div class="author-info">
            <footer>
                <div class="image">

                    <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=monsterid" }}"
                        class="author-image">
                    <b class="fn"> {{ $comment->name }}</b>
                </div>
                <div>
                    <time>{{ date('F dS, Y - g:iA' ,strtotime($comment->created_at)) }}</time> </br>
                </div>
                <div class="comment-content pt-3">
                    <em><span>{{ $comment->comment }}</span></em>
                </div>
            </footer>
        </div>


        @endforeach
    </article>
    </div>
</div>

<div class="container pb-3">
    <div id="comment-form" class="col-md-8 col-md-offset-2" style="margin-top: 50px;">
        {{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) }}
        <span><p>LEAVE A REPLY  </p></span>
        <div class="row">
            <div class="col-md-6">
                {{ Form::label('name', "Name:") }}
                {{ Form::text('name', null, ['class' => 'form-control']) }}
            </div>

            <div class="col-md-6">
                {{ Form::label('email', 'Email:') }}
                {{ Form::text('email', null, ['class' => 'form-control']) }}
            </div>

            <div class="col-md-12">
                {{ Form::label('comment', "Comment:") }}
                {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) }}

                {{ Form::submit('Add Comment', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top:15px;']) }}
            </div>
        </div>

        {{ Form::close() }}
    </div>
</div>

@endsection
