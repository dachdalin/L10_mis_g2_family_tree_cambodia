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
          @include('backend.role.permission_form')
        </div>
        <div class="modal-footer">
          @include('backend.templates.button')
        </div>
      </form>
    </div>
  </div>
</div>
