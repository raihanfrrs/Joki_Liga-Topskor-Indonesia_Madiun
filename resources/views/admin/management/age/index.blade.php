@extends('layouts.main')

@section('section')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">All Data of Age Group</h4>
                <a href="/age/add" class="btn btn-outline-primary btn-xs">Add Age Group <span class="btn-icon-end"><i class="fa fa-plus"></i></span>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataAgeGroups" class="display" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Age Group</th>
                                <th>Total of Players</th>
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