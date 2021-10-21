<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Models\Salary;
use App\Models\User;
use App\Models\Income;
use App\Models\Expense;




class RapportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        // by month and year
        // $yearIncomes= Income::get()->groupBy(function($d) {
        //     return Carbon::parse($d->income_at)->format('y');
        // })->take(1)->reverse();

        // $yearSalaries = Salary::get()->groupBy(function($d) {
        //             return Carbon::parse($d->salary_at)->format('y');
        //         })->take(1)->reverse();

        // $yearExpenses = Expense::get()->groupBy(function($d) {
        //     return Carbon::parse($d->expense_at)->format('y');
        // })->take(1)->reverse();

        

    $expenses = Expense::orderBy('expense_at', 'desc')->get()->groupBy(function($d) {
        return Carbon::parse($d->expense_at)->format('M Y');
    })->take(10)->reverse();

    $salaries = Salary::orderBy('salary_at', 'desc')->get()->groupBy(function($d) {
        return Carbon::parse($d->salary_at)->format('M Y');
    })->take(10)->reverse();
    // dd($salaries);

    $incomes = Income::orderBy('income_at', 'desc')->get()->groupBy(function($d) {
        return Carbon::parse($d->income_at)->format('M Y');
    })->take(10)->reverse();


    $salaryYear = Salary::orderBy('salary_at', 'desc')->get()->groupBy(function($d) {
        return Carbon::parse($d->salary_at)->format('Y');
    })->take(10)->reverse();

    // dd($salaryYear);

    $expenseYear = Expense::orderBy('expense_at', 'desc')->get()->groupBy(function($d) {
        return Carbon::parse($d->expense_at)->format('Y');
    })->take(10)->reverse();

    $incomeYear = Income::orderBy('income_at', 'desc')->get()->groupBy(function($d) {
        return Carbon::parse($d->income_at)->format('Y');
    })->take(10)->reverse();



        return view('pages.rapports.index',compact('incomes','expenses','salaries','salaryYear','expenseYear','incomeYear'));


//     $monthSalaries = Salary::get()->groupBy(function($d) {
//         return Carbon::parse($d->salary_at)->format('m');
//     });
//     foreach ($monthSalaries as $key => $salary) {
//         $totalSalaryMonth = $salary->sum('salary_amount');
//     return view('pages.rapports.index',compact('totalSalaryMonth'));
// }

        // $monthsIncomes = Income::get()->groupBy(function($d) {
        //     return Carbon::parse($d->income_at)->format('M');
        // })->take(1)->reverse();
        // foreach ($monthsIncomes as $key => $income) {
        //     dd($income->sum('income_amount'));
        // }

        // dd($monthsIncomes);

        // $incomes = Income::orderBy('income_at', 'desc')->get()->groupBy(function($d) {
        //     return Carbon::parse($d->income_at)->format('F Y');
        // })->take(10)->reverse();
        // foreach ($incomes as $key => $income) {
        //     dd($income->sum('income_amount'));
        //     dd($income);
        // }



        // $users = User::select('id', 'created_at')
        //    ->get()
        //    ->groupBy(function($date) {
        // return Carbon::parse($date->created_at)->format('Y'); // grouping by years
        // return Carbon::parse($date->created_at)->format('d'); // grouping by months
        //   });




        // $dailySalaryTotal = DB::table('salaries')
        // ->select('salary_amount','created_at')
        // ->sum('salary_amount')
        // ->groupBy(function($date) {
        //     return Carbon::parse($date->created_at)->format('Y'); // grouping by years
        //     return Carbon::parse($date->created_at)->format('d'); // grouping by months
        //       });

    //   $dailySalaryTotal=  Salary::whereMonth('salary_at', date('m'))
    //     ->sum('salary_amount');


    //           dd($dailySalaryTotal);

            //   $dateS = Carbon::now()->startOfMonth()->subMonth(12);
            //   $dateE = Carbon::now()->startOfMonth();
            // $date= Carbon::parse($date->salary_at)->format('m');
            //   $TotalSpent = DB::table('salaries')
            //   ->select('salary_amount','salary_at')
            //   ->where('created_at', $date)
            //   ->whereBetween('salary_at',[$dateS,$dateE])
            //   ->where('company_id', $user->company_id)
            //   ->sum('salary_amount');


        // $dateS = Carbon::now()->startOfMonth()->subMonth(1);
        // $dateE = Carbon::now()->startOfMonth();
        // $TotalSpent = DB::table('salaries')
        // ->select('salary_amount','salary_at')
        // ->whereBetween('salary_at',[$dateS,$dateE])
        // ->sum('salary_amount');


        //     dd($TotalSpent);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function detailsalaries()
    {
        return view('pages.rapports.detailsalaries');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
