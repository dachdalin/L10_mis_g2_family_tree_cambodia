<!-- Family Modal -->
<div class="modal fade" id="familyCrudModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Edit Family</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <form id="frmFamilyCrudObject" action="{{ route('admin.people.updateFamily') }}" method="post">
                  {{ csrf_field() }}
                  <input type="hidden" name="person_id" value="{{ $person->id }}">

                  <!-- Father (biological) -->
                  <div class="form-group">
                      <label for="father" class="form-control-label">Father (biological):</label>
                      <select id="father" name="father_id" class="form-control select2">
                          <option value="">Select...</option>
                          @foreach ($persons as $p)
                              <option value="{{ $p->id }}" @if($p->id == $person->father_id) selected @endif>
                                  {{ $p->firstname }} {{ $p->lastname }} ({{ $p->dob }}) 
                                  @if($p->id == $person->father_id) ✔️ @endif
                              </option>
                          @endforeach
                      </select>
                  </div>

                  <!-- Mother (biological) -->
                  <div class="form-group">
                      <label for="mother" class="form-control-label">Mother (biological):</label>
                      <select id="mother" name="mother_id" class="form-control select2">
                          <option value="">Select...</option>
                          @foreach ($persons as $p)
                              <option value="{{ $p->id }}" @if($p->id == $person->mother_id) selected @endif>
                                  {{ $p->firstname }} {{ $p->lastname }} ({{ $p->dob }}) 
                                  @if($p->id == $person->mother_id) ✔️ @endif
                              </option>
                          @endforeach
                      </select>
                  </div>

                  <!-- Info Notice -->
                  <div class="alert alert-warning">
                      <strong>Note:</strong> Father and Mother <em>may only be used for the biological parents</em> and must therefore be of opposite sex. Parents <em>may be the biological parents, but may also be used for non-biological parents (gay or adoptive).</em> In the latter case, simply leave Father and/or Mother blank.
                  </div>

                  <!-- Parents -->
                  <div class="form-group">
                      <label for="parents" class="form-control-label">Parents:</label>
                      <select id="parents" name="parents_id" class="form-control select2">
                          <option value="">Select...</option>
                          @foreach ($couples as $couple)
                              <option value="{{ $couple->id }}" @if($couple->id == $person->parents_id) selected @endif>
                                  {{ $couple->person1->firstname }} {{ $couple->person1->lastname }} - {{ $couple->person2->firstname }} {{ $couple->person2->lastname }} ({{ $couple->person1->dob }} - {{ $couple->person2->dob }}) 
                                  @if($couple->id == $person->parents_id) ✔️ @endif
                              </option>
                          @endforeach
                      </select>
                  </div>

                  <!-- Save Button -->
                  <div class="text-right">
                      <button type="submit" class="btn btn-primary">Save</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>

<script>
$(document).ready(function() {
  // Initialize Select2 Elements
  $('.select2').select2();
});
</script>