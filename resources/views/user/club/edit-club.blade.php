@extends('layouts.main')

@section('section')
<form action="/club-data/{{ $club->slug ? $club->slug : $club->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Club Identity</h4>
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
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter a name.." required value="{{ old('name', $club->name) }}">
                                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="phone">Phone
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Enter a phone.." required value="{{ old('phone', $club->phone) }}">
                                        @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="social_media">Social Media (Url)
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control @error('social_media') is-invalid @enderror" id="social_media" name="social_media" placeholder="Enter a social media.." required value="{{ old('social_media', $club->social_media) }}">
                                        @error('social_media')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="address">Address <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                        <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="5" placeholder="Enter a address.." required>{{ old('address', $club->address) }}</textarea>
                                        @error('address')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="club_manager">Club Proprietor
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="club_manager" name="club_manager" placeholder="Enter a Club Proprietor.." required value="{{ old('name', $club->club_manager) }}">
                                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="photo">Club Photo
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <div class="form-file">
                                                <input type="file" name="logo" id="photo" onchange="previewImage()" class="form-file-input form-control">
                                            </div>
                                        </div>
                                        @error('logo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        <div class="col-12">
                                            @if ($club->logo)
                                                <img src="{{ asset('storage/'. $club->logo) }}" class="img-preview img-fluid mt-3 col-sm-5" />
                                            @else
                                                <img src="{{ asset('/') }}images/profile/profile-2.png" class="img-preview img-fluid mt-3 col-sm-5" />
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
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Club Document</h4>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="surat_rekomendasi">Surat Rekomendasi
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <div class="form-file">
                                                <input type="file" name="surat_rekomendasi" id="surat_rekomendasi" class="form-file-input form-control">
                                            </div>
                                        </div>
                                        @error('surat_rekomendasi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="surat_pendirian">Surat Pendirian
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <div class="form-file">
                                                <input type="file" name="surat_pendirian" id="surat_pendirian" class="form-file-input form-control">
                                            </div>
                                        </div>
                                        @error('surat_pendirian')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="surat_kepengurusan">Surat Kepengurusan
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <div class="form-file">
                                                <input type="file" name="surat_kepengurusan" id="surat_kepengurusan" class="form-file-input form-control">
                                            </div>
                                        </div>
                                        @error('surat_kepengurusan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="susunan_pemain">Susunan Pemain
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <div class="form-file">
                                                <input type="file" name="susunan_pemain" id="susunan_pemain" class="form-file-input form-control">
                                            </div>
                                        </div>
                                        @error('susunan_pemain')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="surat_perpindahan">Surat Perpindahan
                                        <span class="text-danger">*optional</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <div class="form-file">
                                                <input type="file" name="surat_perpindahan" id="surat_perpindahan" class="form-file-input form-control">
                                            </div>
                                        </div>
                                        @error('surat_perpindahan')<div class="invalid-feedback">{{ $message }}</div>@enderror
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