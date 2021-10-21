@extends('layouts.master')

@section('title', 'Tableau de bord')
@section('content')
<section class="admin-content">
    <div class="container">
        <div class="row pt-2">
            <div class="col-lg-4 col-md-4">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="pb-2">
                            <div class="avatar avatar-lg">
                                <div class="avatar-title bg-soft-primary rounded-circle">
                                    <i class="fas fa-dollar-sign" aria-hidden="true"></i>
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
            <div class="col-lg-4 col-md-4">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="pb-2">
                            <div class="avatar avatar-lg">
                                <div class="avatar-title bg-soft-primary rounded-circle">
                                    <i class="fas fa-dollar-sign" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p class="text-muted text-overline m-0">Revenu Total Annuel</p>
                            @foreach ($yearIncomes as $income )
                            <h3>{{ number_format($income->sum('income_amount'), 0, ",", " "). " fcfa" }}</h3>
                            @endforeach
                            <div>
                                <a href="{{ route('incomerapportsmonth.index') }}" class="btn  btn-sm bg-soft-primary mb-4"> Total Mensuel</a>
                                <a href="{{ route('incomerapportsyear.index') }}" class="btn  btn-sm bg-soft-primary mb-4"> Total Annuel</a>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="pb-2">
                            <div class="avatar avatar-lg">
                                <div class="avatar-title bg-soft-primary rounded-circle">
                                    <i class="fas fa-dollar-sign" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p class="text-muted text-overline m-0">Depense Total Annuelle</p>
                            @foreach ($yearExpenses as $expense )
                            <h3>{{ number_format( $expense->sum('expense_amount'), 0, ",", " "). " fcfa" }}</h3>
                            @endforeach
                            <div>
                                <a href="{{ route('expenserapportsmonth.index') }}" class="btn  btn-sm bg-soft-primary mb-4"> Total Mensuel</a>
                                <a href="{{ route('expenserapportsyear.index') }}" class="btn  btn-sm bg-soft-primary mb-4"> Total Annuel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       

      <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="pb-2">
                        <div class="avatar avatar-lg">
                            <div class="avatar-title bg-soft-primary rounded-circle">
                                <i class="fas fa-file-pdf" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted text-overline m-0">PDF Salaire mensuel</p>

                    <form action="{{ route('home.store') }}" method="POST" id="myform" enctype="multipart/form-data" >
                        @csrf

                    <div>
                            <label for="salary_month">Choisir une date</label>
                            <select  name="salary_month"  class="form-control {{ $errors->has('salary_month') ? 'is-invalid' : '' }}" id="salary_month">
                                <option selected disabled>Selectionner une date</option>
                             @foreach ($salaries as $key => $salary)
                            <option value="{{ $key}}" >{{ $key }}</option>
                            @endforeach
                            </select>
                            @error ('salary_month')
                                <span class="help-block invalid-feedback">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-primary">Telecharger</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="pb-2">
                        <div class="avatar avatar-lg">
                            <div class="avatar-title bg-soft-primary rounded-circle">
                                <i class="fas fa-file-pdf" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted text-overline m-0">PDF Salaire annuel</p>

                    <form action="{{ route('home.store') }}" method="POST" id="myform" enctype="multipart/form-data" >
                        @csrf

                    <div>
                            <label for="salary_year">Choisir une date</label>
                            <select  name="salary_year"  class="form-control {{ $errors->has('salary_year') ? 'is-invalid' : '' }}" id="salary_year">
                                <option selected disabled>Selectionner une date</option>
                             @foreach ($salaryYear as $key => $salary)
                            <option value="{{ $key}}" >{{ $key }}</option>
                            @endforeach
                            </select>
                            @error ('salary_year')
                                <span class="help-block invalid-feedback">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-primary">Telecharger</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="pb-2">
                        <div class="avatar avatar-lg">
                            <div class="avatar-title bg-soft-primary rounded-circle">
                                <i class="fas fa-file-pdf" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted text-overline m-0">PDF depense mensuel</p>

                    <form action="{{ route('home.store') }}" method="POST" id="myform" enctype="multipart/form-data" >
                        @csrf

                    <div>
                            <label for="expense_month">Choisir une date</label>
                            <select  name="expense_month"  class="form-control {{ $errors->has('expense_month') ? 'is-invalid' : '' }}" id="expense_month">
                                <option selected disabled>Selectionner une date</option>
                             @foreach ($expenses as $key => $expense)
                            <option value="{{ $key}}" >{{ $key }}</option>
                            @endforeach
                            </select>
                            @error ('expense_month')
                                <span class="help-block invalid-feedback">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-primary">Telecharger</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="pb-2">
                        <div class="avatar avatar-lg">
                            <div class="avatar-title bg-soft-primary rounded-circle">
                                <i class="fas fa-file-pdf" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted text-overline m-0">PDF depense annuel</p>

                    <form action="{{ route('home.store') }}" method="POST" id="myform" enctype="multipart/form-data" >
                        @csrf

                    <div>
                            <label for="expense_year">Choisir une date</label>
                            <select  name="expense_year"  class="form-control {{ $errors->has('expense_year') ? 'is-invalid' : '' }}" id="expense_year">
                                <option selected disabled>Selectionner une date</option>
                             @foreach ($expenseYear as $key => $expense)
                            <option value="{{ $key}}" >{{ $key }}</option>
                            @endforeach
                            </select>
                            @error ('expense_year')
                                <span class="help-block invalid-feedback">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-primary">Telecharger</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="pb-2">
                        <div class="avatar avatar-lg">
                            <div class="avatar-title bg-soft-primary rounded-circle">
                                <i class="fas fa-file-pdf" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted text-overline m-0">PDF revenu mensuel</p>

                    <form action="{{ route('home.store') }}" method="POST" id="myform" enctype="multipart/form-data" >
                        @csrf

                    <div>
                            <label for="income_month">Choisir une date</label>
                            <select  name="income_month"  class="form-control {{ $errors->has('income_month') ? 'is-invalid' : '' }}" id="income_month">
                                <option selected disabled>Selectionner une date</option>
                             @foreach ($salaries as $key => $salary)
                            <option value="{{ $key}}" >{{ $key }}</option>
                            @endforeach
                            </select>
                            @error ('income_month')
                                <span class="help-block invalid-feedback">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-primary">Telecharger</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="pb-2">
                        <div class="avatar avatar-lg">
                            <div class="avatar-title bg-soft-primary rounded-circle">
                                <i class="fas fa-file-pdf" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted text-overline m-0">PDF revenu annuel</p>

                    <form action="{{ route('home.store') }}" method="POST" id="myform" enctype="multipart/form-data" >
                        @csrf

                    <div>
                            <label for="income_year">Choisir une date</label>
                            <select  name="income_year"  class="form-control {{ $errors->has('income_year') ? 'is-invalid' : '' }}" id="income_year">
                                <option selected disabled>Selectionner une date</option>
                             @foreach ($incomeYear as $key => $income)
                            <option value="{{ $key}}" >{{ $key }}</option>
                            @endforeach
                            </select>
                            @error ('income_year')
                                <span class="help-block invalid-feedback">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-primary">Telecharger</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

      </div>

    
    
    </div>
</section>
@endsection
