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
                  <h4 class="section-title mb-0">Partners</h4>
                  <div class="dropdown">
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
                  <h4 class="section-title mb-0">Children</h4>
                  <div class="dropdown">
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
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h4 class="section-title mb-0">Siblings</h4>
                  <div class="dropdown">
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="siblingsDropdown">
                      <a class="dropdown-item" href="#">Edit siblings</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item text-danger" href="#">Delete siblings</a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <p>Nothing recorded.</p>
                </div>
              </div>

            </div>

            <div class="col-md-6 mb-3">
              <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h4 class="section-title mb-0">Descendants</h4>
                  <div class="dropdown">
                    <button class="btn btn-tool dropdown-toggle" type="button" id="descendantsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-bars"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="descendantsDropdown">
                      <a class="dropdown-item" href="#">Edit descendants</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item text-danger" href="#">Delete descendants</a>
                    </div>
                  </div>
                </div>
                <div class="card-body text-center">
                  <img src="https://via.placeholder.com/100" alt="Descendant Picture" class="mb-2">
                  <p>dara Mr</p>
                </div>
              </div>
              <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h4 class="section-title mb-0">Ancestors</h4>
                  <div class="dropdown">
                    <button class="btn btn-tool dropdown-toggle" type="button" id="ancestorsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-bars"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="ancestorsDropdown">
                      <a class="dropdown-item" href="#">Edit ancestors</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item text-danger" href="#">Delete ancestors</a>
                    </div>
                  </div>
                </div>
                <div class="card-body text-center">
                  <img src="https://via.placeholder.com/100" alt="Ancestor Picture" class="mb-2">
                  <p>dara Mr</p>
                </div>
              </div>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>