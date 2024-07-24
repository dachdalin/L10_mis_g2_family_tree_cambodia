<div class="person-card text-center">
    <a href="{{ route('admin.peoples.show', $person->id) }}">
        <img src="{{ $person->photo ? Storage::url('photos/' . $person->team->name . '/' . json_decode($person->photo, true)[0]) : asset('images/no_image_available.jpg') }}" alt="{{ $person->firstname }}" class="mb-2">
        <p>{{ $person->firstname }} {{ $person->lastname }}</p>
        @if($person->dod)
            <span class="badge badge-danger">Deceased</span>
        @endif
    </a>
</div>
