<div class="modal fade" id="photoCrudModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <form id="frmPhotoCrud" action="{{ route('admin.people.storePhotos') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title">Edit Photos</h5>
          <button id="buttonClose" type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="object_id" id="object_id">
          <div class="form-group">
            <label for="photo" class="form-control-label mb-1">Choose Photos:</label>
            <input id="photo" name="photo[]" class="form-control" type="file" multiple>
            <span class="text-danger error-text photo_error"></span>
          </div>
          <div id="photo-gallery" class="row mt-3">
            <!-- Existing photos will be loaded here via AJAX -->
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