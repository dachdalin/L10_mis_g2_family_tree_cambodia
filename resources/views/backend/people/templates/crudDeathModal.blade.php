<div class="modal fade" id="crudDeathModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form id="frmDeathCrudObject" action="{{ route('admin.people.storeDeath') }}" method="post">
                {{ csrf_field() }}
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Edit death</h5>
                    <button id="buttonClose" type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="object_id" id="object_id_death">
                    <input type="hidden" name="team_id" id="team_id" value="{{ $active_team_id }}">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="yod" class="form-control-label mb-1">Year of death:</label>
                                <input id="yod" name="yod" class="form-control" type="text" placeholder="Year of death">
                                <span class="text-danger error-text yod_error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dod" class="form-control-label mb-1">Date of death:</label>
                                <input id="dod" name="dod" class="form-control" type="date" placeholder="Date of death">
                                <span class="text-danger error-text dod_error"></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="pod" class="form-control-label mb-1">Place of death:</label>
                                <input id="pod" name="pod" class="form-control" type="text" placeholder="Place of death">
                                <span class="text-danger error-text pod_error"></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label mb-1">Cemetery Location</label>
                                <hr>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="location_name" class="form-control-label mb-1">Location name:</label>
                                <input id="location_name" name="location_name" class="form-control" type="text" placeholder="Location name">
                                <span class="text-danger error-text location_name_error"></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address" class="form-control-label mb-1">Address:</label>
                                <textarea id="address" name="address" class="form-control" placeholder="Address"></textarea>
                                <span class="text-danger error-text address_error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="latitude" class="form-control-label mb-1">Latitude:</label>
                                <input id="latitude" name="latitude" class="form-control" type="text" placeholder="Latitude">
                                <span class="text-danger error-text latitude_error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="longitude" class="form-control-label mb-1">Longitude:</label>
                                <input id="longitude" name="longitude" class="form-control" type="text" placeholder="Longitude">
                                <span class="text-danger error-text longitude_error"></span>
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
