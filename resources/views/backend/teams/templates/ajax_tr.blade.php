@if(isset($row))
<tr id="tr_object_id_{{ $row->id }}" class="bgc-h-orange-l4">
  <td>{{ $row->id }}</td>
  <td>{{ $row->name }}</td>
  <td>{{ $row->description }}</td>
  <td>{{ $row->owner->firstname ?? 'N/A' }}</td>
  <td>{{ date('d-M-Y', strtotime($row->created_at)) }}</td>
  <td>
    @include('backend.templates.crudAction')
  </td>
</tr>
@else
    <tr id="noDataMessage">
        <td colspan="6">No data available</td>
    </tr>
@endif
