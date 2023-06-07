@if (count($model->detail_zone) > 0)
    @foreach ($model->detail_zone as $item)
    {{ $item->age_group()->withTrashed()->first()->age }}
    @endforeach
@else
    <span class="text-danger">Haven't selected a age group yet</span>
@endif