<div class="modal fade" id="childCrudObjectModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <form id="frmChildCrudObject" action="" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="modal-header">
          <h5 class="modal-title">Add Child</h5>
          <button id="buttonClose" type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
        </div>
        <div class="modal-body">
          <ul class="nav nav-tabs" id="child" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="new-child-tab" data-toggle="tab" href="#new-child" role="tab" aria-controls="new-child" aria-selected="true">Add NEW Person as child</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="existing-child-tab" data-toggle="tab" href="#existing-child" role="tab" aria-controls="existing-child" aria-selected="false">Add EXISTING Person as child</a>
            </li>
          </ul>
          <div class="tab-content" id="childTabsContent">
            <!-- Tab for adding a new child -->
            <div class="tab-pane fade show active" id="new-child" role="tabpanel" aria-labelledby="new-child-tab">
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
                      <input class="form-check-input" type="radio" name="sex" id="sexM" value="m">
                      <label class="form-check-label" for="sexM">Male</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="sex" id="sexF" value="f">
                      <label class="form-check-label" for="sexF">Female</label>
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
                    <img width="25%" src="https://via.placeholder.com/150" class="show-photo" id="showPhoto" alt="No Image" title="Upload Image" style="cursor: pointer; border-radius:10px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                    <input type="hidden" name="old_image" id="old_image">
                    <input type="file" name="photo" id="photo" accept="image/x-png,image/png,image/jpg,image/jpeg" class="form-control d-none">
                    <span class="text-danger error-text photo_error"></span>
                  </div>
                </div>

              </div>
            </div>
            
            <!-- Tab for selecting an existing child -->
            <div class="tab-pane fade" id="existing-child" role="tabpanel" aria-labelledby="existing-child-tab">

              <div class="form-group">
                <label for="existing_person" class="form-control-label mb-1">Select Existing Person:</label>
                <select id="existing_person" name="existing_person" class="form-control select2">
                  <!-- Options will be populated dynamically -->
                  <option value="">Select Person</option>
                </select>
                <span class="text-danger error-text existing_person_error"></span>
              </div>

            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>
