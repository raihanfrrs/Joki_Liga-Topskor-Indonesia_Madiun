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
                    <table id="dataPlayerofClub" class="display" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Player</th>
                                <th>Age Group</th>
                                <th>NIK</th>
                                <th>NISN</th>
                                <th>Phone</th>
                                <th>Place & Date of Birth</th>
                                <th>Address</th>
                                <th>Position</th>
                                <th>Validator</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($players as $player)
                                <tr>
                                    <td>{{ $player->id }}</td>
                                    <td>{{ $player->name }}</td>
                                    <td>
                                        @if ($player->age_group_id)
                                            {{ $player->age_group()->withTrashed()->first()->age }}
                                        @else
                                            <span class="text-danger">Haven't selected a age group yet</span>
                                        @endif
                                    </td>
                                    <td>{{ $player->nik }}</td>
                                    <td>{{ $player->nisn }}</td>
                                    <td>{{ $player->phone }}</td>
                                    <td>{{ $player->birthPlace }}, {{ $player->birthDate }}</td>
                                    <td>{{ $player->address }}</td>
                                    <td>{{ $player->position }}</td>
                                    <td>
                                        <select name="status" id="statusPlayer" class="default-select form-control wide" data-key="{{ $player->slug }}">
                                            <option value="terima" {{ $player->status == 'terima' ? 'selected' : '' }}>Terima</option>
                                            <option value="proses" {{ $player->status == 'proses' ? 'selected' : '' }}>Proses</option>
                                            <option value="tolak" {{ $player->status == 'tolak' ? 'selected' : '' }}>Tolak</option>
                                        </select>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="/player/{{ $player->slug }}/edit" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                            <form action="/player/{{ $player->slug }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger shadow btn-xs sharp me-1"><i class="fa fa-trash"></i></button>
                                            </form>
                                            <a href="/player/{{ $player->slug }}/details" class="btn btn-secondary shadow btn-xs sharp"><i class="fa fa-eye"></i></a>
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