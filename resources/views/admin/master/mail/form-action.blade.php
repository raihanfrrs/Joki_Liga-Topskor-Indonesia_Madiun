<div class="d-flex justify-content-center">
    <a href="/mail/{{ $model->id }}/edit" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
    <form action="/mail/{{ $model->id }}" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger shadow btn-xs sharp me-1"><i class="fa fa-trash"></i></button>
    </form>
    <a href="/mail/{{ $model->id }}/download" class="btn btn-info shadow btn-xs sharp"><i class="fa fa-download"></i></a>
</div>