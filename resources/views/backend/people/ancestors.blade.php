@extends('layouts.layout')

@push('vendor-styles')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('asset/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

  <!-- daterange picker -->
  {{-- <link rel="stylesheet" href="{{asset('asset')}}/plugins/daterangepicker/daterangepicker.css"> --}}
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
    hr.hr-5 {
      border: 0;
      border-top: 3px double #8c8c8c;
    }
  </style>
@endpush

@section('content')
  @section('breadcrumb')
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Profile</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Profile</li>
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
            @include('backend.people.people_buttons')
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
              <style>
                .profile-card img {
                    width: 100%;
                    height: auto;
                }
                .card-title {
                    font-weight: bold;
                }
                .card-body p {
                    margin: 0;
                }
                .section-title {
                    font-size: 1.25rem;
                    margin-bottom: 1rem;
                }
                .list-group-item {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                }
                .list-group-item span {
                    flex-grow: 1;
                    text-align: right;
                }
                .dropdown-menu {
                    right: 0;
                    left: auto;
                }
              </style>

            <div class="container mt-4">
              <div class="row">
                  <div class="col-md-8">
                      <div class="row">

                        <div class="col-md-6 mb-3">

                            <div class="card">
                              <div class="card-header d-flex justify-content-between align-items-center">
                                  <h4 class="section-title mb-0">Ancestors</h4>
                                  <div class="dropdown">
                                      <button class="btn btn-tool dropdown-toggle" type="button" id="ancestorsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <i class="fas fa-bars"></i>
                                      </button>
                                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="ancestorsDropdown">
                                          <a class="dropdown-item" href="#">Edit ancestors</a>
                                          <div class="dropdown-divider"></div>
                                          <a class="dropdown-item text-danger" href="#">Delete ancestors</a>
                                      </div>
                                  </div>
                              </div>
                              <div class="card-body text-center">
                                  <img src="https://via.placeholder.com/100" alt="Ancestor Picture" class="mb-2">
                                  <p>dara Mr</p>
                              </div>
                            </div>

                        </div>

                      </div>
                  </div>
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

<!-- date-range-picker -->
{{-- <script src="{{asset('asset')}}/plugins/daterangepicker/daterangepicker.js"></script> --}}

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });


    $("#example1").DataTable({
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
        $('#crudObjectModal').find('.modal-title').html('Add person');

        // Clear the input image when modal is close
        $('#crudObjectModal').on('hidden.bs.modal', function (){
          $('#image').val('');
          $('#showPhoto').attr('src', "{{asset('images/no_image_available.jpg')}}");
        });

        $('#frmCrudObject').find('#object_id').val('');
        $('#frmCrudObject').find('#btnObjectSave').html(`<i class="far fa-save text-danger-tp1 radius-round mr-1 align-middle pt-10"></i>
                                                        <span class="align-middle pl-1 pr-2">Save</span>`);
        $('#frmCrudObject').find('#btnObjectSave').removeClass('d-none');
        $('#frmCrudObject').find('#btnObjectUpdate').addClass('d-none');
        $('#frmCrudObject').trigger('reset');
        $('#crudObjectModal').modal('show');


        // Clear the image when click on button add
        $('#image').val('');
        $('#showPhoto').attr('src', "{{asset('images/no_image_available.jpg')}}");
      });

      $('#frmCrudObject').on('submit',function(e){
        e.preventDefault();

        var actionUrl = $(this).attr('action');
        var method = $(this).attr('method')
        $('#btnObjectSave').html('Processing..'); // After click save it should redirect to people show
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
                $('#btnObjectSave').html('{{ trans('global.save') }}');
                $('#showPhoto').attr('src',"{{asset('images/no_image_available.jpg')}}");
              $('#btnObjectUpdate').html('{{ trans('global.update') }}');
              toastr.success(res.success);
              $('#crudObjectModal' ).modal('hide');
            }
          },
          error: function (error) {
            console.log('Error:', error);
            $('#btnObjectSave').html('{{ trans('global.save')}}');
            $('#btnObjectUpdate').html('{{ trans('global.update') }}');
          }
        });
      });



      $('#btnObjectClose').on('click',function(e){
        e.preventDefault();
        $('#frmCrudObject').find('#btnObjectSave').removeClass('d-none');
        $('#frmCrudObject').find('#btnObjectUpdate').addClass('d-none');
        $('#crudObjectModal').find('.modal-title').html('Add New User');
        $('#frmCrudObject').trigger('reset');
      });



    });
  </script>

<script>

  // -------------Browse photo------------------
  $('.show-photo').on('click',function(e){
    $('#school_img').click();
  })
  $('#school_img').on('change',function(e){
    showFile(this,'#showPhoto');
  })
  // ======================================
  function showFile(fileInput,img,showName){
    if (fileInput.files[0]){
      var reader = new FileReader();
      reader.onload = function(e){
        $(img).attr('src',e.target.result);
      }
      reader.readAsDataURL(fileInput.files[0]);
    }
    $(showName).text(fileInput.files[0].name)
  };


</script>
@endpush



