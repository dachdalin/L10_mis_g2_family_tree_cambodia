<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeamPageController extends Controller
{
    public function teams()
    {
        return view('backend.teams.teams');
    }
    // public function add()
    // {
    //     return view('backend.teams.create_teams');
    // }
}
