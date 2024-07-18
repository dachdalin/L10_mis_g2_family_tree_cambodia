<div class="card-header d-flex justify-content-between align-items-center">
    <h4 class="section-title mb-0">Family</h4>
    <div class="dropdown">
      <button class="btn btn-tool dropdown-toggle" type="button" id="familyDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bars"></i>
      </button>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="familyDropdown">
        @if(!$person->father)
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#fatherCrudObjectModal">Add father</a>
        @endif
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#motherCrudObjectModal">Add mother</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Edit family</a>
      </div>
    </div>
  </div>
  <div class="card-body">
    <ul class="list-group list-group-flush">
      <li class="list-group-item">
        Father 
        @if($person->father)
            <a target="_blank" href="{{ route('admin.peoples.show', $person->father->id) }}">
                {{ $person->father->firstname }} {{ $person->father->lastname }} 
            </a>
            <span>{{ $person->father->sex == 'm' ? '♂' : '♀' }}</span>
        @else
            <span>No father recorded</span>
        @endif
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#existingFatherCrudObjectModal">
            <i class="fas fa-star"></i> 
        </a>
    </li>
    <li class="list-group-item">
        Mother 
        @if($person->mother)
            <a target="_blank" href="{{ route('admin.peoples.show', $person->mother->id) }}">
                {{ $person->mother->firstname }} {{ $person->mother->lastname }} 
            </a>
            <span>{{ $person->mother->sex == 'm' ? '♂' : '♀' }}</span>
        @else
            <span>No mother recorded</span>
        @endif
    </li>
    <li class="list-group-item">
        Parents 
        @if($person->father && $person->mother)
            <a target="_blank" href="{{ route('admin.peoples.show', $person->father->id) }}">
                {{ $person->father->firstname }} {{ $person->father->lastname }}
            </a>
            & 
            <a href="{{ route('admin.peoples.show', $person->mother->id) }}">
                {{ $person->mother->firstname }} {{ $person->mother->lastname }}
            </a>
        @else
            <span>No parents recorded</span>
        @endif
    </li>
    <li class="list-group-item">
        Partner
       
    </li>
    </ul>
  </div>