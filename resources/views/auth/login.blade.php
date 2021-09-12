@extends('layouts.app')

@section('title', 'Connexion')
@section('content')
    <h3 class="text-center p-b-20 fw-400">Connexion</h3>
    <form class="needs-validation" action="{{ route('login') }}" method="post">
        @csrf
        <div class="form-row">
            <div class="form-group floating-label col-md-12">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Ex: email@exemple.com" required>

                @error ('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group floating-label col-md-12">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" class="form-control" required>

                @error ('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        Se souvenir de moi
                    </label>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block btn-lg">Se connecter</button>
    </form>
    <p class="text-left p-t-10">
        <a href="{{ route('register') }}" class="text-underline">S'inscrire</a>
    </p>
    <p class="text-right p-t-10">
        <a href="{{ route('password.request') }}" class="text-underline">Mot de passe oublié ?</a>
    </p>
@endsection
