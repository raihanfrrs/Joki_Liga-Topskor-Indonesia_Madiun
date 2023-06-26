@extends('layouts.main')

@section('section')
<div class="row">
    <div class="col-xl-4">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-blog">
                            <h5 class="text-primary d-inline">Player Photo</h5>
                            @if ($player->photo)
                                <img src="{{ asset('storage/'. $player->photo) }}" class="img-fluid mt-4 mb-2 w-100" />
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
                            <h5 class="text-primary d-inline">Player Information</h5>
                            <div class="profile-personal-info">
                                <div class="row mb-2 mt-3">
                                    <div class="col-sm-4 col-6">
                                        <h5 class="f-w-500">Name <span class="pull-end">:</span>
                                        </h5>
                                    </div>
                                    <div class="col-sm-8 col-6 text-capitalize"><span>{{ $player->name }}</span>
                                    </div>
                                </div>
                                <div class="row mb-2 mt-3">
                                    <div class="col-sm-4 col-6">
                                        <h5 class="f-w-500">NISN <span class="pull-end">:</span>
                                        </h5>
                                    </div>
                                    <div class="col-sm-8 col-6 text-capitalize"><span>{{ $player->nisn }}</span>
                                    </div>
                                </div>
                                <div class="row mb-2 mt-3">
                                    <div class="col-sm-4 col-6">
                                        <h5 class="f-w-500">NIK <span class="pull-end">:</span>
                                        </h5>
                                    </div>
                                    <div class="col-sm-8 col-6 text-capitalize"><span>{{ $player->nik }}</span>
                                    </div>
                                </div>
                                <div class="row mb-2 mt-3">
                                    <div class="col-sm-4 col-6">
                                        <h5 class="f-w-500">Phone <span class="pull-end">:</span>
                                        </h5>
                                    </div>
                                    <div class="col-sm-8 col-6 text-capitalize"><span>{{ $player->phone }}</span>
                                    </div>
                                </div>
                                <div class="row mb-2 mt-3">
                                    <div class="col-sm-4 col-6">
                                        <h5 class="f-w-500">Age Group <span class="pull-end">:</span>
                                        </h5>
                                    </div>
                                    <div class="col-sm-8 col-6 text-capitalize"><span>{{ $player->age_group->age }}</span>
                                    </div>
                                </div>
                                <div class="row mb-2 mt-3">
                                    <div class="col-sm-4 col-6">
                                        <h5 class="f-w-500">Position <span class="pull-end">:</span>
                                        </h5>
                                    </div>
                                    <div class="col-sm-8 col-6 text-capitalize"><span>{{ $player->position }}</span>
                                    </div>
                                </div>
                                <div class="row mb-2 mt-3">
                                    <div class="col-sm-4 col-6">
                                        <h5 class="f-w-500">Place & Date of Birth: <span class="pull-end">:</span>
                                        </h5>
                                    </div>
                                    <div class="col-sm-8 col-6 text-capitalize"><span>{{ $player->birthPlace }}, {{ $player->birthDate }}</span>
                                    </div>
                                </div>
                                <div class="row mb-2 mt-3">
                                    <div class="col-sm-4 col-6">
                                        <h5 class="f-w-500">Zone <span class="pull-end">:</span>
                                        </h5>
                                    </div>
                                    <div class="col-sm-8 col-6 text-capitalize"><span>{{ $player->zone }}</span>
                                    </div>
                                </div>
                                <div class="row mb-2 mt-3">
                                    <div class="col-sm-4 col-6">
                                        <h5 class="f-w-500">Status <span class="pull-end">:</span>
                                        </h5>
                                    </div>
                                    <div class="col-sm-8 col-6 text-capitalize"><span>
                                        @if ($player->status == 'terima')
                                            <span class="badge badge-pill badge-primary">Terima</span>
                                        @elseif ($player->status == 'proses')
                                            <span class="badge badge-pill badge-warning">Proses</span>
                                        @elseif ($player->status == 'tolak')
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
                            <h5 class="text-primary d-inline">Player Document</h5>
                            <div class="profile-personal-info">
                                @if ($player->akte || $player->kk || $player->photo_nisn)
                                <div class="mb-3 row mt-3">
                                    <h3 class="text-center">Akte</h3>
                                    <div class="col-12 ">
                                        <iframe src="{{ asset('storage/'. $player->akte) }}" class="w-100" style="height: 15vw;" frameborder="1"></iframe>
                                    </div>
                                </div>
                                <div class="mb-3 row mt-3">
                                    <h3 class="text-center">Kartu Keluarga</h3>
                                    <div class="col-12">
                                        <iframe src="{{ asset('storage/'. $player->kk) }}" class="w-100" style="height: 15vw;" frameborder="1"></iframe>
                                    </div>
                                </div>
                                <div class="mb-3 row mt-3">
                                    <h3 class="text-center">NISN</h3>
                                    <div class="col-12">
                                        <iframe src="{{ asset('storage/'. $player->photo_nisn) }}" class="w-100" style="height: 15vw;" frameborder="1"></iframe>
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