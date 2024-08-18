@extends('layouts.layout')

@push('vendor-styles')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('asset/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

  <!-- daterange picker -->
  <link rel="stylesheet" href="{{asset('asset')}}/plugins/daterangepicker/daterangepicker.css">
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
        <h1>People Certificate</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">People Certificate</li>
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
              {{-- @include('backend.people.people_buttons')             --}}
            </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
              <style>
                body {
                  font-family: Arial, sans-serif;
                  background-color: #f8f8f8;
                  display: flex;
                  justify-content: center;
                  align-items: center;
                  height: 100vh;
              }

              .form-container {
                  background: white;
                  padding: 20px;
                  border: 1px solid #ccc;
                  width: 800px;
                  box-shadow: 0 0 10px rgba(0,0,0,0.1);
              }

              header, footer {
                  display: flex;
                  justify-content: space-between;
                  margin-bottom: 20px;
              }

              .header-content .left, .header-content .right {
                  display: flex;
                  flex-direction: column;
              }

              header p, footer p {
                  margin: 0;
                  padding: 2px 0;
              }

              .main-form {
                  text-align: center;
              }

              .main-form h2 {
                  margin-bottom: 20px;
              }

              table {
                  width: 100%;
                  border-collapse: collapse;
              }

              th, td {
                  border: 1px solid #ccc;
                  padding: 10px;
                  text-align: left;
              }

            </style>

            <div class="container mt-4">
              <div class="row">
                  <div class="col-md-12">
                      <div class="row">

                        <div class="col-md-12 mb-3">

                          <div class="form-container">
                            <header>
                                <div class="header-content">
                                    <div class="left">
                                        <p>ឈ្មោះ ឪពុក: ___________________</p>
                                        <p>ឈ្មោះ ម្តាយ: ___________________</p>
                                        <p>ឈ្មោះ ប្ដី: ___________________</p>
                                    </div>
                                    <div class="right">
                                        <p>ក្រសួងមហាផ្ទៃ</p>
                                        <p>រដ្ឋបាលខេត្តកណ្តាល</p>
                                        <p>***</p>
                                    </div>
                                </div>
                            </header>

                            <section class="main-form">
                                <h2>សំបុត្រកំណើត</h2>
                                <table>
                                    <tr>
                                        <th>ជនជាតិ</th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>ឈ្មោះ</th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>ឪពុកឈ្មោះ</th>
                                        <td></td>
                                        <th>ម្តាយឈ្មោះ</th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>សញ្ជាតិ</th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>ថ្ងៃ ខែ ឆ្នាំកំណើត</th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>ទីកន្លែងកំណើត</th>
                                        <td colspan="3"></td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">ជនជាតិ</th>
                                        <th>ភេទ</th>
                                        <th>មុខរបរ</th>
                                    </tr>
                                    <tr>
                                        <th>ឪពុកឈ្មោះ</th>
                                        <td></td>
                                        <th>ម្តាយឈ្មោះ</th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>សញ្ជាតិ</th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>ថ្ងៃ ខែ ឆ្នាំកំណើត</th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>ទីកន្លែងកំណើត</th>
                                        <td colspan="3"></td>
                                    </tr>
                                </table>
                            </section>

                            <footer>
                                <p>បច្ចុប្បន្នទីកន្លែងដំណឹង: ___________________</p>
                                <p>ថ្ងៃ..........ខែ..........ឆ្នាំ..........</p>
                                <p>អធិការកិច្ច</p>
                            </footer>
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



