@extends('layouts.master')

@section('title',  $user->FullName())

@section('head')
    <link href="{{ asset('assets/vendor/select2/select2.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <section class="admin-content">
        <div class="bg-dark m-b-30">
            <div class="container">
                <div class="row p-b-60 p-t-60">
                    <div class="col-md-8 m-auto text-white p-b-30">
                        <h1>{{ $user->FullName() }}</h1>
                    </div>
                    <div class="col-md-4 m-auto text-white p-b-30">
                        <div class="text-md-right">
                            <a href="{{ route('users.edit', $user) }}" class="btn btn-info"> <i class="mdi mdi-account-edit"></i> Modifier</a>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <div class="container  pull-up">
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body ">
                            <form method="POST" action="{{ route('users.destroy',$user) }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="firstname">Prénom</label>
                                        <input type="text" name="firstname" class="form-control" id="firstname" value="{{ $user->firstname }}" disabled>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="lastname">Nom</label>
                                        <input type="text" name="lastname" class="form-control" id="lastname" value="{{ $user->lastname }}" disabled>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="phone">Téléphone</label>
                                        <input type="text" name="phone" class="form-control" id="phone" value="{{ $user->phone }}" disabled>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="form-control-label" for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}" disabled>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label" for="job_title">Emploi</label>
                                        <input type="text" name="job_title" class="form-control" id="job_title" value="{{ $user->job_title }}" disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label" for="agency_id">Agence</label>
                                        <input type="text" name="agency_id" class="form-control" id="agency_id" value="{{ $user->agency->name }}" disabled>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label" for="role">Rôle</label>
                                        <input type="text" name="role" class="form-control" id="role" value="{{ $user->role }}" disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label" for="password">Mot de passe</label>
                                        <input type="password" name="password" class="form-control" id="password" value="{{ $user->password }}" disabled>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-danger" value="Supprimer">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
