@extends('layout.erp.app')
@section('page')

<form action="{{ url('admin/booking/'.$booking->id) }}" method="POST">

    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card radius-15 border-lg-top-primary">
                <div class="card-body p-5">
                    <div class="card-title">

                            <h4 class="mb-0 text-primary">Update Booking</h4>

                    </div>
                    <br>
                    <hr />
                    <div class="form-body">
                            <div>
                                <input type="hidden" name="id" value="{{$booking->id}}">
                            </div>

                            <div class="form-group">
                                <label>Select Customer</label><span class="text-danger">*</span>
                                <select name="customer_id" id="">
                                    <option value="$booking->customer->id">{{$booking->customer->name}}</option>
                                    @forelse ($customers as $customer)
                                        <option value="{{$customer->id}}">{{$customer->name}}</option>
                                    @empty
                                        <div>data empty</div>
                                    @endforelse
                                </select>
                            </div>


                            <div class="form-group">
                                <label>Check-in Date</label><span class="text-danger">*</span>
                                <input type="date" name="checkin_date" value="{{$booking->checkin_date}}" class="form-control radius-30 checkin_date" />
                                @error('checkin_date')
                                    <span style="color: red">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Check-out Date</label><span class="text-danger">*</span>
                                <input type="date" name="checkout_date" value="{{$booking->checkout_date}}" class="form-control radius-30 checkout_date" />
                                @error('checkout_date')
                                    <span style="color: red">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Select Room Type</label><span class="text-danger">*</span>
                                <select name="room_type_id" id="room_type_id" class="form-control radius-30">
                                    <option value="{{$booking->room->roomType->id}}">{{$booking->room->roomType->title}}</option>
                                    @foreach ($roomtypes as $roomtype)
                                        <option value="{{$roomtype->id}}">{{$roomtype->title}}</option>
                                    @endforeach
                                </select>
                                @error('room_type_id')
                                    <span style="color: red">{{$message}}</span>
                                @enderror
                            </div>

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
                                <input type="number" name="total_adult" value="{{$booking->total_adult}}" class="form-control radius-30" />
                                @error('total_adult')
                                    <span style="color: red">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Total Children</label>
                                <input type="number" name="total_children" value="{{$booking->total_children}}" class="form-control radius-30" />
                                @error('total_children')
                                    <span style="color: red">{{$message}}</span>
                                @enderror
                            </div>





                        <button type="submit" class="btn btn-primary px-5 radius-30">Update</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</form>
 <!-- jQuery for Live Image Preview -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script>
 $(document).ready(function(){
     $('#photoInput').change(function(e){
         let reader = new FileReader();
         reader.onload = function(event){
             $('#photoPreview').attr('src', event.target.result);
         };
         reader.readAsDataURL(e.target.files[0]);
     });
 });
 </script>

@endsection
