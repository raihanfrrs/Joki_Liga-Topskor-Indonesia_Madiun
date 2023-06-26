@extends('layouts.main')

@section('section')
<div class="row">
    <div class="col-lg-12">
        <div class="profile card card-body px-3 pt-3 pb-0">
            <div class="profile-head">
                <div class="photo-content">
                    <div class="cover-photo rounded"></div>
                </div>
                <div class="profile-info">
                    <div class="profile-photo">
                        @if (auth()->user()->level === 'admin')
                            @if ($profile->image)
                                <img src="{{ asset('storage/'. $profile->image) }}" class="img-fluid rounded-circle" />
                            @else
                                <img src="{{ asset('/') }}images/profile/profile-2.png" class="img-fluid rounded-circle" />
                            @endif
                        @elseif (auth()->user()->level === 'user')
                            @if ($profile->logo)
                                <img src="{{ asset('storage/'. $profile->logo) }}" class="img-fluid rounded-circle" />
                            @else
                                <img src="{{ asset('/') }}images/profile/profile-2.png" class="img-fluid rounded-circle" />
                            @endif
                        @endif
                    </div>
                    <div class="profile-details">
                        <div class="profile-name px-3 pt-2 text-capitalize">
                            <h4 class="text-primary mb-0">{{ auth()->user()->level === 'admin' ? auth()->user()->admin->name : (auth()->user()->club->name ? auth()->user()->club->name : auth()->user()->username) }}</h4>
                            <p>{{ auth()->user()->level }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-4">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="profile-blog">
                        <h5 class="text-primary d-inline">Personal Information</h5>
                        <div class="profile-personal-info">
                            <div class="row mb-2 mt-3">
                                <div class="col-sm-4 col-6">
                                    <h5 class="f-w-500">Name <span class="pull-end">:</span>
                                    </h5>
                                </div>
                                <div class="col-sm-8 col-6 text-capitalize"><span>{{ auth()->user()->level === 'admin' ? auth()->user()->admin->name : (auth()->user()->club->name ? auth()->user()->club->name : '-') }}</span>
                                </div>
                            </div>
                            @if (auth()->user()->level === 'admin')
                            <div class="row mb-2">
                                <div class="col-sm-4 col-6">
                                    <h5 class="f-w-500">Email <span class="pull-end">:</span>
                                    </h5>
                                </div>
                                <div class="col-sm-8 col-6"><span>{{ $profile->email }}</span>
                                </div>
                            </div>
                            @endif
                            <div class="row mb-2">
                                <div class="col-sm-4 col-6">
                                    <h5 class="f-w-500">Phone <span class="pull-end">:</span></h5>
                                </div>
                                <div class="col-sm-8 col-6"><span>{{ $profile->phone ? $profile->phone : '-' }}</span>
                                </div>
                            </div>
                            @if (auth()->user()->level === 'user')
                            <div class="row mb-2">
                                <div class="col-sm-4 col-6">
                                    <h5 class="f-w-500">Zone <span class="pull-end">:</span>
                                    </h5>
                                </div>
                                <div class="col-sm-8 col-6 text-capitalize"><span>{{ $profile->zone }}</span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-4 col-6">
                                    <h5 class="f-w-500">Social Media <span class="pull-end">:</span>
                                    </h5>
                                </div>
                                <div class="col-sm-8 col-6"><span>{{ $profile->social_media ? $profile->social_media : '-' }}</span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-4 col-6">
                                    <h5 class="f-w-500">Club Proprietor <span class="pull-end">:</span>
                                    </h5>
                                </div>
                                <div class="col-sm-8 col-6"><span>{{ $profile->club_manager ? $profile->club_manager : '-' }}</span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-4 col-6">
                                    <h5 class="f-w-500">Address <span class="pull-end">:</span>
                                    </h5>
                                </div>
                                <div class="col-sm-8 col-6"><span>{{ $profile->address ? $profile->address : '-' }}</span>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-8">
        <div class="card">
            <div class="card-body">
                <div class="profile-tab">
                    <div class="custom-tab-1">
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a href="#profile-settings" data-bs-toggle="tab" class="nav-link active show">Setting</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="profile-settings" class="tab-pane fade active show">
                                <div class="pt-3">
                                    <div class="settings-form">
                                        <h4 class="text-primary">Account Setting</h4>
                                        <form action="/profile/{{ auth()->user()->id }}" method="POST">
                                            @csrf
                                            @method('put')
                                            @if (auth()->user()->level === 'admin')
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Name</label>
                                                <input type="text" placeholder="Name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $profile->name) }}" name="name" required>
                                                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Email</label>
                                                <input type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $profile->email) }}" name="email" required>
                                                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Phone</label>
                                                <input type="text" placeholder="Phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $profile->phone) }}" name="phone" required>
                                                @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                            </div>
                                            @endif
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Username</label>
                                                <input type="text" placeholder="Username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username', $profile->user->username) }}" name="username" required>
                                                @error('username') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Password
                                                    <span class="text-danger">*Optional</span>
                                                </label>
                                                <input type="password" placeholder="Password" class="form-control @error('email') is-invalid @enderror" name="password">
                                                @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                            </div>
                                            <button class="btn btn-primary" type="submit">Change</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection