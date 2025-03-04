@extends('layout.erp.app')
@section('page')
<div class="card-title">
    <h4 class="mb-0">Show {{$department->title}} Details</h4>
    <a href="{{url('admin/department')}}" class="btn btn-primary mb-2 btn-sm float-right">View all</a>
</div>
<div class="table-responsive">
    <table id="example2" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <td>{{$department->id}}</td>
            </tr>
            <tr>
                <th>Title</th>
                <td>{{$department->title}}</td>
            </tr>
            <tr>
                <th>Details</th>
                <td>{{$department->details}}</td>
            </tr>
        </thead>
    </table>
</div>
@endsection
