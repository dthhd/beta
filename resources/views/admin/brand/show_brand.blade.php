@extends('admin_layout')

@section('admin_content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tên brand</th>
                        <th>Hình ảnh</th>
                        <th>Mô tả</th>
                        <th>Tình trạng</th>
                        <th>adada</th>

                                </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Tên brand</th>
                        <th>Hình ảnh</th>
                        <th>Mô tả</th>
                        <th>Tình trạng</th>
                        <th>adada</th>
                                </tr>
                </tfoot>
                @foreach($show_brand as $key => $brand)
                <tbody>
                    <tr>
                        <td>{{$brand->brand_name}}</td>
                        <td><img src="{{URL('storage/'.$brand->brand_image)}}" height="100" width="250"></td>
                        <td>{{$brand->brand_desc }}</td>
                        <td><span class="text-ellipsis">
                            <?php
                            if($brand->brand_status==0){
                             ?>
                             <a href="{{URL::to('/active-brand/'.$brand->brand_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                             <?php
                              }else{
                             ?>
                              <a href="{{URL::to('/unactive-brand/'.$brand->brand_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                             <?php
                            }
                            ?>
                                       </span>
                        </td>
                        <td>
                            <a href="{{URL('/edit-brand/'.$brand->brand_id)}}" class="active styling-edit" ui-toggle-class="">
Edit                </a>
                            <a onclick="return confirm('Bạn có chắc là muốn xóa brand này ko?')" href="{{URL::to('/delete-brand/'.$brand->brand_id)}}" class="active styling-edit" ui-toggle-class="">
                                <i class="fa fa-times text-danger text"></i>
                            </a>
                        </td>
                  
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>


@endsection