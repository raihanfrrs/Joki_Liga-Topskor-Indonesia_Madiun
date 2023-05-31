@foreach ($model->detail_zone as $item)
    {{ $item->age_group()->withTrashed()->first()->age }}
@endforeach