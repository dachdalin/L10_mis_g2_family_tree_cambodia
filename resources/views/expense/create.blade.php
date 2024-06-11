@extends('layouts.layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        {{-- <h1>{{__('Add New Expense')}}</h1> --}}
                    </div>
                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <form method="POST" action="{{ route('expenses.store') }}" enctype="multipart/form-data">
                            @csrf
                            <!-- general form elements -->
                            <div class="card card-info">
                                <!-- /.card-header -->
                                <div class="card-header">
                                    <h3 class="card-title">{{__('បញ្ចូលថ្មី')}}</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <label for="name">{{__('Name')}}</label>
                                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <label for="amount">{{__('Amount')}}</label>
                                                <input type="text" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" value="{{ old('amount') }}" >
                                                @error('amount')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <label for="date">{{__('Date')}}</label>
                                                <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date') }}" required>
                                                @error('date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <label for="category">{{__('Category')}}</label>
                                                <select class="form-control select2 @error('category_id') is-invalid @enderror" id="category" name="category_id">
                                                    <option value="">Select Category</option>
                                                    {{-- @foreach($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach --}}
                                                </select>
                                                @error('category_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <label for="description">{{__('Description')}}</label>
                                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="6" name="description" >{{ old('description') }}</textarea>
                                                @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <label for="exampleInputFile">{{__('Thumbnail')}}</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="image" accept="image/png,image/jpeg" onchange="previewImage(event)"  id="customFile">
                                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                                    </div>
                                                </div>
                                                <div class="preview preview-multiple text-center border rounded mt-2" style="height: 110px">
                                                    <center>
                                                        <img id="image-preview" src="{{ asset('uploads/image/default.png') }}" alt="image" height="100%">
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 form-group">
                                    <button type="submit" class="btn btn-info float-right">
                                        <i class="fa fa-save"></i>
                                        {{__('រក្សាទុក')}}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
@endsection

@push('js')
    <script>
        function previewImage(event) {
            var input = event.target;
            var reader = new FileReader();

            reader.onload = function(){
                var preview = document.getElementById('image-preview');
                preview.src = reader.result;
            }

            reader.readAsDataURL(input.files[0]);
        }

    </script>
@endpush
