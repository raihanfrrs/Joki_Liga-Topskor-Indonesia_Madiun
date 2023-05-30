@extends('layouts.main')

@section('section')
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Age Group</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="/age/{{ $age->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="age">Age Group</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('age') is-invalid @enderror" id="age" name="age" autocomplete="off" required placeholder="U-13" value="{{ old('age', $age->age) }}">
                                @error('age')<div class="invalid-feedback">{{ $message }}</div>@enderror
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