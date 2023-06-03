@extends('layouts.main')

@section('section')
<div class="row">
    @if (count($clubs) == 0)
        <div class="col-xl-12">
            <div class="alert alert-warning solid">
                <div class="media">
                    <div class="media-body">
                        <h5 class="mt-1 mb-1">Notifications</h5>
                        <p class="mb-0">Sorry, system would like to inform you that there are currently no clubs in this zone.</p>
                    </div>
                </div>
            </div>
        </div>
    @else
        @foreach ($clubs as $club)
        <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="new-arrival-product">
                        <div class="new-arrivals-img-contnent">
                            @if ($club->logo)
                                <img src="{{ asset('storage/'. $club->logo) }}" class="img-fluid" />
                            @else
                                <img src="{{ asset('/') }}images/profile/profile-2.png" class="img-fluid" />
                            @endif
                        </div>
                        <div class="new-arrival-content text-center mt-3">
                            <h3 class="text-capitalize"><a href="/club/{{ $club->slug }}/details" target="_blank">{{ $club->name }}</a></h3>
                            <span class="price">{{ $club->player()->withTrashed()->count() }} Players</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @endif
</div>
@endsection