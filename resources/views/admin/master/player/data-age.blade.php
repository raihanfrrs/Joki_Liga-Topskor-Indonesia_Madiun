@if ($model->age_group_id)
    {{ $model->age_group()->withTrashed()->first()->age }}
@else
    <span class="text-danger">Haven't selected a age group yet</span>
@endif