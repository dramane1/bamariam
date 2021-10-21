@extends('layouts.master')

@section('title', ' Depense')

@section('content')
<section class="admin-content">
    <div class="bg-dark m-b-30">
        <div class="container">
            <div class="row p-b-60 p-t-60">
                <div class="col-md-4 m-auto text-white p-b-30">
                    <h1>Les Dépenses</h1>
                </div>

                <div class="col-md-3 m-auto text-white p-b-30">
                    <div class="text-md-right">
                        <a href="{{ route('expenses.create') }}" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i>
                            Ajouter</a>
                    </div>
                </div>
                <div class="col-md-5 m-auto text-white p-b-30">
                    <div class="text-md-right">
                     <form class="card-body"  action="{{route('expenses.index')}}" method="GET" role="search">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col">
                                {{-- <label>De</label> --}}
                                <input type="date"  name="query"  class="form-control">
                            </div>


                            <div class="col">
                                {{-- <label>Recherche</label> --}}
                                <button type="submit" class="form-control"><i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </div>

                        </div>

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
                                        <th class="">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($expenses as $expense )
                                        <tr>
                                            <td>{{ $expense->expenseType() }} </td>
                                            <td>{{ $expense->expense_at->toDateString() }} </td>
                                            <td>{{ $expense->description }}</td>
                                            <td>{{ $expense->amount() }}</td>
                                        <td class="text-center d-flex flex-end ">
                                            <form method="POST" action="{{ route('expenses.destroy',$expense) }}">
                                                @csrf()
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger mb-4 mr-4">Supprimer</button>
                                            </form>
                                            <a href="{{ route('expenses.edit', $expense) }}" class="btn  btn-sm btn-primary mb-4"> Modifier</a>
                                        </td>

                                        </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center alert alert-danger  text-muted">  Aucune information trouvée </td>
                                    </tr>  
                                    @endforelse

                                  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <nav aria-label="">
                {{ $expenses->links('vendor.pagination.bootstrap-4') }}
            </nav>
        </div>

     </div>



</section>
@endsection
