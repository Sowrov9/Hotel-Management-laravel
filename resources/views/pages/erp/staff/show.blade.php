@extends('layout.erp.app')
@section('page')
    <div class="card-title">
        <h4 class="mb-0">Show Details</h4>
        <a href="{{ url('admin/staff') }}" class="btn btn-primary mb-2 btn-sm float-right">View all</a>
    </div>
    <div class="table-responsive">
        <table id="example2" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <td>{{ $staff->id }}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $staff->name }}</td>
                </tr>
                <tr>
                    <th>Department</th>
                    <td>{{ $staff->department > title }}</td>
                </tr>
                <tr>
                    <th>Photo</th>
                    <img src="{{ asset('storage/images/' . $img->img_src) }}" alt="{{ $staff->name }}" width="100px" height="100px">

                </tr>
                <tr>
                    <th>Bio</th>
                    <td>{{ $staff->bio }}</td>
                </tr>
                <tr>
                    <th>Salary_type</th>
                    <td>{{ $staff->salary_type }}</td>
                </tr>
                <tr>
                    <th>Salary_amount</th>
                    <td>{{ $staff->salary_amount }}</td>
                </tr>

            </thead>
        </table>
    </div>
@endsection
