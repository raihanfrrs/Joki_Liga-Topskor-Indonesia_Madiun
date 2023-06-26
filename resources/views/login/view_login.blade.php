@extends('layouts.main')

@section('guest-section')
<div class="authincation h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-md-6">
                <div class="authincation-content">
                    <div class="row no-gutters">
                        <div class="col-xl-12">
                            <div class="auth-form">
                                <div class="text-center mb-3">
                                    <a href="/"><img src="{{ asset('/') }}images/logo-afkot.jpg" alt="Logo PSSI" class="img-fluid w-75"></a>
                                </div>
                                <h4 class="text-center mb-4">Hey! Let's go to work.</h4>
                                <form action="/login" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="mb-1" for="email"><strong>Username</strong></label>
                                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="text" value="{{ old('username') }}" required>
                                        @error('username')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="mb-1" for="password"><strong>Password</strong></label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" required>
                                        @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection