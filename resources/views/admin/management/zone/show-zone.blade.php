@extends('layouts.main')

@section('section')
<div class="row">
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
</div>
@endsection