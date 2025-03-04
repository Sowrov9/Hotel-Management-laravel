@extends('layout.erp.app')
@section('page')
    <form action="{{ url('admin/department') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card radius-15 border-lg-top-primary">
                    <div class="card-body p-5">
                        <div class="card-title">

                                <h4 class="mb-0 text-primary">Create Department</h4>
                                <a href="{{url('admin/department')}}" class="btn btn-primary mb-2 btn-sm float-right">View all</a>

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
                                    <label>Details</label>
                                    <input type="text" name="details" value="{{old('details')}}" class="form-control radius-30" />
                                    @error('details')
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
