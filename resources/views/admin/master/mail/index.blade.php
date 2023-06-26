@extends('layouts.main')

@section('section')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">All Data of Mail</h4>
                <a href="/mail/add" class="btn btn-outline-primary btn-xs">Add Mail <span class="btn-icon-end"><i class="fa fa-plus"></i></span>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataMails" class="display" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Uploaded</th>
                                <th>Created At</th>
                                <th>Last Updated</th>
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