@extends('layouts.master')

@section('title',  $user->allName())

@section('head')
    <link href="{{ asset('assets/vendor/select2/select2.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <section class="admin-content">
        <div class="bg-dark m-b-30">
            <div class="container">
                <div class="row p-b-60 p-t-60">
                    <div class="col-md-8 m-auto text-white p-b-30">
                        <h1>Modifier le profil de {{ $user->allName() }}</h1>
                    </div>
                    <div class="col-md-4 m-auto text-white p-b-30">
                        <div class="text-md-right">
                            <a href="{{ route('password.change') }}" class="btn btn-success"> <i class="mdi mdi-textbox-password"></i> Modifier le mot de passe</a>
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
                            <form action="{{ route('profile.update', $user) }}" method="POST">
                                @csrf
                                {{ method_field('PUT') }}
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="firstname">Prénom</label>
                                        <input type="text" name="firstname" class="form-control" id="firstname" value="{{ $user->firstname }}" placeholder="Ex : Amadou" autofocus>

                                        @error ('firstname')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="lastname">Nom</label>
                                        <input type="text" name="lastname" class="form-control" id="lastname" value="{{ $user->lastname }}" placeholder="Ex : Coulibaly">

                                        @error ('lastname')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}" placeholder="Ex : nom@example.com">

                                        @error ('email')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="phone">Numéro de téléphone</label>
                                        <input type="text" name="phone" class="form-control" id="phone" value="{{ $user->phone }}" placeholder="Ex : 74859625">

                                        @error ('phone')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="company">Entreprise</label>
                                        <input type="text" class="form-control" id="company" value="{{ $user->company->name }}" disabled>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="jobtitle">Profession</label>
                                        <input type="text" name="jobtitle" class="form-control" id="jobtitle" value="{{ $user->jobtitle }}" placeholder="Ex : CEO">

                                        @error ('jobtitle')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Modifier</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
