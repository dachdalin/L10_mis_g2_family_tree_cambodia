<div id="photo-gallery" class="row mt-3">
    @php
        $photos = json_decode($person->photo, true) ?? [];
        $teamName = $person->team->name;

    @endphp
    @foreach ($photos as $photo)
        @php
            $filePath = storage_path('app/public/photos/' . $teamName . '/' . $photo);
        @endphp
        <div class="col-md-3 mb-3">
            <div class="card">
                <div class="card-header">
                    <span class="badge badge-info">{{ $loop->iteration }}</span>
                    <span class="badge badge-secondary">{{ $photo }}</span>
                </div>
                <img src="{{ Storage::url('photos/' . $teamName . '/' . $photo) }}" class="card-img-top" alt="{{ $photo }}" style="width: 50px; height: auto;">
                <div class="card-body text-center">
                    <div class="d-flex justify-content-between">
                        @if ($loop->first)
                            <button type="button" title="Primary" class="btn btn-primary btn-sm set-primary" data-id="{{ $photo }}" disabled>
                                <i class="fas fa-star"></i> 
                            </button>
                        @else
                            <button type="button" title="Set as Primary" class="btn btn-primary btn-sm set-primary" data-id="{{ $photo }}">
                                <i class="fas fa-star"></i> 
                            </button>
                        @endif
                        <a href="{{ Storage::url('photos/' . $teamName . '/' . $photo) }}" download class="btn btn-secondary btn-sm">
                            <i class="fas fa-download"></i> {{ round(filesize($filePath) / 1024, 1) }} KB
                        </a>
                        <button type="button" title="Delete" class="btn btn-danger btn-sm delete-photo" data-id="{{ $photo }}">
                            <i class="fas fa-trash-alt"></i> 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
