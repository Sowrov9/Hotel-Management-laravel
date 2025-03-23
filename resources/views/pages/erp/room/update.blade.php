@extends('layout.erp.app')
@section('page')
    <form action="{{ url('admin/room/'.$room->id) }}" method="POST" enctype="multipart/form-data">
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
                                <select name="room_type_id" id="" class="form-control">
                                    {{-- <option value="{{$room->roomType->id}}">{{$room->roomType->title}}</option> --}}
                                    @forelse ($roomtypes as $roomtype)
                                        <option value="{{$roomtype->id}}" @if ($roomtype->id == $room->room_type_id) selected @endif    >{{$roomtype->title}}</option>
                                    @empty
                                        <div>data empty</div>
                                    @endforelse
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Bed</label>
                                <input type="number" name="bed" value="{{$room->bed}}" class="form-control radius-30" />
                                @error('bed')
                                    <span style="color: red">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Bath</label>
                                <input type="number" name="bath" value="{{$room->bath}}" class="form-control radius-30" />
                                @error('bath')
                                    <span style="color: red">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Balcony</label>
                                <input type="number" name="balcony" value="{{$room->balcony}}" class="form-control radius-30" />
                                @error('balcony')
                                    <span style="color: red">{{$message}}</span>
                                @enderror
                            </div>
                            {{-- <div class="form-group">
                                <label>Photo</label>
                                <input type="file" name="photo" value="{{$room->photo}}" class="form-control radius-30" />
                                <img src="{{ asset('storage/images/rooms/' . $room->photo) }}"
                                                        alt="{{ $room->title }}" width="100px" height="100px">
                                @error('photo')
                                    <span style="color: red">{{$message}}</span>
                                @enderror
                            </div> --}}
                            <div class="form-group">
                                <label>Photo</label>
                                <div style="display: flex; align-items: center; gap: 10px;">
                                    <!-- File Input -->
                                    <input type="file" name="photo" class="form-control radius-30" id="photoInput">
                                    <input type="hidden" name="prev_photo" value="{{$room->photo}}">

                                    <!-- Preview Image -->
                                    <img id="photoPreview" width="70"
                                         src="{{ asset('storage/images/rooms/' . $room->photo) }}"
                                         alt="room Photo">
                                </div>

                                @error('photo')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" name="price" value="{{$room->price}}" class="form-control radius-30" />
                                @error('price')
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
