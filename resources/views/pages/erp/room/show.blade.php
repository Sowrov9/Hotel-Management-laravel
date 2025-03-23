@extends('layout.erp.app')
@section('page')
<div class="card-title">
    <h4 class="mb-0">Show Details</h4>
    <a href="{{url('admin/room')}}" class="btn btn-primary mb-2 btn-sm float-right">View all</a>
</div>
<div class="table-responsive">
    <table id="example2" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <td>{{$room->id}}</td>
            </tr>
            <tr>
                <th>Title</th>
                <td>{{$room->title}}</td>
            </tr>
            <tr>
                <th>Room Type</th>
                <td>{{$room->roomtype->title}}</td>
            </tr>
            <tr>
                <th>Bed</th>
                <td>{{$room->bed}}</td>
            </tr>
            <tr>
                <th>Bath</th>
                <td>{{$room->bath}}</td>
            </tr>
            <tr>
                <th>Balcony</th>
                <td>{{$room->balcony}}</td>
            </tr>
            <tr>
                <th>Photo</th>
                <td>
                    <img src="{{ asset('storage/images/rooms/'.$room->photo) }}" alt="{{ $room->title }}" width="100px" height="100px">

                </td>
            </tr>
            <tr>
                <th>Price</th>
                <td>{{$room->price}}</td>
            </tr>
        </thead>
    </table>
</div>
@endsection
