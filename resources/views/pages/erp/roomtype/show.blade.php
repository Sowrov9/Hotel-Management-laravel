@extends('layout.erp.app')
@section('page')
<div class="card-title">
    <h4 class="mb-0">Show Details</h4>
    <a href="{{url('admin/roomtype')}}" class="btn btn-primary mb-2 btn-sm float-right">View all</a>
</div>
<div class="table-responsive">
    <table id="example2" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <td>{{$roomtype->id}}</td>
            </tr>
            <tr>
                <th>Title</th>
                <td>{{$roomtype->title}}</td>
            </tr>
            <tr>
                <th>Price</th>
                <td>{{$roomtype->price}}</td>
            </tr>
            <tr>
                <th>Details</th>
                <td>{{$roomtype->details}}</td>
            </tr>
        </thead>
    </table>
</div>
@endsection
