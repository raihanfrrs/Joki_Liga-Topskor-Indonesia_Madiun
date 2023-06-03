<a href="/age/{{ $model->id }}/edit" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
<form action="/age/{{ $model->id }}" method="post" class="d-inline">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger shadow btn-xs sharp me-1"><i class="fa fa-trash"></i></button>
</form>
<a href="/age/{{ $model->id }}/details" class="btn btn-secondary shadow btn-xs sharp"><i class="fa fa-eye"></i></a>