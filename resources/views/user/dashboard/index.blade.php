<div class="row">

    <div class="col-xl-6">
        <div class="row">

            <div class="col-xl-6">
                <a href="/official-data">
                    <div class="widget-stat card" style="height: 85%;">
                        <div class="card-body p-4">
                            <div class="media ai-icon">
                                <span class="me-3 bgl-primary text-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="43" height="42" fill="currentColor" class="bi bi-universal-access" viewBox="0 0 16 16">
                                        <path d="M9.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM6 5.5l-4.535-.442A.531.531 0 0 1 1.531 4H14.47a.531.531 0 0 1 .066 1.058L10 5.5V9l.452 6.42a.535.535 0 0 1-1.053.174L8.243 9.97c-.064-.252-.422-.252-.486 0l-1.156 5.624a.535.535 0 0 1-1.053-.174L6 9V5.5Z"/>
                                    </svg>
                                </span>
                                <div class="media-body">
                                    <p class="mb-1">Total Officials</p>
                                    <h4 class="mb-0"><span id="totalOfficials"></span></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-6">
                <a href="/player-data">
                    <div class="widget-stat card" style="height: 85%;">
                        <div class="card-body p-4">
                            <div class="media ai-icon">
                                <span class="me-3 bgl-warning text-warning">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="43" height="42" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                        <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z"/>
                                    </svg>
                                </span>
                                <div class="media-body">
                                    <p class="mb-1">Total Players</p>
                                    <h4 class="mb-0"><span id="totalPlayers"></span></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

        </div>

        <div class="row">

            <div class="col-xl-12">
                <img src="{{ asset('/') }}images/rules/rule.jpeg" class="img-fluid" />
            </div>

        </div>
    </div>

    <div class="col-xl-4">
        <div class="row">

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header border-0 pb-0">
                        <h2 class="card-title"><a href="/club-data">about us</a></h2>
                    </div>
                    <div class="card-body pb-0">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex px-0 justify-content-between">
                                <strong>Contact</strong>
                                <span class="mb-0">{{ auth()->user()->club->phone ? auth()->user()->club->phone : '-' }}</span>
                            </li>
                            <li class="list-group-item d-flex px-0 justify-content-between">
                                <strong>Club Proprietor</strong>
                                <span class="mb-0">{{ auth()->user()->club->club_manager ? auth()->user()->club->club_manager : '-' }}</span>
                            </li>
                            <li class="list-group-item d-flex px-0 justify-content-between">
                                <strong>Zone</strong>
                                <span class="mb-0 text-capitalize">{{ auth()->user()->club->zone }}</span>
                            </li>
                            <li class="list-group-item d-flex px-0 justify-content-between">
                                <strong>Created At</strong>
                                <span class="mb-0">{{ \Carbon\Carbon::parse(auth()->user()->club->created_at)->format('d/m/Y') }}</span>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer pt-0 pb-0 text-center">
                        <div class="row">
                            <div class="col-6 pt-3 pb-3 border-end">
                                <h3 class="mb-1 text-primary">{{ auth()->user()->club->official()->withTrashed()->count() }}</h3>
                                <span>Officials</span>
                            </div>
                            <div class="col-6 pt-3 pb-3">
                                <h3 class="mb-1 text-primary">{{ auth()->user()->club->player()->withTrashed()->count() }}</h3>
                                <span>Players</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>