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
        <script src="{{asset('assets/datatables/datatables.min.js')}}"></script>
        <script type="text/javascript">
            $(document).ready( function () {
            $('#myTable').DataTable(
                {
                    "language": 
         {
                "sProcessing": "Traitement en cours ...",
                "sLengthMenu": "Afficher _MENU_ lignes",
                "sZeroRecords": "Aucun résultat trouvé",
                "sEmptyTable": "Aucune donnée disponible",
                "sInfo": "Lignes _START_ à _END_ sur _TOTAL_",
                "sInfoEmpty": "Aucune ligne affichée",
                "sInfoFiltered": "(Filtrer un maximum de_MAX_)",
                "sInfoPostFix": "",
                "sSearch": "Chercher:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Chargement...",
                "oPaginate": {
                "sFirst": "Premier", "sLast": "Dernier", "sNext": "Suivant", "sPrevious": "Précédent"
                },
                "oAria": {
                "sSortAscending": ": Trier par ordre croissant", "sSortDescending": ": Trier par ordre décroissant"
                }
         }
     
                }
       
            );
        } );
        </script>
	

    </body>
</html>
