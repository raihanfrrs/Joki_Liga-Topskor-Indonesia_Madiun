<div class="row page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $title }}</a></li>
        @if(request()->is(Request::segment(1)."/*"))
            <a href="{{ url()->previous() }}" class="breadcrumb-item">{{ $subtitle }}</a>
            <li class="breadcrumb-item"><a href="javascript:void(0)">{{ Str::ucfirst(request()->segment(count(request()->segments()))) }}</a></li>
        @else
            <li class="breadcrumb-item"><a href="javascript:void(0)">{{ isset($subtitle) ? $subtitle : Str::ucfirst(request()->segment(count(request()->segments()))) }}</a></li>
        @endif
    </ol>
</div>