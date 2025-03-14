@extends('layout.erp.app')
@section('page')
    <form action="{{ url('admin/booking') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card radius-15 border-lg-top-primary">
                    <div class="card-body p-5">
                        <div class="card-title">

                                <h4 class="mb-0 text-primary">Booking</h4>
                                <a href="{{url('admin/booking')}}" class="btn btn-primary mb-2 btn-sm float-right">View all</a>

                        </div>
                        <br>
                        <hr />
                        <div class="form-body">
                            <div class="form-group">
                                <label>Select Customer</label><span class="text-danger">*</span>
                                <select name="customer_id" id="">
                                    <option value="0">--Select Customer--</option>
                                    @forelse ($customers as $customer)
                                        <option value="{{$customer->id}}">{{$customer->name}}</option>
                                    @empty
                                        <div>data empty</div>
                                    @endforelse
                                </select>
                                @error('customer_id')
                                        <span style="color: red">{{$message}}</span>
                                @enderror
                            </div>

                                <div class="form-group">
                                    <label>Checkin Date</label>
                                    <input type="date" name="checkin_date" value="{{old('checkin_date')}}" class="form-control radius-30 checkin_date" />
                                    @error('checkin_date')
                                        <span style="color: red">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Checkout Date</label>
                                    <input type="date" name="checkout_date" value="{{old('checkout_date')}}" class="form-control radius-30 checkout_date" />
                                    @error('checkout_date')
                                        <span style="color: red">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Available Rooms</label>
                                    <select name="room_id" id="" class="form-control radius-30 room-list">
                                        <option value="0">-- Available Rooms --</option>

                                    </select>
                                    @error('room_id')
                                            <span style="color: red">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Total Adult</label>
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

    @section('scripts')
        <script class="text/javascript">
            $(document).ready(function(){
                $(".checkin_date").on('blur',function(){
                    var _checkindate=$(this).val();
                    // console.log(_checkindate);
                    $.ajax({
                        type: "GET",
                        url: "{{url('admin/booking')}}/available-rooms/"+_checkindate,
                        // data: "{empid: " + empid + "}",
                        // contentType: "application/json; charset=utf-8",
                        dataType: "json",
                        beforeSend:function(){
                            $(".room-list").html('<option>-- Loading --</option>')
                        },
                        success: function(result){
                            // console.log(result);
                            var _html="";
                            $.each(result.data,function(index,row){
                                _html+='<option value="'+row.id+'">'+row.title+'</option>'
                            })
                            $(".room-list").html(_html);
                        }
                    });

                })
            })
        </script>
    @endsection
@endsection
