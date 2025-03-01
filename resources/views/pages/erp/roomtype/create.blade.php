@extends('layout.erp.app')
@section('page')
    <form action="{{ url('admin/roomtype') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card radius-15 border-lg-top-primary">
                    <div class="card-body p-5">
                        <div class="card-title">

                                <h4 class="mb-0 text-primary">Create Roomtype</h4>
                                <a href="{{url('admin/roomtype')}}" class="btn btn-primary mb-2 btn-sm float-right">View all</a>

                        </div>
                        <br>
                        <hr />
                        <div class="form-body">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" value="{{old('title')}}" class="form-control radius-30" />
                                    @error('title')
                                        <span style="color: red">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="number" name="price" value="{{old('price')}}" class="form-control radius-30" />
                                    @error('price')
                                        <span style="color: red">{{$message}}</span>
                                    @enderror
                                </div>

                            <div class="form-group">
                                <label>Details</label>
                                <input type="text" name="details" value="{{old('details')}}" class="form-control radius-30" />
                                @error('details')
                                        <span style="color: red">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Gallery</label>
                                <input type="file" multiple name="imgs[]" class="form-control radius-30" />
                                @error('imgs')
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
