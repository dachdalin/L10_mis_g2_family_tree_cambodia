<style>
  .modal-header {
    background-color: #007bff;
    color: white;
  }
  .tab-content .tab-pane {
    padding-top: 1rem;
  }
</style>
<div class="modal fade" id="fatherCrudObjectModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Father</h5>
          <button id="buttonClose" type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
        </div>
        <div class="modal-body">
          <ul class="nav nav-tabs" id="fatherTabs" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="new-person-tab" data-toggle="tab" href="#new-person" role="tab" aria-controls="new-person" aria-selected="true">Add NEW Person as father</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="existing-person-tab" data-toggle="tab" href="#existing-person" role="tab" aria-controls="existing-person" aria-selected="false">Add EXISTING Person as father</a>
            </li>
          </ul>
          
          <div class="tab-content" id="fatherTabsContent">
            <!-- Form for adding a new father -->
            <form id="frmFatherCrudObject" action="{{ route('admin.people.storeFather') }}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <input type="hidden" name="team_id" value="{{ $active_team_id }}">
              <input type="hidden" name="child_id" id="child_id" value="{{ $person->id }}"> <!-- Assuming $person is the child -->
              <div class="tab-pane fade show active" id="new-person" role="tabpanel" aria-labelledby="new-person-tab">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="first_name" class="form-control-label mb-1">First Name:</label>
                      <input id="first_name" name="first_name" class="form-control" type="text" placeholder="First Name">
                      <span class="text-danger error-text first_name_error"></span>
                    </div>
                    <div class="form-group">
                      <label for="birth_name" class="form-control-label mb-1">Birthname:</label>
                      <input id="birth_name" name="birth_name" class="form-control" type="text" placeholder="Birth Name">
                      <span class="text-danger error-text birth_name_error"></span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="last_name" class="form-control-label mb-1">Last Name:</label>
                      <input id="last_name" name="last_name" class="form-control" type="text" placeholder="Last Name">
                      <span class="text-danger error-text last_name_error"></span>
                    </div>
                    <div class="form-group">
                      <label for="nick_name" class="form-control-label mb-1">Nickname:</label>
                      <input id="nick_name" name="nick_name" class="form-control" type="text" placeholder="Nickname">
                      <span class="text-danger error-text nick_name_error"></span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label mb-1">Sex (biological): *</label>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="sex" id="sexM" value="m" checked>
                        <label class="form-check-label" for="sexM">Male</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="gender_identity" class="form-control-label mb-1">Gender identity:</label>
                      <select id="gender_identity" name="gender_identity" class="form-control select2">
                        <option value="cis-male">Cis Male</option>
                        <option value="cis-female">Cis Female</option>
                        <option value="trans-male">Trans Male</option>
                        <option value="trans-female">Trans Female</option>
                        <option value="non-binary">Non-Binary</option>
                      </select>
                      <span class="text-danger error-text gender_identity_error"></span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="yob" class="form-control-label mb-1">Year of birth:</label>
                      <input id="yob" name="yob" class="form-control" type="text" placeholder="Year of birth">
                      <span class="text-danger error-text yob_error"></span>
                    </div>
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
                  <div class="col-md-12 text-center">
                    <div class="form-group">
                      <img width="25%" src="{{asset('images/no_image_available.jpg')}}" class="show-photo" id="showPhoto" alt="No Image" title="Upload Image" style="cursor: pointer; border-radius:10px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                      <input type="hidden" name="old_image" id="old_image">
                      <input type="file" name="photo" id="photo" accept="image/x-png,image/png,image/jpg,image/jpeg" class="form-control d-none">
                      <span class="text-danger error-text photo_error"></span>
                    </div>
                  </div>
                </div>
              </div>
            </form>

            <!-- Form for selecting an existing father -->
            <form id="frmExistingFather" action="{{ route('admin.people.selectExistingFather') }}" method="post">
              {{ csrf_field() }}
              <input type="hidden" name="child_id" value="{{ $person->id }}"> <!-- Assuming $person is the child -->
              <div class="tab-pane fade" id="existing-person" role="tabpanel" aria-labelledby="existing-person-tab">
                <div class="form-group">
                  <label for="existing_person" class="form-control-label mb-1">Select Existing Person:</label>
                  <select id="existing_person" name="existing_person" class="form-control select2">
                    @foreach ($persons as $person)
                      <option value="{{ $person->id }}">{{ $person->firstname }} {{ $person->lastname }} ({{ $person->dob }}) {{ $person->sex }}</option>
                    @endforeach
                    {{-- <option value="">Select Person</option> --}}
                  </select>
                  <span class="text-danger error-text existing_person_error"></span>
                </div>
              </div>
            </form>

          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="saveFather">Save</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>
