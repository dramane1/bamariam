@component('mail::message')
# Hey

- {{ $user->email }}

@component('mail::panel')
	#  Bienvenu {{ $user->fullName() }} sur la plaforme {{ config('app.name') }} cliquer<a href="asset('route('password.email')')"> Ici </a> pour pouvoir créér votre mot de passe 
@endcomponent
	
Thanks,<br>
{{ config('app.name') }} 
@endcomponent
