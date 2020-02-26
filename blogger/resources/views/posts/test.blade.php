@extends('main')

@section('title', '| All Posts')

@section('content')

<div class="hero-wrap" style="background-image: url('/images/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start"
            data-scrollax-parent="true">
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
        <a href="{{ route('posts.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Create New
            Post</a>
    </div>
    <div class="col-md-12">
    </div>
</div>

<div class="container pt-4">
    <div class="col-md-12">
        <table class="table" id="posts">
            <thead>
                <th>Id</th>
                <th>Title</th>
                <th>Body</th>
                <th>Slug</th>
                <th>Created At</th>
                <th>Action</th>
            </thead>

        </table>
    </div>
</div>

@stop
@push('myscript')
{{-- <script src="//code.jquery.com/jquery.js"></script> --}}
<!-- DataTables -->
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<!-- Bootstrap JavaScript -->
{{-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> --}}
<script>
    $(document).ready(function(){
    $('#posts').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{route("posts.index")}}',
        columns: [
            { data: 'id', name: 'id' ,
            render: function (data, type, row, meta) {
                      return meta.row + meta.settings._iDisplayStart + 1;
                      }
                    },
            { data: 'title', name: 'title' },
            { data: 'body', name: 'body' },
            { data: 'slug', name: 'slug' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action'},
            // {data: 'id', orderable : false , searchable : false,
            // render: function(data){
            //     return '<a href="posts/' + data +'/edit" class="btn"><i class="fa fa-edit"></i></a>' ;
            // }
            // }
        ]
    });
})

</script>
@endpush
