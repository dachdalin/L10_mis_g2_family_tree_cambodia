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
    @if($siblings->isEmpty())
        <p>Nothing recorded.</p>
    @else
        <ul class="list-group list-group-flush">
            @foreach($siblings as $sibling)
                <li class="list-group-item">
                    <a href="{{ route('admin.peoples.show', $sibling->id) }}">
                        {{ $sibling->firstname }} {{ $sibling->lastname }}
                    </a>
                    <span>{{ $sibling->sex == 'm' ? '♂' : '♀' }}</span>
                </li>
            @endforeach
        </ul>
    @endif
  </div>