@extends('layout.erp.app')
@section('page')
    
<form action="{{ url('admin/roomtype/'.$roomtype->id) }}" method="POST">

    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card radius-15 border-lg-top-primary">
                <div class="card-body p-5">
                    <div class="card-title">

                            <h4 class="mb-0 text-primary">Update Roomtype</h4>

                    </div>
                    <br>
                    <hr />
                    <div class="form-body">
                            <div>
                                <input type="hidden" name="id" value="{{$roomtype->id}}">
                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" value="{{$roomtype->title}}" class="form-control radius-30" />
                                @error('title')
                                    <span style="color: red">{{$message}}</span>
                                @enderror
                            </div>

                        <div class="form-group">
                            <label>Details</label>
                            <input type="text" name="details" value="{{$roomtype->details}}" class="form-control radius-30" />
                            @error('details')
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

@endsection