@extends('layout.erp.app')
@section('page')
<div class="card-title">
    <h4 class="mb-0">Show Details</h4>
    <a href="{{url('admin/customer')}}" class="btn btn-primary mb-2 btn-sm float-right">View all</a>
</div>
<div class="table-responsive">
    <table id="example2" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <td>{{$customer->id}}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{$customer->name}}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{$customer->email}}</td>
            </tr>
            <tr>
                <th>Photo</th>
                <td>{{$customer->photo}}</td>
            </tr>
            <tr>
                <th>Mobile</th>
                <td>{{$customer->mobile}}</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>{{$customer->address}}</td>
            </tr>
        </thead>
    </table>
</div>
@endsection
