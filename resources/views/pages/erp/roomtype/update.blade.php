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
                                <label>Price</label>
                                <input type="text" name="price" value="{{$roomtype->price}}" class="form-control radius-30" />
                                @error('price')
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
                        <div class="form-group">
                            <label>Gallery</label>
                            <div>
                                <input type="file" name="imgs[]" class="form-control radius-30" multiple /> <!-- Added "multiple" -->

                                @error('imgs.*') <!-- Updated error validation -->
                                    <span style="color: red">{{ $message }}</span>
                                @enderror

                                {{-- <table>
                                    <tr>
                                        @foreach ($roomtype->roomtypeimages as $img)
                                            <td>
                                                <img src="{{ asset('storage/images/').$img->img_src }}" alt="" width="100px" height="100px">
                                            </td>
                                        @endforeach
                                    </tr>
                                </table> --}}
                                <table>
                                    <tr>
                                        @foreach ($roomtype->roomtypeimages as $img)
                                            <td class="imgcol{{$img->id}}">
                                                <img src="{{ asset('storage/images/' . $img->img_src) }}" alt="{{ $roomtype->title }}" width="100px" height="100px">
                                                <p><button type="button" onclick="return confirm('Are you sure to delete the photo?')" class="btn btn-danger btn-sm m-2 delete-image" roomtype-image-id={{$img->id}}><i class="fa-solid fa-trash"></i></button></p>
                                            </td>
                                        @endforeach
                                    </tr>
                                </table>

                            </div>
                        </div>



                        <button type="submit" class="btn btn-primary px-5 radius-30">Update</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</form>
@section('scripts')
    <script>
        $(document).ready(function(){
            $(".delete-image").on('click',function(){
                // console.log("Hello delete");
                var _img_id=$(this).attr('roomtype-image-id');
                var vm=$(this);
                $.ajax({
                    url:"{{url('admin/roomtypeimage/"+_img_id+"/delete')}}",
                    type:"get",
                    dataType:"json",
                    beforesend:function(){
                        vm.addclass('disabled');
                    }
                    success:function(res){
                        console.log('res');
                        $(".imgcol"+_img_id).remove();
                        vm.removeclass('disabled');

                    }
                    error:function(err){

                    }
                })

            })
        })
    </script>
@endsection
@endsection
