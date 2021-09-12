<!DOCTYPE html>
    <html lang="fr">

    @include('layouts.partials.head')

    <body class="sidebar-pinned ">
        @include('layouts.partials.sidebar')

        <main class="admin-main">
        <!--site header begins-->

            @include('layouts.partials.header')

        <!--site header ends -->

            {{-- @if (session()->has('notification.type'))
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
            <script type="text/javascript">
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 5000
                });

                Toast.fire({
                    type: "{{ session()->get('notification.type') }}",
                    title: "{{ session()->get('notification.message') }}"
                });
            </script>
             @endif --}}

            @yield('content')
            <script src="//code.jquery.com/jquery.js"></script>
            @include('flashy::message')

            @include('layouts.partials.footer')
        </main>


        @include('layouts.partials.modals.month')

        <script src="{{ asset('assets/js/theme.min.js') }}"></script>
        <script src="{{ asset('assets/js/dashboard-01.js') }}"></script>


        {{-- <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script> --}}
        <script src="{{ asset('assets/js/ipropertyscript.js') }}"></script>


        @if (session()->has('notification.message'))
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
            <script type="text/javascript">
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 5000
                });

                Toast.fire({
                    type: "{{ session()->get('notification.type') }}",
                    title: "{{ session()->get('notification.message') }}"
                });
            </script>
        @endif
        @yield('script')

    </body>
</html>
