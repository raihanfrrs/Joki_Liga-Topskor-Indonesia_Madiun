@extends('layouts.main')

@section('section')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Official Identity</h4>
            </div>
            <div class="card-body">
                <div class="form-validation">
                    <form action="/official-data" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="name">Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter a name.." required value="{{ old('name') }}">
                                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="phone">Phone
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Enter a phone.." required value="{{ old('phone') }}">
                                        @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="email">Email
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="email" name="email" placeholder="Enter a email.." required value="{{ old('email') }}">
                                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="social_media">Social Media
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control @error('social_media') is-invalid @enderror" id="social_media" name="social_media" placeholder="Enter a social media.." required value="{{ old('social_media') }}">
                                        @error('social_media')<div class="invalid-feedback">{{ $message }}</div>@enderror
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
                            </div>
                            <div class="col-xl-6">
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="position">Position <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control @error('position') is-invalid @enderror" id="position" name="position" placeholder="Enter a position.." required value="{{ old('position') }}">
                                        @error('position')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="licence">Licence
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control @error('licence') is-invalid @enderror" id="licence" name="licence" placeholder="Enter a licence.." required value="{{ old('licence') }}">
                                        @error('licence')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="second_photo">Licence Photo
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <div class="form-file">
                                                <input type="file" name="licence_photo" id="second_photo" onchange="previewSecondImage()" class="form-file-input form-control">
                                            </div>
                                        </div>
                                        @error('licence_photo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        <div class="col-12">
                                            <img class="second_img-preview img-fluid mt-3 col-sm-5" />
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="photo">Profile Photo
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
                                <div class="mt-3 row">
                                    <div class="col-lg-8 ms-auto">
                                        <button type="submit" class="btn btn-primary">Submit</button>
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