<div class="action-buttons">
  @can('permission_show')
    <a id="objectShow" data-id="{{ $row->id }}" href="{{ route('admin.'.$crudRoutePath.'.show',$row->id) }}" class="text-blue mx-1 objectShow"><i class="fa fa-search-plus text-105"></i></a>
  @endcan
  {{-- <a id="objectEdit" data-id="{{ $row->id }}" href="{{ route('admin.'.$crudRoutePath.'.edit',$row->id) }}" class="btn btn-success btn-sm objectEdit">Edit</a> --}}
  {{-- <a id="objectDelete" data-id="{{ $row->id }}" href="{{ route('admin.'.$crudRoutePath.'.destroy',$row->id) }}" class="text-danger-m1 mx-1 objectDelete"><i class="far fa-trash-alt text-105"></i></a> --}}
  @can('permission_edit')
    <a id="objectEdit" data-id="{{ $row->id }}" href="{{ route('admin.'.$crudRoutePath.'.edit',$row->id) }}" class="text-success mx-1 objectEdit"><i class="fa fa-pencil text-105"></i></a>
  @endcan
  @can('permission_delete')
    <a id="objectDelete" data-id="{{ $row->id }}" href="{{ route('admin.'.$crudRoutePath.'.destroy',$row->id) }}" class="text-danger-m1 mx-1 objectDelete"><i class="far fa-trash-alt text-105"></i></a>
  @endcan
</div>
