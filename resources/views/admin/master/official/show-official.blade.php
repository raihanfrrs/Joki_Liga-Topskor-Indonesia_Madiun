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
                                @if ($official->photo)
                                    <img src="{{ asset('storage/'. $official->photo) }}" class="img-fluid" />
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
                                <h1 class="text-capitalize mb-3">{{ $official->name }}</h1>
                                <div class="row mb-2">
                                    <div class="col-sm-2 col-6">
                                        <p>Phone: </p>
                                    </div>
                                    <div class="col-sm-10 col-6">
                                        <span class="item fw-bold"> {{ $official->phone }} </span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-2 col-6">
                                        <p>Email: </p>
                                    </div>
                                    <div class="col-sm-10 col-6">
                                        <span class="item fw-bold"> {{ $official->email }} </span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-2 col-6">
                                        <p>Club: </p>
                                    </div>
                                    <div class="col-sm-10 col-6">
                                        <span class="item fw-bold text-capitalize">{{ $official->club_id ? $official->club()->withTrashed()->first()->name : "-" }}</span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-2 col-6">
                                        <p>Position: </p>
                                    </div>
                                    <div class="col-sm-10 col-6">
                                        <span class="item fw-bold text-capitalize">{{ $official->position }}</span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-2 col-6">
                                        <p>Zone: </p>
                                    </div>
                                    <div class="col-sm-10 col-6">
                                        <span class="item fw-bold text-capitalize"> {{ $official->zone }} </span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-2 col-6">
                                        <p>Social Media: </p>
                                    </div>
                                    <div class="col-sm-10 col-6">
                                        <span class="item fw-bold text-capitalize"> {{ $official->social_media }} </span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-2 col-6">
                                        <p>Licence: </p>
                                    </div>
                                    <div class="col-sm-10 col-6">
                                        <span class="item fw-bold text-capitalize"> {{ $official->licence }} </span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-2 col-6">
                                        <p>Status:</p>
                                    </div>
                                    <div class="col-sm-10 col-6">
                                        @if ($official->status == 'terima')
                                            <span class="badge badge-success light text-capitalize"> {{ $official->status }} </span>
                                        @elseif ($official->status == 'proses')
                                            <span class="badge badge-warning light text-capitalize"> {{ $official->status }} </span>
                                        @elseif ($official->status == 'tolak')
                                            <span class="badge badge-danger light text-capitalize"> {{ $official->status }} </span>
                                        @endif
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