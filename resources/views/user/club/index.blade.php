@extends('layouts.main')

@section('section')
<div class="row">
    <div class="col-xl-4">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-blog">
                            <h5 class="text-primary d-inline">Club Logo</h5>
                            @if ($club->logo)
                                <img src="{{ asset('storage/'. $club->logo) }}" class="img-fluid mt-4 mb-2 w-100" />
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
                            <h5 class="text-primary d-inline">Club Information</h5>
                            <span class="float-end">
                                <a href="/club-data/{{ $club->slug ? $club->slug : $club->id }}/edit" class="btn btn-primary shadow btn-xs sharp me-1" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                            </span>
                            <div class="profile-personal-info">
                                <div class="row mb-2 mt-3">
                                    <div class="col-sm-4 col-6">
                                        <h5 class="f-w-500">Name <span class="pull-end">:</span>
                                        </h5>
                                    </div>
                                    <div class="col-sm-8 col-6 text-capitalize"><span>{{ $club->name ? $club->name : '-' }}</span>
                                    </div>
                                </div>
                                <div class="row mb-2 mt-3">
                                    <div class="col-sm-4 col-6">
                                        <h5 class="f-w-500">Phone <span class="pull-end">:</span>
                                        </h5>
                                    </div>
                                    <div class="col-sm-8 col-6 text-capitalize"><span>{{ $club->phone ? $club->phone : '-' }}</span>
                                    </div>
                                </div>
                                <div class="row mb-2 mt-3">
                                    <div class="col-sm-4 col-6">
                                        <h5 class="f-w-500">Zone <span class="pull-end">:</span>
                                        </h5>
                                    </div>
                                    <div class="col-sm-8 col-6 text-capitalize"><span>{{ $club->zone }}</span>
                                    </div>
                                </div>
                                <div class="row mb-2 mt-3">
                                    <div class="col-sm-4 col-6">
                                        <h5 class="f-w-500">Social Media <span class="pull-end">:</span>
                                        </h5>
                                    </div>
                                    <div class="col-sm-8 col-6 text-capitalize"><span><a href="{{ $club->social_media ? $club->social_media : '#' }}" target="_blank">@ {{ $club->name ? $club->name : '-' }}</a></span>
                                    </div>
                                </div>
                                <div class="row mb-2 mt-3">
                                    <div class="col-sm-4 col-6">
                                        <h5 class="f-w-500">Club Proprietor <span class="pull-end">:</span>
                                        </h5>
                                    </div>
                                    <div class="col-sm-8 col-6 text-capitalize"><span>{{ $club->club_manager ? $club->club_manager : '-' }}</span>
                                    </div>
                                </div>
                                <div class="row mb-2 mt-3">
                                    <div class="col-sm-4 col-6">
                                        <h5 class="f-w-500">Total Officials <span class="pull-end">:</span>
                                        </h5>
                                    </div>
                                    <div class="col-sm-8 col-6 text-capitalize"><span>{{ $club->official()->withTrashed()->count() }}</span>
                                    </div>
                                </div>
                                <div class="row mb-2 mt-3">
                                    <div class="col-sm-4 col-6">
                                        <h5 class="f-w-500">Total Players <span class="pull-end">:</span>
                                        </h5>
                                    </div>
                                    <div class="col-sm-8 col-6 text-capitalize"><span>{{ $club->player()->withTrashed()->count() }}</span>
                                    </div>
                                </div>
                                <div class="row mb-2 mt-3">
                                    <div class="col-sm-4 col-6">
                                        <h5 class="f-w-500">Address <span class="pull-end">:</span>
                                        </h5>
                                    </div>
                                    <div class="col-sm-8 col-6 text-capitalize"><span>{{ $club->address ? $club->address : '-' }}</span>
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
                            <h5 class="text-primary d-inline">Club Document</h5>
                            <div class="profile-personal-info">
                                @if (!$club->surat_rekomendasi && !$club->surat_pendirian && !$club->surat_kepengurusan && !$club->susunan_pemain && !$club->surat_perpindahan)
                                <div class="alert alert-warning solid alert-rounded mt-3">
                                    <b>No Document Here!</b>
                                </div> 
                                @endif

                                @if ($club->surat_rekomendasi)
                                <div class="mb-3 row mt-3">
                                    <h3 class="text-center">Surat Rekomendasi</h3>
                                    <div class="col-12">
                                        <iframe src="{{ asset('storage/'. $club->surat_rekomendasi) }}" class="w-100" style="height: 15vw;" frameborder="1"></iframe>
                                    </div>
                                </div>
                                @endif

                                @if ($club->surat_pendirian)
                                <div class="mb-3 row mt-3">
                                    <hr>
                                    <h3 class="text-center">Surat Pendirian</h3>
                                    <div class="col-12">
                                        <iframe src="{{ asset('storage/'. $club->surat_pendirian) }}" class="w-100" style="height: 15vw;" frameborder="1"></iframe>
                                    </div>
                                </div>
                                @endif

                                @if ($club->surat_kepengurusan)
                                <div class="mb-3 row mt-3">
                                    <hr>
                                    <h3 class="text-center">Surat Kepengurusan</h3>
                                    <div class="col-12">
                                        <iframe src="{{ asset('storage/'. $club->surat_kepengurusan) }}" class="w-100" style="height: 15vw;" frameborder="1"></iframe>
                                    </div>
                                </div>
                                @endif

                                @if ($club->susunan_pemain)
                                <div class="mb-3 row mt-3">
                                    <hr>
                                    <h3 class="text-center">Susunan Pemain</h3>
                                    <div class="col-12">
                                        <iframe src="{{ asset('storage/'. $club->susunan_pemain) }}" class="w-100" style="height: 15vw;" frameborder="1"></iframe>
                                    </div>
                                </div>
                                @endif

                                @if ($club->surat_perpindahan)
                                <div class="mb-3 row mt-3">
                                    <hr>
                                    <h3 class="text-center">Surat Perpindahan</h3>
                                    <div class="col-12">
                                        <iframe src="{{ asset('storage/'. $club->surat_perpindahan) }}" class="w-100" style="height: 15vw;" frameborder="1"></iframe>
                                    </div>
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