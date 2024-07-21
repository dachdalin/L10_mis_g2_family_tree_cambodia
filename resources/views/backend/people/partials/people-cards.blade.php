<style>
    .person-card {
      margin-bottom: 1rem;
    }

    .person-card .card {
      border: 1px solid #e3e6f0;
      border-radius: 0.35rem;
    }

    .person-card img {
      width: 100%;
      height: auto;
      border-top-left-radius: 0.35rem;
      border-top-right-radius: 0.35rem;
    }

    .card-title a {
      text-decoration: none;
    }

    .card-title span {
      font-size: 1.25rem;
      color: #666;
      vertical-align: middle;
    }

    .card-footer {
      display: flex;
      justify-content: space-around;
    }

    .card-body p {
      text-align: left;
    }

    .card-body p a {
      text-decoration: none;
    }

    .card-body p a:hover {
      text-decoration: underline;
    }

    .card-footer .btn {
      flex: 1;
      margin: 0 0.5rem;
    }
    .banner-light-green {
        position: absolute;
        top: 10px;
        left: 10px;
        background-color: rgba(12, 237, 42, 0.558);
        color: white;
        padding: 5px 10px;
        font-size: 16px;
        font-weight: bold;
        border-radius: 5px;
    }
    .banner {
        position: absolute;
        top: 10px;
        left: 10px;
        background-color: rgba(255, 0, 0, 0.75);
        color: white;
        padding: 5px 10px;
        font-size: 16px;
        font-weight: bold;
        border-radius: 5px;
    }
  </style>


@if($people->isNotEmpty())
  {{-- <div class="row"> --}}
    @foreach($people as $person)
      <div class="col-md-3 person-card mt-1 mt-md-3">
        <div class="card">
          @if($person->dod)
              <div class="banner">Deceased</div>
          @else
              <div class="banner-light-green">Ancestors</div>
          @endif
          @if($person->photo)
              @php
                  $photos = json_decode($person->photo, true);
                  $primaryPhoto = $photos[0] ?? 'no_image_available.jpg';
                  $teamName = $person->team->name;
              @endphp
              <img src="{{ Storage::url('photos/' . $teamName . '/' . $primaryPhoto) }}" class="card-img-top" title="{{ $person->firstname }} {{ $person->lastname }}" alt="{{ $person->firstname }} {{ $person->lastname }}" class="card-img-top">
          @else
              <img src="{{ asset('images/no_image_available.jpg') }}" class="card-img-top" title="{{ $person->firstname }} {{ $person->lastname }}" alt="{{ $person->firstname }} {{ $person->lastname }}" class="card-img-top">
          @endif
          {{-- <img src="{{ $person->photo ? asset('images/' . $person->photo) : asset('images/no_image_available.jpg') }}" title="{{ $person->firstname }} {{ $person->lastname }}" alt="{{ $person->firstname }} {{ $person->lastname }}" class="card-img-top"> --}}
          <div class="card-body text-center">
            <div class="d-flex justify-content-between mb-2">
              {{-- person death the show both yob - dod --}}
              <strong>
                @if($person->dod)
                    {{ $person->yob }} - {{ \Carbon\Carbon::parse($person->dod)->year }}
                @else
                    {{ $person->yob }}
                @endif
              </strong>

              {{-- person death the show age --}}
              @if($person->dod)
                  <span>{{ \Carbon\Carbon::parse($person->yob . '-01-01')->diffInYears(\Carbon\Carbon::parse($person->dod)) }} Years</span>
              @else
                  <span>{{ \Carbon\Carbon::parse($person->yob . '-01-01')->age }} Years</span>
              @endif
            </div>
            <h5 class="card-title mb-1">
              <a href="{{ route('admin.peoples.show', $person->id) }}" class="text-primary">
                {{ $person->firstname }} {{ $person->lastname }}
                @if($person->sex == 'm')
                  <span>&#9794;</span>
                @else
                  <span>&#9792;</span>
                @endif
              </a>
            </h5>
            <p class="card-text mb-1">Birthname: {{ $person->birthname ?? 'N/A' }}</p>
            <p class="card-text mb-1">Nickname: {{ $person->nickname ?? 'N/A' }}</p>
            <hr>
            <p class="card-text mb-1">
              Father:
              @if($person->father)
                <a href="{{ route('admin.peoples.show', $person->father->id) }}" class="text-danger">
                  {{ $person->father->firstname }} {{ $person->father->lastname }} <span>&#9794;</span>
                </a>
              @else
                N/A
              @endif
            </p>
            <p class="card-text mb-1">
              Mother:
              @if($person->mother)
                <a href="{{ route('admin.peoples.show', $person->mother->id) }}" class="text-danger">
                  {{ $person->mother->firstname }} {{ $person->mother->lastname }} <span>&#9792;</span>
                </a>
              @else
                N/A
              @endif
            </p>
          </div>
          <div class="card-footer d-flex justify-content-center">
            <a href="{{ route('admin.peoples.show', $person->id) }}" class="btn btn-sm btn-primary mr-2">Profile</a>
            <a href="{{ route('admin.people.chart', $person->id) }}" class="btn btn-sm btn-secondary">Family chart</a>
          </div>
        </div>
      </div>
    @endforeach
  {{-- </div> --}}
  <div class="d-flex justify-content-center">
    {{ $people->appends(request()->query())->links() }}
  </div>
@else
  <div class="text-center mt-4">
    <p>No data available.</p>
  </div>
@endif

