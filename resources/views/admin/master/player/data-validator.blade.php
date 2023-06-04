<select name="status" id="statusPlayer" class="default-select form-control wide" data-key="{{ $model->slug }}">
    <option value="terima" {{ $model->status == 'terima' ? 'selected' : '' }}>Terima</option>
    <option value="proses" {{ $model->status == 'proses' ? 'selected' : '' }}>Proses</option>
    <option value="tolak" {{ $model->status == 'tolak' ? 'selected' : '' }}>Tolak</option>
</select>