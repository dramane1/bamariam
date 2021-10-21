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
                        @if ($errors->any())
                                <div class="alert alert-danger" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}<br>
                                    @endforeach
                                </div>
                          @endif
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
                            <table id="myTable" class="table table-stripped table-hover datatable">
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
