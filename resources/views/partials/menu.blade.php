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
    <li><a href="app-profile.html">Clubs</a></li>
    <li><a href="post-details.html">Players</a></li>
    <li><a href="app-calender.html">Users</a></li>
</ul>
</li>
<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
<i class="flaticon-381-key"></i>
    <span class="nav-text">Management</span>
</a>
<ul aria-expanded="false">
    <li><a href="app-profile.html">Age Group</a></li>
    <li><a href="post-details.html">Zone</a></li>
</ul>
</li>

@elseif (auth()->user()->level === 'user')

@endif