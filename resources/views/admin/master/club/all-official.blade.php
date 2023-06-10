@extends('layouts.main')

@section('section')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">All Official of {{ $club->name }}</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataOfficialofClub" class="display" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Licence</th>
                                <th>Place & Date of Birth</th>
                                <th>Validator</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($officials as $official)
                                <tr>
                                    <td>{{ $official->id }}</td>
                                    <td>{{ $official->name }}</td>
                                    <td>{{ $official->position }}</td>
                                    <td>{{ $official->email }}</td>
                                    <td>{{ $official->phone }}</td>
                                    <td>{{ $official->licence }}</td>
                                    <td>{{ $official->birthPlace }}, {{ $official->birthDate }}</td>
                                    <td>
                                        <select name="status" id="statusOfficial" class="default-select form-control wide" data-key="{{ $official->slug }}">
                                            <option value="terima" {{ $official->status == 'terima' ? 'selected' : '' }}>Terima</option>
                                            <option value="proses" {{ $official->status == 'proses' ? 'selected' : '' }}>Proses</option>
                                            <option value="tolak" {{ $official->status == 'tolak' ? 'selected' : '' }}>Tolak</option>
                                        </select>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="/official/{{ $official->slug }}/edit" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                            <form action="/official/{{ $official->slug }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger shadow btn-xs sharp me-1"><i class="fa fa-trash"></i></button>
                                            </form>
                                            <a href="/official/{{ $official->slug }}/details" class="btn btn-secondary shadow btn-xs sharp"><i class="fa fa-eye"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection