@if ($model->status == 'terima')
    <span class="badge badge-pill badge-primary">Terima</span>
@elseif ($model->status == 'proses')
    <span class="badge badge-pill badge-warning">Proses</span>
@elseif ($model->status == 'tolak')
    <span class="badge badge-pill badge-danger">Tolak</span>
@endif