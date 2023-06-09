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
                                @if ($club->logo)
                                    <img src="{{ asset('storage/'. $club->logo) }}" class="img-fluid" />
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
                                <h1 class="text-capitalize mb-3">{{ $club->name }}</h1>
                                <div class="row mb-2">
                                    <div class="col-sm-2 col-6">
                                        <p>Club Manager: </p>
                                    </div>
                                    <div class="col-sm-10 col-6">
                                        <span class="item fw-bold text-capitalize">{{ $club->club_manager }}</span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-2 col-6">
                                        <p>Number of Players: </p>
                                    </div>
                                    <div class="col-sm-10 col-6">
                                        <span class="item fw-bold"> {{ $club->player()->withTrashed()->count() }} </span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-2 col-6">
                                        <p>Phone: </p>
                                    </div>
                                    <div class="col-sm-10 col-6">
                                        <span class="item fw-bold"> {{ $club->phone }} </span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-2 col-6">
                                        <p>Zone: </p>
                                    </div>
                                    <div class="col-sm-10 col-6">
                                        <span class="item fw-bold text-capitalize">{{ $club->zone }}</span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-2 col-6">
                                        <p>Social Media: </p>
                                    </div>
                                    <div class="col-sm-10 col-6">
                                        <span class="item fw-bold"><a href="{{ $club->social_media }}" target="_blank">{{ $club->social_media }}</a></span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-2 col-6">
                                        <p>Address: </p>
                                    </div>
                                    <div class="col-sm-10 col-6">
                                        <span class="item fw-bold">{{ $club->address }}</span>
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