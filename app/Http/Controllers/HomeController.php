<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = DB::table('people')
                ->select(
                    DB::raw('MONTH(created_at) as month'),
                    DB::raw('YEAR(created_at) as year'),
                    'sex',
                    DB::raw('COUNT(*) as total')
                )
                ->groupBy('year', 'month', 'sex')
                ->get();

        $chartData = [
            'labels' => [],
            'datasets' => [
                'male' => [],
                'female' => [],
            ],
        ];

        foreach (range(1, 12) as $month) {
            $chartData['labels'][] = Carbon::create()->month($month)->format('F');

            $maleCount = $data->where('month', $month)->where('sex', 'm')->sum('total');
            $femaleCount = $data->where('month', $month)->where('sex', 'f')->sum('total');

            $chartData['datasets']['male'][] = $maleCount;
            $chartData['datasets']['female'][] = $femaleCount;
        }
        $totalFemale = $data->where('sex', 'f')->sum('total');
        $totalMale = $data->where('sex', 'm')->sum('total');
        $totals = $totalFemale + $totalMale;
        $totalFamily = DB::table('people')->whereNotNull('father_id')->whereNotNull('mother_id')->count();
        return view('index', compact('chartData', 'totalFemale', 'totalMale', 'totals', 'totalFamily'));
    }
}
