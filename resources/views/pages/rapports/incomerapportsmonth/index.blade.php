@extends('layouts.master')

@section('title', ' Rapport du revenu')
@section('head')


@endsection

@section('content')
<section class="admin-content">
    <div class="bg-dark m-b-30">
        <div class="container">
            <div class="row p-b-60 p-t-60">

                <div class="col-md-12 text-center mx-auto text-white p-b-30">

                    <h3>Rapport détaillé du revenu mensuel </h3>
                    <div class="form-dark">
                        <div class="input-group input-group-flush mb-3">
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
                            <form class="card-body"  action="{{route('incomerapportsmonth.index')}}" method="GET" role="search">
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
                                        <button type="submit" class="form-control"><i class="fa fa-search" aria-hidden="true"></i>
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
                            <table id="myTable" class="table table-stripped table-hover datatable">
                                <thead class="thead-light">

                                    <tr>
                                        <th>Provenance du revenu</th>
                                        <th>Date</th>
                                        <th>Montant</th>
                                        {{-- <th>Status</th> --}}
                                        {{-- <th class="text-right">Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($monthIncomes as $income )
                                    <tr>
                                        <td>{{ $income->classe }} </td>
                                        <td>{{ $income->income_at->toDateString() }} </td>
                                        {{-- <td>{{ $expense->description }}</td> --}}
                                        <td>{{ $income->amount() }}</td>
                                  

                                    </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center alert alert-danger  text-muted">  Aucune information trouvée </td>
                                </tr>  
                                @endforelse

                                        {{-- <tr>
                                            @foreach ($monthIncomes->groupBy('classe') as $income )
                                            <td>{!! $income->first()->classe!!}</td>
                                            <td>{!! $income->first()->income_at->toDateString() !!}</td>
                                            <td>{!! $income->sum('income_amount')!!}</td> --}}


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
{{-- 
                                        </tr>
                                        @endforeach --}}

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <nav aria-label="">
                {{ $monthIncomes->links('vendor.pagination.bootstrap-4') }}
            </nav>
        </div>
 </div>


</section>
@endsection
@section('script')

{{-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script> --}}
    <script>


   </script>
@endsection
