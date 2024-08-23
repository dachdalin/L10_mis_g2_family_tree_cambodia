<div class="card-header d-flex justify-content-between align-items-center">
    <h4 class="section-title mr-auto">Siblings</h4>
    <div class="dropdown ml-auto">
        <button class="btn btn-tool dropdown-toggle" type="button" id="childrenDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bars"></i>
        </button>
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
