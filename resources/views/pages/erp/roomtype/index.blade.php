@extends("layout.erp.app")
@section('page')
<div class="card">
    {{-- @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif --}}
    @if (session('success'))
        <div class="alert alert-success" id="success-alert">
            {{ session('success') }}
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                setTimeout(function() {
                    $('#success-alert').fadeOut('slow');
                }, 3000); // 3 seconds
            });
        </script>
    @endif



    <div class="card-body">
        <div class="card-title">
            <h4 class="mb-0">Roomtypes</h4>
            <a href="{{url('admin/roomtype/create')}}" class="btn btn-primary mb-2 btn-sm float-right">Add New Room Type</a>
        </div>
        <br>
        <hr/>
        <div class="table-responsive">
            <table id="example2" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Details</th>
                        <th>Gallery Images</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                        @forelse ($roomtypes as $roomtype)
                            <tr>
                                <td>{{$roomtype->id}}</td>
                                <td>{{$roomtype->title}}</td>
                                <td>{{$roomtype->price}}</td>
                                <td>{{$roomtype->details}}</td>
                                <td>{{count($roomtype->roomtypeimages)}}</td>
                                <td>
                                    <a href="{{url('admin/roomtype/'.$roomtype->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                    <a href="{{url('admin/roomtype/'.$roomtype->id.'/edit')}}" class="btn btn-secondary"> <i class="fa fa-edit"></i></a>
                                    <a onclick="return confirm('Are you sure to delete the data?')" href="{{url('admin/roomtype/'.$roomtype->id.'/delete')}}" class="btn btn-danger"> <i class="fa fa-trash"></i></a>
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
                        <th>Price</th>
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
