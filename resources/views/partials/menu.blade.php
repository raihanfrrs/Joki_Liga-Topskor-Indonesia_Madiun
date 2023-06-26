@if (auth()->user()->level === 'admin')
    <li><a class="ai-icon" href="/">
            <i class="flaticon-025-dashboard"></i>
            <span class="nav-text">Dashboard</span>
        </a>
    </li>
    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
    <i class="flaticon-013-checkmark"></i>
        <span class="nav-text">Master Data</span>
    </a>
    <ul aria-expanded="false">
        <li><a href="/club">Clubs</a></li>
        <li><a href="/player">Players</a></li>
        <li><a href="/official">Officials</a></li>
        <li><a href="/mail">Mails</a></li>
    </ul>
    </li>
    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
    <i class="flaticon-381-key"></i>
        <span class="nav-text">Management</span>
    </a>
    <ul aria-expanded="false">
        <li><a href="/age">Age Group</a></li>
    </ul>
    </li>

@elseif (auth()->user()->level === 'user')
    <li><a class="ai-icon" href="/">
        <i class="flaticon-025-dashboard"></i>
        <span class="nav-text">Dashboard</span>
    </a>
    </li>
    <li><a href="/club-data" class="ai-icon" aria-expanded="false">
        <i class="flaticon-381-id-card"></i>
        <span class="nav-text">Club Data</span>
    </a>
    </li>
    <li><a href="/official-data" class="ai-icon" aria-expanded="false">
        <i class="flaticon-381-notebook"></i>
        <span class="nav-text">Official Data</span>
    </a>
    </li>
    <li><a href="/player-data" class="ai-icon" aria-expanded="false">
        <i class="flaticon-381-briefcase"></i>
        <span class="nav-text">Player Data</span>
    </a>
    </li>
@endif