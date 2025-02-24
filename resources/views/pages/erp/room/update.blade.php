@extends('layout.erp.app')
@section('page')
    <form action="{{ url('admin/room/'.$room->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card radius-15 border-lg-top-primary">
                    <div class="card-body p-5">
                        <div class="card-title">

                                <h4 class="mb-0 text-primary">Update Room</h4>
                                <a href="{{url('admin/room')}}" class="btn btn-primary mb-2 btn-sm float-right">View all</a>

                        </div>
                        <br>
                        <hr />
                        <div class="form-body">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" value="{{$room->title}}" class="form-control radius-30" />
                                    @error('title')
                                        <span style="color: red">{{$message}}</span>
                                    @enderror
                                </div>

                            <div class="form-group">
                                <label>Select Room Type</label>
                                <select name="room_type_id" id="">
                                    <option value="$room->roomType->id">{{$room->roomType->title}}</option>
                                    @forelse ($roomtypes as $roomtype)
                                        <option value="{{$roomtype->id}}">{{$roomtype->title}}</option>
                                    @empty
                                        <div>data empty</div>
                                    @endforelse
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary px-5 radius-30">Update</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
@endsection
