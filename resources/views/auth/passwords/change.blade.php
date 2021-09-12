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
                        <h1>Modifier votre mot de passe</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="container pull-up">
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body ">
                            <form action="{{ route('profile.updatePassword') }}" method="POST">
                                @csrf
                                {{ method_field('PUT') }}
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="old_password">Ancien mot de passe</label>
                                        <input type="password" name="old_password" class="form-control" id="old_password" autofocus>

                                        @error('old_password')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="password">Nouveau mot de passe</label>
                                        <input type="password" name="password" class="form-control" id="password">

                                        @error('password')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="password_confirmation">Confirmer votre mot de passe</label>
                                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">

                                        @error('password_confirmation')
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
