@extends('layouts.main')

@section('section')
<div class="row">
    @foreach ($players as $player)
    <div class="col-xl-3 col-lg-6 col-sm-6">
        <div class="card">
            <div class="card-body">
                <div class="new-arrival-product">
                    <div class="new-arrivals-img-contnent">
                        @if ($player->photo)
                            <img src="{{ asset('storage/'. $player->photo) }}" class="img-fluid" />
                        @else
                            <img src="{{ asset('/') }}images/profile/profile-2.png" class="img-fluid" />
                        @endif
                    </div>
                    <div class="new-arrival-content text-center mt-3">
                        <h3 class="text-capitalize"><a href="/player/{{ $player->slug }}/details" target="_blank">{{ $player->name }}</a></h3>
                        <span class="price">{{ $player->club()->withTrashed()->first()->name }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection