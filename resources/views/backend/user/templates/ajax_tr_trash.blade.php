<tr id="tr_object_id_{{ $row->id }}" class="bgc-h-orange-l4">
    <td>{{ $row->id }}</td>              
    <td>{{ $row->username }}</td>
    <td>{{ $row->email }}</td>
    <td>{{ date('d-M-Y',strtotime($row->delete_at)) }}</td>
    <td>
      <input id="status" name="status" data-id="{{ $row->id }}" {{ $row->status?'checked':'' }} title="Status" type="checkbox" class="ace-switch input-lg ace-switch-yesno bgc-green-d2 text-grey-m2" />
    </td>
    <td>
      <div class="action-buttons">
        {{-- @if(request()->has('view_deleted')) --}}

            <a id="restoreObject" href="{{ route('admin.'.$crudRoutePath.'.restore', $row->id) }}" class="btn btn-success btn-sm">Restore</a>
        {{-- @else                                 --}}
            <a id="objectDelete" data-id="{{ $row->id }}" href="{{ route('admin.'.$crudRoutePath.'.destroy',$row->id) }}" class="text-danger-m1 mx-1 objectDelete"><i class="far fa-trash-alt text-105"></i></a>
        {{-- @endif --}}
        
      </div>
    </td>
  </tr>