@extends('layouts.main')

@section('section')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">All Data of Official</h4>
                <div class="d-flex">
                    <a href="/official-data/official-pdf" class="btn btn-outline-info btn-xs me-2" target="_blank">Print Official <span class="btn-icon-end"><i class="fa fa-print"></i></span>
                    </a>
                    <a href="/official-data/add" class="btn btn-outline-primary btn-xs">Add Official <span class="btn-icon-end"><i class="fa fa-plus"></i></span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataClubOfficials" class="display" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Licence</th>
                                <th>Place & Date of Birth</th>
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