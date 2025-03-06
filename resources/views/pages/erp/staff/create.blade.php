@extends('layout.erp.app')
@section('page')
    <form action="{{ url('admin/staff') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card radius-15 border-lg-top-primary">
                    <div class="card-body p-5">
                        <div class="card-title">

                                <h4 class="mb-0 text-primary">Create Staff</h4>
                                <a href="{{url('admin/staff')}}" class="btn btn-primary mb-2 btn-sm float-right">View all</a>

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
                                    <label>Select Department</label>
                                    <select name="department_id" id="">
                                        <option value="0">--Select Department--</option>
                                        @forelse ($departments as $department)
                                            <option value="{{$department->id}}">{{$department->title}}</option>
                                        @empty
                                            <div>data empty</div>
                                        @endforelse
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Photo</label>
                                    <input type="file" name="photo" class="form-control radius-30" />
                                    @error('photo')
                                            <span style="color: red">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Bio</label>
                                    <textarea name="bio" id="" cols="30" value="{{old('bio')}}" class="form-control radius-30" rows="10"></textarea>
                                    @error('bio')
                                        <span style="color: red">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Salary_type: </label>
                                    <input type="radio" name="salary_type" id="daily" value="daily">Daily
                                    <input type="radio" name="salary_type" id="monthly" value="monthly">Monthly
                                    @error('salary_type')
                                        <span style="color: red">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Salary_amount</label>
                                    <input type="number" name="salary_amount" value="{{old('salary_amount')}}" class="form-control radius-30" />
                                    @error('salary_amount')
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
