<div class="modal fade" id="crudObjectModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <form id="frmCrudObject" action="{{ route('admin.'.$crudRoutePath.'.store') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title">Add person</h5>
          <button id="buttonClose" type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="object_id" id="object_id">
          <input type="hidden" name="crudRoutePath" id="crudRoutePath" value="{{ $crudRoutePath }}">
          <input type="hidden" name="team_id" id="team_id" value="{{ $active_team_id }}">

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="firstname" class="form-control-label mb-1">First Name:</label>
                <input id="firstname" name="firstname" class="form-control" type="text" placeholder="First Name">
                <span class="text-danger error-text firstname_error"></span>
              </div>
              <div class="form-group">
                <label for="birthname" class="form-control-label mb-1">Birthname:</label>
                <input id="birthname" name="birthname" class="form-control" type="text" placeholder="Birth Name">
                <span class="text-danger error-text birthname_error"></span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="lastname" class="form-control-label mb-1">Last Name:</label>
                <input id="lastname" name="lastname" class="form-control" type="text" placeholder="Last Name">
                <span class="text-danger error-text lastname_error"></span>
              </div>
              <div class="form-group">
                <label for="nickname" class="form-control-label mb-1">Nickname:</label>
                <input id="nickname" name="nickname" class="form-control" type="text" placeholder="Nickname">
                <span class="text-danger error-text nickname_error"></span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label mb-1">Sex (biological):</label>
                <div class="flex">
                  <div class="mt-3 mb-[0.125rem] mr-4 inline-block min-h-[1.5rem] pl-[1.5rem]">
                    <label for="sexM" class="relative inline-flex cursor-pointer items-start">
                      <div class="flex items-center">
                        <input id="sexM" type="radio" class="form-radio border-1 rounded-full h-5 w-5" name="sex" value="m">
                        <span class="ml-2">Male</span>
                      </div>
                    </label>
                  </div>
                  <div class="mt-3 mb-[0.125rem] mr-4 inline-block min-h-[1.5rem] pl-[1.5rem]">
                    <label for="sexF" class="relative inline-flex cursor-pointer items-start">
                      <div class="flex items-center">
                        <input id="sexF" type="radio" class="form-radio border-1 rounded-full h-5 w-5" name="sex" value="f">
                        <span class="ml-2">Female</span>
                      </div>
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="gender_id" class="form-control-label mb-1">Gender identity:</label>
                <select id="gender_id" name="gender_id" class="form-control select2">
                  @foreach ($genders as $gender)
                    <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                  @endforeach
                </select>
                <span class="text-danger error-text gender_id_error"></span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="yob" class="form-control-label mb-1">Year of birth:</label>
                <input id="yob" name="yob" class="form-control" type="text" placeholder="Year of birth">
                <span class="text-danger error-text yob_error"></span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="dob" class="form-control-label mb-1">Date of birth:</label>
                <input id="dob" name="dob" class="form-control" type="date">
                <span class="text-danger error-text dob_error"></span>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="pob" class="form-control-label mb-1">Place of birth:</label>
                <input id="pob" name="pob" class="form-control" type="text" placeholder="Place of birth">
                <span class="text-danger error-text pob_error"></span>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group text-center">
                <img width="25%" src="{{asset('images/no_image_available.jpg')}}" class="show-photo" id="showPhoto" alt="" title="Browse Image" style="cursor: pointer; border-radius:10px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                <input type="hidden" name="old_image" id="old_image">
                <input type="file" name="photo" id="photo" accept="image/x-png,image/png,image/jpg,image/jpeg" class="form-control d-none">
                <span class="text-danger error-text photo_error"></span>
              </div>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          @include('backend.templates.button')
        </div>
      </form>
    </div>
  </div>
</div>
