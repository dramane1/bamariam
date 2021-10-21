<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Income;
use App\Models\Salary;
use Session;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!empty(request('query'))) {
            $expenses = Expense::where('expense_at', 'Like', '%' . request('query') . '%')
            ->orderBy('expense_at', 'desc')->paginate(10);

            }
    else{
        $expenses= Expense::orderBy('expense_at', 'desc')->paginate(10);

    }        return view('pages.expenses.index',compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.expenses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = auth()->user();

        $request->validate([
            'expense_at'    => 'required|date',
            'expense_amount' => 'required|string',


        ]);


        Expense::create([
         'type_de_depense' =>$request->type_de_depense,
        'expense_at' =>$request->expense_at,
        'autre_depense_type' => $request ->autre_depense_type,
        'event_type'  =>$request->event_type,
        'description'  =>$request->description,
        'expense_amount' => $request->expense_amount,
        'salary_id' =>$request->salary_id,
        'income_id' =>$request->income_id,
        'user_id' => $user->id
        ]);
        Session::flash('notification.type', 'success');
        Session::flash('notification.message', 'La dépense  a été ajouté avec succès !');

        return redirect()->route('expenses.index');



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
    public function edit(Expense $expense)
    {
        return view('pages.expenses.edit',compact('expense'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        $user = auth()->user();

        $request->validate([
            'expense_at'    => 'required|date',
            'expense_amount' => 'required|string',


        ]);


        $expense->update([
         'type_de_depense' =>$request->type_de_depense,
        'expense_at' =>$request->expense_at,
        'autre_depense_type' => $request ->autre_depense_type,
        'event_type'  =>$request->event_type,
        'description'  =>$request->description,
        'expense_amount' => $request->expense_amount,
        'salary_id' =>$request->salary_id,
        'income_id' =>$request->income_id,
        'user_id' => $user->id
        ]);
        Session::flash('notification.type', 'success');
        Session::flash('notification.message', 'La dépense  a été modifier avec succès !');

        return redirect()->route('expenses.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $id,Expense $expense)
    {
        $expense->delete();
        Session::flash('notification.type', 'success');
        Session::flash('notification.message', 'la dépense a été supprimé avec succès !');
        return redirect()->route('expenses.index');
    }
}
