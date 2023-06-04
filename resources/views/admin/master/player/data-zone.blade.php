@if ($model->zone_id)
    {{ $model->zone()->withTrashed()->first()->zone }}
@else
    <span class="text-danger">Haven't selected a zone yet</span>
@endif