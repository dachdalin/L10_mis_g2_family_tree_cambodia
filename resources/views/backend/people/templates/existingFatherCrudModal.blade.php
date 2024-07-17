<style>
  .modal-header {
    background-color: #007bff;
    color: white;
  }
  .tab-content .tab-pane {
    padding-top: 1rem;
  }
</style>
<div class="modal fade" id="existingFatherCrudObjectModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      
        <div class="modal-header">
          <h5 class="modal-title">Add Father</h5>
          <button id="buttonClose" type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
        </div>
        <div class="modal-body">
          
          {{-- <div class="tab-content" id="fatherTabsContent"> --}}

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
                  </select>
                  <span class="text-danger error-text existing_person_error"></span>
                </div>
              </div>
            </form>

          {{-- </div> --}}
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="saveFather">Save</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>
