@if ($model->club_id)
    {{ $model->club()->withTrashed()->first()->name }}
@else
    <span class="text-danger">Haven't selected a club yet</span>
@endif