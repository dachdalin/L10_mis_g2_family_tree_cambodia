<div class="form-group {{ $errors->has('role.title') ? 'invalid' : '' }}">
  <div class="col-md-12">
    <label class="form-label required" for="title">Role Title<span class="text-danger">*</span>
    </label>
    <input id="title" name="title" class="form-control col-md-6" type="text" placeholder="Enter Title">
    <span id="field_error" class="text-danger error-text title_error"></span>
  </div>
</div>
<div class="form-group">
  <div class="col-sm-12">
    <label class="form-control-label">Permission<span class="text-danger">*</span>
      <span id="field_error" class="text-danger error-text title_error"></span>
    </label>
    <br>
  </div>
	<div class="col-sm-12">
    <table id="dynamic-table" class="table table-bordered table-hover">
      <thead class="table-secondary">
      <tr>
        <th width="25%">Group</th>
        <th class="center">
          <label class="pos-rel">
            <input id="selectall" name="selectall" type="checkbox" class="ace" />
            <span class="lbl"></span>
          </label>
        </th>
        <th>Access</th>
      </tr>
      </thead>
      <tbody id="object_permission">
      @if($all_permissions)
        @foreach($all_permissions as $permission)
          <tr>
            <td><strong>{{$permission[0]['group']}}</strong></td>
            <td class="center first-child">
            <label>
              <input id="chkIds" name="chkIds" value="{{ $permission[0]['group'] }}" type="checkbox" class="ace group"/>
              <span class="lbl"></span>
            </label>
            </td>
            <td>
              @foreach($permission as $access)
                <label>
                  <input id="permissions" name="permissions[]" class="ace permissions" type="checkbox" value="{{ $access['id'] }}">
                  <span class="lbl pr-2">&nbsp;{{ $access['title']}} &nbsp;&nbsp;</span>
                </label>
              @endforeach
            </td>
          </tr>
        @endforeach
      @else
        <tr><td colspan="7">No data found.</td></tr>
      @endif
      </tbody>
    </table>
  </div>
</div>
<div class="form-group mt-0">
  <div class="form-check form-switch">
    <input id="status" name="status" type="checkbox" class="ace-switch" checked>
    <label class="form-check-label mt-1" for="flexSwitchCheckChecked"><strong>&nbsp;&nbsp;Status</strong></label>
  </div>
</div>
