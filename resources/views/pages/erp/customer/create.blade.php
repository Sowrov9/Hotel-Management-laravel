@extends('layout.erp.app')
@section('page')
    <form action="{{ url('admin/customer') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card radius-15 border-lg-top-primary">
                    <div class="card-body p-5">
                        <div class="card-title">

                                <h4 class="mb-0 text-primary">Create Customer</h4>
                                <a href="{{url('admin/customer')}}" class="btn btn-primary mb-2 btn-sm float-right">View all</a>

                        </div>
                        <br>
                        <hr />
                        <div class="form-body">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" value="{{old('name')}}" class="form-control radius-30" />
                                    @error('name')
                                        <span style="color: red">{{$message}}</span>
                                    @enderror
                                </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" value="{{old('email')}}" class="form-control radius-30" />
                                @error('email')
                                        <span style="color: red">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" value="{{old('password')}}" class="form-control radius-30" />
                                @error('password')
                                        <span style="color: red">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Mobile</label>
                                <input type="text" name="mobile" value="{{old('mobile')}}" class="form-control radius-30" />
                                @error('mobile')
                                        <span style="color: red">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" value="{{old('address')}}" class="form-control radius-30" />
                                @error('address')
                                        <span style="color: red">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Photo</label>
                                <input type="file" name="photo" value="{{old('photo')}}" class="form-control radius-30" />
                                @error('photo')
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
