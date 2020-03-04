@extends('main2')

@section('title', '| All Posts')

@section('content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Total Post</h5>
                                <span class="h2 font-weight-bold mb-0">{{ $posts->count()  }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                        <i class="fa fa-blog"></i>
                                    </div>
                                </div>
                            </div>
                            {{-- <a href="#">See more <i class="fa fa-arrow-circle-down"></i></a> --}}
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Total Categories</h5>
                                    <span class="h2 font-weight-bold mb-0">{{ $categories->count()  }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                        <i class="fa fa-filter"></i>
                                    </div>
                                </div>
                            </div>
                            {{-- <a href="/categories">See more <i class="fa fa-arrow-circle-right"></i></a> --}}
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Total Tags</h5>
                                    <span class="h2 font-weight-bold mb-0">{{ $tags->count() }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                        <i class="fa fa-tags"></i>
                                    </div>
                                </div>
                            </div>
                            {{-- <a href="/tags">See more <i class="fa fa-arrow-circle-right"></i></a> --}}
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Total Comment</h5>
                                    <span class="h2 font-weight-bold mb-0">{{ $comments->count() }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                        <i class="fa fa-comments"></i>
                                    </div>
                                </div>
                            </div>
                            {{-- <a href="#">See more <i class="fa fa-arrow-circle-right"></i></a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid ">

    <div class="row pt-4">

        <div class="col-md-3">
            <a href="{{ route('posts.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing"><i class="fas fa-plus"></i> Create New
                Post</a>
        </div>
        <div class="col-md-12">
        </div>
    </div>

    <div class="row pt-4">
        <div class="col-md-12">
            <table class="table" id="posts">
                <thead>
                    <th>ID</th>
                    <th>Title</th>
                    {{-- <th>Body</th> --}}
                    <th>Slug</th>
                    <th>Created At</th>
                    <th>Action</th>
                </thead>

            </table>
        </div>
    </div>

</div>


<div class="modal fade" id="confirm-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-notify modal-danger" role="document">
        <!--Content-->
        <form method="post" id="form-delete">
            @csrf
            <div class="modal-content" style="background-color: #f8f9fa">
                <!--Body-->
                <div class="modal-body">
                    <div class="text-center">
                        <i class="far fa-times-circle fa-8x text-danger mb-3"></i>
                        <h4>Are you sure you want to remove this data?</h4>
                    </div>
                </div>

                <!--Footer-->
                <div class="modal-footer justify-content-center">
                    <input type="hidden" id="delete-id" value="">
                    <button type="submit" id="ok-button" class="btn btn-danger">Remove</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
        <!--/.Content-->
    </div>
</div>

<div id="success" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center">
                    <i class="far fa-check-circle fa-8x text-success mb-3"></i>
                    <h4 class="modal-title">Awesome!</h4>
                </div>
                <p class="text-center" id="success_content">Your booking has been confirmed. Check your email for
                    detials.</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success btn-block" data-dismiss="modal">OK</button>
            </div>
        </div>
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
            // { data: 'body', name: 'body' },
            { data: 'slug', name: 'slug' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action' }
        ]
    });

    // $('.delete-post').click(function(){
    //     console.log(2);
    //     let id = $(this).data('id');
    //     $('#delete-id').val(id);
    //             console.log( $('#delete-id').val())

    // });
    $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
    $(document).on('click', '.delete-post', function(){
        let id = $(this).data('id');
        $('#delete-id').val(id);
        // console.log(id)
    })

    $('#form-delete').on('submit', function(e){
        e.preventDefault();
        let id = $('#delete-id').val();
        $.ajax({
            url: `posts/${id}`,
            method: 'post',
            data:{
                '_method': 'delete'
            },

            beforeSend:function(){
                $('#ok-button').text('Deleting...');
            },
            success: function(){
                $('#confirm-modal').modal('hide');
                $('#posts').DataTable().ajax.reload();
                $('#success_content').html('Your record has been deleted');
                $('#success').modal('show');
                $('.modal-backdrop').remove();
            },
            error: function(err){
                console.log(err);
            }
        })
    })
})

</script>
@endpush
