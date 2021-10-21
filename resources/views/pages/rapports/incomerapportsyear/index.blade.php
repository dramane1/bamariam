@extends('layouts.master')

@section('title', ' Rapport de revenu')

@section('content')
<section class="admin-content">
    <div class="bg-dark m-b-30">
        <div class="container">
            <div class="row p-b-60 p-t-60">
                <div class="col-md-6 text-center mx-auto text-white p-b-30">

                    <h3>Rapport détaillé du revenu annuel </h3>
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
                        <form class="card-body" action="{{route('incomerapportsyear.index')}}" method="GET" role="search">
                            {{ csrf_field() }}
                                <input type="text" class="form-control" placeholder="Ex: 2021" name="query">
                                {{-- @error('query')
                                <div class="text text-danger" role="alert">
                                    <span>{{ $errors->first('query') }}</span>
                                </div>
                            @enderror --}}
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
                                        <th>Provenance du revenu</th>
                                        <th>Date</th>
                                        <th>Montant</th>>
                                        {{-- <th>Status</th> --}}
                                        {{-- <th class="text-right">Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($yearIncomes->groupBy('classe') as $income )
                                        <tr>
                                            <td>{!! $income->first()->classe !!}</td>
                                            <td>{!! $income->first()->income_at->toDateString()!!}</td>
                                            <td>{!! $income->sum('income_amount')!!}</td>

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
                {{ $yearIncomes->links('vendor.pagination.bootstrap-4') }}
            </nav>
        </div>
    </div>


</section>
@endsection
