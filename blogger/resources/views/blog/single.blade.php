@extends('main')
@section('title', "| Blog")

@section('content')

<div style="background-image: url('/images/black.jpg'); height : 100px;" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    {{-- <div class="container">
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
    </div> --}}
</div>

<div class="container pt-4">
    <div class="row">
        <div class="col-lg-8 ftco-animate">
            {{-- @if(!empty($post->image))
            <p class="mb-5"><img src="{{$post->image}}" width="800" height="400" /></p>
            @endif --}}
            <h1 class="mb-3"><strong>{{ $post->title }}</strong></h1>
            <p>{!! $post->body !!}</p>
            <div class="tag-widget post-tag-container mb-5 mt-5">
                <div class="tagcloud">
                    @foreach ($post->tags as $tag)
                    <a href="#">{{ $tag->name}}</a>
                    @endforeach
                </div>
            </div>
            <hr>
            <span>Posted By :<a href="/about"> Đông Phan</a></span></br>
            <span>Posted On : {{ date('H:i:s - d/m/Y', strtotime($post->updated_at))}} </span></br>
            <span>This entry was posted in : <a
                    href="{{ route('blogs.types', $post->category->name). '?id=' .$post->category->id }}">{{  $post->category->name   }}</span>
            <hr>

            <div class="pt-5 mt-5">
                <h3 class="mb-5"><span class="glyphicon glyphicon-comment"></span> Comments
                    ({{ $post->comments()->count() }}) </h3>
                @foreach($post->comments as $comment)
                <ul class="comment-list">
                    <li class="comment">
                        <div class="vcard bio">
                            <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=monsterid" }}"
                                class="author-image">
                        </div>
                        <div class="comment-body">
                            <h3>{{ $comment->name }}</h3>
                            <div class="meta mb-3">{{ date('F dS, Y - g:iA' ,strtotime($comment->created_at)) }}</div>
                            <p>{{ $comment->comment }}</p>
                            {{-- <p><a href="#" class="reply">Reply</a></p> --}}
                        </div>
                    </li>
                </ul>
                @endforeach

                <div class="comment-form-wrap pt-5">
                    <h3 class="mb-5">Leave a comment</h3>
                    <form action="{{ route('comments.store', $post->id)}}" method="POST" class="p-5 bg-light">
                        @csrf
                        <div class="form-group">
                            <label style="color : red">Name* </label>
                            <input type="text" name="name" class="form-control">
                            @error('name')
                            <p class="text-danger">{{ $errors->first('name') }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label style="color : red">Email*</label>
                            <input type="text" name="email" class="form-control">
                            @error('email')
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label style="color : red">Message*</label>
                            <textarea name="comment" cols="30" rows="10" class="form-control"></textarea>
                            @error('comment')
                            <p class="text-danger">{{ $errors->first('comment') }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <!-- .col-md-8 -->

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
                <h3>Hottest Blog</h3>
                @foreach ($pst as $pt)
                <div class="block-21 mb-4 d-flex">
                    <a href="{{  route('blog.single', $pt->slug) }}" class="blog-img mr-4"
                        style="background-image: url('{{ $pt->image }}');"></a>
                    <div class="text">
                        <h3 class="heading"><a href="{{  route('blog.single', $pt->slug)  }}">{{ $pt->title }}</a></h3>
                        <div class="meta">
                            <div><a href="#"><span class="icon-comment"> {{$pt->comments()->count()}}</span></a></div>
                            <div><a href="#"><span class="icon-eye"> {{$pt->view_count}}</span></a></div>
                            <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="sidebar-box ftco-animate">
                <h3>Tag Cloud</h3>
                <div class="tagcloud">
                    @foreach ($tags as $tag)
                    <a href="{{ route('blogs.tags', $tag->name). '?id=' .$tag->id }}"
                        class="tag-cloud-link">{{ $tag->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
