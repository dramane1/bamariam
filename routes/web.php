<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::group(['middleware' => ['auth'] ], function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('/', [App\Http\Controllers\HomeController::class, 'store'])->name('home.store');

    Route::resource('/salaries', SalaryController::class);
    Route::resource('/expenses', ExpenseController::class);
    Route::resource('/incomes', IncomeController::class);
    Route::resource('/rapports', RapportController::class);
    Route::resource('/salaryrapportsmonth','SalaryRapportMonthController');
    Route::resource('/salaryrapportsyear','SalaryRapportYearController');
    Route::resource('/incomerapportsmonth','IncomeRapportMonthController');
    Route::resource('/incomerapportsyear','IncomeRapportYearController');
    Route::resource('/expenserapportsmonth','ExpenseRapportMonthController');
    Route::resource('/expenserapportsyear','ExpenseRapportYearController');
    Route::get('/salary-month-export','SalaryRapportMonthController@print')->name('export.salary.month');
    Route::get('/salary-year-export','SalaryRapportYearController@print')->name('export.salary.year');








    Route::get('/logout', function(){
        Auth::logout();
        return redirect('/login');
    })->name('logout');
});
