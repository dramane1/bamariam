<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Expense;
use App\Models\Income;
use App\Models\Salary;
class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incomes = Income::paginate(10);

        return view('pages.incomes.index',compact('incomes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.incomes.create');
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
            'income_amount'    => 'required|string',
            'income_at'   => 'required|date',
        ]);


        Income::create([
        'classe'  => $request->classe,
        'income_amount'  => $request->income_amount,
        'income_at' => $request->income_at,
        'salary_id'  => $request->salary_id,
        'expense_id' =>$request->expense_id,
        'user_id' => $user->id

        ]);
        Session::flash('notification.type', 'success');
        Session::flash('notification.message', 'Le  revenu  a été ajouté avec succès !');

        return redirect()->route('incomes.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $income = Income::findOrFail($id);
        return view('pages.incomes.show', compact('income'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Income $income)
    {
        return view('pages.incomes.edit',compact('income'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Income $income)
    {
        $user = auth()->user();

        $request->validate([
            'income_amount'    => 'required|string',
            'income_at'   => 'required|date',
        ]);


        $income->update([
        'classe'  => $request->classe,
        'income_amount'  => $request->income_amount,
        'income_at' => $request->income_at,
        'salary_id'  => $request->salary_id,
        'expense_id' =>$request->expense_id,
        'user_id' => $user->id

        ]);
        Session::flash('notification.type', 'success');
        Session::flash('notification.message', 'Le  revenu  a été modifier avec succès !');

        return redirect()->route('incomes.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $id, Income $income)
    {
        $income->delete();
        Session::flash('notification.type', 'success');
        Session::flash('notification.message', 'le revenu a été supprimé avec succès !');
        return redirect()->route('incomes.index');
    }
}
