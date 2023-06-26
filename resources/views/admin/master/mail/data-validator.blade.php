<select name="status" id="statusMail" class="default-select form-control wide text-center" data-key="{{ $model->id }}">
    <option value="active" {{ $model->status == 'active' ? 'selected' : '' }}>Active</option>
    <option value="non-active" {{ $model->status == 'non-active' ? 'selected' : '' }}>Non-Active</option>
</select>