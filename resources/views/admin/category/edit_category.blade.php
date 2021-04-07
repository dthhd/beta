@extends('admin_layout')

@section('admin_content')
    
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                   Thêm Danh mục
                </header>
                <br>
                <div class="panel-body">

                    <div class="position-center">
                        @foreach( $edit_category as $key => $category)
                        <form role="form" action="{{URL('/update-category/'.$category->category_id)}}" method="post" enctype="multipart/form-data">
                            @if(Session::get('success'))
                            <div class="alert alert-primary">
                               {{ Session::get('success') }}
                            </div>
                            @endif

                            @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Danh mục</label>
                            <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục" value={{$category->category_name}}>
                            <span class="text-danger">@error('category_name'){{ $message }} @enderror</span>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả Danh mục</label>
                            <textarea style="resize: none" rows="8" class="form-control" name="category_desc" id="exampleInputPassword1" placeholder="Mô tả danh mục">{{$category->category_desc}}</textarea>
                            <span class="text-danger">@error('category_desc'){{ $message }} @enderror</span>
                        </div>category
                        <div class="form-group">
                            <label for="exampleInputPassword1">Status</label>
                              <select name="category_status" class="form-control input-sm m-bot15">
                                   <option value="0">Ẩn</option>
                                    <option value="1">Hiển thị</option>
                            </select>
                        </div>
                       
                        <button type="submit" name="add_slider" class="btn btn-info">Thêm Danh mục</button>
                        </form>
                        @endforeach
                    </div>

                </div>
            </section>

    </div>



@endsection