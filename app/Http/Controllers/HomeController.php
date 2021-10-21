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
use PDF;


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
       
          $yearIncomes= Income::get()->groupBy(function($d) {
            return Carbon::parse($d->income_at)->format('y');
        })->take(1)->reverse();

        $yearSalaries = Salary::get()->groupBy(function($d) {
                    return Carbon::parse($d->salary_at)->format('y');
                })->take(1)->reverse();

        $yearExpenses = Expense::get()->groupBy(function($d) {
            return Carbon::parse($d->expense_at)->format('y');
        })->take(1)->reverse();


        $salaries = Salary::orderBy('salary_at', 'desc')->get()->groupBy(function($d) {
            return Carbon::parse($d->salary_at)->format('M Y');
        })->take(10)->reverse();


        $salaryYear = Salary::orderBy('salary_at', 'desc')->get()->groupBy(function($d) {
            return Carbon::parse($d->salary_at)->format('Y');
        })->take(10)->reverse();


        $expenses = Expense::orderBy('expense_at', 'desc')->get()->groupBy(function($d) {
            return Carbon::parse($d->expense_at)->format('M Y');
        })->take(10)->reverse();
        $expenseYear = Expense::orderBy('expense_at', 'desc')->get()->groupBy(function($d) {
            return Carbon::parse($d->expense_at)->format('Y');
        })->take(10)->reverse();

        $incomes = Income::orderBy('income_at', 'desc')->get()->groupBy(function($d) {
            return Carbon::parse($d->income_at)->format('M Y');
        })->take(10)->reverse();
        $incomeYear = Income::orderBy('income_at', 'desc')->get()->groupBy(function($d) {
            return Carbon::parse($d->income_at)->format('Y');
        })->take(10)->reverse();
    


        
        return view('home', compact(
            'yearIncomes',
            'yearSalaries',
            'yearExpenses',
            'salaries',
            'salaryYear',
            'expenses',
            'expenseYear',
            'incomes',
            'incomeYear'



        
        ));
    }

    public function store(Request $request)
    {
        if(!empty($request->salary_month))
        {
            $user = auth()->user();
            $month=  Carbon::parse($request->salary_month)->format('m');
            $year = Carbon::parse( $request->salary_month)->format('Y');
            $monthYear= $month.'-'.$year;
      
      
      
              $request->validate([
                  'salary_month'    => 'required|string',
                 
              ]);
              $monthSalaries = Salary::whereMonth('salary_at',$month)
              ->whereYear('salary_at', $year)
              ->orderBy('salary_at', 'desc')->get();
              $monthSalariesTotal = Salary::whereMonth('salary_at',$month)
              ->whereYear('salary_at', $year)
              ->orderBy('salary_at', 'desc')
              ->sum('salary_amount');
         
      
      
             
      
              return PDF::loadView('templates.salaryMonth', compact('monthSalaries','monthSalariesTotal','monthYear'))->stream('SalaireMensuel'.'.pdf');
              Session::flash('notification.message', 'Le pdf a été téléchargée avec succès !');
              Session::flash('notification.type', 'success');
        }
        else  if(!empty($request->salary_year))
        {
            $user = auth()->user();
           
            $yearView=$request->salary_year;
            $year= $request->salary_year;
      
      
      
              $request->validate([
                  'salary_year'    => 'required|string',
                 
              ]);
              $yearSalaries = Salary::whereYear('salary_at',$year)
              ->orderBy('salary_at', 'desc')->get();
              $yearSalariesTotal = Salary::whereYear('salary_at',$year)
              ->orderBy('salary_at', 'desc')
              ->sum('salary_amount');
         
      
      
              return PDF::loadView('templates.salaryYear', compact('yearSalaries','yearSalariesTotal','yearView'))->stream('SalaireMensuel'.'.pdf');
              Session::flash('notification.message', 'Le pdf a été téléchargée avec succès !');
              Session::flash('notification.type', 'success');
        }
        else  if(!empty($request->expense_month))
        {
            $user = auth()->user();
            $month=  Carbon::parse($request->expense_month)->format('m');
            $year = Carbon::parse( $request->expense_month)->format('Y');
            $monthYear= $month.'-'.$year;
      
      
      
              $request->validate([
                  'expense_month'    => 'required|string',
                 
              ]);
              $monthExpenses = Expense::whereMonth('expense_at',$month)
              ->whereYear('expense_at', $year)
              ->orderBy('expense_at', 'desc')->get();
              $monthExpensesTotal = Expense::whereMonth('expense_at',$month)
              ->whereYear('expense_at', $year)
              ->orderBy('expense_at', 'desc')
              ->sum('expense_amount');
         
      
      
             
      
              return PDF::loadView('templates.expenseMonth', compact('monthExpenses','monthExpensesTotal','monthYear'))->stream('SalaireMensuel'.'.pdf');
              Session::flash('notification.message', 'Le pdf a été téléchargée avec succès !');
              Session::flash('notification.type', 'success');
        }
        else  if(!empty($request->expense_year))
        {
            $user = auth()->user();
           
            $yearView=$request->expense_year;
            $year= $request->expense_year;
      
      
      
              $request->validate([
                  'expense_year'    => 'required|string',
                 
              ]);
              $yearExpenses = Expense::whereYear('expense_at',$year)
              ->orderBy('expense_at', 'desc')->get();
              $yearExpensesTotal = Expense::whereYear('expense_at',$year)
              ->orderBy('expense_at', 'desc')
              ->sum('expense_amount');
         
      
      
              return PDF::loadView('templates.expenseYear', compact('yearExpenses','yearExpensesTotal','yearView'))->stream('SalaireMensuel'.'.pdf');
              Session::flash('notification.message', 'Le pdf a été téléchargée avec succès !');
              Session::flash('notification.type', 'success');
        }
        else  if(!empty($request->income_month))
        {
            $user = auth()->user();
            $month=  Carbon::parse($request->income_month)->format('m');
            $year = Carbon::parse( $request->income_month)->format('Y');
            $monthYear= $month.'-'.$year;
      
      
      
              $request->validate([
                  'income_month'    => 'required|string',
                 
              ]);
              $monthIncomes = Income::whereMonth('income_at',$month)
              ->whereYear('income_at', $year)
              ->orderBy('income_at', 'desc')->get();
              $monthIncomesTotal = Income::whereMonth('income_at',$month)
              ->whereYear('income_at', $year)
              ->orderBy('income_at', 'desc')
              ->sum('income_amount');
         
      
      
             
      
              return PDF::loadView('templates.incomeMonth', compact('monthIncomes','monthIncomesTotal','monthYear'))->stream('SalaireMensuel'.'.pdf');
              Session::flash('notification.message', 'Le pdf a été téléchargée avec succès !');
              Session::flash('notification.type', 'success');
        }
        else  if(!empty($request->income_year))
        {
            $user = auth()->user();
           
            $yearView=$request->income_year;
            $year= $request->income_year;
      
      
      
              $request->validate([
                  'income_year'    => 'required|string',
                 
              ]);
              $yearIncomes = Income::whereYear('income_at',$year)
              ->orderBy('income_at', 'desc')->get();
              $yearIncomesTotal = Income::whereYear('income_at',$year)
              ->orderBy('income_at', 'desc')
              ->sum('income_amount');
         
      
      
              return PDF::loadView('templates.incomeYear', compact('yearIncomes','yearIncomesTotal','yearView'))->stream('SalaireMensuel'.'.pdf');
              Session::flash('notification.message', 'Le pdf a été téléchargée avec succès !');
              Session::flash('notification.type', 'success');
        }
   


    }

    public function chart()
    {


        // return view('home', compact('years', 'actualYear'));
    }
}
