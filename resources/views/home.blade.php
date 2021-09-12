@extends('layouts.master')

@section('title', 'Tableau de bord')
@section('content')
<section class="admin-content">
    <div class="container">
        <div class="row pt-2">
            <div class="col-lg-3 col-md-3">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="pb-2">
                            <div class="avatar avatar-lg">
                                <div class="avatar-title bg-soft-primary rounded-circle">
                                    <i class="mdi mdi-store"></i>
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
            <div class="col-lg-3 col-md-3">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="pb-2">
                            <div class="avatar avatar-lg">
                                <div class="avatar-title bg-soft-primary rounded-circle">
                                    <i class="icon-placeholder mdi mdi-account-group"></i>
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
            <div class="col-lg-3 col-md-3">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="pb-2">
                            <div class="avatar avatar-lg">
                                <div class="avatar-title bg-soft-primary rounded-circle">
                                    <i class="icon-placeholder mdi mdi-calendar-text"></i>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p class="text-muted text-overline m-0">DÉpense Total Annuelle</p>
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
        <div class="col-lg-6  m-b-30">

            <div class="card">
                <div class="card-header">
                    <div class="card-title">Area</div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <div id="chart-08" class="chart-canvas"></div>
                    </div>


                </div>

            </div>
        </div>

    </div>
</section>
@endsection
@section('script')
{{-- <script src="{{asset('assets/plugins/apexchart/apexcharts.min.js')}}"></script> --}}
<script src="{{asset('assets/js/chart.js')}}"
{{-- <script src="{{ asset('assets/plugins/apexchart/chart-data.js')}}"></script> --}}

@endsection
