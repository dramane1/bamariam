@extends('layouts.master')

@section('title', ' Rapport de la  dépense')

@section('content')
<section class="admin-content">
    <div class="bg-dark m-b-30">
        <div class="container">
            <div class="row p-b-60 p-t-60">
                <div class="col-md-6 text-center mx-auto text-white p-b-30">
                    
                    <h3>Rapport détaillé de la  dépense annuel </h3>
                    <div class="form-dark">
                        {{-- <div class="input-group input-group-flush mb-3">
                            
                            <input placeholder="Ex: 2021" name="search" type="search"
                                   class="form-control form-control-lg search form-control-prepended">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="mdi mdi-magnify"></i>
                                </div>
                            </div>
                        </div> --}}
                        <form class="card-body" action="{{route('expenserapportsyear.index')}}" method="GET" role="search">
                            {{ csrf_field() }}
                                <input type="text" class="form-control" placeholder="Ex: 2021" name="query">
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="container pull-up">

        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-stripped table-hover datatable">
                                <thead class="thead-light">

                                    <tr>
                                        <th>Type de dépense </th>
                                        <th>Date du dépense</th>
                                        <th>Description</th>
                                        <th>Montant</th>
                                        {{-- <th>Status</th> --}}
                                        {{-- <th class="text-right">Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($yearExpenses->groupBy('type_de_depense') as $expense )
                                        <tr>
                                            <td>{{ $expense->first()->expenseType() }} </td>
                                            <td>{{ $expense->first()->expense_at->toDateString() }} </td>
                                            <td>{{ $expense->first()->description }}</td>
                                            <td>{{ $expense->sum('expense_amount') }}</td>

                                        </tr>
                                        @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <nav aria-label="">
                {{ $yearExpenses->links('vendor.pagination.bootstrap-4') }}
            </nav>
        </div>
    </div>
    

</section>
@endsection
