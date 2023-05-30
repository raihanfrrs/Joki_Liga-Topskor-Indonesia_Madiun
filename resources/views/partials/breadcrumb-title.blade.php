<div class="row page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $title }}</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">{{ isset($subtitle) ? Str::ucfirst($subtitle) : Str::ucfirst(request()->segment(count(request()->segments()))) }}</a></li>
    </ol>
</div>