@extends('layouts.master')

@section('title', ' Rapport du salaire')
@section('head')


@endsection

@section('content')
<section class="admin-content">
    <div class="bg-dark m-b-30">
        <div class="container">
            <div class="row p-b-60 p-t-60">

                <div class="col-md-12 text-center mx-auto text-white p-b-30">

                    <h3>Rapport détaillé du salaire mensuel </h3>
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
                            <form class="card-body"  action="{{route('salaryrapportsmonth.index')}}" method="GET" role="search">
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
                                        <th> Type de Salaire</th>
                                        <th>Date</th>
                                        <th>Total mensuel</th>
                                      
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ( $monthSalaries as $salary )
                                        <tr>
                                            <td>{!! $salary->salarytype() !!}</td>
                                            <td>{!! $salary->salary_at->toDateString() !!}</td>
                                            <td>{!! $salary->amount()!!}</td>
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
                {{ $monthSalaries->links('vendor.pagination.bootstrap-4') }}
            </nav>
        </div>
     </div>


</section>
@endsection
{{-- @section('script')

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>


   </script>
@endsection --}}
