@extends('layouts.main')

@section('section')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">All Data of Official</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataOfficials" class="display" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Club</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Zone</th>
                                <th>Licence</th>
                                <th>Date of Birth</th>
                                <th>Validator</th>
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