@extends('layouts.app')

@section('title', 'Mot de passe oublié')
@section('content')
    <h3 class="text-center p-b-20 fw-400">Réinitialisation de mot de passe</h3>
    <form class="needs-validation" action="{{ route('password.email') }}" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group floating-label col-md-12">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
                @error ('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block btn-lg">Envoyer</button>
    </form>
    <p class="text-right p-t-10">
        <a href="{{ route('login') }}" class="text-underline">Se connecter</a>
    </p>
@endsection
