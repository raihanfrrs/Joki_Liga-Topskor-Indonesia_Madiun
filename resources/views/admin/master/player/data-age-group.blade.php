<div class="mb-3 mb-0">
    @foreach ($ages as $item)
    <label class="radio-inline me-3"><input type="radio" name="age_group_id" value="{{ $item->age_group->id }}" {{ $player->age_group_id == $item->age_group->id ? 'checked' : '' }}> {{ $item->age_group->age }}</label>
    @endforeach
</div>
@error('age_group_id')<div class="invalid-feedback">{{ $message }}</div>@enderror