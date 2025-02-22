@extends('layout.erp.app')
@section('page')
<div class="card-title">
    <h4 class="mb-0">Show Details</h4>
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
                <th>Details</th>
                <td>{{$roomtype->details}}</td>
            </tr>
        </thead>
    </table>
</div>
@endsection
