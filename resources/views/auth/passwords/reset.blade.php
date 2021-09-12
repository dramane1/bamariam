@extends('layouts.app')

@section('title', 'Réinitialiser votre mot de passe')
@section('content')
    <h3 class="text-center p-b-20 fw-400">Réinitialiser votre mot de passe</h3>
    <form class="needs-validation" action="{{ route('password.request') }}" method="POST">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">
        <div class="form-row">
            <div class="form-group floating-label col-md-12">
                <label>Email</label>
                <input type="email" name="email" class="form-control"  placeholder="Email" value="{{ old('email') }}" required>
                @error ('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group floating-label col-md-12">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" class="form-control" placeholder="Entrer le nouveau de passe" value="{{ old('password') }}" required>
                @error ('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group floating-label col-md-12">
                <label for="password_confirmation">Mot de passe</label>
                <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" placeholder="Confirmer le mot de passe" value="{{ old('password_confirmation') }}" required>
                @error ('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block btn-lg">Réinitialiser</button>
    </form>
    <p class="text-right p-t-10">
        <a href="{{ route('password.request') }}" class="text-underline">Mot de passe oublié ?</a>
    </p>
@endsection
