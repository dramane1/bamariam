<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salary;
use carbon\carbon;
use Session;
use DB;
use PDF;
class SalaryRapportYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $yearSalaries = Salary::whereYear('salary_at',Carbon::now()->year)
        ->orderBy('salary_at', 'desc')->paginate(10);

        if (!empty(request('query'))) {
        $yearSalaries = Salary::whereYear('salary_at', 'Like', '%' . request('query') . '%')
        ->orderBy('salary_at', 'desc')->paginate(10);
        }


        return view('pages.rapports.salaryrapportsyear.index',compact('yearSalaries'));
    }
    
    public function print(Request $request){
       
                $yearSalaries = Salary::whereYear('salary_at',Carbon::now()->year)
                ->orderBy('salary_at', 'ASC')->get();
                $yearSalariesTotal = Salary::whereYear('salary_at',Carbon::now()->year)
                ->sum('salary_amount');
                return PDF::loadView('templates.salaryYear', compact('yearSalaries','yearSalariesTotal'))->stream('SalaireAnnuel'.request('query').'.pdf');
                Session::flash('notification.message', 'Le pdf a été téléchargée avec succès !');
                Session::flash('notification.type', 'success');
            
    
    
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
