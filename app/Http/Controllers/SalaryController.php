<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Income;
use App\Models\Salary;
use Session;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

            if (!empty(request('query'))) {
                $salaries = Salary::where('salary_at', 'Like', '%' . request('query') . '%')
                ->orderBy('salary_at', 'desc')->paginate(10);

                }
        else{
            $salaries= Salary::orderBy('salary_at', 'desc')->paginate(10);

        }

        return view('pages.salaries.index',compact('salaries'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.salaries.create');

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
            'salary_amount'    => 'required|string',
            'salary_at'   => 'required|date',
        ]);


        Salary::create([
            'classe'        => $request->classe,
            'salary_at'          => $request->salary_at,
            'divers_salary_type'       => $request->divers_salary_type,
            'salary_amount'       => $request->salary_amount,
            'income_id'    => $request->income_id,
            'expense_id' => $request->expense_id,
            'user_id' =>$user->id,
        ]);
        Session::flash('notification.type', 'success');
        Session::flash('notification.message', 'Le  Salaire  a été ajouté avec succès !');

        return redirect()->route('salaries.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Salary $salaries)
    {
        return view('pages.salaries.show',compact('salaries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Salary $salary)
    {
        return view('pages.salaries.edit',compact('salary'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salary $salary)
    {
        $user = auth()->user();

        $request->validate([
            'salary_amount'    => 'required|string',
            'salary_at'   => 'required|date',
        ]);


        $salary->update([
            'classe'        => $request->classe,
            'salary_at'          => $request->salary_at,
            'divers_salary_type'       => $request->divers_salary_type,
            'salary_amount'       => $request->salary_amount,
            'income_id'    => $request->income_id,
            'expense_id' => $request->expense_id,
            'user_id' =>$user->id,
        ]);
        Session::flash('notification.type', 'success');
        Session::flash('notification.message', 'Le  Salaire  a été modifier avec succès !');

        return redirect()->route('salaries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salary $salary)
    {
        $salary->delete();
        Session::flash('notification.type', 'success');
        Session::flash('notification.message', 'le salaire a été supprimé avec succès !');
        return redirect()->route('salaries.index');
    }
}
