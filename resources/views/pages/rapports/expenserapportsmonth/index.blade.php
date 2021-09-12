@extends('layouts.master')

@section('title', ' Rapport de la dépense')
@section('head')


@endsection

@section('content')
<section class="admin-content">
    <div class="bg-dark m-b-30">
        <div class="container">
            <div class="row p-b-60 p-t-60">
               
                <div class="col-md-6 text-center mx-auto text-white p-b-30">
                    
                    <h3>Rapport détaillé de la  dépense mensuel </h3>
                    <div class="form-dark">
                        <div class="input-group input-group-flush mb-3">
                            <form class="card-body"  action="{{route('expenserapportsmonth.index')}}" method="GET" role="search">
                                {{ csrf_field() }}
                            
                                <div class="row">
                                    <div class="col-4">
                                        <label>De</label>
                                        <input type="date"  name="from"  class="form-control">
                                    </div>
                                    <div class="col-4">
                                        <label>A</label>
                                        <input type="date"  name="to" class="form-control" >
                                    </div>

                                    <div class="col-4">
                                        <label>Recherche</label>
                                        <button type="submit" class="form-control mdi mdi-magnify"></button>
                                    </div>

                                </div>

                            </form>

                           

                        </div>
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
                                    @foreach ($monthExpenses->groupBy('type_de_depense') as $expense )

                                        <tr>
                                            <td>{{ $expense->first()->expenseType() }} </td>
                                            <td>{{ $expense->first()->expense_at->toDateString() }} </td>
                                            <td>{{ $expense->first()->description }}</td>
                                            <td>{{ $expense->sum('expense_amount') }}</td>

                                            {{-- <td>{{$salary->created_at->toDateString()}}</td>
                                            <td>{{$salary->sum('salary_amount')}}</td> --}}

                                            

                                                


                                            {{-- <td>{{ $income->income_at->toDateString() }} </td>
                                            <td>{{ $income->amount() }}</td> --}}
                                            {{-- <td class="text-center d-flex flex-end ">
                                                <form method="POST" action="{{ route('incomes.destroy',$income) }}">
                                                    @csrf()
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger mb-4 mr-4">Supprimer</button>
                                                </form>
                                                <a href="{{ route('incomes.edit', $income) }}" class="btn  btn-sm btn-primary mb-4"> Modifier</a>
                                             </td> --}}

                                        </tr>
                                        @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>
    

</section>
@endsection
@section('script')

{{-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script> --}}
    <script>
     
  
   </script>
@endsection
