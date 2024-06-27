<div class="modal fade" id="crudObjectModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <form id="frmCrudObject" action="{{ route('admin.'.$crudRoutePath.'.store') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title">Add Team</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="object_id" id="object_id">
          <input type="hidden" name="crudRoutePath" id="crudRoutePath" value="{{ $crudRoutePath }}">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="row mb-3">

                <div class="col-md-6 mb-3">

                    <h4 class="section-title mb-0">Team Name</h4>
                    <span>The team's name and owner information.</span>


                </div>

                <div class="col-md-6 mb-3">
                  <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h4 class="section-title mb-0">Owner :</h4>
                    </div>
                    <div class="card-body">
                      <div class="d-flex align-items-center">
                        <img src="{{ Auth::user()->profile_photo_path ? asset(Auth::user()->profile_photo_path) : 'https://via.placeholder.com/100' }}" alt="Ancestor Picture" class="mb-2 mr-3">
                        <div>
                          <p>{{ Auth::user()->firstname }}</p>
                          <p>{{ Auth::user()->email }}</p>
                        </div>
                      </div>
                      <div class="form-group mt-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
                      </div>
                      <div class="form-group">
                          <label for="description" class="form-control-label mb-1">Description:</label>
                          <textarea id="description" name="description"
                                  class="textarea_editor form-control border-radius-0"  placeholder="Enter text ..."></textarea>
                          <span class="text-danger error-text description_error"></span>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- col-xl-12 -->
          </div>
        </div>
        <div class="modal-footer">
          @include('backend.templates.button')
        </div>
      </form>
    </div>
  </div>
</div>

