@extends('layouts.main')

@section('section')
<div class="row" id="row-bin">
    @if ($clubs->count() == 0 && $players->count() == 0 && $ages->count() == 0 && $officials->count() == 0 && $mails->count() == 0)
    <div class="col-xl-12">
        <div class="alert alert-warning solid">
            <div class="media">
                <div class="media-body">
                    <h5 class="mt-1 mb-1">Notifications</h5>
                    <p class="mb-0">Hello! We would like to inform you that currently the trash bin has no recoverable data. This means that no entries have been deleted or no data can be recovered via the trash feature.</p>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if ($clubs->count() > 0)
    <div class="col-xl-4 col-xxl-6 col-lg-6">
        <div class="card">
            <div class="card-header  border-0 pb-0">
                <h4 class="card-title">Clubs</h4>
            </div>
            <div class="card-body"> 
                <div class="widget-media dlab-scroll height370">
                    <ul class="timeline">
                        @foreach ($clubs as $club)
                        <li>
                            <div class="timeline-panel">
                                <div class="media me-2">
                                    @if ($club->logo)
                                        <img src="{{ asset('storage/'. $club->logo) }}" width="50" />
                                    @else
                                        <img src="{{ asset('/') }}images/profile/profile-2.png" width="50" />
                                    @endif
                                </div>
                                <div class="media-body">
                                    <h5 class="mb-1">{{ $club->name }}</h5>
                                    <small class="d-block">Moved at {{ $club->deleted_at->diffForHumans() }}</small>
                                </div>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-danger light sharp" data-bs-toggle="dropdown">
                                        <svg width="18px" height="18px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <button class="dropdown-item" id="restore" data-id="{{ $club->slug }}" data-key="club">Restore</button>
                                        <button class="dropdown-item" id="delete" data-id="{{ $club->slug }}" data-key="club">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if ($players->count() > 0)
    <div class="col-xl-4 col-xxl-6 col-lg-6">
        <div class="card">
            <div class="card-header  border-0 pb-0">
                <h4 class="card-title">Players</h4>
            </div>
            <div class="card-body"> 
                <div class="widget-media dlab-scroll height370">
                    <ul class="timeline">
                        @foreach ($players as $player)
                        <li>
                            <div class="timeline-panel">
                                <div class="media me-2">
                                    @if ($player->photo)
                                        <img src="{{ asset('storage/'. $player->photo) }}" width="50" />
                                    @else
                                        <img src="{{ asset('/') }}images/profile/profile-2.png" width="50" />
                                    @endif
                                </div>
                                <div class="media-body">
                                    <h5 class="mb-1">{{ $player->name }}</h5>
                                    <small class="d-block">Moved at {{ $player->deleted_at->diffForHumans() }}</small>
                                </div>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-success light sharp" data-bs-toggle="dropdown">
                                        <svg width="18px" height="18px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <button class="dropdown-item" id="restore" data-id="{{ $player->slug }}" data-key="player">Restore</button>
                                        <button class="dropdown-item" id="delete" data-id="{{ $player->slug }}" data-key="player">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if ($officials->count() > 0)
    <div class="col-xl-4 col-xxl-6 col-lg-6">
        <div class="card">
            <div class="card-header  border-0 pb-0">
                <h4 class="card-title">Officials</h4>
            </div>
            <div class="card-body"> 
                <div class="widget-media dlab-scroll height370">
                    <ul class="timeline">
                        @foreach ($officials as $official)
                        <li>
                            <div class="timeline-panel">
                                <div class="media me-2">
                                    @if ($official->photo)
                                        <img src="{{ asset('storage/'. $official->photo) }}" width="50" />
                                    @else
                                        <img src="{{ asset('/') }}images/profile/profile-2.png" width="50" />
                                    @endif
                                </div>
                                <div class="media-body">
                                    <h5 class="mb-1">{{ $official->name }}</h5>
                                    <small class="d-block">Moved at {{ $official->deleted_at->diffForHumans() }}</small>
                                </div>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-warning light sharp" data-bs-toggle="dropdown">
                                        <svg width="18px" height="18px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <button class="dropdown-item" id="restore" data-id="{{ $official->slug }}" data-key="official">Restore</button>
                                        <button class="dropdown-item" id="delete" data-id="{{ $official->slug }}" data-key="official">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if ($ages->count() > 0)
    <div class="col-xl-4 col-xxl-6 col-lg-6">
        <div class="card">
            <div class="card-header  border-0 pb-0">
                <h4 class="card-title">Age Groups</h4>
            </div>
            <div class="card-body"> 
                <div id="" class="widget-media dlab-scroll height370">
                    <ul class="timeline">
                        @foreach ($ages as $age)
                        <li>
                            <div class="timeline-panel">
                                <div class="media me-2 media-info">
                                    {{ $loop->iteration }}
                                </div>
                                <div class="media-body">
                                    <h5 class="mb-1">{{ $age->age }}</h5>
                                    <small class="d-block">Moved at {{ $age->deleted_at->diffForHumans() }}</small>
                                </div>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-info light sharp" data-bs-toggle="dropdown">
                                        <svg width="18px" height="18px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <button class="dropdown-item" id="restore" data-id="{{ $age->id }}" data-key="age">Restore</button>
                                        <button class="dropdown-item" id="delete" data-id="{{ $age->id }}" data-key="age">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if ($mails->count() > 0)
    <div class="col-xl-4 col-xxl-6 col-lg-6">
        <div class="card">
            <div class="card-header  border-0 pb-0">
                <h4 class="card-title">Mails</h4>
            </div>
            <div class="card-body"> 
                <div id="" class="widget-media dlab-scroll height370">
                    <ul class="timeline">
                        @foreach ($mails as $mail)
                        <li>
                            <div class="timeline-panel">
                                <div class="media me-2 media-secondary">
                                    {{ $loop->iteration }}
                                </div>
                                <div class="media-body">
                                    <h5 class="mb-1">{{ $mail->name }}</h5>
                                    <small class="d-block">Moved at {{ $mail->deleted_at->diffForHumans() }}</small>
                                </div>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-secondary light sharp" data-bs-toggle="dropdown">
                                        <svg width="18px" height="18px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <button class="dropdown-item" id="restore" data-id="{{ $mail->id }}" data-key="mail">Restore</button>
                                        <button class="dropdown-item" id="delete" data-id="{{ $mail->id }}" data-key="mail">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection