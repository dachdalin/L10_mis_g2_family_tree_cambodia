<style>
  /* Card Styling */
  .card-ancestors-descendants {
      border: 1px solid #ccc;
      border-radius: 5px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      margin-bottom: 1rem;
      padding: 0.5rem;
      width: 300px; /* Adjust the width to be smaller */
  }

  .card-ancestors-descendants-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0.25rem;
      font-size: 14px; /* Smaller font size */
  }

  .input-group {
      display: flex;
      align-items: center;
  }

  .input-group button {
      padding: 0.25rem 0.5rem; /* Smaller padding */
      font-size: 14px; /* Smaller font size */
  }

  .input-group input {
      width: 30px; /* Fixed width */
      text-align: center;
      border: 1px solid #ccc;
      border-radius: 3px;
      padding: 0.25rem;
      margin: 0 0.25rem;
      font-size: 14px; /* Smaller font size */
  }

  .card-body {
      text-align: center;
      padding: 0.25rem;
  }

  .tree-rtl {
      direction: rtl;
      transform: rotate(180deg);
      overflow-x: auto;
  }

  .tree-rtl ul {
      display: flex;
      padding-top: 5px;
      padding-bottom: 5px;
      position: relative;
  }

  .tree-rtl li {
      list-style-type: none;
      position: relative;
      padding: 5px;
      float: left;
      text-align: center;
  }

  .tree-rtl li::before, .tree-rtl li::after {
      content: '';
      position: absolute;
      top: 0;
      left: 50%;
      border-top: 1px solid #ccc;
      width: 50%;
      height: 5px;
      transform: scaleX(-1);
  }

  .tree-rtl li::after {
      right: auto;
      right: 50%;
      border-left: 1px solid #ccc;
  }

  .tree-rtl li:only-child::after, .tree-rtl li:only-child::before {
      display: none;
  }

  .tree-rtl li:only-child { padding-top: 0; }

  .tree-rtl li:first-child::before, .tree-rtl li:last-child::after {
      border: 0 none;
  }

  .tree-rtl li:last-child::before {
      border-right: 1px solid #ccc;
      border-radius: 0 5px 0 0;
  }

  .tree-rtl li:first-child::after {
      border-radius: 5px 0 0 0;
  }

  .tree-rtl ul ul::before {
      content: '';
      position: absolute;
      top: 0;
      left: 50%;
      border-left: 1px solid #ccc;
      width: 0;
      height: 5px;
  }

  .tree-rtl li a {
      border: 1px solid #ccc;
      padding: 2px;
      text-decoration: none;
      color: #666;
      font-family: arial, verdana, tahoma;
      font-size: 10px; /* Smaller font size */
      display: inline-block;
      transform: rotate(180deg);
      border-radius: 5px;
      transition: all 0.2s;
  }

  .tree-rtl li a:hover, .tree-rtl li a:hover+ul li a {
      background: #131826;
      color: #fff;
      border: 1px solid #94a0b4;
  }

  .tree-rtl li a:hover+ul li::after,
  .tree-rtl li a:hover+ul li::before,
  .tree-rtl li a:hover+ul::before,
  .tree-rtl li a:hover+ul ul::before {
      border-color:  #94a0b4;
  }

  .user-image {
      width: 40px; /* Smaller image size */
      height: 40px; /* Smaller image size */
      overflow: hidden;
      margin: 0 auto;
  }

  .user-image img {
      width: 100%;
      height: auto;
      border-radius: 50%;
  }

  .w-16 {
      width: 40px; /* Smaller width */
      margin: 0 auto;
  }

  figcaption {
      font-size: 10px; /* Smaller font size */
      text-align: center;
  }
</style>

<div class="card-header">
    <h3 class="card-title">{{ $person->firstname }} {{ $person->lastname }}</h3>
    @include('backend.people.people_buttons')
  </div>

  <div class="card-body">
    <div class="container mt-4">
      <div class="row">

        <div class="col-md-4">
          <div class="card profile-card">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h3 class="card-title mb-0">Profile</h3>
              <div class="dropdown">
                <button class="btn btn-tool dropdown-toggle" type="button" id="profileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-bars"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown">
                  <a class="dropdown-item" id="editProfile" href="{{ route('admin.'.$crudRoutePath.'.edit', $person->id) }}" data-id="{{ $person->id }}">Edit profile</a>
                  <a class="dropdown-item" id="editContact" href="{{ route('admin.people.editContact', $person->id) }}" data-id="{{ $person->id }}">Edit contact</a>
                  <a class="dropdown-item" id="editDeath" href="{{ route('admin.people.editDeath', $person->id) }}" data-id="{{ $person->id }}">Edit death</a>
                  <a class="dropdown-item" id="editPhotos" href="{{ route('admin.people.editPhotos', $person->id) }}" data-id="{{ $person->id }}">Edit photos</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item text-danger" href="#">Delete person</a>
                </div>
              </div>
            </div>

            <div id="profile-section" class="card-body text-center">

                <div class="card position-relative">
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
                      <img src="{{ Storage::url('photos/' . $teamName . '/' . $primaryPhoto) }}" title="{{ $person->firstname }} {{ $person->lastname }}" alt="{{ $person->firstname }} {{ $person->lastname }}" class="mb-3">
                    @else
                      <img src="{{ asset('images/no_image_available.jpg') }}" title="{{ $person->firstname }} {{ $person->lastname }}" alt="{{ $person->firstname }} {{ $person->lastname }}" class="mb-3">
                    @endif
                    {{-- <img src="{{ $person->photo ? asset('images/' . $primaryPhoto) : asset('images/no_image_available.jpg') }}" title="{{ $person->firstname }} {{ $person->lastname }}" alt="{{ $person->firstname }} {{ $person->lastname }}" class="mb-3"> --}}
                </div>
                <div class="d-flex justify-content-between">
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

                <table class="profile-info-table mt-3">
                    <tbody>
                        <tr>
                            <td>First name</td>
                            <td>{{ $person->firstname }}</td>
                        </tr>
                        <tr>
                            <td>Surname</td>
                            <td>{{ $person->lastname }}</td>
                        </tr>
                        <tr>
                            <td>Birthname</td>
                            <td>{{ $person->birthname }}</td>
                        </tr>
                        <tr>
                            <td>Nickname</td>
                            <td>{{ $person->nickname }}</td>
                        </tr>
                        <tr>
                            <td>Sex (biological)</td>
                            <td>{{ $person->sex == 'm' ? 'Male ♂' : 'Female ♀' }}</td>
                        </tr>
                        <tr>
                            <td>Gender identity</td>
                            <td>Cis Male</td>
                        </tr>
                        <tr>
                            <td>Date of birth</td>
                            <td>{{ \Carbon\Carbon::parse($person->dob)->format('F j, Y') }}</td>
                        </tr>
                        <tr>
                            <td>Place of birth</td>
                            <td>{{ $person->pob }}</td>
                        </tr>
                        @if($person->yod || $person->dod || $person->pod)
                            <tr>
                                <td>Date of death</td>
                                <td>{{ \Carbon\Carbon::parse($person->dod)->format('F j, Y') }}</td>
                            </tr>
                            <tr>
                                <td>Place of death</td>
                                <td>{{ $person->pod }}</td>
                            </tr>
                            <tr>
                                <td>Cemetery</td>
                                <td>
                                    {{ $person->metadata->where('key', 'cemetery_location_name')->first()->value ?? '' }}
                                    <br>
                                    <a href="https://www.google.com/maps/search/?api=1&query={{ $person->metadata->where('key', 'cemetery_location_latitude')->first()->value }},{{ $person->metadata->where('key', 'cemetery_location_longitude')->first()->value }}" target="_blank">
                                        {{ $person->metadata->where('key', 'cemetery_location_address')->first()->value ?? '' }}
                                    </a>
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td>Address</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td>{{ $person->phone }}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <style>
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


          </div>
        </div>

        <div class="col-md-8">
          <div class="row">

            <div class="col-md-6 mb-3">

              <div class="card" id="family">
                @include('backend.people.partials.family', ['person' => $person])
              </div>
              <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h4 class="section-title mr-auto">Partners</h4>
                  <div class="dropdown ml-auto">
                    <button class="btn btn-tool dropdown-toggle" type="button" id="partnersDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-bars"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="partnersDropdown">
                      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#partnerCrudObjectModal">Add relationship</a>
                      <div class="dropdown-divider"></div>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <p>Nothing recorded.</p>
                </div>
              </div>

              <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h4 class="section-title mr-auto">Children</h4>
                  <div class="dropdown ml-auto">
                    <button class="btn btn-tool dropdown-toggle" type="button" id="childrenDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-bars"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="childrenDropdown">
                      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#childCrudObjectModal">Add child</a>
                      <div class="dropdown-divider"></div>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <p>Nothing recorded.</p>
                </div>
              </div>

              <div class="card">
                {{-- @include('backend.people.partials.siblings', ['siblings' => $siblings]) --}}
                <div id="siblings-section">
                  @include('backend.people.partials.siblings', ['siblings' => $siblings])
                </div>
              </div>

            </div>

            <div class="col-md-6 mb-3">

              {{-- card ancestors --}}
              {{-- @include('backend.people.partials.ancestors', ['person' => $person]) --}}

              {{-- card descendants --}}
              {{-- @include('backend.people.partials.descendants', ['person' => $person]) --}}

              {{-- card ancestors --}}
              <div id="ancestors-section">
                @include('backend.people.partials.ancestors', ['person' => $person])
              </div>

              {{-- card descendants --}}
              <div id="descendants-section">
                  @include('backend.people.partials.descendants', ['person' => $person])
              </div>


            </div>

          </div>
        </div>

      </div>
    </div>
  </div>


