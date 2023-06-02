@extends('layouts.main')

@section('section')
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Club Account</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="/club" method="POST">
                        @csrf
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="username">Username
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" autocomplete="off" required placeholder="Username" value="{{ old('username') }}">
                                @error('username')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="password">Password
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" autocomplete="off" required placeholder="Password">
                                @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
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