<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salary;
use carbon\carbon;
use App\Exports\SalaryExport;
use Excel;
use DB;
use PDF;
use Session;
class SalaryRapportMonthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


            if($request->from != '' && $request->to != '')
            {
                $monthSalaries = Salary::whereBetween('salary_at',[$request->from, $request->to])
                ->orderBy('salary_at', 'desc')->paginate(10);
            }
            else
            {
                $monthSalaries = Salary::whereMonth('salary_at',Carbon::now()->month)
                ->orderBy('salary_at', 'desc')->paginate(10);
            }

        return view('pages.rapports.salaryrapportsmonth.index',compact('monthSalaries'));
    }

    public function print(Request $Request){

        $monthSalaries = Salary::whereMonth('salary_at',Carbon::now()->month)
        ->orderBy('salary_at', 'ASC')->get();
        $monthSalariesTotal = Salary::whereMonth('salary_at',Carbon::now()->month)
        ->sum('salary_amount');
       

        return PDF::loadView('templates.salaryMonth', compact('monthSalaries','monthSalariesTotal'))->stream('SalaireMensuel'.'.pdf');
        Session::flash('notification.message', 'Le pdf a été téléchargée avec succès !');
        Session::flash('notification.type', 'success');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new SalaryExport, 'salarymonth.xlsx');
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
