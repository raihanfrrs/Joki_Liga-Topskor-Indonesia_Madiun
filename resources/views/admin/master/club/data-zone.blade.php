@if ($model->zone)
    {{ $model->zone->zone }}
@else
    <span class="text-danger">Haven't selected a zone yet</span>
@endif