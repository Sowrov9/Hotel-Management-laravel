@extends("layout.erp.app")
@section('page')
<div class="card">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card-body">
        <div class="card-title">
            <h4 class="mb-0">Staff</h4>
            <a href="{{url('admin/staff/create')}}" class="btn btn-primary mb-2 btn-sm float-right">Add New Staff</a>
        </div>
        <br>
        <hr/>
        <div class="table-responsive">
            <table id="example2" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Photo</th>
                        <th>Bio</th>
                        <th>Salary Type</th>
                        <th>Salary Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                        @forelse ($staffs as $staff)
                            <tr>
                                <td>{{$staff->id}}</td>
                                <td>{{$staff->name}}</td>
                                <td>{{$staff->department->title}}</td>
                                <td>{{$staff->photo}}</td>
                                <td>{{$staff->bio}}</td>
                                <td>{{$staff->salary_type}}</td>
                                <td>{{$staff->salary_amount}}</td>
                                <td>
                                    <a href="{{url('admin/staff/'.$staff->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                    <a href="{{url('admin/staff/'.$staff->id.'/edit')}}" class="btn btn-secondary"> <i class="fa fa-edit"></i></a>
                                    <a onclick="return confirm('Are you sure to delete the data?')" href="{{url('admin/staff/'.$staff->id.'/delete')}}" class="btn btn-danger"> <i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @empty
                            <div>Data not found</div>
                        @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Photo</th>
                        <th>Bio</th>
                        <th>Salary Type</th>
                        <th>Salary Amount</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
{{-- data table --}}
@section('scripts')
<link href="{{asset('assets')}}/plugins/datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
	<link href="{{asset('assets')}}/plugins/datatable/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
<script src="{{asset('assets')}}/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        //Default data table
        $('#example').DataTable();
        var table = $('#example2').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
        });
        table.buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
    });
</script>
<!-- App JS -->
<script src="assets/js/app.js"></script>
@endsection
@endsection
