@extends('main2')

@section('title', '| Create New Post')

@section('stylesheets')

{{-- {!! Html::style('css/parsley.css') !!} --}}
<link rel="stylesheet" href="/css/parsley.css">
{{-- {!! Html::style('css/select2.min.css') !!} --}}
<link rel="stylesheet" href="/css/select2.min.css">
{{-- <script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script> --}}


@endsection

@section('content')

<div class=" pt-5">
    <div class="col-md-8 col-md-offset-2">
        <h1>Create New Post</h1>
        <hr>
        <form action="{{ route('posts.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <label>Title* </label>
            <input type="text" name="title" class="form-control" >
            @error('title')
            <p class="text-danger">{{ $errors->first('title') }}</p>
            @enderror

            <label>Slug* </label>
            <input type="text" name="slug" class="form-control" >
            @error('slug')
            <p class="text-danger">{{ $errors->first('slug') }}</p>
            @enderror

            <label>Category* </label>
            <select class="form-control" name="category_id">
                @foreach($categories as $category)
                <option value='{{ $category->id }}'>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
            <p class="text-danger">{{ $errors->first('category_id') }}</p>
            @enderror

            <label>Tags* </label>
            <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                @foreach($tags as $tag)
                <option value='{{ $tag->id }}'>{{ $tag->name }}</option>
                @endforeach
            </select>

            <label><strong>Image</strong> <small class="text-danger">*</small></label>
            <input type="file" accept="image/gif, image/jpeg, image/jpg, image/png" name="image">
            <div> <img src="" id="image-holder" style="height: 200px"></div>
            @error('image')
            <p class="text-danger">{{ $errors->first('image') }}</p>
            @enderror


            <label>Post Body* </label>
            <textarea name="body" id="editor" class="form-control" placeholder="Body Text"></textarea>
            @error('body')
            <p class="text-danger">{{ $errors->first('body') }}</p>
            @enderror


            <input type="submit" class="btn btn-success btn-lg btn-block" style="margin-top: 20px;" value="Create Post">
        </form>
    </div>
</div>

@stop


@section('scripts')

{{-- {!! Html::script('js/parsley.min.js') !!} --}}
<script src="/js/parsley.min.js"></script>
<script src="/js/select2.min.js"></script>
{{-- {!! Html::script('js/select2.min.js') !!} --}}

<script type="text/javascript">
    $('.select2-multi').select2();
</script>
<script src="//cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>
<script>
    // ClassicEditor
	// 	.create( document.querySelector( '#editor' ) )
	// 	.catch( error => {
	// 		console.error( error );
	// 	} );
    CKEDITOR.replace( 'editor' );
    CKEDITOR.config.entities = false;
    CKEDITOR.config.height = 500;

</script>
@endsection
