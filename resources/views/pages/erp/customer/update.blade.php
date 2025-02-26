@extends('layout.erp.app')
@section('page')

<form action="{{ url('admin/customer/'.$customer->id) }}" method="POST" enctype="multipart/form-data">

    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card radius-15 border-lg-top-primary">
                <div class="card-body p-5">
                    <div class="card-title">

                            <h4 class="mb-0 text-primary">Update Customer</h4>

                    </div>
                    <br>
                    <hr />
                    <div class="form-body">
                            <div>
                                <input type="hidden" name="id" value="{{$customer->id}}">
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" value="{{$customer->name}}" class="form-control radius-30" />
                                @error('name')
                                    <span style="color: red">{{$message}}</span>
                                @enderror
                            </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" value="{{$customer->email}}" class="form-control radius-30" />
                            @error('email')
                                    <span style="color: red">{{$message}}</span>
                            @enderror
                        </div>
                        {{-- <div class="form-group">
                            <label>Password</label>
                            <input type="text" name="password" value="{{$customer->password}}" class="form-control radius-30" />
                            @error('password')
                                    <span style="color: red">{{$message}}</span>
                            @enderror
                        </div> --}}
                        <div class="form-group">
                            <label>Mobile</label>
                            <input type="text" name="mobile" value="{{$customer->mobile}}" class="form-control radius-30" />
                            @error('mobile')
                                    <span style="color: red">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" value="{{$customer->address}}" class="form-control radius-30" />
                            @error('address')
                                    <span style="color: red">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Photo</label>
                            <div style="display: flex; align-items: center; gap: 10px;">
                                <!-- File Input -->
                                <input type="file" name="photo" class="form-control radius-30" id="photoInput">
                                <input type="hidden" name="prev_photo" value="{{$customer->photo}}">

                                <!-- Preview Image -->
                                <img id="photoPreview" width="70"
                                     src="{{ asset('assets/images/' . $customer->photo) }}"
                                     alt="Customer Photo">
                            </div>

                            @error('photo')
                                <span style="color: red">{{ $message }}</span>
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
