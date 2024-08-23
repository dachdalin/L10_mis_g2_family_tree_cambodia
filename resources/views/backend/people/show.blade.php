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
  {{-- <link rel="stylesheet" type="text/css" href="{{asset('asset')}}/dist/css/toggle.css">
  <link rel="stylesheet" type="text/css" href="{{asset('asset')}}/vendors/toastrjs/toastr.min.css">
  <link rel="stylesheet" type="text/css" href="{{asset('asset')}}/vendors/sweetalert2/sweetalert2.min.css"> --}}
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
    .profile-info-table {
      border-collapse: collapse;
      width: 100%;
    }
    .profile-info-table td {
      border-bottom: 1px solid #e0e0e0;
      padding: 8px 12px;
    }
    .profile-info-table td:first-child {
      font-weight: bold;
    }
    .dropdown-toggle::after {
      margin-left: 0.255em;
      vertical-align: 0.255em;
      content: "";
      border-top: 0.3em solid;
      border-right: 0.3em solid transparent;
      border-bottom: 0;
      border-left: 0.3em solid transparent;
    }
    .dropdown-menu-right::before {
      content: '';
      position: absolute;
      top: 0;
      right: 10px;
      width: 0;
      height: 0;
      border: 6px solid transparent;
      border-bottom-color: #ffffff;
      transform: translateY(-100%);
    }
    .dropdown-menu-right {
      border: 1px solid rgba(0,0,0,.15);
      border-radius: .25rem;
      box-shadow: 0 0.5rem 1rem rgba(0,0,0,.175);
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
        <div class="card" id="profiles">

          @include('backend.people.partials.people-profiles', ['crudRoutePath' => $crudRoutePath])

        </div>
      </div>
    </div>
  </div>

  {{-- Modal for edit profile --}}
  @include('backend.people.templates.crudModal')

  {{-- Modal for edit contact --}}
  @include('backend.people.templates.crudContactModal')

  {{-- Modal for edit death --}}
  @include('backend.people.templates.crudDeathModal')

  {{-- Modal for edit photo --}}
  @include('backend.people.templates.crudPhotoModal')

  {{-- Modal for add father --}}
  @include('backend.people.templates.fatherCrudModal')

  {{-- Modal for add existing father --}}
  @include('backend.people.templates.existingFatherCrudModal')

  {{-- Modal for add mother --}}
  @include('backend.people.templates.motherCrudModal')


  {{-- Modal for edit familyCrudModal --}}
  @include('backend.people.templates.familyCrudModal')

  {{-- Modal for add partner --}}
  @include('backend.people.templates.partnerCrudModal')

  {{-- Modal for add child --}}
  @include('backend.people.templates.childCrudModal')

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
  {{-- <script src="{{asset('asset')}}/vendors/toastrjs/toastr.min.js"></script>
  <script src="{{asset('asset')}}/vendors/sweetalert2/sweetalert2.all.min.js"></script> --}}

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

      // for show person profile
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
            // console.log(res)
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
              $('#crudObjectModal').modal('hide');

              // Redirect to people.show route
              if (res.data && res.data.id) {
                  window.location.href = '{{ route("admin.peoples.show", ":id") }}'.replace(':id', res.data.id);
              }
            }
          },
          error: function (error) {
            // console.log('Error:', error);
            $('#btnObjectSave').html('{{ trans('global.save')}}');
            $('#btnObjectUpdate').html('{{ trans('global.update') }}');
          }
        });
      });
      // end show person profile


      // for edit person profile
      $('body').on('click', '#editProfile', function (e) {
        e.preventDefault();
        $('#frmCrudObject').find('#btnObjectSave').addClass('d-none');
        $('#frmCrudObject').find('#btnObjectUpdate').removeClass('d-none');
        $('#frmCrudObject').find('#btnObjectUpdate').html('<i class="fadeIn animated bx bx-edit"></i>&nbsp;Update');
        $('#frmCrudObject').trigger('reset');

        var personId = $(this).data('id');
        var form = $('#frmCrudObject');
        var modal = $('#crudObjectModal');
        var actionUrl = '{{ route('admin.peoples.edit', ':id') }}'.replace(':id', personId);

        // console.log('Fetching data for person ID:', personId); // Debugging

        modal.find('.modal-title').html('Edit Profile');
        $.get(actionUrl, function (res) {
            // console.log('Received response:', res); // Debugging

            var person = res.data;
            var photos = res.photos || [];
            var teamName = person.team.name;
            // console.log('Person data:', person); // Debugging

            form.find('#object_id').val(person.id);
            // console.log('Setting firstname:', person.firstname); // Debugging
            form.find('#firstname').val(person.firstname);

            // console.log('Setting lastname:', person.lastname); // Debugging
            form.find('#lastname').val(person.lastname);

            // console.log('Setting birthname:', person.birthname); // Debugging
            form.find('#birthname').val(person.birthname);

            // console.log('Setting nickname:', person.nickname); // Debugging
            form.find('#nickname').val(person.nickname);

            // console.log('Setting yob:', person.yob); // Debugging
            form.find('#yob').val(person.yob);

            // console.log('Setting dob:', person.dob); // Debugging
            form.find('#dob').val(person.dob);

            // console.log('Setting pob:', person.pob); // Debugging
            form.find('#pob').val(person.pob);

            if (person.sex === 'm') {
                form.find('#sexM').prop('checked', true);
            } else {
                form.find('#sexF').prop('checked', true);
            }

            form.find('#gender_id').val(person.gender_id).trigger('change');

            if (photos.length > 0) {
                var primaryPhoto = photos[0];
                form.find('#showPhoto').attr('src', '{{ Storage::url('photos') }}/' + teamName + '/' + primaryPhoto);
            } else {
                form.find('#showPhoto').attr('src', '{{ asset('images/no_image_available.jpg') }}');
            }

            // if (person.photo) {
            //     form.find('#showPhoto').attr('src', '{{ asset('images') }}/' + person.photo);
            // } else {
            //     form.find('#showPhoto').attr('src', '{{ asset('images/no_image_available.jpg') }}');
            // }

            // form.attr('action', '{{ route('admin.peoples.store') }}');
            modal.modal('show');
        });
      });

      // Submit Profile Form
      $('#frmCrudObject').on('submit', function (e) {
          e.preventDefault();
          var actionUrl = $(this).attr('action');
          var method = $(this).attr('method');
          $.ajax({
              type: method,
              url: actionUrl,
              data: new FormData(this),
              processData: false,
              dataType: 'json',
              contentType: false,
              beforeSend: function () {
                  $(document).find('span.error-text').text('');
              },
              success: function (res) {
                  if (res.status == 400) {
                      $.each(res.error, function (prefix, val) {
                          $('span.' + prefix + '_error').text(val[0]);
                      });
                  } else {
                      $('#frmCrudObject').trigger("reset");
                      $('#crudObjectModal').modal('hide');
                      toastr.success(res.success);
                      $('#profiles').html(res.html);
                  }
              },
              error: function (error) {
                  console.log('Error:', error);
              }
          });
      });
      // end edit person profile


      // for edit person contact or address
      $('body').on('click', '#editContact', function (e) {
        e.preventDefault();
        $('#frmContactCrudObject').find('#btnObjectSave').addClass('d-none');
        $('#frmContactCrudObject').find('#btnObjectUpdate').removeClass('d-none');
        $('#frmContactCrudObject').find('#btnObjectUpdate').html('<i class="fadeIn animated bx bx-edit"></i>&nbsp;Update');
        $('#frmContactCrudObject').trigger('reset');

        var personId = $(this).data('id');
        var form = $('#frmContactCrudObject');
        var modal = $('#crudContactModal');
        var actionUrl = '{{ route('admin.people.editContact', ':id') }}'.replace(':id', personId);

        // console.log('Fetching contact data for person ID:', personId);

        modal.find('.modal-title').html('Edit contact');
        $.get(actionUrl, function (res) {
            // console.log('Received response:', res);
            var person = res.data;

            form.find('#object_id').val(person.id);
            form.find('#street').val(person.street);
            form.find('#number').val(person.number);
            form.find('#postal_code').val(person.postal_code);
            form.find('#city').val(person.city);
            form.find('#province').val(person.province);
            form.find('#state').val(person.state);
            form.find('#country_id').val(person.country_id).trigger('change');
            form.find('#phone').val(person.phone);

            // form.attr('action', '{{ route('admin.people.storeContact') }}');
            modal.modal('show');
        });
      });

      $('#frmContactCrudObject').on('submit', function (e) {
          e.preventDefault();

          var actionUrl = $(this).attr('action');
          var method = $(this).attr('method');
          $.ajax({
              type: method,
              url: actionUrl,
              data: new FormData(this),
              processData: false,
              dataType: 'json',
              contentType: false,
              beforeSend: function () {
                  $(document).find('span.error-text').text('');
              },
              success: function (res) {
                  console.log(res);
                  if (res.status == 400) {
                      $.each(res.error, function (prefix, val) {
                          $('span.' + prefix + '_error').text(val[0]);
                      });
                  } else {
                      $('#frmContactCrudObject').trigger("reset");
                      $('#crudContactModal').modal('hide');
                      toastr.success(res.success);
                      $('#profiles').html(res.html);
                  }
              },
              error: function (error) {
                  console.log('Error:', error);
              }
          });
      });
      // end edit person contact or address


    // Edit person Death
    $('body').on('click', '#editDeath', function (e) {
        e.preventDefault();
        $('#frmDeathCrudObject').find('#btnObjectSave').addClass('d-none');
        $('#frmDeathCrudObject').find('#btnObjectUpdate').removeClass('d-none');
        $('#frmDeathCrudObject').find('#btnObjectUpdate').html('<i class="fadeIn animated bx bx-edit"></i>&nbsp;Update');
        $('#frmDeathCrudObject').trigger('reset');

        var personId = $(this).data('id');
        var form = $('#frmDeathCrudObject');
        var modal = $('#crudDeathModal');
        var actionUrl = '{{ route('admin.people.editDeath', ':id') }}'.replace(':id', personId);

        modal.find('.modal-title').html('Edit death');
        $.get(actionUrl, function (res) {
            var person = res.data;

            form.find('#object_id_death').val(person.id);
            form.find('#yod').val(person.yod);
            form.find('#dod').val(person.dod);
            form.find('#pod').val(person.pod);

            form.find('#location_name').val(person.metadata.find(m => m.key === 'cemetery_location_name')?.value);
            form.find('#address').val(person.metadata.find(m => m.key === 'cemetery_location_address')?.value);
            form.find('#latitude').val(person.metadata.find(m => m.key === 'cemetery_location_latitude')?.value);
            form.find('#longitude').val(person.metadata.find(m => m.key === 'cemetery_location_longitude')?.value);

            modal.modal('show');
        });
    });

    $('#frmDeathCrudObject').on('submit', function (e) {
        e.preventDefault();

        var actionUrl = $(this).attr('action');
        var method = $(this).attr('method');
        $.ajax({
            type: method,
            url: actionUrl,
            data: new FormData(this),
            processData: false,
            dataType: 'json',
            contentType: false,
            beforeSend: function () {
                $(document).find('span.error-text').text('');
            },
            success: function (res) {
                if (res.status == 400) {
                    $.each(res.error, function (prefix, val) {
                        $('span.' + prefix + '_error').text(val[0]);
                    });
                } else {
                    $('#frmDeathCrudObject').trigger("reset");
                    $('#crudDeathModal').modal('hide');
                    toastr.success(res.success);

                    // Update the person profile without page refresh
                    $('#profiles').html(res.html);
                }
            },
            error: function (error) {
                console.log('Error:', error);
            }
        });
    });
    // end person Death




    /*====== for edit person multiple photo images ======*/
    $('body').on('click', '#editPhotos', function (e) {
        e.preventDefault();
        var personId = $(this).data('id');
        var modal = $('#photoCrudModal');
        var form = $('#frmPhotoCrud');

        form.trigger('reset');
        form.find('#object_id').val(personId);

        $.get('{{ route("admin.people.editPhotos", ":id") }}'.replace(':id', personId), function (data) {
            var photoGallery = $('#photo-gallery');
            photoGallery.empty();

            if (data.photos) {
                var teamName = data.person.team.name;
                if (data.photos.length > 0) {
                    $.each(data.photos, function (index, photo) {
                        // Fetch the file size using an AJAX call
                        $.ajax({
                            url: '{{ Storage::url("photos/") }}' + teamName + '/' + photo,
                            type: 'HEAD',
                            success: function (res, status, xhr) {
                                var fileSizeInBytes = xhr.getResponseHeader('Content-Length');
                                var fileSizeInKB = (fileSizeInBytes / 1024).toFixed(1);
                                var isPrimary = (index === 0);
                                var photoHtml = `
                                    <div class="col-md-3 mb-3">
                                        <div class="card">
                                            <div class="card-header">
                                                <span class="badge badge-info">${index + 1}</span>
                                                <span class="badge badge-secondary">${photo}</span>
                                            </div>
                                            <img src="{{ Storage::url("photos/") }}${teamName}/${photo}" class="card-img-top" alt="${photo}" style="width: 50px; height: auto;">
                                            <div class="card-body text-center">
                                                <div class="d-flex justify-content-between">
                                                    ${isPrimary ? `
                                                        <button type="button" title="Primary" class="btn btn-primary btn-sm set-primary" data-id="${photo}" disabled>
                                                            <i class="fas fa-star"></i>
                                                        </button>` : `
                                                        <button type="button" title="Set as primary" class="btn btn-primary btn-sm set-primary" data-id="${photo}">
                                                            <i class="fas fa-star"></i>
                                                        </button>`
                                                    }
                                                    <a href="{{ Storage::url("photos/") }}${teamName}/${photo}" download class="btn btn-secondary btn-sm">
                                                        <i class="fas fa-download"></i> ${fileSizeInKB} KB
                                                    </a>
                                                    <button type="button" title="Delete" class="btn btn-danger btn-sm delete-photo" data-id="${photo}">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`;
                                photoGallery.append(photoHtml);
                            },
                            error: function () {
                                console.error('Failed to fetch file size for', photo);
                            }
                        });
                    });
                } else {
                    photoGallery.append('<p class="text-center">No photos available</p>');
                }
            }

            // Update modal title with photo count
            updateModalTitle(data.photoCount);

            modal.modal('show');
        });
    });

    // Function to update modal title with photo count
    function updateModalTitle(count) {
        var modalTitle = 'Edit Photos (' + count + ')';
        $('#photoCrudModal .modal-title').text(modalTitle);
    }

    // Handle form submission for adding new photos
    $('#frmPhotoCrud').on('submit', function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        var actionUrl = $(this).attr('action');

        $.ajax({
            type: 'POST',
            url: actionUrl,
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                $(document).find('span.error-text').text('');
            },
            success: function (res) {
                if (res.status === 400) {
                    $.each(res.error, function (prefix, val) {
                        $('span.' + prefix + '_error').text(val[0]);
                    });
                } else {
                    var photoGallery = $('#photo-gallery');
                    photoGallery.empty();

                    if (res.photos.length > 0) {
                        var teamName = res.person.team.name;
                        $.each(res.photos, function (index, photo) {
                            var isPrimary = (index === 0);
                            var photoHtml = `
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <div class="card-header">
                                            <span class="badge badge-info">${index + 1}</span>
                                            <span class="badge badge-secondary">${photo}</span>
                                        </div>
                                        <img src="{{ Storage::url("photos/") }}${teamName}/${photo}" class="card-img-top" alt="${photo}" style="width: 50px; height: auto;">
                                        <div class="card-body text-center">
                                            <div class="d-flex justify-content-between">
                                                ${isPrimary ? `
                                                    <button type="button" title="Primary" class="btn btn-primary btn-sm set-primary" data-id="${photo}" disabled>
                                                        <i class="fas fa-star"></i>
                                                    </button>` : `
                                                    <button type="button" title="Set as primary" class="btn btn-primary btn-sm set-primary" data-id="${photo}">
                                                        <i class="fas fa-star"></i>
                                                    </button>`
                                                }
                                                <a href="{{ Storage::url("photos/") }}${teamName}/${photo}" download class="btn btn-secondary btn-sm">
                                                    <i class="fas fa-download"></i>
                                                </a>
                                                <button type="button" title="Delete" class="btn btn-danger btn-sm delete-photo" data-id="${photo}">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
                            photoGallery.append(photoHtml);
                        });
                    } else {
                        photoGallery.append('<p class="text-center">No photos available</p>');
                    }

                    // Clear the file input
                    $('#photo').val('');

                    // Update the photo count and modal title
                    updateModalTitle(res.photos.length);
                    toastr.success(res.success);
                }
            },
            error: function (error) {
                console.log('Error:', error);
            }
        });
    });

    // Handler for setting primary photo
    $('body').on('click', '.set-primary', function (e) {
        e.preventDefault();
        var photo = $(this).data('id');
        var personId = $('#frmPhotoCrud').find('#object_id').val();

        $.post('{{ route('admin.people.setPrimaryPhoto', ":id") }}'.replace(':id', personId), {
            _token: '{{ csrf_token() }}',
            photo: photo
        }, function (res) {
            if (res.status === 200) {
                // Update the photo gallery
                $('#photo-gallery').html(res.photoGalleryHtml);

                // Update the primary photo in the profile section
                var teamName = res.person.team.name;
                var newPrimaryPhotoUrl = '{{ Storage::url("photos/") }}' + teamName + '/' + photo;
                $('#profile-section img').attr('src', newPrimaryPhotoUrl);

                // Update the photo count and modal title
                updateModalTitle(res.photos.length);

                toastr.success(res.success);
            }
        }).fail(function(xhr, status, error) {
            console.error('Error:', error);
            console.error('Response:', xhr.responseText);
        });
    });

    // delete person photo image
    $('body').on('click', '.delete-photo', function (e) {
        e.preventDefault();
        var photo = $(this).data('id');
        var personId = $('#frmPhotoCrud').find('#object_id').val();

        // Show SweetAlert confirmation
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // If confirmed, proceed with deletion
                $.post('{{ route('admin.people.deletePhoto', ":id") }}'.replace(':id', personId), {
                    _token: '{{ csrf_token() }}',
                    photo: photo
                }, function (res) {
                    if (res.status === 200) {
                        // Update the photo gallery
                        var photoGallery = $('#photo-gallery');
                        photoGallery.empty();

                        if (res.photos.length > 0) {
                            var teamName = res.person.team.name;
                            $.each(res.photos, function (index, photo) {
                                var isPrimary = (index === 0);
                                var photoHtml = `
                                    <div class="col-md-3 mb-3">
                                        <div class="card">
                                            <div class="card-header">
                                                <span class="badge badge-info">${index + 1}</span>
                                                <span class="badge badge-secondary">${photo}</span>
                                            </div>
                                            <img src="{{ Storage::url("photos/") }}${teamName}/${photo}" class="card-img-top" alt="${photo}" style="width: 50px; height: auto;">
                                            <div class="card-body text-center">
                                                <div class="d-flex justify-content-between">
                                                    ${isPrimary ? `
                                                        <button type="button" title="Primary" class="btn btn-primary btn-sm set-primary" data-id="${photo}" disabled>
                                                            <i class="fas fa-star"></i>
                                                        </button>` : `
                                                        <button type="button" title="Set as primary" class="btn btn-primary btn-sm set-primary" data-id="${photo}">
                                                            <i class="fas fa-star"></i>
                                                        </button>`
                                                    }
                                                    <a href="{{ Storage::url("photos/") }}${teamName}/${photo}" download class="btn btn-secondary btn-sm">
                                                        <i class="fas fa-download"></i>
                                                    </a>
                                                    <button type="button" title="Delete" class="btn btn-danger btn-sm delete-photo" data-id="${photo}">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`;
                                photoGallery.append(photoHtml);
                            });
                        } else {
                            photoGallery.append('<p class="text-center">No photos available</p>');
                        }

                        // Update the photo count and modal title
                        updateModalTitle(res.photos.length);
                        Swal.fire(
                            'Deleted!',
                            'Your photo has been deleted.',
                            'success'
                        );

                        toastr.success(res.success);
                    }
                }).fail(function(xhr, status, error) {
                    console.error('Error:', error);
                    console.error('Response:', xhr.responseText);
                });
            }
        });
    });
    /*====== end edit person multiple photo images ======*/







    /*====== for add new person or existing person as father ======*/
    // Initialize Select2 plugin
    $('.select2').select2();

    // Load existing persons into the select dropdown for assigning as father
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        var target = $(e.target).attr("href");
        if (target === '#existing-person') {
            $.get('{{ route("admin.people.getExistingPersons") }}')
                .done(function (data) {
                    var existingPersonSelect = $('#existing_person');
                    existingPersonSelect.empty();
                    existingPersonSelect.append('<option value="">Select Person</option>');
                    $.each(data, function (index, person) {
                        existingPersonSelect.append('<option value="' + person.id + '">' + person.firstname + ' ' + person.lastname + '</option>');
                    });
                })
                .fail(function (jqXHR, textStatus, errorThrown) {
                    console.error('Error fetching existing persons:', textStatus, errorThrown);
                });
        }
    });

    // Handle form submission for adding a new father
    $('#frmFatherCrudObject').on('submit', function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        var actionUrl = $(this).attr('action');

        $.ajax({
            type: 'POST',
            url: actionUrl,
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                $(document).find('span.error-text').text('');
            },
            success: function (res) {
                if (res.status === 400) {
                    $.each(res.error, function (prefix, val) {
                        $('span.' + prefix + '_error').text(val[0]);
                    });
                } else {
                    $('#frmFatherCrudObject').trigger("reset");
                    $('#fatherCrudObjectModal').modal('hide');
                    toastr.success(res.success);

                    // Update the family section
                    $('#family').html(res.familyHtml);
                }
            },
            error: function (error) {
                console.log('Error:', error);
            }
        });
    });

    // Handle form submission for selecting an existing father
    $('#frmExistingFather').on('submit', function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        var actionUrl = $(this).attr('action');

        $.ajax({
            type: 'POST',
            url: actionUrl,
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                $(document).find('span.error-text').text('');
            },
            success: function (res) {
                if (res.status === 400) {
                    $.each(res.error, function (prefix, val) {
                        $('span.' + prefix + '_error').text(val[0]);
                    });
                } else {
                    $('#frmExistingFather').trigger("reset");
                    $('#fatherCrudObjectModal').modal('hide');
                    toastr.success(res.success);

                    // Update the family section
                    $('#family').html(res.familyHtml);
                }
            },
            error: function (error) {
                console.log('Error:', error);
            }
        });
    });

    // Handle the save button click event
    $('#saveFather').on('click', function () {
        if ($('#new-person-tab').hasClass('active')) {
            $('#frmFatherCrudObject').submit();
        } else if ($('#existing-person-tab').hasClass('active')) {
            $('#frmExistingFather').submit();
        }
    });

    // Ensure tabs are switching correctly
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        var target = $(e.target).attr("href");
        $('.tab-pane').removeClass('show active');
        $(target).addClass('show active');
    });

    // Hide forms initially
    $('#frmFatherCrudObject').hide();
    $('#frmExistingFather').hide();

    // Show the appropriate form based on the active tab
    $('#new-person-tab').on('shown.bs.tab', function () {
        $('#frmFatherCrudObject').show();
        $('#frmExistingFather').hide();
    });

    $('#existing-person-tab').on('shown.bs.tab', function () {
        $('#frmFatherCrudObject').hide();
        $('#frmExistingFather').show();
    });

    // Trigger the correct tab on page load
    if ($('#new-person-tab').hasClass('active')) {
        $('#frmFatherCrudObject').show();
        $('#frmExistingFather').hide();
    } else if ($('#existing-person-tab').hasClass('active')) {
        $('#frmFatherCrudObject').hide();
        $('#frmExistingFather').show();
    }
    /*====== end add new person or existing person as father ======*/




    /*====== for add new person or existing person as mother ======*/
    // Initialize Select2 plugin
    $('.select2').select2();

    // Load existing persons into the select dropdown for assigning as mother
    // $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    //     var target = $(e.target).attr("href");
    //     if (target === '#existing-person') {
    //         $.get('{{ route("admin.people.getExistingPersons") }}')
    //             .done(function (data) {
    //                 var existingPersonSelect = $('#existing_person');
    //                 existingPersonSelect.empty();
    //                 existingPersonSelect.append('<option value="">Select Person</option>');
    //                 $.each(data, function (index, person) {
    //                     existingPersonSelect.append('<option value="' + person.id + '">' + person.firstname + ' ' + person.lastname + '</option>');
    //                 });
    //             })
    //             .fail(function (jqXHR, textStatus, errorThrown) {
    //                 console.error('Error fetching existing persons:', textStatus, errorThrown);
    //             });
    //     }
    // });

    // Handle form submission for adding a new father
    $('#frmMotherCrudObject').on('submit', function (e) {
        e.preventDefault();
        console.log('Submitting new mother form...'); // Debugging statement
        var formData = new FormData(this);
        var actionUrl = $(this).attr('action');
        console.log('Form data:', formData); // Debugging statement
        console.log('Action URL:', actionUrl); // Debugging statement

        $.ajax({
            type: 'POST',
            url: actionUrl,
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                $(document).find('span.error-text').text('');
            },
            success: function (res) {
                console.log('Response received:', res); // Debugging statement
                if (res.status === 400) {
                    $.each(res.error, function (prefix, val) {
                        $('span.' + prefix + '_error').text(val[0]);
                    });
                } else {
                    $('#frmMotherCrudObject').trigger("reset");
                    $('#motherCrudObjectModal').modal('hide');
                    toastr.success(res.success);

                    // Update the family section
                    $('#family').html(res.familyHtml);
                }
            },
            error: function (error) {
                console.log('Error:', error);
            }
        });
    });

    // Handle form submission for selecting an existing father
    $('#frmExistingMother').on('submit', function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        var actionUrl = $(this).attr('action');

        $.ajax({
            type: 'POST',
            url: actionUrl,
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                $(document).find('span.error-text').text('');
            },
            success: function (res) {
                if (res.status === 400) {
                    $.each(res.error, function (prefix, val) {
                        $('span.' + prefix + '_error').text(val[0]);
                    });
                } else {
                    $('#frmExistingMother').trigger("reset");
                    $('#motherCrudObjectModal').modal('hide');
                    toastr.success(res.success);

                    // Update the family section
                    $('#family').html(res.familyHtml);
                }
            },
            error: function (error) {
                console.log('Error:', error);
            }
        });
    });

    // Handle the save button click event
    $('#saveMother').on('click', function () {
        if ($('#new-mother-tab').hasClass('active')) {
            $('#frmMotherCrudObject').submit();
        } else if ($('#existing-mother-tab').hasClass('active')) {
            $('#frmExistingMother').submit();
        }
    });

    // Ensure tabs are switching correctly
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        var target = $(e.target).attr("href");
        $('.tab-pane').removeClass('show active');
        $(target).addClass('show active');
    });

    // Hide forms initially
    $('#frmMotherCrudObject').hide();
    $('#frmExistingMother').hide();

    // Show the appropriate form based on the active tab
    $('#new-mother-tab').on('shown.bs.tab', function () {
        $('#frmMotherCrudObject').show();
        $('#frmExistingMother').hide();
    });

    $('#existing-mother-tab').on('shown.bs.tab', function () {
        $('#frmMotherCrudObject').hide();
        $('#frmExistingMother').show();
    });

    // Trigger the correct tab on page load
    if ($('#new-mother-tab').hasClass('active')) {
        $('#frmMotherCrudObject').show();
        $('#frmExistingMother').hide();
    } else if ($('#existing-mother-tab').hasClass('active')) {
        $('#frmMotherCrudObject').hide();
        $('#frmExistingMother').show();
    }


    // Handle form submission with AJAX
    $('#frmFamilyCrudObject').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(response) {
                if (response.status === 200) {
                    $('#family').html(response.familyHtml);
                    $('#familyCrudModal').modal('hide');
                    toastr.success(response.success);
                } else {
                    toastr.error('Failed to update family information.');
                }
            },
            error: function() {
                toastr.error('An error occurred while updating the family information.');
            }
        });
    });
    /*====== end add new person or existing person as mother ======*/



    // Add partner
    $(document).ready(function () {
    // Initialize Select2 plugin
    $('.select2').select2();

    // Load existing persons into the select dropdown for assigning as partner
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        var target = $(e.target).attr("href");
        if (target === '#existing-partner') {
            $.get('{{ route("admin.people.getExistingPersons") }}')
                .done(function (data) {
                    var existingPersonSelect = $('#existing_partner');
                    existingPersonSelect.empty();
                    existingPersonSelect.append('<option value="">Select Person</option>');
                    $.each(data, function (index, person) {
                        existingPersonSelect.append('<option value="' + person.id + '">' + person.firstname + ' ' + person.lastname + '</option>');
                    });
                })
                .fail(function (jqXHR, textStatus, errorThrown) {
                    console.error('Error fetching existing persons:', textStatus, errorThrown);
                });
        }
    });

    // Handle form submission for adding a new partner
    $('#frmPartnerCrudObject').on('submit', function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        var actionUrl = $(this).attr('action');

        $.ajax({
            type: 'POST',
            url: actionUrl,
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                $(document).find('span.error-text').text('');
            },
            success: function (res) {
                console.log('partner:' res);
                // console.log('partner:' + res);
                if (res.status === 400) {
                    $.each(res.error, function (prefix, val) {
                        $('span.' + prefix + '_error').text(val[0]);
                    });
                } else {
                    $('#frmPartnerCrudObject').trigger("reset");
                    $('#partnerCrudObjectModal').modal('hide');
                    toastr.success(res.success);

                    // Update the family section
                    $('#family').html(res.familyHtml);
                }
            },
            error: function (error) {
                console.log('Error:', error);
            }
        });
    });

    // Handle form submission for selecting an existing partner
    $('#frmExistingPartner').on('submit', function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        var actionUrl = $(this).attr('action');

        $.ajax({
            type: 'POST',
            url: actionUrl,
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                $(document).find('span.error-text').text('');
            },
            success: function (res) {
                if (res.status === 400) {
                    $.each(res.error, function (prefix, val) {
                        $('span.' + prefix + '_error').text(val[0]);
                    });
                } else {
                    $('#frmExistingPartner').trigger("reset");
                    $('#partnerCrudObjectModal').modal('hide');
                    toastr.success(res.success);

                    // Update the family section
                    $('#family').html(res.familyHtml);
                }
            },
            error: function (error) {
                console.log('Error:', error);
            }
        });
    });

    // Ensure tabs are switching correctly
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        var target = $(e.target).attr("href");
        $('.tab-pane').removeClass('show active');
        $(target).addClass('show active');
    });

    // Hide forms initially
    $('#frmPartnerCrudObject').hide();
    $('#frmExistingPartner').hide();

    // Show the appropriate form based on the active tab
    $('#new-partner-tab').on('shown.bs.tab', function () {
        $('#frmPartnerCrudObject').show();
        $('#frmExistingPartner').hide();
    });

    $('#existing-partner-tab').on('shown.bs.tab', function () {
        $('#frmPartnerCrudObject').hide();
        $('#frmExistingPartner').show();
    });

    // Trigger the correct tab on page load
    if ($('#new-partner-tab').hasClass('active')) {
        $('#frmPartnerCrudObject').show();
        $('#frmExistingPartner').hide();
    } else if ($('#existing-partner-tab').hasClass('active')) {
        $('#frmPartnerCrudObject').hide();
        $('#frmExistingPartner').show();
    }
});





    // Add child
    $(document).ready(function () {
    // Initialize Select2 plugin
    $('.select2').select2();

    // Load existing persons into the select dropdown for assigning as child
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        var target = $(e.target).attr("href");
        if (target === '#existing-child') {
            $.get('{{ route("admin.people.getExistingPersons") }}')
                .done(function (data) {
                    var existingPersonSelect = $('#existing_child');
                    existingPersonSelect.empty();
                    existingPersonSelect.append('<option value="">Select Person</option>');
                    $.each(data, function (index, person) {
                        existingPersonSelect.append('<option value="' + person.id + '">' + person.firstname + ' ' + person.lastname + '</option>');
                    });
                })
                .fail(function (jqXHR, textStatus, errorThrown) {
                    console.error('Error fetching existing persons:', textStatus, errorThrown);
                });
        }
    });

    // Handle form submission for adding a new child
    $('#frmChildCrudObject').on('submit', function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        var actionUrl = $(this).attr('action');

        $.ajax({
            type: 'POST',
            url: actionUrl,
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                $(document).find('span.error-text').text('');
            },
            success: function (res) {
                if (res.status === 400) {
                    $.each(res.error, function (prefix, val) {
                        $('span.' + prefix + '_error').text(val[0]);
                    });
                } else {
                    $('#frmChildCrudObject').trigger("reset");
                    $('#childCrudObjectModal').modal('hide');
                    toastr.success(res.success);

                    // Update the family section
                    $('#family').html(res.familyHtml);
                }
            },
            error: function (error) {
                console.log('Error:', error);
            }
        });
    });

    // Handle form submission for selecting an existing child
    $('#frmExistingChild').on('submit', function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        var actionUrl = $(this).attr('action');

        $.ajax({
            type: 'POST',
            url: actionUrl,
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                $(document).find('span.error-text').text('');
            },
            success: function (res) {
                if (res.status === 400) {
                    $.each(res.error, function (prefix, val) {
                        $('span.' + prefix + '_error').text(val[0]);
                    });
                } else {
                    $('#frmExistingChild').trigger("reset");
                    $('#childCrudObjectModal').modal('hide');
                    toastr.success(res.success);

                    // Update the family section
                    $('#family').html(res.familyHtml);
                }
            },
            error: function (error) {
                console.log('Error:', error);
            }
        });
    });

    // Ensure tabs are switching correctly
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        var target = $(e.target).attr("href");
        $('.tab-pane').removeClass('show active');
        $(target).addClass('show active');
    });

    // Hide forms initially
    $('#frmChildCrudObject').hide();
    $('#frmExistingChild').hide();

    // Show the appropriate form based on the active tab
    $('#new-child-tab').on('shown.bs.tab', function () {
        $('#frmChildCrudObject').show();
        $('#frmExistingChild').hide();
    });

    $('#existing-child-tab').on('shown.bs.tab', function () {
        $('#frmChildCrudObject').hide();
        $('#frmExistingChild').show();
    });

    // Trigger the correct tab on page load
    if ($('#new-child-tab').hasClass('active')) {
        $('#frmChildCrudObject').show();
        $('#frmExistingChild').hide();
    } else if ($('#existing-child-tab').hasClass('active')) {
        $('#frmChildCrudObject').hide();
        $('#frmExistingChild').show();
    }
});



    /*====== Function to update siblings section ======*/
    function updateSiblings(personId) {
        $.ajax({
            url: `/people/${personId}/siblings`,
            method: 'GET',
            success: function (data) {
                $('#siblings-section').html(data);
            },
            error: function (error) {
                console.error('Error fetching siblings:', error);
            }
        });
    }
    /*====== End Function to update siblings section ======*/


    /*====== Function to update ancestors and descendants sections ======*/
    function updateAncestorsDescendants(personId) {
        $.ajax({
            url: `/people/${personId}/ancestors-descendants`,
            method: 'GET',
            success: function (data) {
                $('#ancestors-section').html(data.ancestors);
                $('#descendants-section').html(data.descendants);
            },
            error: function (error) {
                console.error('Error fetching ancestors and descendants:', error);
            }
        });
    }

    // Call these functions whenever necessary, for example, after updating family information
    var personId = {{ $person->id }}; // Get the current person's ID
    updateSiblings(personId);
    updateAncestorsDescendants(personId);
    /*====== End Function to update ancestors and descendants sections ======*/












      $('#btnObjectClose').on('click',function(e){
        e.preventDefault();
        $('#frmCrudObject').find('#btnObjectSave').removeClass('d-none');
        $('#frmCrudObject').find('#btnObjectUpdate').addClass('d-none');
        $('#crudObjectModal').find('.modal-title').html('Add New User');
        $('#frmCrudObject').trigger('reset');
      });
    });

    // -------------Browse photo------------------
    $('.show-photo').on('click',function(e){
      $('#photo').click();
    })
    $('#photo').on('change',function(e){
      showFile(this,'#showPhoto');
    })

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
