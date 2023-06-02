@extends('layouts.main')

@section('section')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Player Identity</h4>
            </div>
            <div class="card-body">
                <div class="form-validation">
                    <form action="/player/{{ $player->slug }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="name">Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter a name.." required value="{{ old('name', $player->name) }}">
                                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="nik">NIK <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" placeholder="Enter a NIK.." required value="{{ old('nik', $player->nik) }}">
                                        @error('nik')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="nisn">NISN
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control @error('nisn') is-invalid @enderror" id="nisn" name="nisn" placeholder="Enter a NISN.." required value="{{ old('nisn', $player->nisn) }}">
                                        @error('nisn')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="phone">Phone
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Enter a phone.." required value="{{ old('phone', $player->phone) }}">
                                        @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="phone">Place & Date of Birth
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-3">
                                        <input type="text" class="form-control @error('birthPlace') is-invalid @enderror" id="birthPlace" name="birthPlace" placeholder="Place Of Birth" required value="{{ old('birthPlace', $player->birthPlace) }}">
                                        @error('birthPlace')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="col-lg-3">
                                        <input name="birthDate" class="datepicker-default form-control" id="datepicker" value="{{ old('birthDate', $player->birthDate) }}" placeholder="Date Of Birth">
                                        @error('birthDate')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="address">Address <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="5" placeholder="Enter a address.." required>{{ old('address', $player->address) }}</textarea>
                                        @error('address')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="position">Position
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="default-select wide form-control" id="position" name="position">
                                            <option data-display="Select">Please select</option>
                                            <option value="kiper" {{ $player->position == 'kiper' ? 'selected' : '' }}>Kiper</option>
                                            <option value="anchor" {{ $player->position == 'anchor' ? 'selected' : '' }}>Anchor</option>
                                            <option value="flank" {{ $player->position == 'flank' ? 'selected' : '' }}>Flank</option>
                                            <option value="pivot" {{ $player->position == 'pivot' ? 'selected' : '' }}>Pivot</option>
                                        </select>
                                        @error('position')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="club">Club
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="default-select wide form-control text-capitalize" id="club" name="club_id">
                                            <option data-display="Select">Please select</option>
                                            @foreach ($clubs as $club)
                                            <option value="{{ $club->id }}" {{ $player->club_id == $club->id ? 'selected' : '' }}>{{ $club->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('club_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="age">Age Group
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <div id="age-group-data" data-id="{{ $player->slug }}"></div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="photo">Player Photo
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <div class="form-file">
                                                <input type="file" name="photo" id="photo" onchange="previewImage()" class="form-file-input form-control">
                                            </div>
                                        </div>
                                        @error('photo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        <div class="col-12">
                                            @if ($player->photo)
                                                <img src="{{ asset('storage/'. $player->photo) }}" class="img-preview img-fluid mt-3 col-sm-5" />
                                            @else
                                                <img src="{{ asset('/') }}images/profile/profile-2.png" class="img-preview img-fluid mt-3 col-sm-5" />
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 row">
                                    <div class="col-lg-8 ms-auto">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection