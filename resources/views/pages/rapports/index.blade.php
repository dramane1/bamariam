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
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-b-30">

                    <div class="card">
                        <div class="card-header">
                            <div class="card-title m-b-0">Salaire Mensuel</div>
                        </div>
                        <div class="card-body">
                            <div id="salaryMonth">
                            </div>
                        </div>
                    
                    </div>
                </div>

                <div class="col-lg-6 m-b-30">

                    <div class="card">
                        <div class="card-header">
                            <div class="card-title m-b-0">Salaire Annuel</div>
                        </div>
                        <div class="card-body">
                            <div id="salaryYear">
                            </div>
                        </div>
                    
                    </div>
                </div>

                <div class="col-lg-6 m-b-30">

                    <div class="card">
                        <div class="card-header">
                            <div class="card-title m-b-0">Dépense Mensuel</div>
                        </div>
                        <div class="card-body">
                            <div id="expenseMonth">
                            </div>
                        </div>
                    
                    </div>
                </div>

                <div class="col-lg-6 m-b-30">

                    <div class="card">
                        <div class="card-header">
                            <div class="card-title m-b-0">Dépense Annuel</div>
                        </div>
                        <div class="card-body">
                            <div id="expenseYear">
                            </div>
                        </div>
                    
                    </div>
                </div>

                <div class="col-lg-6 m-b-30">

                    <div class="card">
                        <div class="card-header">
                            <div class="card-title m-b-0">Revenu Mensuel</div>
                        </div>
                        <div class="card-body">
                            <div id="incomeMonth">
                            </div>
                        </div>
                    
                    </div>
                </div>
                <div class="col-lg-6 m-b-30">

                    <div class="card">
                        <div class="card-header">
                            <div class="card-title m-b-0">Revenu Annuel</div>
                        </div>
                        <div class="card-body">
                            <div id="incomeYear">
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>
      </div>
    </div>



</section>
@endsection
@section('script')
    {{-- <script src="{{asset('assets/vendor/apexchart/apexcharts.min.js')}}"></script> --}}
    {{-- <script src="{{asset('assets/js/chart.js')}}"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> --}}
    <script src="{{ asset('assets/apexchart/apexcharts.min.js') }}"></script>



    <script type="text/javascript">

var options={
            chart:{type:"bar"},colors:colors[0],plotOptions:{bar:{horizontal:false}},
            dataLabels:{enabled:false},series:
            [{data:
            [
                @foreach ($salaries as $key => $value)
                            @if ($loop->last)
                                {{ number_format($value->sum('salary_amount') , 0, ".", "") }}{{ '' }}
                            @else
                                {{ number_format($value->sum('salary_amount'), 0, ".", "") }}{{ ',' }}
                            @endif
                        @endforeach
            ]
            }],
            xaxis:{categories:
            [
                @foreach ($salaries as $key => $value)
                @if ($loop->last)
                 "{{ $key }}"{{ '' }}
                 @else
                  "{{ $key }}"{{ ',' }}
                  @endif
            @endforeach
            ]},
            yaxis:{},tooltip:{}
        };
            var chart=new ApexCharts(document.querySelector("#salaryMonth"),options);
            chart.render()

        var options={
            chart:{type:"bar"},colors:colors[0],plotOptions:{bar:{horizontal:false}},
            dataLabels:{enabled:false},series:
            [{data:
            [
                @foreach ($expenses as $key => $value)
                            @if ($loop->last)
                                {{ number_format($value->sum('expense_amount') , 0, ".", "") }}{{ '' }}
                            @else
                                {{ number_format($value->sum('expense_amount'), 0, ".", "") }}{{ ',' }}
                            @endif
                        @endforeach
            ]
            }],
            xaxis:{categories:
            [
                @foreach ($expenses as $key => $value)
                @if ($loop->last)
                 "{{ $key }}"{{ '' }}
                 @else
                  "{{ $key }}"{{ ',' }}
                  @endif
            @endforeach
            ]},
            yaxis:{},tooltip:{}
        };
            var chart=new ApexCharts(document.querySelector("#expenseMonth"),options);
            chart.render()



            var options={
            chart:{type:"bar"},colors:colors[0],plotOptions:{bar:{horizontal:false}},
            dataLabels:{enabled:false},series:
            [{data:
            [
                @foreach ($incomes as $key => $value)
                            @if ($loop->last)
                                {{ number_format($value->sum('income_amount') , 0, ".", "") }}{{ '' }}
                            @else
                                {{ number_format($value->sum('income_amount'), 0, ".", "") }}{{ ',' }}
                            @endif
                        @endforeach
            ]
            }],
            xaxis:{categories:
            [
                @foreach ($incomes as $key => $value)
                @if ($loop->last)
                 "{{ $key }}"{{ '' }}
                 @else
                  "{{ $key }}"{{ ',' }}
                  @endif
            @endforeach
            ]},
            yaxis:{},tooltip:{}
        };
            var chart=new ApexCharts(document.querySelector("#incomeMonth"),options);
            chart.render()

            


            var options={
            chart:{type:"bar"},colors:colors[0],plotOptions:{bar:{horizontal:false}},
            dataLabels:{enabled:false},series:
            [{data:
            [
                @foreach ($salaryYear as $key => $value)
                            @if ($loop->last)
                                {{ number_format($value->sum('salary_amount') , 0, ".", "") }}{{ '' }}
                            @else
                                {{ number_format($value->sum('salary_amount'), 0, ".", "") }}{{ ',' }}
                            @endif
                        @endforeach
            ]
            }],
            xaxis:{categories:
            [
                @foreach ($salaryYear as $key => $value)
                @if ($loop->last)
                 "{{ $key }}"{{ '' }}
                 @else
                  "{{ $key }}"{{ ',' }}
                  @endif
            @endforeach
            ]},
            yaxis:{},tooltip:{}
        };
            var chart=new ApexCharts(document.querySelector("#salaryYear"),options);
            chart.render()

            

            var options={
            chart:{type:"bar"},colors:colors[0],plotOptions:{bar:{horizontal:false}},
            dataLabels:{enabled:false},series:
            [{data:
            [
                @foreach ($expenseYear as $key => $value)
                            @if ($loop->last)
                                {{ number_format($value->sum('expense_amount') , 0, ".", "") }}{{ '' }}
                            @else
                                {{ number_format($value->sum('expense_amount'), 0, ".", "") }}{{ ',' }}
                            @endif
                        @endforeach
            ]
            }],
            xaxis:{categories:
            [
                @foreach ($expenseYear as $key => $value)
                @if ($loop->last)
                 "{{ $key }}"{{ '' }}
                 @else
                  "{{ $key }}"{{ ',' }}
                  @endif
            @endforeach
            ]},
            yaxis:{},tooltip:{}
        };
            var chart=new ApexCharts(document.querySelector("#expenseYear"),options);
            chart.render()



            var options={
            chart:{type:"bar"},colors:colors[0],plotOptions:{bar:{horizontal:false}},
            dataLabels:{enabled:false},series:
            [{data:
            [
                @foreach ($incomeYear as $key => $value)
                            @if ($loop->last)
                                {{ number_format($value->sum('income_amount') , 0, ".", "") }}{{ '' }}
                            @else
                                {{ number_format($value->sum('income_amount'), 0, ".", "") }}{{ ',' }}
                            @endif
                        @endforeach
            ]
            }],
            xaxis:{categories:
            [
                @foreach ($incomeYear as $key => $value)
                @if ($loop->last)
                 "{{ $key }}"{{ '' }}
                 @else
                  "{{ $key }}"{{ ',' }}
                  @endif
            @endforeach
            ]},
            yaxis:{},tooltip:{}
        };
            var chart=new ApexCharts(document.querySelector("#incomeYear"),options);
            chart.render()

        

    </script>
@endsection
