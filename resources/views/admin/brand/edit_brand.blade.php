@extends('admin_layout')

@section('admin_content')
    
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                   Thêm brand
                </header>
                <div class="panel-body">

                    <div class="position-center">
                        @foreach( $edit_brand as $key => $brand)

                        <form role="form" action="{{URL('/update-brand/'.$brand->brand_id)}}" method="post" enctype="multipart/form-data">
                            @if(Session::get('success'))
                            <div class="alert alert-primary">
                               {{ Session::get('success') }}
                            </div>
                            @endif

                            @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên brand</label>
                            <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục" value="{{$brand->brand_name}}">
                            <span class="text-danger">@error('brand_name'){{ $message }} @enderror</span>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh</label>
                            <input type="file" name="brand_image" class="form-control" id="exampleInputEmail1" placeholder="brand">
                            <img src="{{URL::to('storage/'.$brand->brand_image)}}" height="100" width="100">
                            <span class="text-danger">@error('brand_image'){{ $message }} @enderror</span>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả brand</label>
                            <textarea style="resize: none" rows="8" class="form-control" name="brand_desc" id="exampleInputPassword1" placeholder="Mô tả danh mục">{{$brand->brand_name}}</textarea>
                            <span class="text-danger">@error('brand_desc'){{ $message }} @enderror</span>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Status</label>
                              <select name="brand_status" class="form-control input-sm m-bot15">
                                   <option value="0">Ẩn</option>
                                    <option value="1">Hiển thị</option>
                                    
                            </select>
                        </div>
                       
                        <button type="submit" name="add_brand" class="btn btn-info">Thêm brand</button>
                        </form>
                        @endforeach
                    </div>

                </div>
            </section>

    </div>



@endsection