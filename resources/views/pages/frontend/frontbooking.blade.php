@extends('pages.frontend.frontlayout');
@section('content')
    <div class="container my-4">
    <h3>Booking</h3>
    @if (Session::has('success'))
        <p class="text-success">{{Session('success')}}</p>
    @endif
    <form action="{{ url('admin/booking') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card radius-15 border-lg-top-primary">
                    <div class="card-body p-5">
                        <div class="card-title">
                            <h4 class="mb-0 text-primary">Booking</h4>
                        </div>
                        <br>
                        <hr />
                        <div class="form-body">

                            <div class="form-group">
                                <label>Check-in Date</label><span class="text-danger">*</span>
                                <input type="date" name="checkin_date" value="{{old('checkin_date')}}" class="form-control radius-30 checkin_date" />
                                @error('checkin_date')
                                    <span style="color: red">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Check-out Date</label><span class="text-danger">*</span>
                                <input type="date" name="checkout_date" value="{{old('checkout_date')}}" class="form-control radius-30 checkout_date" />
                                @error('checkout_date')
                                    <span style="color: red">{{$message}}</span>
                                @enderror
                            </div>

                            {{-- <div class="form-group">
                                <label>Select Room Type</label><span class="text-danger">*</span>
                                <select name="room_type_id" id="room_type_id" class="form-control radius-30">
                                    <option value="0">-- Select Room Type --</option>
                                    @foreach ($roomtypes as $roomtype)
                                        <option value="{{$roomtype->id}}">{{$roomtype->title}}</option>
                                    @endforeach
                                </select>
                                @error('room_type_id')
                                    <span style="color: red">{{$message}}</span>
                                @enderror
                            </div> --}}

                            <div class="form-group">
                                <label>Available Rooms</label><span class="text-danger">*</span>
                                <select name="room_id" id="room_list" class="form-control radius-30">
                                    <option value="0">-- Select Available Room --</option>
                                </select>
                                @error('room_id')
                                    <span style="color: red">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Total Adult</label><span class="text-danger">*</span>
                                <input type="number" name="total_adult" value="{{old('total_adult')}}" class="form-control radius-30" />
                                @error('total_adult')
                                    <span style="color: red">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Total Children</label>
                                <input type="number" name="total_children" value="{{old('total_children')}}" class="form-control radius-30" />
                                @error('total_children')
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

</div>
@endsection
