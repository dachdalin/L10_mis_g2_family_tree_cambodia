<tr id="tr_object_id_{{ $row->id }}" class="bgc-h-orange-l4">
    <td>{{ $row->id }}</td>
    <td>{{ $row->name }}</td>
    <td>{{ $row->description }}</td>
    <td>{{ $row->owner->firstname ?? 'N/A' }}</td>
    <td>{{ date('d-M-Y', strtotime($row->created_at)) }}</td>
    <td>
      <div class="action-buttons">

            <a id="restoreObject" href="{{ route('admin.'.$crudRoutePath.'.restore', $row->id) }}" class="btn btn-success btn-sm">Restore</a>
            <a id="objectDelete" data-id="{{ $row->id }}" href="{{ route('admin.'.$crudRoutePath.'.destroy',$row->id) }}" class="text-danger-m1 mx-1 objectDelete"><i class="far fa-trash-alt text-105"></i></a>

      </div>
    </td>
  </tr>
