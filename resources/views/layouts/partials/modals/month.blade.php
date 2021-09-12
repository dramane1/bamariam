<div class="modal modal-slide-left  fade" id="monthModal" tabindex="-1" role="dialog" aria-labelledby="monthModal"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body p-all-0" id="site-search">
                <button type="button" class="close light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="form-dark bg-dark text-white p-t-60 p-b-20 bg-dots" >
                    <h3 class="text-uppercase    text-center  fw-300 "> Selectionner un mois</h3>

                    <div class="container-fluid">
                        <div class="col-md-10 p-t-10 m-auto">

                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="list-group list">
                        @php
                            $period = Carbon\CarbonPeriod::create(Carbon\Carbon::parse(now())->subMonths(30), '1 month', now());
                        @endphp
                        @foreach (collect($period)->reverse() as $date)
                            <div class="list-group-item d-flex  align-items-center">
                                <a href="/filter?month={{ $date->format('m') }}&year={{ $date->format('Y') }}">
                                    <div class="name">{{ $date->formatLocalized('%B %Y') }}</div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
