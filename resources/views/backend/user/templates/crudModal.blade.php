<div class="modal fade" id="crudObjectModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <form id="frmCrudObject" action="{{ route('admin.'.$crudRoutePath.'.store') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="object_id" id="object_id">
          <input type="hidden" name="crudRoutePath" id="crudRoutePath" value="{{ $crudRoutePath }}">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="row mb-3">

                <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
                  <div class="form-group">
                    <label for="firstname" class="form-control-label mb-1">Firstname: <span class="text-danger">*</span></label>
                    <input id="firstname" name="firstname" class="form-control" type="text" placeholder="name">
                    <span class="text-danger error-text firstname_error"></span>
                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="form-group">
                    <label for="email" class="form-control-label mb-1">Email: <span class="text-danger">*</span></label>
                    <input id="email" name="email" class="form-control" type="email" placeholder="Email">
                    <span class="text-danger error-text email_error"></span>
                  </div>
                </div>
                
              </div>
              <div class="row mb-3">
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="form-group">
                    <label for="password" class="form-control-label mb-1">Password: <span class="text-danger">*</span></label>
                    <input id="password" name="password" class="form-control" type="password" placeholder="Password">
                    <span class="text-danger error-text password_error"></span>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="form-group">
                    <label for="password_confirmation" class="form-control-label mb-1">Confirm Password: <span class="text-danger">*</span></label>
                    <input id="password_confirmation" name="password_confirmation" class="form-control" type="password" placeholder="Confirm Password">
                    <span class="text-danger error-text password_confirmation_error"></span>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-lg-6 col-md-6 col-sm-6 tag-input-style" id="select2-parent">
                 
                  <div class="form-group">
                    <label for="roles" class="form-control-label mb-1">Select Role: <span class="text-danger">*</span></label>
                    <select id="roles" name="roles[]" class="form-control select" >
                      @foreach ($roles as $key => $row)
                        <option value="{{ $key}}">{{ $row }}</option>
                      @endforeach
                    </select>
                    <span class="text-danger error-text roles_error"></span>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="form-group mt-4">
                    <div class="form-check form-switch">
                      <input id="status" name="status" type="checkbox" class="ace-switch" checked>
                      <label class="form-check-label mt-1" for="flexSwitchCheckChecked"><strong>&nbsp;&nbsp;Status</strong></label>
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

