@extends('layouts.main')

@section('section')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-3 col-lg-6  col-md-6 col-xxl-5 ">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade show active" id="first">
                                @if ($player->photo)
                                    <img src="{{ asset('storage/'. $player->photo) }}" class="img-fluid" />
                                @else
                                    <img src="{{ asset('/') }}images/profile/profile-2.png" class="img-fluid" />
                                @endif
                            </div>
                        </div>
                    </div>
                    <!--Tab slider End-->
                    <div class="col-xl-9 col-lg-6 col-md-6 col-xxl-7 col-sm-12">
                        <div class="product-detail-content">
                            <!--Product details-->
                            <div class="new-arrival-content pr">
                                <h1 class="text-capitalize mb-3">{{ $player->name }}</h1>
                                <div class="row mb-2">
                                    <div class="col-sm-2 col-6">
                                        <p>NISN: </p>
                                    </div>
                                    <div class="col-sm-10 col-6">
                                        <span class="item fw-bold"> {{ $player->nisn }}</span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-2 col-6">
                                        <p>NIK: </p>
                                    </div>
                                    <div class="col-sm-10 col-6">
                                        <span class="item fw-bold"> {{ $player->nik }} </span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-2 col-6">
                                        <p>Phone: </p>
                                    </div>
                                    <div class="col-sm-10 col-6">
                                        <span class="item fw-bold"> {{ $player->phone }} </span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-2 col-6">
                                        <p>Club: </p>
                                    </div>
                                    <div class="col-sm-10 col-6">
                                        <span class="item fw-bold text-capitalize">{{ $player->club()->withTrashed()->first()->name }}</span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-2 col-6">
                                        <p>Age Group: </p>
                                    </div>
                                    <div class="col-sm-10 col-6">
                                        <span class="item fw-bold text-capitalize">{{ $player->age_group()->withTrashed()->first()->age }}</span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-2 col-6">
                                        <p>Position: </p>
                                    </div>
                                    <div class="col-sm-10 col-6">
                                        <span class="item fw-bold text-capitalize">{{ $player->position }}</span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-2 col-6">
                                        <p>Place & Date of Birth: </p>
                                    </div>
                                    <div class="col-sm-10 col-6">
                                        <span class="item fw-bold text-capitalize">{{ $player->birthPlace }} , {{ \Carbon\Carbon::parse($player->birthDate)->format('d F Y') }}</span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-2 col-6">
                                        <p>Address: </p>
                                    </div>
                                    <div class="col-sm-10 col-6">
                                        <span class="item fw-bold">{{ $player->address }}</span>
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