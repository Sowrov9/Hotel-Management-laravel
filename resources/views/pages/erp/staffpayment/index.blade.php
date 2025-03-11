@extends("layout.erp.app")
@section('page')
<div class="card">
    @if (session('success'))
        <div class="alert alert-success" id="success-alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="card-body">
        <div class="card-title">
            <h4 class="mb-0">Payment details of {{$staff->name}}</h4>
            <a href="{{url('admin/staff/payment/'.$staff_id.'/add')}}" class="btn btn-primary mb-2 btn-sm float-right">Add New Payment</a>
        </div>
        <br>
        <hr/>
        <div class="table-responsive">
            <table id="example2" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Amount</th>
                        <th>Payment Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                        @forelse ($payments as $payment)
                            <tr>
                                <td>{{$payment->id}}</td>
                                <td>{{$payment->amount}}</td>
                                <td>{{$payment->payment_date}}</td>
                                <td>
                                    <a onclick="return confirm('Are you sure to delete the data?')" href="{{url('admin/staff/payment/'.$payment->id.'/'.$staff_id.'/delete')}}" class="btn btn-danger"> <i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @empty
                            <div>Data not found</div>
                        @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Amount</th>
                        <th>Payment Date</th>
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

        $(document).ready(function() {
                setTimeout(function() {
                    $('#success-alert').fadeOut('slow');
                }, 3000); // 3 seconds
            });
    });
</script>
<!-- App JS -->
<script src="assets/js/app.js"></script>
@endsection
@endsection
