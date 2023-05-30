@if ($model->zone)
    {{ $model->zone->zone }}
@else
    Haven't selected a zone yet
@endif