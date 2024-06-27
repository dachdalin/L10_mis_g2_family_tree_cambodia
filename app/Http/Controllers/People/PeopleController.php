<?php

namespace App\Http\Controllers\People;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Person;

class PeopleController extends Controller
{
    public function search(Request $request)
    {
        $teams = Team::all();
        $active_team_id = $request->query('team_id', $teams->first()->id ?? null);
        $active_team = Team::find($active_team_id);
        $active_team_name = $active_team->name;
        $member_count = $active_team->members->count(); // Assuming 'members' is the relation for persons in the team
    
        $query = $request->query('query');
    
        $people = Person::where('team_id', $active_team_id)
                    ->where(function($q) use ($query) {
                        $q->where('firstname', 'like', "%$query%")
                          ->orWhere('lastname', 'like', "%$query%")
                          ->orWhere('birthname', 'like', "%$query%")
                          ->orWhere('nickname', 'like', "%$query%");
                    })
                    ->get();

        return view('backend.people.search', compact('teams', 'active_team_id', 'active_team_name', 'people', 'member_count'));
    }




    public function show()
    {
        return view('backend.people.show');
    }

    public function ancestors()
    {
        return view('backend.people.ancestors');
    }

    public function descendants()
    {
        return view('backend.people.descendants');
    }

    public function chart()
    {
        return view('backend.people.chart');
    }
}
