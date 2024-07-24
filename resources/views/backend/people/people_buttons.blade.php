{{-- <h3 class="card-title">DataTable with default features</h3> --}}
<a href="{{ route('admin.'.$crudRoutePath.'.show', $person->id) }}" class="btn btn-info mx-1 float-right">
    <i class="fas fa-profile"></i> Profile
</a>
<a href="{{ route('admin.people.ancestors', $person->id) }}" class="btn btn-info mx-1 float-right @if(request()->routeIs('admin.people.ancestors')) active @endif">
    <i class="fas fa-profile"></i> Ancestors
</a>
<a href="{{ route('admin.people.descendants', $person->id) }}" class="btn btn-info mx-1 float-right @if(request()->routeIs('admin.people.descendants')) active @endif">
    <i class="fas fa-profile"></i> Descendants
</a>
<a href="{{ route('admin.people.chart', $person->id) }}" class="btn btn-info mx-1 float-right @if(request()->routeIs('admin.people.chart')) active @endif">
    <i class="fas fa-profile"></i> Family chart
</a>
<a class="btn btn-info mx-1 float-right">
    <i class="fas fa-profile"></i> Files
</a>
<a class="btn btn-info mx-1 float-right">
    <i class="fas fa-profile"></i> សំបុត្រកំណើត
</a>
<a class="btn btn-info mx-1 float-right">
    <i class="fas fa-profile"></i> សៀវភៅស្នាក់នៅ
</a>
<a class="btn btn-info mx-1 float-right">
    <i class="fas fa-profile"></i> History
</a>

