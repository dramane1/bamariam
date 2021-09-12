@extends('layouts.master')

@section('title', ' Salaire')

@section('content')
<section class="admin-content">
    <div class="bg-dark m-b-30">
        <div class="container">
            <div class="row p-b-60 p-t-60">
                <div class="col-md-6 m-auto text-white p-b-30">
                    <h1>Les Salaires</h1>
                </div>

                <div class="col-md-3 m-auto text-white p-b-30">
                    <div class="text-md-right">
                        <a href="{{ route('salaries.create') }}" class="btn btn-success"> <i class="mdi mdi-plus"></i> Ajouter</a>
                    </div>
                </div>

                {{-- <div class="col-md-3 m-auto text-white p-b-30">
                    <div class="text-md-right">
                        <a href="{{ route('salaries.show', $salary) }}" class="btn btn-success"> <i class="mdi mdi-eye"></i> Voir Total</a>
                    </div>
                </div> --}}


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
                                        <th>Provenance du salaire</th>
                                        <th>Date de saisie du salaire</th>
                                        <th>Montant</th>
                                        {{-- <th>Status</th> --}}
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($salaries as $salary)

                                        <tr>
                                           <td>{{ $salary->salarytype() }} </td>
                                           <td>{{ $salary->salary_at->toDateString() }} </td>
                                           <td>{{ $salary->amount() }}</td>
                                           <td class="text-center d-flex flex-end ">
                                            <form method="POST" action="{{ route('salaries.destroy',$salary) }}">
                                                @csrf()
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger mb-4 mr-4">Supprimer</button>
                                            </form>
                                            <a href="{{ route('salaries.edit', $salary) }}" class="btn  btn-sm btn-primary mb-4"> Modifier</a>
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
                {{ $salaries->links('vendor.pagination.bootstrap-4') }}
            </nav>
        </div>

    </div>



</section>
@endsection
