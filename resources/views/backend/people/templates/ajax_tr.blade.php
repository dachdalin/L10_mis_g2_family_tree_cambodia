<div class="card">
  <div class="card-header">
    <h3 class="card-title">Family: <span id="active-team-name">{{ $active_team_name }}</span> ({{ $member_count }} available)</h3>
    <a class="btn btn-info float-right" data-toggle="modal" data-target="#crudObjectModal">
      <i class="fas fa-plus"></i> Add person
    </a>            
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
    
    <div class="row">
      <div class="col-sm-6">
        <p>Insert either a firstname, lastname, a birthname or a nickname. <span style="color: red;">Do not combine!</span></p>
        <form action="{{ route('admin.people.search') }}" method="GET" id="search-form">
          <div class="input-group">
              <input type="hidden" name="team_id" value="{{ $active_team_id }}">
              <input type="search" name="query" class="form-control form-control-lg" placeholder="Type your keywords here">
              <div class="input-group-append">
                  <button type="submit" class="btn btn-lg btn-default">
                      <i class="fa fa-search"></i>
                  </button>
              </div>
          </div>
      </form>
      
      </div>
      <div class="col-sm-6">
        <div class="form-group" data-select2-id="29">
          <label>Switch Family Team</label>
          <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" id="team-switch" data-select2-id="1" tabindex="-1" aria-hidden="true">
              @foreach($teams as $team)
                  <option value="{{ $team->id }}" {{ $team->id == $active_team_id ? 'selected' : '' }}>
                      {{ $team->name }} {{ $team->id == $active_team_id ? '✔️' : '' }}
                  </option>
              @endforeach
          </select>
        </div>
      
        
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-sm-12">
      @if($people->isNotEmpty())
        <div class="card-deck">
          @foreach($people as $person)
            <div class="card">
              <img src="{{ asset('images/no_image_available.jpg') }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">{{ $person->firstname }} {{ $person->lastname }}</h5>
                <p class="card-text">
                  Birthname: {{ $person->birthname }}<br>
                  Nickname: {{ $person->nickname }}<br>
                  Father: {{ $person->father ? $person->father->firstname . ' ' . $person->father->lastname : 'N/A' }}<br>
                  Mother: {{ $person->mother ? $person->mother->firstname . ' ' . $person->mother->lastname : 'N/A' }}
                </p>
              </div>
              <div class="card-footer">
                <a href="{{ route('admin.people.show', $person->id) }}" class="btn btn-primary">Profile</a>
                <a href="{{ route('admin.people.chart', $person->id) }}" class="btn btn-secondary">Family chart</a>
              </div>
            </div>
          @endforeach
        </div>
        <div class="d-flex justify-content-center">
          {{ $people->appends(request()->query())->links() }}
        </div>
      @else
        <p>No results found.</p>
      @endif
    </div>
  </div>


  <!-- /.card-body -->
</div>