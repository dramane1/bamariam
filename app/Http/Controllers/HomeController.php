<?php

namespace App\Http\Controllers;

use App\Charts\LocationChart;
use App\Models\Location;
use Chartisan\PHP\Chartisan;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Models\Salary;
use App\Models\User;
use App\Models\Income;
use App\Models\Expense;

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
        // $locations = DB::table('locations')
        // ->select(DB::row('count(*) data, month("created_at") month, monthname("created_at") month_name'))
        // ->groupBy('month_name')
        // ->orderBy('month', 'asc')
        // ->get();

        // $labels = $locations->pluck('month_name')->toArray();
        // $datas = $locations->pluck('data')->toArray();

        // $chart = Chartisan::build()
        // ->labels($labels)
        // ->dataset('Locations',$datas);


        // return view('home', compact('years', 'actualYear'));

          // by month and year
          $yearIncomes= Income::get()->groupBy(function($d) {
            return Carbon::parse($d->income_at)->format('y');
        })->take(1)->reverse();

        $yearSalaries = Salary::get()->groupBy(function($d) {
                    return Carbon::parse($d->salary_at)->format('y');
                })->take(1)->reverse();

        $yearExpenses = Expense::get()->groupBy(function($d) {
            return Carbon::parse($d->expense_at)->format('y');
        })->take(1)->reverse();

        return view('home', compact(
            'yearIncomes',
            'yearSalaries',
            'yearExpenses'


        
        ));
    }

    public function chart()
    {


        // return view('home', compact('years', 'actualYear'));
    }
}
