@extends('layouts.layout')

@push('vendor-styles')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('asset/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

  <!-- daterange picker -->
  <link rel="stylesheet" href="{{ asset('asset/plugins/daterangepicker/daterangepicker.css')}}">
@endpush

@push('page-styles')
  <link rel="stylesheet" type="text/css" href="{{ asset('asset/dist/css/toggle.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('asset/vendors/toastrjs/toastr.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('asset/vendors/sweetalert2/sweetalert2.min.css')}}">
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

    .person-card {
      margin-bottom: 1rem;
    }

    .person-card img {
      width: 100%;
      height: auto;
    }

    .card {
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: 0.3s;
    }

    .card:hover {
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .card-body {
      padding: 15px;
    }

    .card-title {
      font-size: 1.25rem;
      margin-bottom: 0.75rem;
    }

    .card-text {
      font-size: 0.9rem;
      color: #666;
    }

    .card-footer {
      background-color: #f8f9fa;
      border-top: 1px solid #e9ecef;
    }

    .btn-primary {
      background-color: #007bff;
      border: none;
    }

    .btn-secondary {
      background-color: #6c757d;
      border: none;
    }
  </style>
@endpush

@section('content')
  @section('breadcrumb')
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Peoples</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Peoples</li>
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
            <h3 class="card-title">Family: <span id="active-team-name">{{ $active_team_name }}</span> ({{ $member_count }} available in {{ $active_team_name }})</h3>
            <a class="btn btn-info float-right" data-toggle="modal" data-target="#crudObjectModal">
              <i class="fas fa-plus"></i> Add person
            </a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
              <div class="row">
                <div class="col-sm-6">
                  <p>Insert either a firstname, lastname, a birthname or a nickname. <span style="color: red;">Do not combine!</span></p>
                  <form id="search-form">
                    <div class="input-group">
                      <input type="hidden" name="team_id" value="{{ $active_team_id }}">
                      <input type="search" name="query" id="search-input" class="form-control form-control-lg" placeholder="Type your keywords here">
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-lg btn-default">
                          <i class="fa fa-search"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="col-sm-6">
                  <div class="form-group" data-select2-id="29">
                    <label>Switch Family Team</label>
                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" id="team-switch" data-select2-id="1" tabindex="-1" aria-hidden="true">
                      @foreach($teams as $team)
                        <option value="{{ $team->id }}" {{ $team->id == $active_team_id ? 'selected' : '' }}>
                          {{ $team->name }} {{ $team->id == $active_team_id ? '✔️' : '' }}
                        </option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>

              <div class="row" id="people-container">
                @include('backend.people.partials.people-cards', ['people' => $people])
              </div>

              {{-- <div class="d-flex justify-content-center">
                {{ $people->appends(request()->query())->links() }}
              </div> --}}
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

  @include('backend.people.templates.crudModal')
@endsection

@push('vendor-scripts')
  <!-- DataTables & Plugins -->
  <script src="{{ asset('asset/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('asset/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('asset/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('asset/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('asset/plugins/jszip/jszip.min.js') }}"></script>
  <script src="{{ asset('asset/plugins/pdfmake/pdfmake.min.js') }}"></script>
  <script src="{{ asset('asset/plugins/pdfmake/vfs_fonts.js') }}"></script>
  <script src="{{ asset('asset/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('asset/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('asset/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
  <!-- date-range-picker -->
  <script src="{{ asset('asset/plugins/daterangepicker/daterangepicker.js') }}"></script>
  <script>
    $(document).ready(function() {
      $('#team-switch').change(function() {
        var selectedTeamId = $(this).val();
        window.location.href = '{{ route('admin.people.search') }}?team_id=' + selectedTeamId;
      });

      // AJAX search form submission on input change
      $('#search-input').on('input', function() {
        var query = $(this).val();
        var teamId = $('input[name="team_id"]').val();
        $.ajax({
          url: "{{ route('admin.people.search') }}",
          type: "GET",
          data: { query: query, team_id: teamId },
          success: function(response) {
            $('#people-container').html(response);
            toastr.success(res.success);
          }
        });
      });
    });

    $(function() {
      // Initialize Select2 Elements
      $('.select2').select2()
      // Initialize Select2 Elements
      $('.select2bs4').select2({ theme: 'bootstrap4' })
      // Date picker
      $('#reservationdate').datetimepicker({ format: 'L' });
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
  <script src="{{ asset('asset/vendors/toastrjs/toastr.min.js') }}"></script>
  <script src="{{ asset('asset/vendors/sweetalert2/sweetalert2.all.min.js') }}"></script>
  <script>
    $(document).ready(function () {
      $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
      });
      $('#addNewObject').on('click', function(e) {
        e.preventDefault();
        $('#crudObjectModal').find('.modal-title').html('Add person');
        $('#crudObjectModal').on('hidden.bs.modal', function () {
          $('#image').val('');
          $('#showPhoto').attr('src', "{{ asset('images/no_image_available.jpg') }}");
        });
        $('#frmCrudObject').find('#object_id').val('');
        $('#frmCrudObject').find('#btnObjectSave').html('<i class="far fa-save text-danger-tp1 radius-round mr-1 align-middle pt-10"></i><span class="align-middle pl-1 pr-2">Save</span>');
        $('#frmCrudObject').find('#btnObjectSave').removeClass('d-none');
        $('#frmCrudObject').find('#btnObjectUpdate').addClass('d-none');
        $('#frmCrudObject').trigger('reset');
        $('#crudObjectModal').modal('show');
        $('#image').val('');
        $('#showPhoto').attr('src', "{{ asset('images/no_image_available.jpg') }}");
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
                $('#people-container').append($html);
              } else {
                $("#tr_object_id_" + res.data.id).replaceWith($html);
              }
              $('#frmCrudObject').trigger("reset");
              $('#btnObjectSave').html('{{ trans('global.save') }}');
              $('#showPhoto').attr('src', "{{ asset('images/no_image_available.jpg') }}");
              $('#btnObjectUpdate').html('{{ trans('global.update') }}');
              toastr.success(res.success);
              $('#crudObjectModal').modal('hide');
              if (res.data && res.data.id) {
                window.location.href = '{{ route("admin.peoples.show", ":id") }}'.replace(':id', res.data.id);
              } else {
                // Fallback if res.data.id is not available
                window.location.reload();
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
      $('#btnObjectClose').on('click', function(e) {
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
    $('.show-photo').on('click', function(e) {
      $('#photo').click();
    })
    $('#photo').on('change', function(e) {
      showFile(this, '#showPhoto');
    })
    function showFile(fileInput, img, showName) {
      if (fileInput.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $(img).attr('src', e.target.result);
        }
        reader.readAsDataURL(fileInput.files[0]);
      }
      $(showName).text(fileInput.files[0].name)
    };
  </script>
@endpush
