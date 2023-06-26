@extends('layouts.main')

@section('section')
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Mail Document</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="/mail/{{ $mail->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="name">Name of File
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" autocomplete="off" required placeholder="Name" value="{{ old('name', $mail->name) }}">
                                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="file">File
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="file" name="file" required>
                                @error('file')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection