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
                    <li class="nav-item notification_dropdown">
                        <a class="nav-link" href="/bin">
                            <i class="flaticon-381-trash-1 text-secondary"></i>
                            <span class="badge light text-white bg-primary rounded-circle" id="totalTrashed"></span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>