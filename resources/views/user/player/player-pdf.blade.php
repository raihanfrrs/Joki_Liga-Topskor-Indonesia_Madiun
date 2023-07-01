<link rel="stylesheet" href="{{ asset('/') }}css/style-pdf.css">

@foreach ($data as $player)
<div class="col-6">
    <div class="container border">
        <div class="row">
            <div class="col-12">
                <img src="{{ asset('/') }}images/header/player.jpg" alt="" class="img-fluid">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12 text-center text-capitalize">
                <h3>{{ $player->name }}</h3>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <table class="table" style="color: black !important;">
                    <tr>
                      <th>TTL:</th>
                      <td>{{ $player->birthPlace }}, {{ $player->birthDate }}</td>
                    </tr>
                    <tr>
                      <th>Posisi:</th>
                      <td>{{ $player->position }}</td>
                    </tr>
                    <tr>
                      <th>NISN:</th>
                      <td>{{ $player->nisn }}</td>
                    </tr>
                    <tr>
                      <th>NIK:</th>
                      <td>{{ $player->nik }}</td>
                    </tr>
                    <tr>
                      <th>Klub:</th>
                      <td>{{ $player->club->name }}</td>
                    </tr>
                </table>
            </div>
        </div>

    </div>
</div>
@endforeach