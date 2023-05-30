@extends('layouts.main')

@section('section')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">All Data of Player</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataPlayers" class="display" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Player</th>
                                <th>Club</th>
                                <th>NIK</th>
                                <th>NISN</th>
                                <th>Phone</th>
                                <th>Place of Birth</th>
                                <th>Date of Birth</th>
                                <th>Zone</th>
                                <th>Address</th>
                                <th>Position</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection