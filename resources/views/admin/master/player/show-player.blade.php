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
                                <h1 class="text-capitalize">{{ $player->name }}</h1>
                                <p>NISN: <span class="item fw-bold"> {{ $player->nisn }}</span></p>
                                <p>NIK: <span class="item fw-bold"> {{ $player->nik }} </span> </p>
                                <p>Phone: <span class="item fw-bold"> {{ $player->phone }} </span> </p>
                                <p>Club: <span class="item fw-bold text-capitalize">{{ $player->club()->withTrashed()->first()->name }}</span></p>
                                <p>Age Group: <span class="item fw-bold text-capitalize">{{ $player->age_group()->withTrashed()->first()->age }}</span></p>
                                <p>Position: <span class="item fw-bold text-capitalize">{{ $player->position }}</span></p>
                                <p>Place & Date of Birth: <span class="item fw-bold text-capitalize">{{ $player->birthPlace }} , {{ \Carbon\Carbon::parse($player->birthDate)->format('d F Y') }}</span></p>
                                <p>Address: <span class="item fw-bold">{{ $player->address }}</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection