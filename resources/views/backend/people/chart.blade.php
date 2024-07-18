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

    .family-chart {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    font-size: 1rem;
  }
  .family-chart th, .family-chart td {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
  }
  .family-chart th {
    background-color: #f2f2f2;
  }
  .family-chart .relationship {
    background-color: #f9f9f9;
    font-weight: bold;
  }
  .family-chart a {
    color: #007bff;
    text-decoration: none;
  }
  .family-chart a:hover {
    text-decoration: underline;
  }
  .family-chart .icon {
    margin-left: 5px;
  }
  </style>
@endpush

@section('content')
  @section('breadcrumb')
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Family Chart</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Family Chart</li>
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
            
            <div class="row">
              <div class="col-sm-12">
                <table class="family-chart">
                  <tr>
                    <th colspan="2">Family Chart</th>
                  </tr>
                  <tr>
                    <td class="relationship">Grandfather & Grandmother:</td>
                    <td>
                      <span>👴❓</span> & <span>👵❓</span>
                    </td>
                  </tr>
                  <tr>
                    <td class="relationship">Uncles & Aunts:</td>
                    <td>
                      <span>👨❓</span> & <span>👩❓</span>
                    </td>
                  </tr>
                  <tr>
                    <td class="relationship">Father & Mother:</td>
                    <td>
                      <a href="#">Michael Middleton</a> <span class="icon">👨</span> & <a href="#">Carole Middleton</a> <span class="icon">👩</span>
                    </td>
                  </tr>
                  <tr>
                    <td class="relationship">Children:</td>
                    <td>
                      1. <a href="#">George Prince of Cambridge</a> <span class="icon">👦</span><br>
                      2. <a href="#">Charlotte Princess of Cambridge</a> <span class="icon">👧</span><br>
                      3. <a href="#">Louis Prince of Cambridge</a> <span class="icon">👦</span>
                    </td>
                  </tr>
                  <tr>
                    <td class="relationship">Grandchildren:</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="relationship">Siblings:</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="relationship">Nephews & Nieces:</td>
                    <td></td>
                  </tr>
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

  {{-- @include('backend.people.templates.crudModal') --}}
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
<script src="{{asset('asset')}}/plugins/daterangepicker/daterangepicker.js"></script>

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

      $('#frmCrudObject').on('submit', function(e) {
            e.preventDefault();

            var actionUrl = $(this).attr('action');
            var method = $(this).attr('method');
            $('#btnObjectSave').html('Processing..');
            $('#btnObjectUpdate').html('Processing..');

            $.ajax({
                type: method,
                url: actionUrl,
                data: new FormData(this),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function() {
                    $(document).find('span.error-text').text('');
                },
                success: function(res) {
                    console.log(res);
                    if (res.status == 400) {
                        $.each(res.error, function(prefix, val) {
                            $('span.' + prefix + '_error').text(val[0]);
                        });
                    } else {
                        var $html = $(res.html);
                        if (res.type == 'store-object') {
                            $('tbody#objectList').append($html);
                        } else {
                            $("#tr_object_id_" + res.data.id).replaceWith($html);
                        }
                        $('#frmCrudObject').trigger("reset");
                        $('#btnObjectSave').html('{{ trans('global.save') }}');
                        $('#showPhoto').attr('src', "{{asset('images/no_image_available.jpg')}}");
                        $('#btnObjectUpdate').html('{{ trans('global.update') }}');
                        toastr.success(res.success);
                        $('#crudObjectModal').modal('hide');

                        // Redirect to people.show route
                        if (res.data && res.data.id) {
                            window.location.href = '{{ route("admin.peoples.show", ":id") }}'.replace(':id', res.data.id);
                        }
                    }
                },
                error: function(error) {
                    console.log('Error:', error);
                    $('#btnObjectSave').html('{{ trans('global.save') }}');
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



