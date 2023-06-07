<div class="mb-3 mb-0">
    @if ($ages->count() > 0)
        @foreach ($ages as $item)
        <label class="radio-inline me-3"><input type="radio" name="age_group_id" value="{{ $item->age_group->id }}" {{ $player->age_group_id == $item->age_group->id ? 'checked' : '' }}> {{ $item->age_group->age }}</label>
        @endforeach
    @else
    <span class="text-danger">This club doesn't have age group, <br> please <a href="/age" class="text-danger text-decoration-underline">insert age group!</a></span>
    @endif
</div>
@error('age_group_id')<div class="invalid-feedback">{{ $message }}</div>@enderror