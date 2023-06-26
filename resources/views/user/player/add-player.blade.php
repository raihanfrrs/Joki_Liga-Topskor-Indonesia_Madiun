@extends('layouts.main')

@section('section')
<form action="/player-data" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Player Identity</h4>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="name">Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter a name.." required value="{{ old('name') }}">
                                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="nisn">NISN
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control @error('nisn') is-invalid @enderror" id="nisn" name="nisn" placeholder="Enter a NISN.." required value="{{ old('nisn') }}">
                                        @error('nisn')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="phone">NIK
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" placeholder="Enter a NIK.." required value="{{ old('nik') }}">
                                        @error('nik')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="phone">Phone
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Enter a phone.." required value="{{ old('phone') }}">
                                        @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="age">Age Group
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @foreach ($ages as $age)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input me-0" type="radio" name="age_group_id" value="{{ $age->id }}" {{ old('age_group_id') == $age->id ? 'checked' : '' }}>
                                            <label class="form-check-label">
                                                {{ $age->age }}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="position">Position
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="default-select wide form-control" id="position" name="position">
                                            <option data-display="Select">Please select</option>
                                            <option value="kiper" {{ old('position') == 'kiper' ? 'selected' : '' }}>Kiper</option>
                                            <option value="anchor" {{ old('position') == 'anchor' ? 'selected' : '' }}>Anchor</option>
                                            <option value="flank" {{ old('position') == 'flank' ? 'selected' : '' }}>Flank</option>
                                            <option value="pivot" {{ old('position') == 'pivot' ? 'selected' : '' }}>Pivot</option>
                                        </select>
                                        @error('position')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="phone">Place & Date of Birth
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-3">
                                        <input type="text" class="form-control @error('birthPlace') is-invalid @enderror" id="birthPlace" name="birthPlace" placeholder="Place Of Birth" required value="{{ old('birthPlace') }}">
                                        @error('birthPlace')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="col-lg-3">
                                        <input name="birthDate" class="datepicker-default form-control" id="datepicker" value="{{ old('birthDate') }}" placeholder="Date Of Birth">
                                        @error('birthDate')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="address">Address <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                        <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="5" placeholder="Enter a address.." required>{{ old('address') }}</textarea>
                                        @error('address')<div class="invalid-feedback">{{ $message }}</div>@enderror
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
                                            <img src="{{ asset('/') }}images/profile/profile-2.png" class="img-preview img-fluid mt-3 col-sm-5" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Player Document</h4>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="akte">Akte
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <div class="form-file">
                                                <input type="file" name="akte" id="iframe" onchange="previewIframe()" class="form-file-input form-control">
                                            </div>
                                        </div>
                                        @error('akte')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        <div class="col-12">
                                            <iframe id="previewFrame" width="400" height="300" class="mt-3"></iframe>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="kk">Kartu Keluarga
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <div class="form-file">
                                                <input type="file" name="kk" id="second_iframe" onchange="previewSecondIframe()" class="form-file-input form-control">
                                            </div>
                                        </div>
                                        @error('kk')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        <div class="col-12">
                                            <iframe id="second_previewFrame" width="400" height="300" class="mt-3"></iframe>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="photo">NISN
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <div class="form-file">
                                                <input type="file" name="photo_nisn" id="third_iframe" onchange="previewThirdIframe()" class="form-file-input form-control">
                                            </div>
                                        </div>
                                        @error('photo_nisn')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        <div class="col-12">
                                            <iframe id="third_previewFrame" width="400" height="300" class="mt-3"></iframe>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection