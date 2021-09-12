@extends('layouts.master')

@section('title', 'Les Comptes')
@section('content')
    <section class="admin-content">
        <div class="bg-dark m-b-30">
            <div class="container">
                <div class="row p-b-60 p-t-60">

                    <div class="col-md-8 m-auto text-white p-b-30">
                        <h1>Comptes</h1>
                    </div>

                    <div class="col-md-4 m-auto text-white p-b-30">
                        <div class="text-md-right">
                            <a href="{{ route('users.create') }}" class="btn btn-success"> <i class="mdi mdi-plus"></i> Nouveau compte</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container pull-up">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive p-t-10">
                                <table id="example" class="table   " style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Email</th>
                                            <th>Téléphone</th>
                                            <th>Proffession</th>
                                            <th>Rôle</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>
                                                    {{	$user->fullName()  }}
                                                </td> 
                                                <td>
                                                    {{ $user->email }}
                                                </td>
                                                <td>
                                                    {{ $user->phone }}
                                                </td>
                                                <td>
                                                    {{ $user->job_title }}
                                                </td>
                                                <td>
                                                    {{ $user->role }}
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('users.show',$user) }}" class="btn  btn-primary"> Voir</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Email</th>
                                            <th>Téléphone</th>
                                            <th>Proffession</th>
                                            <th>Rôle</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row justify-content-center">
                <nav aria-label="">
                    {{-- {{ $agents->links() }} --}}
                </nav>
            </div>
        </div>
    </section>
@endsection
