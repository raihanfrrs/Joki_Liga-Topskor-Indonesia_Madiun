@extends('layouts.main')

@section('section')
    @if (auth()->user()->level == 'admin')
        @include('admin.dashboard.index')
    @elseif (auth()->user()->level == 'user')
        @include('user.dashboard.index')
    @endif
@endsection