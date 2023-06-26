@extends('layouts.main')

@section('section')
<div class="row">
    <div class="col-xl-4">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-blog">
                            <h5 class="text-primary d-inline">Official Photo</h5>
                            @if ($official->photo)
                                <img src="{{ asset('storage/'. $official->photo) }}" class="img-fluid mt-4 mb-2 w-100" />
                            @else
                                <img src="{{ asset('/') }}images/profile/profile-2.png" class="img-fluid mt-4 mb-2 w-100" />
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-8">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-blog">
                            <h5 class="text-primary d-inline">Official Information</h5>
                            <div class="profile-personal-info">
                                <div class="row mb-2 mt-3">
                                    <div class="col-sm-4 col-6">
                                        <h5 class="f-w-500">Name <span class="pull-end">:</span>
                                        </h5>
                                    </div>
                                    <div class="col-sm-8 col-6 text-capitalize"><span>{{ $official->name }}</span>
                                    </div>
                                </div>
                                <div class="row mb-2 mt-3">
                                    <div class="col-sm-4 col-6">
                                        <h5 class="f-w-500">Phone <span class="pull-end">:</span>
                                        </h5>
                                    </div>
                                    <div class="col-sm-8 col-6 text-capitalize"><span>{{ $official->phone }}</span>
                                    </div>
                                </div>
                                <div class="row mb-2 mt-3">
                                    <div class="col-sm-4 col-6">
                                        <h5 class="f-w-500">Email <span class="pull-end">:</span>
                                        </h5>
                                    </div>
                                    <div class="col-sm-8 col-6 text-capitalize"><span>{{ $official->email }}</span>
                                    </div>
                                </div>
                                <div class="row mb-2 mt-3">
                                    <div class="col-sm-4 col-6">
                                        <h5 class="f-w-500">Social Media <span class="pull-end">:</span>
                                        </h5>
                                    </div>
                                    <div class="col-sm-8 col-6 text-capitalize"><span><a href="{{ $official->social_media }}" target="_blank">@ {{ $official->name }}</a></span>
                                    </div>
                                </div>
                                <div class="row mb-2 mt-3">
                                    <div class="col-sm-4 col-6">
                                        <h5 class="f-w-500">Licence <span class="pull-end">:</span>
                                        </h5>
                                    </div>
                                    <div class="col-sm-8 col-6 text-capitalize"><span>{{ $official->licence }}</span>
                                    </div>
                                </div>
                                <div class="row mb-2 mt-3">
                                    <div class="col-sm-4 col-6">
                                        <h5 class="f-w-500">Position <span class="pull-end">:</span>
                                        </h5>
                                    </div>
                                    <div class="col-sm-8 col-6 text-capitalize"><span>{{ $official->position }}</span>
                                    </div>
                                </div>
                                <div class="row mb-2 mt-3">
                                    <div class="col-sm-4 col-6">
                                        <h5 class="f-w-500">Place & Date of Birth: <span class="pull-end">:</span>
                                        </h5>
                                    </div>
                                    <div class="col-sm-8 col-6 text-capitalize"><span>{{ $official->birthPlace }}, {{ $official->birthDate }}</span>
                                    </div>
                                </div>
                                <div class="row mb-2 mt-3">
                                    <div class="col-sm-4 col-6">
                                        <h5 class="f-w-500">Zone <span class="pull-end">:</span>
                                        </h5>
                                    </div>
                                    <div class="col-sm-8 col-6 text-capitalize"><span>{{ $official->zone }}</span>
                                    </div>
                                </div>
                                <div class="row mb-2 mt-3">
                                    <div class="col-sm-4 col-6">
                                        <h5 class="f-w-500">Status <span class="pull-end">:</span>
                                        </h5>
                                    </div>
                                    <div class="col-sm-8 col-6 text-capitalize"><span>
                                        @if ($official->status == 'terima')
                                            <span class="badge badge-pill badge-primary">Terima</span>
                                        @elseif ($official->status == 'proses')
                                            <span class="badge badge-pill badge-warning">Proses</span>
                                        @elseif ($official->status == 'tolak')
                                            <span class="badge badge-pill badge-danger">Tolak</span>
                                        @endif
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-blog">
                            <h5 class="text-primary d-inline">Official Document</h5>
                            <div class="profile-personal-info">
                                @if ($official->licence_photo)
                                <div class="mb-3 row mt-3">
                                    <h3 class="text-center">Licence Photo</h3>
                                    <div class="col-12">
                                        <img src="{{ asset('storage/'. $official->licence_photo) }}" class="img-fluid mt-4 mb-2 w-100" />
                                    </div>
                                </div>
                                @else
                                <div class="alert alert-warning solid alert-rounded mt-3">
                                    <b>No Document Here!</b>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection