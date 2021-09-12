@extends('layouts.app')

@section('title', 'Inscrivez-vous !')
@section('content')
    <h3 class="text-center p-b-20 fw-400">Inscrivez-vous !</h3>
    <form class="needs-validation" action="{{ route('register') }}" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group floating-label col-md-12">
                <label>Prénom</label>
                <input type="text" name="firstname" class="form-control" placeholder="Prénom" value="{{ old('firstname') }}" required>
                @error ('firstname')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group floating-label col-md-12">
                <label>Nom</label>
                <input type="text" name="lastname" class="form-control" placeholder="Nom" value="{{ old('lastname') }}" required>
                @error ('lastname')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group floating-label col-md-12">
                <label>Status Employé</label>
                <input type="text" name="job_title" class="form-control" placeholder="Emploi" value="{{ old('job_title') }}" required>
                @error ('job_title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group floating-label col-md-12">
                <label>Numéro de téléphone</label>
                <input type="text" name="phone" class="form-control" placeholder="Numéro de téléphone" value="{{ old('phone') }}" required>
                @error ('phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group floating-label col-md-12">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
                @error ('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group floating-label col-md-12">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" class="form-control" placeholder="Mot de passe" value="{{ old('password') }}" required>
                @error ('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group floating-label col-md-12">
                <label for="password_confirmation">Confirmer le mot de passe</label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmer le mot de passe" value="{{ old('password_confirmation') }}" required>
                @error ('password_confirmation')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block btn-lg">S'inscrire</button>
    </form>
    <p class="text-right p-t-10">
        <a href="{{ route('login') }}" class="text-underline">Connectez-vous ?</a>
    </p>
@endsection
