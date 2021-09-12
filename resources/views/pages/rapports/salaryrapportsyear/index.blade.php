@extends('layouts.master')

@section('title', ' Rapport du salaire')

@section('content')
<section class="admin-content">
    <div class="bg-dark m-b-30">
        <div class="container">
            <div class="row p-b-60 p-t-60">
                <div class="col-md-6 text-center mx-auto text-white p-b-30">
                    
                    <h3>Rapport détaillé du salaire annuel </h3>
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
                        <form class="card-body" action="{{route('salaryrapportsyear.index')}}" method="GET" role="search">
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
                                        <th> Type de Salaire</th>
                                        <th>Date</th>
                                        <th>Total annuel</th>
                                        {{-- <th>Status</th> --}}
                                        {{-- <th class="text-right">Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($yearSalaries->groupBy('classe') as $salary )
                                        <tr>
                                            <td>{!! $salary->first()->salarytype() !!}</td>
                                            <td>{!! $salary->first()->salary_at->toDateString()!!}</td>
                                            <td>{!! $salary->sum('salary_amount')!!}</td>

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
                {{ $yearSalaries->links('vendor.pagination.bootstrap-4') }}
            </nav>
        </div>
     </div>
    

</section>
@endsection
