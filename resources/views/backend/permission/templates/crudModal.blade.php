<div class="modal fade" id="crudObjectModal" tabindex="-1" aria-labelledby="crudObjectModalLabel" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <form id="frmCrudObject" action="{{ route('admin.'.$crudRoutePath.'.store') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="object_id" id="object_id">
          <input type="hidden" name="crudRoutePath" id="crudRoutePath" value="{{ $crudRoutePath }}">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
              <div class="form-group">
                <label for="group" class="form-control-label mb-1">Group: <span class="text-danger">*</span></label>
                <input id="group" name="group" class="form-control" type="text" value="{{ old('group') }}" placeholder="Group">
                <span class="text-danger error-text group_error"></span>
              </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
              <div class="form-group">
                <label for="title" class="form-control-label mb-1">Permission: <span class="text-danger">*</span></label>
                <input id="title" name="title" class="form-control" type="text" placeholder="Permission">
                <span class="text-danger error-text title_error"></span>
              </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="form-group mt-0">
                <div class="form-check form-switch">
                  <input id="status" name="status" type="checkbox" class="ace-switch" checked>
                  <label class="form-check-label mt-1" for="flexSwitchCheckChecked"><strong>&nbsp;&nbsp;Status</strong></label>
                </div>
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
