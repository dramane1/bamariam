@extends('layouts.master')

@section('title', ' Salaire')

@section('content')
<section class="admin-content">
    <div class="bg-dark m-b-30">
        <div class="container">
            <div class="row p-b-60 p-t-60">
                <div class="col-md-8 m-auto text-white p-b-30">
                    <h1>Les Revenus</h1>
                </div>

                <div class="col-md-4 m-auto text-white p-b-30">
                    <div class="text-md-right">
                        <a href="{{ route('incomes.create') }}" class="btn btn-success"> <i class="mdi mdi-plus"></i> Ajouter</a>
                    </div>
                </div>

                <div class="col-md-3 m-auto text-white p-b-30">
                    <div class="text-md-right">
                        {{-- <a href="{{ route('incomes.show', $income) }}" class="btn btn-success"> <i class="mdi mdi-eye"></i> Voir Total</a> --}}
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
                                        <th>Provenance du revenu</th>
                                        <th>Date de saisie du revenu</th>
                                        <th>Montant</th>
                                        {{-- <th>Status</th> --}}
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($incomes as $income)

                                        <tr>
                                            <td>{{ $income->classe }} </td>
                                            <td>{{ $income->income_at->toDateString() }} </td>
                                            <td>{{ $income->amount() }}</td>
                                            <td class="text-center d-flex flex-end ">
                                                <form method="POST" action="{{ route('incomes.destroy',$income) }}">
                                                    @csrf()
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger mb-4 mr-4">Supprimer</button>
                                                </form>
                                                <a href="{{ route('incomes.edit', $income) }}" class="btn  btn-sm btn-primary mb-4"> Modifier</a>
                                             </td>

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
                {{ $incomes->links('vendor.pagination.bootstrap-4') }}
            </nav>
        </div>

    </div>



</section>
@endsection
