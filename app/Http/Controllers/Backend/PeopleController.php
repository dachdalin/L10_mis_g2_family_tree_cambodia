<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    public function search()
    {
        return view('backend.people.search');
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
