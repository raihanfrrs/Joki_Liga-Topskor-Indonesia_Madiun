<div class="d-flex">
    <a href="/club/{{ $model->slug }}/edit" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
    <form action="/club/{{ $model->slug }}" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger shadow btn-xs sharp me-1"><i class="fa fa-trash"></i></button>
    </form>
    <a href="/club/{{ $model->slug }}/details" class="btn btn-secondary shadow btn-xs sharp"><i class="fa fa-eye"></i></a>
</div>