@extends('admin_layout')

@section('admin_content')
    
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                   Thêm Slider
                </header>
                <div class="panel-body">

                    <div class="position-center">
                        @foreach( $edit_slider as $key => $slider)

                        <form role="form" action="{{URL('/update-slider/'.$slider->slider_id)}}" method="post" enctype="multipart/form-data">
                            @if(Session::get('success'))
                            <div class="alert alert-primary">
                               {{ Session::get('success') }}
                            </div>
                            @endif

                            @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên slide</label>
                            <input type="text" name="slider_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục" value="{{$slider->slider_name}}">
                            <span class="text-danger">@error('slider_name'){{ $message }} @enderror</span>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh</label>
                            <input type="file" name="slider_image" class="form-control" id="exampleInputEmail1" placeholder="Slide">
                            <img src="{{URL::to('storage/'.$slider->slider_image)}}" height="100" width="100">
                            <span class="text-danger">@error('slider_image'){{ $message }} @enderror</span>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả slider</label>
                            <textarea style="resize: none" rows="8" class="form-control" name="slider_desc" id="exampleInputPassword1" placeholder="Mô tả danh mục">{{$slider->slider_name}}</textarea>
                            <span class="text-danger">@error('slider_desc'){{ $message }} @enderror</span>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Status</label>
                              <select name="slider_status" class="form-control input-sm m-bot15">
                                   <option value="0">Ẩn</option>
                                    <option value="1">Hiển thị</option>
                                    
                            </select>
                        </div>
                       
                        <button type="submit" name="add_slider" class="btn btn-info">Thêm slider</button>
                        </form>
                        @endforeach
                    </div>

                </div>
            </section>

    </div>



@endsection