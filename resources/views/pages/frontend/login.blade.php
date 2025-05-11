@extends('pages.frontend.frontlayout')
@section('content')
<div class="container my-4">
    <h3>LogIn</h3>
    @if (Session::has('success'))
        <p class="text-success">{{Session('success')}}</p>
    @endif
    @if (Session::has('error'))
        <p class="text-danger">{{Session('error')}}</p>
    @endif
    <form action="{{url('customer/login')}}" method="POST">
        @csrf
        <table class="table table-bordered">
            <tr>
                <th>Email <span class="text-danger">*</span></th>
                <td><input required type="email" name="email" class="form-control"></td>
            </tr>
            <tr>
                <th>password <span class="text-danger">*</span></th>
                <td><input required type="password" name="password" class="form-control"></td>
            </tr>

            <tr>
                <td colspan="2"><input type="submit" class="btn btn-primary"></td>
            </tr>
        </table>
    </form>
</div>

@endsection
