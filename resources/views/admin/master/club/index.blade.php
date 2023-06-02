@extends('layouts.main')

@section('section')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">All Data of Club</h4>
                <a href="/club/add" class="btn btn-outline-primary btn-xs">Add Club <span class="btn-icon-end"><i class="fa fa-plus"></i></span>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataClubs" class="display" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Club</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Manager</th>
                                <th>Zone</th>
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