@if(isset($row))
<tr id="tr_object_id_{{ $row->id }}" class="bgc-h-orange-l4">
  <td>{{ $row->id }}</td>
  <td><strong>{{ $row->title }}</strong></td>
  <td>
    @foreach ($row->permissions as $p)
      <span class="badge rounded-pill bg-secondary text-white">{{ $p->title }}</span>
    @endforeach
  </td>
  <td>
    <input id="status" name="status" data-id="{{ $row->id }}" {{ $row->status?'checked':'' }} title="Status" type="checkbox" class="ace-switch input-lg ace-switch-yesno bgc-green-d2 text-grey-m2" />
  </td>
  <td>
    @include('backend.templates.crudAction')
  </td>
</tr>
@else
    <tr id="noDataMessage">
        <td colspan="6">No data available</td>
    </tr>
@endif