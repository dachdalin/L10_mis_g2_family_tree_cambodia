<div class="card-body p-0 table-wrapper">
    <table class="table">
        <thead class="text-uppercase">
            <tr>
                <th >#</th>
                <th>{{ __('name') }}</th>
                <th>{{ __('Category') }}</th>
                {{-- <th>{{ __('Status') }}</th> --}}
                <th>{{ __('Amount') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($expenses as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <img src="{{ $row->image_url }}" alt="" class="profile_img_table">
                    </td>
                    <td>{{ $row->name }}</td>
                    {{-- <td>{{ @$row->category->title }}</td> --}}
                    {{-- <td>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input switcher_input status" id="status_{{ $row->id }}" data-id="{{ $row->id }}" {{ $row->status == 1 ? 'checked' : '' }} name="status">
                            <label class="custom-control-label" for="status_{{ $row->id }}"></label>
                        </div>
                    </td> --}}
                    <td>{{ $row->amount }}</td>
                    <td>

                        <a href="{{ route('expenses.edit', $row->id) }}" class="btn btn-info btn-sm btn-edit">
                            <i class="fas fa-pencil-alt"></i>
                            {{ __('Edit') }}
                        </a>

                        <form action="{{ route('expenses.destroy', $row->id) }}" class="d-inline-block form-delete-{{ $row->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" data-id="{{ $row->id }}" data-href="{{ route('expenses.destroy', $row->id) }}" class="btn btn-danger btn-sm btn-delete">
                                <i class="fa fa-trash-alt"></i>
                                {{ __('Delete') }}
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row">
        <div class="col-12 d-flex flex-row flex-wrap">
            <div class="row" style="width: -webkit-fill-available;">
                <div class="col-12 col-sm-6 text-center text-sm-left pl-3" style="margin-block: 20px">
                    {{ __('Showing') }} {{ $expenses->firstItem() }} {{ __('to') }} {{ $expenses->lastItem() }} {{ __('of') }} {{ $expenses->total() }} {{ __('entries') }}
                </div>
                <div class="col-12 col-sm-6 pagination-nav pr-3"> {{ $expenses->links() }}</div>
            </div>
        </div>
    </div>

</div>

