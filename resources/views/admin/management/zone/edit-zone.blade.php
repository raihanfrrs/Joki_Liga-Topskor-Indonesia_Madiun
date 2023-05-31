@extends('layouts.main')

@section('section')
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Zone</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="/zone/{{ $zone->id }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="age">Zone</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('zone') is-invalid @enderror" id="zone" name="zone" autocomplete="off" required placeholder="Madiun" value="{{ old('zone', $zone->zone) }}">
                                @error('zone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="age">Age Group</label>
                            <div class="col-sm-9">
                                @foreach ($ages as $item)
                                <div class="form-check mb-2">
                                    <input type="checkbox" class="form-check-input" id="{{ $item->age }}" name="age[]" value="{{ $item->id }}" @foreach ($zone->detail_zone as $detail_zone) @if(old('age', $detail_zone->age_group_id) == $item->id) checked @endif @endforeach>
                                    <label class="form-check-label" for="{{ $item->age }}">{{ $item->age }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection