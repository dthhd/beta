@extends('admin_layout')

@section('admin_content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                  <tr>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Slug</th>
                    <th>Giá</th>
                    <th>Hình sản phẩm</th>
                    <th>Danh mục</th>
                    <th>Thương hiệu</th>
                    
                    <th>Hiển thị</th>
                    
                    <th style="width:30px;"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($show_product as $key => $pro)
                  <tr>
                    <td>{{ $pro->product_name }}</td>
                    <td>{{ $pro->product_quantity }}</td>
                    <td>{{ $pro->product_slug }}</td>
                    <td>{{ number_format($pro->product_price,0,',','.') }}đ</td>
                    <td><img src="{{URL('storage/'.$pro->product_image)}}" height="100" width="100"></td>
                    <td>{{ $pro->category_name }}</td>
                    <td>{{ $pro->brand_name }}</td>
        
                    <td><span class="text-ellipsis">
                      <?php
                       if($pro->product_status==0){
                        ?>
                        <a href="{{URL('/unactive-product/'.$pro->product_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                        <?php
                         }else{
                        ?>  
                         <a href="{{URL('/active-product/'.$pro->product_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                        <?php
                       }
                      ?>
                    </span></td>
                   
                    <td>
                      <a href="{{URL::to('/edit-product/'.$pro->product_id)}}" class="active styling-edit" ui-toggle-class="">
                        <i class="fa fa-pencil-square-o text-success text-active"></i>edit</a>
                      <a onclick="return confirm('Bạn có chắc là muốn xóa sản phẩm này ko?')" href="{{URL::to('/delete-product/'.$pro->product_id)}}" class="active styling-edit" ui-toggle-class="">
                        <i class="fa fa-times text-danger text"></i>
                      </a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>

              </table>
        
        </div>
    </div>
</div>


@endsection