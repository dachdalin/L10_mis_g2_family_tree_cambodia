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

    .role-list {
        margin-top: 10px;
    }

    .role-category {
        font-weight: bold;
        margin-top: 15px;
    }

    .role-item {
        border-bottom: 1px solid #ccc;
        padding: 10px;
        color: #666;
    }

    .role-category {
        /* border-bottom: 1px solid #ccc; */
        padding: 10px;
        cursor: pointer;
        color: #666;
    }

    .role-category.selected {
        background-color: #f0f0f0; /* Change background color when selected */
    }

    .role-category.selected::after {
        content: '\2714'; /* Unicode check mark icon */
        float: right;
        color: green;
        font-size: 1.2em;
        margin-left: 5px;
    }


  </style>
@endpush

@section('content')
  @section('breadcrumb')
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Teams</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Teams</li>
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

            <div class="container-fluid mt-4">
                <div class="row">

                    <div class="col-md-12">

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <h4 class="section-title mb-0">Team Name</h4>
                                <span>The team's name and owner information.</span>


                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                    <h4 class="section-title mb-0">Owner :</h4>
                                    </div>
                                    <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ Auth::user()->profile_photo_path ? asset(Auth::user()->profile_photo_path) : 'https://via.placeholder.com/100' }}" alt="Ancestor Picture" class="mb-2 mr-3">
                                        <div>
                                            <p>{{ Auth::user()->firstname }}</p>
                                            <p>{{ Auth::user()->email }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
                                    </div>
                                    <div class="form-group">
                                        <label for="description" class="form-control-label mb-1">Description:</label>
                                        <textarea id="description" name="description"
                                                class="textarea_editor form-control border-radius-0"  placeholder="Enter text ..."></textarea>
                                        <span class="text-danger error-text description_error"></span>
                                    </div>
                                    </div>
                                    <div class="card-footer text-right">
                                    <button type="button" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <h4 class="section-title mb-0">Add Team Member</h4>
                                <span>Add a new team member to your team, allowing them to collaborate with you.</span>


                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h4 class="section-title mb-0">Owner :</h4>
                                    </div>


                                    <div class="card-body">
                                        <span>Please provide the email address of the new user you would like to add to this team.
                                            Then select the role for the new user.</span>
                                        <div class="form-group">
                                            <label for="userEmail">Email</label>
                                            <input type="email" class="form-control" id="userEmail" placeholder="Enter email address">
                                        </div>
                                        <div class="form-group">
                                            <label for="userRole">Role:</label>
                                            <div class="border rounded p-2 role-list">
                                                <div class="role-category" data-role="administrator">Administrator</div>
                                                <div class="role-item">
                                                    Administrators can perform any action and manage the application.
                                                </div>
                                                <div class="role-category" data-role="manager">Manager</div>
                                                <div class="role-item">
                                                    Managers can perform any action on people.
                                                </div>
                                                <div class="role-category" data-role="editor">Editor</div>
                                                <div class="role-item">
                                                    Editors have the ability to create, read and update people.
                                                </div>
                                                <div class="role-category" data-role="member">Member</div>
                                                <div class="role-item">
                                                    Members have the ability to read people.
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="card-footer text-right">
                                        <button type="button" class="btn btn-primary">Add</button>
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

$(document).ready(function() {
    $('.role-category').click(function() {
        $('.role-category').removeClass('selected'); // Remove 'selected' class from all items
        $(this).addClass('selected'); // Add 'selected' class to the clicked item
    });
});

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



