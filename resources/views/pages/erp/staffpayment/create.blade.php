@extends('layout.erp.app')
@section('page')
    <form action="{{ url('admin/staff/payment/'.$staff_id) }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card radius-15 border-lg-top-primary">
                    <div class="card-body p-5">
                        <div class="card-title">

                                <h4 class="mb-0 text-primary">Create {{$staff->name}} Payment</h4>
                                <p>Name: {{$staff->name}}</p>
                                <p>Department: {{$staff->department->title}}</p>
                                <p>Salary type: {{$staff->salary_type}}</p>
                                <p>Salary amount: {{$staff->salary_amount}}</p>
                                <a href="{{url('admin/staff/payment/'.$staff_id)}}" class="btn btn-primary mb-2 btn-sm float-right">View all</a>

                        </div>
                        <br>
                        <hr />
                        <div class="form-body">
                                <div class="form-group">

                                    <label>Amount</label>
                                    <input type="text" name="amount" value="{{old('amount')}}" class="form-control radius-30" />
                                    @error('amount')
                                        <span style="color: red">{{$message}}</span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="date" name="payment_date" value="{{old('payment_date')}}" class="form-control radius-30" />
                                    @error('payment_date')
                                        <span style="color: red">{{$message}}</span>
                                    @enderror
                                </div>

                            <button type="submit" class="btn btn-primary px-5 radius-30">Create</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
@endsection
