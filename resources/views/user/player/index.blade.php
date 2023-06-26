@extends('layouts.main')

@section('section')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">All Data of Player</h4>
                <a href="/player-data/add" class="btn btn-outline-primary btn-xs">Add Player <span class="btn-icon-end"><i class="fa fa-plus"></i></span>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataClubPlayers" class="display" style="min-width: 845px">
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
                                <th>Status</th>
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