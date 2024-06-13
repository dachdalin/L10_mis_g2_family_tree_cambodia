<tr id="tr_object_id_{{ $row->id }}" class="bgc-h-orange-l4">
  <td>{{ $row->id }}</td>
  <td>
    {{ $row->group }}
  </td>
  <td>{{ $row->title }}</td>
  <td>
    <input id="status" name="status" data-id="{{ $row->id }}" {{ $row->status?'checked':'' }} title="Status" type="checkbox" class="ace-switch input-lg ace-switch-yesno bgc-green-d2 text-grey-m2" />
  </td>
  <td>
    @include('backend.templates.crudAction')
  </td>
</tr>
