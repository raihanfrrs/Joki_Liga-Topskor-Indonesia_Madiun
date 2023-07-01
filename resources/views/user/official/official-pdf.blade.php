<link rel="stylesheet" href="{{ asset('/') }}css/style-pdf.css">

@foreach ($data as $official)
<div class="col-6">
    <div class="container border">
        <div class="row">
            <div class="col-12">
                <img src="{{ asset('/') }}images/header/official.jpg" alt="" class="img-fluid">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12 text-center text-capitalize">
                <h3>{{ $official->name }}</h3>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <table class="table" style="color: black !important;">
                    <tr>
                      <th>Jabatan:</th>
                      <td>{{ $official->position }}</td>
                    </tr>
                    <tr>
                      <th>Lisensi:</th>
                      <td>{{ $official->licence }}</td>
                    </tr>
                    <tr>
                      <th>TTL:</th>
                      <td>{{ $official->birthPlace }}, {{ \Carbon\Carbon::parse($official->birthDate)->format('d-m-Y') }}</td>
                    </tr>
                    <tr>
                      <th>Klub:</th>
                      <td>{{ $official->club->name }}</td>
                    </tr>
                </table>
            </div>
        </div>

    </div>
</div>
@endforeach