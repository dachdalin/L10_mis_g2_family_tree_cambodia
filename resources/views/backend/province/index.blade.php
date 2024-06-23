@extends('layouts.layout')

@push('vendor-styles')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('asset/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endpush

@push('page-styles')
  <link rel="stylesheet" type="text/css" href="{{asset('asset')}}/dist/css/toggle.css">
  <link rel="stylesheet" type="text/css" href="{{asset('asset')}}/vendors/toastrjs/toastr.min.css">
  <link rel="stylesheet" type="text/css" href="{{asset('asset')}}/vendors/sweetalert2/sweetalert2.min.css">
  <style>
    input.ace-switch.ace-switch-yesno:checked::before {
      content: "Yes";
    }
    input.ace-switch.ace-switch-yesno::before {
      content: "No";
    }
    input.ace-switch.ace-switch-yesno::after {
      margin-top: 0.004rem;
      margin-left: 0.004rem;
    }
    input.ace-switch.ace-switch-onoff:checked::before {
      content: "On";
    }
    input.ace-switch.ace-switch-onoff::before {
      content: "Off";
    }
    .dt-buttons button {
        background-color: #17A2B8;
    }
  </style>
@endpush

@section('content')
  @section('breadcrumb')
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Province</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Province</li>
        </ol>
      </div>
    </div>
  </div>
  @endsection

  <div class="container-fluid">
    <div class="row">
      <div class="col-12">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">DataTable with default features</h3>
            <a class="btn btn-info float-right" data-toggle="modal" data-target="#provinceModal">
              <i class="fas fa-plus"></i> Add
            </a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

            <div class="row">
              <div class="col-sm-12">
                <table id="table_provinces" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                  <thead>
                    <tr>
                      <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Name</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Code</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Create At</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody id="objectList">
                    @foreach ($provinces as $row)
                      <tr id="tr_object_id_{{ $row->id }}" class="bgc-h-orange-l4">
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->province_code }}</td>
                        <td>{{ date('d-M-Y',strtotime($row->created_at)) }}</td>
                        <td>
                          <input id="status" name="status" data-id="{{ $row->id }}" {{ $row->status?'checked':'' }} title="Status" type="checkbox" class="ace-switch input-lg ace-switch-yesno bgc-green-d2 text-grey-m2" />
                        </td>
                        <td>
                          @include('backend.templates.crudAction')
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Name</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Code</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Create At</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Status</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                </table>
            </div>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>

  @include('backend.province.templates.crudModal')
@endsection

@push('vendor-scripts')
  <!-- DataTables  & Plugins -->
<script src="{{asset('asset')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('asset')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('asset')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('asset')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset('asset')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('asset')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('asset')}}/plugins/jszip/jszip.min.js"></script>
<script src="{{asset('asset')}}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{asset('asset')}}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{asset('asset')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('asset')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('asset')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
  $(function () {
    $("#table_provinces").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  });
</script>
@endpush

@push('page-scripts')
  <script src="{{asset('asset')}}/vendors/toastrjs/toastr.min.js"></script>
  <script src="{{asset('asset')}}/vendors/sweetalert2/sweetalert2.all.min.js"></script>


  <script>
    $(document).ready(function () {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $('#addNewObject').on('click',function(e){
        e.preventDefault();
        $('#provinceModal').find('.modal-title').html('Add New Province');
        $('#frmCrudObject').find('#object_id').val('');
        $('#frmCrudObject').find('#btnObjectSave').html(`<i class="far fa-save text-danger-tp1 radius-round mr-1 align-middle pt-10"></i>
                                                        <span class="align-middle pl-1 pr-2">Save</span>`);
        $('#frmCrudObject').find('#btnObjectSave').removeClass('d-none');
        $('#frmCrudObject').find('#btnObjectUpdate').addClass('d-none');
        $('#frmCrudObject').trigger('reset');
        $('#provinceModal').modal('show');
      });

      $('#frmCrudObject').on('submit',function(e){
        e.preventDefault();
        var actionUrl = $(this).attr('action');
        var method = $(this).attr('method')
        $('#btnObjectSave').html('Processing..');
        $('#btnObjectUpdate').html('Processing..');
        $.ajax({
          type: method,
          url: actionUrl,
          data: new FormData(this),
          processData:false,
          dataType:'json',
          contentType:false,
          beforeSend:function(){
            $(document).find('span.error-text').text('');
          },
          success: function (res) {
            console.log(res)
            if(res.status==400){
              $.each(res.error, function(prefix, val){
                $('span.'+prefix+'_error').text(val[0]);
              });
            } else {
              var $html = $(res.html);
              if(res.type == 'store-object'){
                $('tbody#objectList').append($html);
              }else{
                $("#tr_object_id_" + res.data.id).replaceWith($html);
              }
              $('#frmCrudObject').trigger("reset");
              $('#provinceModal').modal('hide');
              $('#btnObjectSave').html('Save');
              $('#btnObjectUpdate').html('Update');
              toastr.success(res.success);
            }
          },
          error: function (error) {
            console.log('Error:', error);
            $('#btnObjectSave').html('Save');
            $('#btnObjectUpdate').html('Update');
            // toastr.error(res.error);
          }
        });
      });

      $('body').on('click', '#objectEdit', function (e) {
        e.preventDefault();
        $('#frmCrudObject').find('#btnObjectSave').addClass('d-none');
        $('#frmCrudObject').find('#btnObjectUpdate').removeClass('d-none');
        $('#frmCrudObject').find('#btnObjectUpdate').html('<i class="fadeIn animated bx bx-edit"></i>&nbsp;Update');
        $('#frmCrudObject').trigger('reset');
        var object_id = $(this).data('id');
        var form = $('#frmCrudObject');
        var modal = $('#provinceModal');
        var actionUrl = $('#crudRoutePath').val();
        modal.find('.modal-title').html('Edit Province');
        $.get( actionUrl +'/' +object_id+'/edit', function (res) {
          form.find('#object_id').val(res.data.id);

          form.find('#name').val(res.data.name);
          form.find('#province_code').val(res.data.province_code);
          if(res.data.status==1){
            form.find('#status').prop('checked',true);
          } else {
            form.find('#status').prop('checked',false);
          }
          modal.modal('show');
        })
      });

      $('body').on('click', '.objectDelete', function (e) {
        e.preventDefault();
        var object_id = $(this).data("id");
        var link = $(this).attr("href");
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.value) {
            $.ajax({
              type: "DELETE",
              url:link,
              success: function (data) {
                // Remove the data from the active table
                $("#tr_object_id_" + object_id).remove();

                var newRowHtml = `
                    @include('backend.province.templates.ajax_tr_trash')
                `;

                $('#objectListTrashed').append(newRowHtml);
                toastr.success('User has been deleted into trashed successfully!');
                },
              error: function (data) {
                console.log('Error:', data);
              }
            });
          }
        })
      });

      // Restore all trashed users
      $('#restoreAllObject').on('click', function(e){
          e.preventDefault();
          Swal.fire({
              title: 'Restore All Users',
              text: "Are you sure you want to restore all trashed users?",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, restore all!'
          }).then((result) => {
              if (result.value) {
                  // Send Ajax request to restore all trashed users
                  $.ajax({
                      type: "POST",
                      url: "{{ route('admin.'.$crudRoutePath.'.restoreAll') }}",
                      data: {_token: "{{ csrf_token() }}"},
                      success: function (data) {
                    // Remove the restored user row from the trashed users table
                    $("#tr_object_id_" + object_id).empty();
                    // toastr.success(data.success);

                    // If trashed users table becomes empty, hide or show a message
                    if ($('#objectListTrashed tbody tr').length === 0) {
                        $('#objectListTrashed').hide(); // or you can display a message
                    }

                        // Render the row using the provided template
                        var newRowHtml = `
                            @include('backend.province.templates.ajax_tr')
                        `;

                        $('#objectList').append(newRowHtml);
                        toastr.success('All user has been restored successfully!');
                },
                error: function (data) {
                    console.log('Error:', data);
                }
                  });
              }
          });
      });

      // Restore a single trashed user
      $('body').on('click', '#restoreObject', function (e) {
          e.preventDefault();
          var object_id = $(this).data("id");
          var link = $(this).attr("href");

          Swal.fire({
              title: 'Restore User',
              text: "Are you sure you want to restore this trashed user?",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, restore it!'
          }).then((result) => {
              if (result.value) {
                  // Send Ajax request to restore the trashed user
                  $.ajax({
                      type: "POST",
                      url: link,
                      data: {_token: "{{ csrf_token() }}"},
                      success: function (data) {
                          // Remove the restored user row from the trashed users table
                          $("#tr_object_id_" + object_id).remove();
                          // toastr.success(data.success);

                          // If trashed users table becomes empty, hide or show a message
                          if ($('#objectListTrashed tbody tr').length === 0) {
                              $('#objectListTrashed').hide(); // or you can display a message
                          }

                          var newRowHtml = `
                              @include('backend.province.templates.ajax_tr')
                          `;

                          $('#objectList').append(newRowHtml);
                          toastr.success('User has been restore from trashed successfully!');
                      },
                      error: function (data) {
                          console.log('Error:', data);
                      }
                  });

                  // Optionally, you can add logic here to update the active users table
              }
          });
      });


      $('#btnObjectClose').on('click',function(e){
        e.preventDefault();
        $('#frmCrudObject').find('#btnObjectSave').removeClass('d-none');
        $('#frmCrudObject').find('#btnObjectUpdate').addClass('d-none');
        $('#provinceModal').find('.modal-title').html('Add New User');
        $('#frmCrudObject').trigger('reset');
      });


      $('body').on('change','.ace-switch',function(e){
        var object_id = $(this).data('id');
        var status = $(this).prop('checked')==true ? 1 :0 ;
        $.ajax({
          type : 'GET',
          dataType: 'JSON',
          url :'{{ route('admin.provinces.changeStatus') }}',
          data: {
            'status':status,
            'object_id':object_id
          },
          success:function(res){
            toastr.success(res.success);
          },
          error:function(err){
            console.log(err);
          }
        })
      });



    });
  </script>
@endpush



