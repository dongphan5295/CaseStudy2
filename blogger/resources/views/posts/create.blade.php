@extends('main2')

@section('title', '| Create New Post')

@section('stylesheets')

{!! Html::style('css/parsley.css') !!}
{!! Html::style('css/select2.min.css') !!}
{{-- <script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script> --}}


@endsection

@section('content')

<div class=" pt-5">
    <div class="col-md-8 col-md-offset-2">
        <h1>Create New Post</h1>
        {{-- <hr> --}}
        {!! Form::open(array('route' => 'posts.store', 'data-parsley-validate' => '', 'files' => true)) !!}
        {{ Form::label('title', 'Title:') }}
        {{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

        {{ Form::label('slug', 'Slug:') }}
        {{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255') ) }}

        {{ Form::label('category_id', 'Category:') }}
        <select class="form-control" name="category_id">
            @foreach($categories as $category)
            <option value='{{ $category->id }}'>{{ $category->name }}</option>
            @endforeach

        </select>


        {{ Form::label('tags', 'Tags:') }}
        <select class="form-control select2-multi" name="tags[]" multiple="multiple">
            @foreach($tags as $tag)
            <option value='{{ $tag->id }}'>{{ $tag->name }}</option>
            @endforeach

        </select>

        {{ Form::label('featured_img', 'Upload a Featured Image') }}
        {{ Form::file('featured_img') }}

        <p>{{ Form::label('body', "Post Body:") }}</p>
        {{ Form::textarea('body', null , ['id' => 'editor','class' => 'form-control', 'placeholder' => 'Body Text']) }}


        {{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
        {!! Form::close() !!}
    </div>
</div>

@stop


@section('scripts')

{!! Html::script('js/parsley.min.js') !!}
{!! Html::script('js/select2.min.js') !!}

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
</script>
@endsection
