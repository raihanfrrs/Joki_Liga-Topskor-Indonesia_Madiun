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
                                <h1 class="text-capitalize">{{ $club->name }}</h1>
                                <p>Club Manager: <span class="item fw-bold text-capitalize">{{ $club->club_manager }}</span></p>
                                <p>Number of Players: <span class="item fw-bold"> {{ $club->player()->withTrashed()->count() }} </span> </p>
                                <p>Phone: <span class="item fw-bold"> {{ $club->phone }} </span> </p>
                                <p>Zone: <span class="item fw-bold text-capitalize">{{ $club->zone()->withTrashed()->first()->zone ? $club->zone()->withTrashed()->first()->zone : "Haven't selected a zone yet" }}</span></p>
                                <p>Social Media: <span class="item fw-bold"><a href="{{ $club->social_media }}" target="_blank">{{ $club->social_media }}</a></span></p>
                                <p>Address: <span class="item fw-bold">{{ $club->address }}</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection