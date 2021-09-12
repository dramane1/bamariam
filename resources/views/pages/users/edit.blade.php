@extends('layouts.master')

@section('title',  'Modifier - '.$user->fullName())

@section('head')
    <link href="{{ asset('assets/vendor/select2/select2.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <section class="admin-content">
        <div class="bg-dark m-b-30">
            <div class="container">
                <div class="row p-b-60 p-t-60">
                    <div class="col-md-8 m-auto text-white p-b-30">
                        <h1>{{ $user->fullName() }}</h1>
                    </div>
                    <div class="col-md-4 m-auto text-white p-b-30">
                        <div class="text-md-right">
                            <a href="{{ route('users.index') }}" class="btn btn-success"> <i class="mdi mdi-arrow-left-bold-circle"></i> Annuler</a>
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
                            <form action="{{ route('users.update',$user) }}" method="POST">
                                @csrf
                                {{ method_field('PUT') }}
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="firstname">Prénom</label>
                                        <input type="text" name="firstname" class="form-control {{ $errors->has('firstname') ? 'is-invalid' : '' }}" id="firstname" value="{{ old('firstname') ?? $user->firstname }}" placeholder="Ex : Mala" autofocus>

                                        @error ('firstname')
                                            <span class="help-block invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="lastname">Nom</label>
                                        <input type="text" name="lastname" class="form-control {{ $errors->has('lastname') ? 'is-invalid' : '' }}" id="lastname" value="{{ old('lastname') ?? $user->lastname }}" placeholder="Ex : Traoré">

                                        @error ('lastname')
                                            <span class="help-block invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="phone">Téléphone</label>
                                        <input type="text" name="phone" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" id="phone" value="{{ old('phone') ?? $user->phone }}" placeholder="Ex : 90354569">

                                        @error ('phone')
                                            <span class="help-block invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="form-control-label" for="email">Email</label>
                                        <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" value="{{ old('email') ?? $user->email }}" placeholder="Ex : Titulaire@gmail.com">
                                        @error ('email')
                                            <span class="help-block invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label" for="job_title">Emploi</label>
                                        <input type="text" name="job_title" class="form-control {{ $errors->has('job_title') ? 'is-invalid' : '' }}" id="job_title" value="{{ old('job_title') ?? $user->job_title }}" placeholder="statut employé" >
                                        @error ('job_title')
                                            <span class="help-block invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label" for="agency_id">Agence</label>
                                        <select type="text" name="agency_id" class="form-control {{ $errors->has('agency_id') ? 'is-invalid' : '' }}" id="agency_id">
                                            <option>selectionnez l'agence </option>
                                            @foreach($agencies as $agency)
                                                <option value="{{ $agency->id }}">{{ $agency->name }}</option>
                                            @endforeach
                                        </select>
                                        @error ('agency_id')
                                            <span class="help-block invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label" for="role">Rôle</label>
                                        <select type="text" name="role" class="form-control {{ $errors->has('role') ? 'is-invalid' : '' }}" id="role">
                                            <option value="Administrateur">Administrateur</option>
                                            <option value="Agent">Agent</option>
                                            <option value="Propriétaire">Propriétaire</option>
                                        </select>
                                        @error ('role')
                                            <span class="help-block invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label" for="password">Mot de passe</label>
                                        <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password" value="{{ old('password') ?? $user->password }}">
                                        @error ('password')
                                            <span class="help-block invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <input type="submit" value="Modifier" class=" btn btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection