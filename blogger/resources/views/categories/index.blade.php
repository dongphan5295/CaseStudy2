@extends('main')

@section('title', '| All Categories')

@section('content')

<div style="background-image: url('/images/image1.png'); height: 600px;" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        {{-- <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
        <div class="col-md-12 ftco-animate">
            <h1 class="mb-4 mb-md-0">Create New Category</h1>
            </div>
        </div> --}}
    </div>
</div>

<div class="container">

    <div class="col-md-4 pt-4 pb-4">
        {{-- <div class="well">
            {!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}
            <h2>Create New Category</h2>
            {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, ['class' => 'form-control']) }}
        {!! Form::submit('Create New Category', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) !!}
        {!! Form::close() !!}

    </div> --}}
    <button type="button" id="node" class="btn btn-primary" data-toggle="modal" data-target="#cate"><i
            class="fa fa-plus"></i> Add New Category</button>
</div>

<div class="col-md-8">
    <h1>Categories</h1>
    <table class="table" id="lacoste">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Action</th>

            </tr>
        </thead>
    </table>
</div>

</div>

<div class="modal fade" id="cate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form id="form_room_type" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row justify-content-center">
                                <div class="form-group col-md-6">
                                    <label><strong>Category Name</strong> <small class="text-danger">*</small></label>
                                    <input type="hidden" name="room_type_id" id="room_type_id" value="">
                                    <input type="text" id="name" name="name" class="form-control">
                                </div>
                            </div>

                            <div class="form-row justify-content-center">
                                <div class="form-group col-sm-12">
                                    <hr />
                                    <button type="reset" class="btn btn-outline-primary"><i class="fa fa-refresh"></i>
                                        Reset</button>
                                    <button type="submit" class="btn btn-primary btn-submit" name="action_button"
                                        id="action_button"><i class="fa fa-save"></i>
                                        Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@push('script')
{{-- <script src="//code.jquery.com/jquery-1.10.2.min.js"></script> --}}
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>


<script>
    $(document).ready(function(){
    //     $('#lacoste').DataTable({
    //       processing: true,
    //       serverSide: true,
    //       ajax: "{{ route('categories.index') }}",
    //       columns: [
    //           {
    //               data: 'id',
    //               render: function (data, type, row, meta) {
    //                   return meta.row + meta.settings._iDisplayStart + 1;
    //                   }
    //           },
    //           {
    //               data: 'name', name: 'name'
    //           }
    //       ],
    //       order: [[0, 'asc']]
    //   });

        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });


        $('#form_room_type').on('submit', function(e){
        e.preventDefault();

        let name = jQuery('#name').val()

        $.ajax({
            url: 'categories',
            method: 'POST',
            data: {
                name: name,
            },
            success: function(){
                alert(2)
                $('#add_room_type').modal('hide');
                $("#roomType").DataTable().ajax.reload();
                $('#form_room_type')[0].reset();
                $('#success_content').html('Your record has been added');
                $('#success').modal('show');
            },
            error: function(err){
                console.log(err);
            }
        });
    });
});

//     $(document).ready(function(){
//     $('#lacoste').DataTable({
//         processing: true,
//         serverSide: true,
//         ajax: '{{route("posts.index")}}',
//         columns: [
//             { data: 'id', name: 'id' },
//             // { data: 'title', name: 'title' },
//             // { data: 'body', name: 'body' },
//             { data: 'name', name: 'name' },
//             // { data: 'created_at', name: 'created_at' },
//             {data: 'id', orderable : false , searchable : false,
//             render: function(data){
//                 return '<a href="posts/' + data +'/edit" class="btn"><i class="fa fa-edit"></i></a>' ;
//             }
//             }
//         ]
//     });
// })
</script>
@endpush
