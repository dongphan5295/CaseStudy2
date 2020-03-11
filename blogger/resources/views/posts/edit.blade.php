@extends('main2')

@section('title', '| Edit Blog Post')

@section('stylesheets')

{!! Html::style('css/select2.min.css') !!}


@endsection

@section('content')

<div class="container">
    {{-- {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'files'=> true]) !!} --}}
    <form action="{{ route('posts.update', $post->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-md-8">
            {{-- {{ Form::label('title', 'Title:') }} --}}
            <label>Title* </label>
            <input type="text" name="title" value="{{ $post->title }}" class="form-control input-lg">
            @error('title')
            <p class="text-danger">{{ $errors->first('title') }}</p>
            @enderror

            <label> Slug* </label>
            <input type="text" name="slug" value="{{ $post->slug }}" class="form-control">
            @error('slug')
            <p class="text-danger">{{ $errors->first('slug') }}</p>
            @enderror

            <label>Category* </label>
            <select name="category_id" class="form-control">
                <option value="{{ $post->category_id }}">{{ $category->name }}</option>
                @foreach($categories as $cate)
                @if($cate->id != $post->category_id)
                <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                @endif
                @endforeach
            </select>
            @error('category_id')
            <p class="text-danger">{{ $errors->first('category_id') }}</p>
            @enderror

            <label class="form-spacing-top">Tags*</label>
            <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                @foreach($tags as $key=>$tag)
                <option value='{{ $tag->id }}'
                    {{ $post->tags->where('id', $tag->id ) !== [] ? ($post->tags->where('id', $tag->id )->first() ? 'selected' : null) : null}}>
                    {{ $tag->name }}</option>
                @endforeach
            </select>

            <label><strong>Image*</strong> <small class="text-danger">*</small></label>
            <input type="file" accept="image/gif, image/jpeg, image/png" name="image">
            <div> <img src="{{$post->image}}" id="image-holder" style="height: 200px"></div>


            {{-- <p>{{ Form::label('body', "Body:", ['class' => 'form-spacing-top']) }}</p> --}}
            <label class="form-spacing-top">Body*</label>
            <textarea name="body" id="editor" class="form-control"> {{$post->body}}</textarea>
            @error('body')
            <p class="text-danger">{{ $errors->first('body') }}</p>
            @enderror
        </div>

        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Created At:</dt>
                    <dd>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Last Updated:</dt>
                    <dd>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <a href="{{ route('posts.show', $post->id)}}" class="btn btn-danger btn-block">Cancel</a>
                    </div>
                    <div class="col-sm-6">
                        <input type="submit" value="Save Changes" class="btn btn-success btn-block">
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>

@stop

@section('scripts')

{{-- {!! Html::script('/js/select2.min.js') !!} --}}
<script src="/js/select2.min.js"></script>

<script type="text/javascript">
    let selected = new Array();
$.each($(".select2-multi option:selected"), function() {
			selected.push($(this).val());
		});
        console.log(selected)

    $('.select2-multi').select2();
		$('.select2-multi').select2().val(selected).trigger('change');
</script>
<script src="//cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>

<script>
    CKEDITOR.replace( 'editor' );
    CKEDITOR.config.height = 500;
    CKEDITOR.config.entities = false;

</script>

@endsection
