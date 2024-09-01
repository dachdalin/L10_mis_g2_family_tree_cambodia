@extends('layouts.layout')
@push('css')
    <style>
        .preview {
            width: 100%;
            height: 150px;
            border: 1px solid #0cb4f2;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 10px;
            border-radius: 7px;
        }
        input[type="text"] {
            border: 1px solid #0cb4f2;
            border-radius: 5px;
        }
        input[type="text"]:hover{
            border: 1px solid #0c0c0c;
        }
        input[type="text"]:focus{
            border: 1px solid #0c0c0c;
            box-shadow: none;
        }
        input[type="file"] {
            border: 1px solid #0cb4f2;
            border-radius: 5px;
        }
        textarea[type="text"] {
            border: 1px solid #0cb4f2;
            border-radius: 5px;
        }
        textarea[type="text"]:hover{
            border: 1px solid #0c0c0c;
        }
        textarea[type="text"]:focus{
            border: 1px solid #0c0c0c;
            box-shadow: none;
        }
        .color-preview {
            width: 100%;
            height: 150px;
            border: 1px solid #0cb4f2;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 10px;
            border-radius: 7px;
        }
    </style>
@endpush
@section('content')
<div class="container-fluid">
    <form method="POST" action="{{ route('admin.setting.update') }}" enctype="multipart/form-data">
        @csrf
        <div class="card" hidden>
            <div class="card-header">
                <h3 class="card-title">Global SEO</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="meta_title" class="form-control-label">Meta Title</label>
                            <input id="meta_title" name="meta_title" class="form-control" type="text" value="{{ old('meta_title', $meta_title) }}" placeholder="Meta Title">
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="meta_keywords" class="form-control-label">Meta Keywords</label>
                            <input id="meta_keywords" name="meta_keywords" class="form-control" type="text" value="{{ old('meta_keywords', $meta_keywords) }}" placeholder="Meta Keywords">
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="meta_author" class="form-control-label">Meta Author</label>
                            <input id="meta_author" name="meta_author" class="form-control" type="text" value="{{ old('meta_author', $meta_author) }}" placeholder="Meta Author">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="meta_description" class="form-control-label">Meta Description</label>
                            <textarea type="text" class="form-control" name="meta_description" id="meta_description" cols="30" rows="8"> {{ old('meta_description', $meta_description) }}</textarea>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="customFile" class="form-control-label">Meta Image</label>
                            <div class="preview">
                                <img id="preview" src="{{ $meta_image ? asset('storage/' . $meta_image) : asset('images/no_image_available.jpg') }}" class="img-fluid" alt="Responsive image" style="height: 140px;border-radius: 7px">
                            </div>
                            <div class="custom-file">
                                <input id="customFile" name="meta_image" class="custom-file-input" type="file" value="{{ $meta_image }}">
                                <label for="customFile" class="custom-file-label">ជ្រើសរើសរូបភាព</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">កំណត់រូបភាព</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="logo" class="form-control-label">Logo</label>
                            <div class="preview">
                                <img id="preview-logo" src="{{ $logo ? asset('storage/' . $logo) : asset('images/no_image_available.jpg') }}" class="img-fluid" alt="Responsive image" style="height: 140px;border-radius: 7px">
                            </div>
                            <div class="custom-file">
                                <input id="customFile-logo" name="logo" class="custom-file-input" type="file" value="{{ $logo }}">
                                <label for="customFile" class="custom-file-label">ជ្រើសរើសរូបភាព</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="favicon" class="form-control-label">Favicon</label>
                            <div class="preview">
                                <img id="preview-favicon" src="{{ $favicon ? asset('storage/' . $favicon) : asset('images/no_image_available.jpg') }}" class="img-fluid" alt="Responsive image" style="height: 140px;border-radius: 7px">
                            </div>
                            <div class="custom-file">
                                <input id="customFile-favicon" name="favicon" class="custom-file-input" type="file" value="{{ $favicon }}">
                                <label for="customFile" class="custom-file-label">ជ្រើសរើសរូបភាព</label>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-info float-right"><i class="fas fa-save mr-2"></i>រក្សាទុក</button>
            </div>
        </div>
    </form>
</div>
@endsection
@push('js')
{{-- script for image preview when upload --}}
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#customFile").change(function() {
        readURL(this);
    });

    function readURLLogo(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#preview-logo').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#customFile-logo").change(function() {
    readURLLogo(this);
});

function readURLFavicon(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#preview-favicon').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#customFile-favicon").change(function() {
    readURLFavicon(this);
});

</script>
@endpush
