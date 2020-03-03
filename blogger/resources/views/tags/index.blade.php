@extends('main2')

@section('title', '| All Tags')

@section('content')

<div class="container">
    <div class="col-md-3 pt-3">
        <button type="button" id="node" class="btn btn-primary" data-toggle="modal" data-target="#tag-1"><i
                class="fa fa-plus"></i> Add New Tag</button>
    </div>

    <div class="col-md-8 pt-3">
        <table class="table" id="tag">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Action</th>

                </tr>
            </thead>
        </table>
    </div>


</div>

<div class="modal fade" id="tag-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Tag</h5>
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
                                    <label><strong>Tag Name</strong> <small class="text-danger">*</small></label>
                                    <input type="hidden" name="cart" id="cart" value="">
                                    <input type="text" id="name" name="name" class="form-control">
                                    <p class="name-error text-danger"></p>
                                </div>
                            </div>

                            <div class="form-row justify-content-center">
                                <div class="form-group col-sm-12">
                                    <hr />
                                    <button type="reset" class="btn btn-outline-primary"><i class="fa fa-refresh"></i>
                                        Reset</button>
                                    <input type="hidden" id="button-action">
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

@stop
@push('myscript')

<script>
    $(document).ready(function(){
    $('#tag').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{route("tags.index")}}',
        columns: [
            { data: 'id', name: 'id' ,
            render: function (data, type, row, meta) {
                      return meta.row + meta.settings._iDisplayStart + 1;
                      }
                    },
            { data: 'name', name: 'name' },
            { data: 'action', name: 'action' }
        ]
    });

    $('#node').click(function(){
       $('.modal-title').text('Add New Tag');
       $('#button-action').val('Add');
    });

    $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });

    $('#form_room_type').on('submit', function(e){
        e.preventDefault();

        let name = jQuery('#name').val();
        let url;
        let id = $('#cart').val();
        let typeMethod;
        if($('#button-action').val()=='Add'){
            url = 'tags'
        } else {
            url = `tags/${id}`
            typeMethod = 'PATCH'
        }

        $.ajax({
            url: url,
            method: 'POST',
            data: {
                name: name,
                '_method': typeMethod
            },
            success: function(){
                $('#tag-1').modal('hide');
                $("#tag").DataTable().ajax.reload();
                $('#form_room_type')[0].reset();
                $('#success_content').html('Your record has been added');
                $('#success').modal('show');
                $('.modal-backdrop').remove()
            },
            error: function(err){
                showError(err);
                console.log(err);
            }
        })
      })

      function showError(err){
            err.responseJSON.errors.name ? $('.name-error').html(err.responseJSON.errors.name) : ''
        }

        function clearError(){
            $('.name-error').empty()
        }

      $(document).on('click', '.edit-tag', function(){
        clearError()
        let id = $(this).data('id');
        $.ajax({
            url: `tags/${id}/edit`,
            success: function(data){
                $('#name').val(data.name),
                $('#cart').val(id),
                $('.modal-title').text('Edit Tag'),
                $('#button-action').val('Edit')

            },
            error: function(err){
                alert(id)
                console.log(err)
            }
        })
    })

      $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });

    $(document).on('click', '.delete-tag', function(){
        let id = $(this).data('id');
        $('#delete-id').val(id);
    })


    $('#form-delete').on('submit', function(e){
        e.preventDefault();
        let id = $('#delete-id').val();
        $.ajax({
            url: `tags/${id}`,
            method: 'post',
            data:{
                '_method': 'delete'
            },

            beforeSend:function(){
                $('#ok-button').text('Deleting...');
            },
            success: function(){
                $('#confirm-modal').modal('hide');
                $('#tag').DataTable().ajax.reload();
                $('#success_content').html('Your record has been deleted');
                $('#success').modal('show');
                $('.modal-backdrop').remove();
            },
            error: function(err){
                console.log(err);
            }
        })
    });
});
</script>
@endpush
