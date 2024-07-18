<div class="modal fade" id="crudContactModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
          <form id="frmContactCrudObject" action="{{ route('admin.people.storeContact') }}" method="post">
              {{ csrf_field() }}
              <div class="modal-header bg-primary text-white">
                  <h5 class="modal-title">Edit contact</h5>
                  <button id="buttonClose" type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
              </div>
              <div class="modal-body">
                  <input type="hidden" name="object_id" id="object_id">
                  <input type="hidden" name="team_id" id="team_id" value="{{ $active_team_id }}">

                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="street" class="form-control-label mb-1">Street:</label>
                              <input id="street" name="street" class="form-control" type="text" placeholder="Street">
                              <span class="text-danger error-text street_error"></span>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="number" class="form-control-label mb-1">Number:</label>
                              <input id="number" name="number" class="form-control" type="text" placeholder="Number">
                              <span class="text-danger error-text number_error"></span>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="postal_code" class="form-control-label mb-1">Postal code:</label>
                              <input id="postal_code" name="postal_code" class="form-control" type="text" placeholder="Postal code">
                              <span class="text-danger error-text postal_code_error"></span>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="city" class="form-control-label mb-1">City:</label>
                              <input id="city" name="city" class="form-control" type="text" placeholder="City">
                              <span class="text-danger error-text city_error"></span>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="province" class="form-control-label mb-1">Province:</label>
                              <input id="province" name="province" class="form-control" type="text" placeholder="Province">
                              <span class="text-danger error-text province_error"></span>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="state" class="form-control-label mb-1">State:</label>
                              <input id="state" name="state" class="form-control" type="text" placeholder="State">
                              <span class="text-danger error-text state_error"></span>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="country_id" class="form-control-label mb-1">Country:</label>
                              <select id="country_id" name="country_id" class="form-control select2">
                                  @foreach ($countries as $country)
                                      <option value="{{ $country->id }}">{{ $country->name }}</option>
                                  @endforeach
                              </select>
                              <span class="text-danger error-text country_id_error"></span>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="phone" class="form-control-label mb-1">Phone:</label>
                              <input id="phone" name="phone" class="form-control" type="text" placeholder="Phone">
                              <span class="text-danger error-text phone_error"></span>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save</button>
              </div>
          </form>
      </div>
  </div>
</div>
