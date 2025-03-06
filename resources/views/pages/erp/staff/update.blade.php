@extends('layout.erp.app')
@section('page')
    <form action="{{ url('admin/staff/'.$staff->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card radius-15 border-lg-top-primary">
                    <div class="card-body p-5">
                        <div class="card-title">

                                <h4 class="mb-0 text-primary">Update {{$staff->name}} Details</h4>
                                <a href="{{url('admin/staff')}}" class="btn btn-primary mb-2 btn-sm float-right">View all</a>

                        </div>
                        <br>
                        <hr />
                        <div class="form-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" value="{{$staff->name}}" class="form-control radius-30" />
                                @error('name')
                                    <span style="color: red">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Select Department</label>
                                <select name="department_id" id="">
                                    {{-- <option value="{{$staff->department->id}}">{{$staff->department->title}}</option> --}}
                                    <option value="0">--Select Department--</option>
                                    @forelse ($departments as $department)
                                        <option @if ($staff->id==$department->id) selected  @endif value="{{$department->id}}">{{$department->title}}</option>
                                    @empty
                                        <div>data empty</div>
                                    @endforelse
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Photo</label>
                                <div class="row" >
                                    <div class="col-md-8">
                                        <input type="file" name="photo" class="form-control radius-30" id="photoInput"/>
                                        <input type="hidden" name="prev_photo" value="{{$staff->photo}}">
                                        @error('photo')
                                                <span style="color: red">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4" >
                                        <img id="photoPreview" width="70"
                                     src="{{ asset('storage/images/' . $staff->photo) }}"
                                     alt="staff Photo">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Bio</label>
                                <textarea name="bio" class="form-control radius-30" rows="10">{{ $staff->bio }}</textarea>
                                @error('bio')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- <div class="form-group">
                                <label>Salary_type: </label>
                                <input type="radio" name="salary_type" @if ($staff->salary_type=='daily') checked  @endif id="daily" value="daily">Daily
                                <input type="radio" name="salary_type" @if ($staff->salary_type=='monthly') checked  @endif id="monthly" value="monthly">Monthly
                                @error('salary_type')
                                    <span style="color: red">{{$message}}</span>
                                @enderror
                            </div> --}}
                            <div class="form-group">
                                <label>Salary Type: </label>
                                <input type="radio" name="salary_type" id="daily" value="daily"
                                    {{ old('salary_type', $staff->salary_type) == 'daily' ? 'checked' : '' }}> Daily

                                <input type="radio" name="salary_type" id="monthly" value="monthly"
                                    {{ old('salary_type', $staff->salary_type) == 'monthly' ? 'checked' : '' }}> Monthly

                                @error('salary_type')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Salary_amount</label>
                                <input type="number" name="salary_amount" value="{{$staff->salary_amount}}" class="form-control radius-30" />
                                @error('salary_amount')
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
