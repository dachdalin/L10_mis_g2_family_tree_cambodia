<div class="card-header d-flex justify-content-between align-items-center">
    <h4 class="section-title mr-auto">Family</h4>
    <div class="dropdown ml-auto">
      <button class="btn btn-tool dropdown-toggle" type="button" id="familyDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bars"></i>
      </button>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="familyDropdown">
        @if(!$person->father)
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#fatherCrudObjectModal">Add father</a>
        @endif
        @if(!$person->mother)
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#motherCrudObjectModal">Add mother</a>
        @endif
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#familyCrudModal">Edit family</a>
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
        @if(!$person->father)
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#existingFatherCrudObjectModal">
            <i class="fas fa-star"></i>
        </a>
        @endif
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
        @if($person->parents_id)
            @php
                $couple = \App\Models\Couple::with(['person1', 'person2'])->find($person->parents_id);
            @endphp
            @if($couple)
                <a target="_blank" href="{{ route('admin.peoples.show', $couple->person1->id) }}">
                    {{ $couple->person1->firstname }} {{ $couple->person1->lastname }}
                </a>
                &
                <a target="_blank" href="{{ route('admin.peoples.show', $couple->person2->id) }}">
                    {{ $couple->person2->firstname }} {{ $couple->person2->lastname }}
                </a>
            @else
                <span>No parents recorded</span>
            @endif
        @else
            <span>No parents recorded</span>
        @endif
    </li>

    <li class="list-group-item">
        Partner

    </li>
    </ul>
  </div>
