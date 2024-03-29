<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="dropdown header-profile">
                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                    @if (auth()->user()->level === 'admin')
                        @if (auth()->user()->admin->image)
                            <img src="{{ asset('storage/'. auth()->user()->admin->image) }}" width="20" alt="profile image">
                        @else
                            <img src="{{ asset('/') }}images/profile/profile-2.png" width="20" alt="profile image">
                        @endif
                    @elseif (auth()->user()->level === 'user')
                        @if (auth()->user()->club->logo)
                            <img src="{{ asset('storage/'. auth()->user()->club->logo) }}" width="20" alt="profile image">
                        @else
                            <img src="{{ asset('/') }}images/profile/profile-2.png" width="20" alt="profile image">
                        @endif
                    @endif
                    <div class="header-info ms-3">
                        <span class="font-w600 text-capitalize">Hi, <b>{{ auth()->user()->level }}</b></span>
                        <small class="text-end font-w400 text-capitalize">{{ auth()->user()->level === 'admin' ? auth()->user()->admin->name : (auth()->user()->club->name == '' ? auth()->user()->username : auth()->user()->club->name) }}</small>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a href="/profile" class="dropdown-item ai-icon">
                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                        <span class="ms-2">Profile </span>
                    </a>
                    <a href="/logout" class="dropdown-item ai-icon">
                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                        <span class="ms-2">Logout </span>
                    </a>
                </div>
            </li>
            @include('partials.menu')
        </ul>
    </div>
</div>