@extends('layouts.master')

@section('title', ' Salaire')

@section('content')
<section class="admin-content">
    <div class="bg-dark m-b-30">
        <div class="container">
            <div class="row p-b-60 p-t-60">
                <div class="col-md-6 m-auto text-center text-white p-b-30">
                    <h1> Rapports Annuel </h1>
                </div>
{{--
                <div class="col-md-3 m-auto text-white p-b-30">
                    <div class="text-md-right">
                        <a href="{{ route('rapports.create') }}" class="btn btn-success"> <i class="mdi mdi-plus"></i> Ajouter</a>
                    </div>
                </div> --}}

                {{-- <div class="col-md-3 m-auto text-white p-b-30">
                    <div class="text-md-right">
                        <a href="{{ route('salaries.show', $salary) }}" class="btn btn-success"> <i class="mdi mdi-eye"></i> Voir Total</a>
                    </div>
                </div> --}}


            </div>
        </div>
    </div>

    <div class="container pull-up">
        <div class="row pt-2">
            <div class="col-lg-3 col-md-3">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="pb-2">
                            <div class="avatar avatar-lg">
                                <div class="avatar-title bg-soft-primary rounded-circle">
                                    <i class="mdi mdi-cash"></i>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p class="text-muted text-overline m-0">Salaire Total Annuel</p>
                            @foreach ($yearSalaries as $salary )
                            <h3>{{ number_format($salary->sum('salary_amount'), 0, ",", " "). " fcfa" }}</h3>
                            @endforeach
                            <div>
                                <a href="{{ route('salaryrapportsmonth.index') }}" class="btn  btn-sm bg-soft-primary mb-4"> Total Mensuel</a>
                                <a href="{{ route('salaryrapportsyear.index') }}" class="btn  btn-sm bg-soft-primary mb-4"> Total Annuel</a>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="row pt-2"> --}}
            <div class="col-lg-3 col-md-3">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="pb-2">
                            <div class="avatar avatar-lg">
                                <div class="avatar-title bg-soft-primary rounded-circle">
                                    <i class="mdi mdi-cash"></i>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p class="text-muted text-overline m-0">Revenu Total Annuel</p>
                            @foreach ($yearIncomes as $income )
                            <h3>{{ number_format($income->sum('income_amount'), 0, ",", " "). " fcfa" }}</h3>
                            @endforeach
                            <a href="{{ route('home') }}" class="btn  btn-sm bg-soft-primary mb-4"> Voir Details</a>

                            {{-- <h1> {{ $totalIncomeMonth }}</h1> --}}
                            {{-- <h1 class="fw-400">{{ App\Models\Expense::where('user_id', auth()->user()->id)->count() }}</h1> --}}
                        </div>
                    </div>
                </div>
            </div>
        {{-- </div> --}}

        {{-- <div class="row pt-2"> --}}
            <div class="col-lg-3 col-md-3">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="pb-2">
                            <div class="avatar avatar-lg">
                                <div class="avatar-title bg-soft-primary rounded-circle">
                                    <i class="mdi mdi-cash"></i>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p class="text-muted text-overline m-0">DÉpense Total Annuelle</p>
                            @foreach ($yearExpenses as $expense )
                            <h3>{{ number_format( $expense->sum('expense_amount'), 0, ",", " "). " fcfa" }}</h3>
                            @endforeach   
                            <a href="{{ route('home') }}" class="btn  btn-sm bg-soft-primary mb-4"> Voir Details</a>
                     
                                {{-- <h1 class="fw-400">{{ App\Models\Expense::where('user_id', auth()->user()->id)->count() }}</h1> --}}
                        </div>
                    </div>
                </div>
            </div>
        {{-- </div> --}}
        </div>

    </div>



</section>
@endsection
