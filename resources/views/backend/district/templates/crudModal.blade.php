<div class="modal fade" id="districtModal" tabindex="-1" aria-hidden="true">
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
                    <label for="name" class="form-control-label mb-1">Name: <span class="text-danger">*</span></label>
                    <input id="name" name="name" class="form-control" type="text" placeholder="name">
                    <span class="text-danger error-text name_error"></span>
                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="form-group">
                    <label for="email" class="form-control-label mb-1">District Code: <span class="text-danger">*</span></label>
                    <input id="district_code" name="district_code" class="form-control" type="text" placeholder="Code">
                    <span class="text-danger error-text email_error"></span>
                  </div>
                </div>

              </div>
              <div class="row mb-3">
                <div class="col-lg-6 col-md-6 col-sm-6 tag-input-style" id="select2-parent">

                    <div class="form-group">
                      <label for="provinces" class="form-control-label mb-1">Select Provice: <span class="text-danger">*</span></label>
                      <select id="provinces" name="province_id" class="form-control select" >
                        @foreach ($provices as $key => $row)
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

