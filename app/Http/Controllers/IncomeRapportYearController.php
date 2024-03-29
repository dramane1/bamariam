<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use carbon\carbon;
class IncomeRapportYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $this->validate($request,[
        //     'query'=>'required'
        // ]);
        $yearIncomes = Income::whereYear('income_at',Carbon::now()->year)
        ->orderBy('created_at', 'desc')->paginate(10);

        if (!empty(request('query'))) {
        $yearIncomes = Income::whereYear('income_at', 'Like', '%' . request('query') . '%')
        ->orderBy('created_at', 'desc')->paginate(10);
        }


        return view('pages.rapports.incomerapportsyear.index',compact('yearIncomes'));
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
