@extends("layout.erp.app")
@section('page')
<div class="card">
    <div class="card-body">
        <div class="card-title">
            <h4 class="mb-0">Roomtypes</h4>
            <a href="{{url('admin/roomtype/create')}}" class="btn btn-primary mb-2 btn-sm float-right">Add New Room</a>
        </div>
        <br>
        <hr/>
        <div class="table-responsive">
            <table id="example2" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Details</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                        @forelse ($roomtypes as $roomtype)
                            <tr>
                                <td>{{$roomtype->id}}</td>
                                <td>{{$roomtype->title}}</td>
                                <td>{{$roomtype->details}}</td>
                                <td>
                                    <a href="{{url('admin/roomtype/'.$roomtype->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                    <a href="{{url('admin/roomtype/'.$roomtype->id.'/edit')}}" class="btn btn-secondary"> <i class="fa fa-edit"></i></a>
                                    <a href="{{url('admin/roomtype/delete/'.$roomtype->id)}}" class="btn btn-danger"> <i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @empty
                            <div>Data not found</div>
                        @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Description</th>
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
