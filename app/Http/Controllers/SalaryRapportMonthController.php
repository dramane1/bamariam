<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salary;
use carbon\carbon;
use DB;
class SalaryRapportMonthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $monthSalaries = Salary::whereMonth('salary_at',Carbon::now()->month)
        // ->paginate(10);
        // if (   (!empty(request('from'))) &&  (!empty(request('to')))   ) {
            
            // $from = Carbon:: parse($request->get('from'))->format('m');
            // $from = $request->from;
            // dd($from->date('m'));


            // $to = Carbon:: parse($request->get('to'))->format('m');
    
            // $monthSalaries = Salary::whereBetween('salary_at', [$from, $to])->paginate(10);
            // }
    
        // dd($monthSalaries);


            if($request->from != '' && $request->to != '')
            {
                $monthSalaries = Salary::whereBetween('salary_at',[$request->from, $request->to])
                ->paginate(10);  
            }
            else
            {
                $monthSalaries = Salary::whereMonth('salary_at',Carbon::now()->month)
                ->paginate(10);           
            }

        return view('pages.rapports.salaryrapportsmonth.index',compact('monthSalaries'));
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
