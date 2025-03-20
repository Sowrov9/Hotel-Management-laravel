@extends('layout.erp.app')
@section('page')
<div class="card-title">
    <h4 class="mb-0">Show Details</h4>
    <a href="{{url('admin/booking')}}" class="btn btn-primary mb-2 btn-sm float-right">View all</a>
</div>
<div class="table-responsive">
    <table id="example2" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <td>{{$booking->id}}</td>
            </tr>
            <tr>
                <th>Customer</th>
                <td>{{$booking->customer->name}}</td>
            </tr>
            <tr>
                <th>Room Type</th>
                <td>{{$booking->room->roomType->title}}</td>
            </tr>
            <tr>
                <th>Room</th>
                <td>{{$booking->room->title}}</td>
            </tr>
            <tr>
                <th>Checkin Date</th>
                <td>{{$booking->checkin_date}}</td>
            </tr>
            <tr>
                <th>Checkout Date</th>
                <td>{{$booking->checkout_date}}</td>
            </tr>
            <tr>
                <th>Total Adult</th>
                <td>{{$booking->total_adult}}</td>
            </tr>
            <tr>
                <th>Total Children</th>
                <td>{{$booking->total_children}}</td>
            </tr>
        </thead>
    </table>
</div>
@endsection
