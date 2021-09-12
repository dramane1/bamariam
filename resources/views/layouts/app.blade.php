<!DOCTYPE html>
<html lang="fr">
@include('layouts.partials.head')

<body class="jumbo-page">
    <main class="admin-main  ">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-lg-4  bg-white">
                    <div class="row align-items-center m-h-100">
                        <div class="mx-auto col-md-8">
                            <div class="p-b-20 text-center">
                                {{-- <a href="{{ route('home') }}">
                                    <img src="{{ asset('assets/img/logo.png') }}" width="80" alt="{{ config('app.name') }}">
                                </a> --}}
                                <p class="admin-brand-content">
                                    {{-- {{ config('app.name') }} --}}
                                </p>
                            </div>

                            @yield('content')
                        </div>
                    </div>
                </div>
                <div class="col-lg-8  bg-white">
                    <img width="100%" src="{{ asset('assets/img/login.svg') }}" alt="">
                </div>
                <div class="col-lg-8 d-none d-md-block bg-cover" style="background-image: url('{{ asset('assets/img/login.svg') }}')">
                </div>
            </div>
        </div>
    </main>
</body>

</html>
