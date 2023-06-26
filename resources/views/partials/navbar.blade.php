<div class="header">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">
                    <div class="dashboard_bar">
                        @if (count(Request::segments()) == 0)
                            Dashboard
                        @else 
                            {{ isset($title) ? $title : Str::ucfirst(Request::segment(1)) }}
                        @endif
                    </div>
                </div>
                <ul class="navbar-nav header-right">
                    @if (auth()->user()->level === 'user')
                    <li class="nav-item notification_dropdown">
                        <a class="nav-link bell bell-link" href="javascript:void(0);" id="mail" title="Mail">
                            <i class="flaticon-381-file text-secondary"></i>
                            <span class="badge light text-white bg-primary rounded-circle" id="totalMails"></span>
                        </a>
                    </li>
                    @endif
                    @if (!request()->is('bin'))
                    <li class="nav-item notification_dropdown">
                        <a class="nav-link" href="/bin" id="trash" title="Bin">
                            <i class="flaticon-381-trash-1 text-secondary"></i>
                            <span class="badge light text-white bg-primary rounded-circle" id="{{ auth()->user()->level == 'admin' ? 'totalTrashed' : 'totalTrashedClub' }}"></span>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</div>