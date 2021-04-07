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
                        <th>Tên slide</th>
                        <th>Hình ảnh</th>
                        <th>Mô tả</th>
                        <th>Tình trạng</th>
                        <th>adada</th>

                                </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Tên slide</th>
                        <th>Hình ảnh</th>
                        <th>Mô tả</th>
                        <th>Tình trạng</th>
                        <th>adada</th>
                                </tr>
                </tfoot>
                @foreach($show_slider as $key => $slide)
                <tbody>
                    <tr>
                        <td>{{$slide->slider_name}}</td>
                        <td><img src="{{URL('storage/'.$slide->slider_image)}}" height="100" width="250"></td>
                        <td>{{$slide->slider_desc }}</td>
                        <td><span class="text-ellipsis">
                            <?php
                            if($slide->slider_status==0){
                             ?>
                             <a href="{{URL::to('/active-slider/'.$slide->slider_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                             <?php
                              }else{
                             ?>
                              <a href="{{URL::to('/unactive-slider/'.$slide->slider_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                             <?php
                            }
                            ?>
                                       </span>
                        </td>
                        <td>
                            <a href="{{URL('/edit-slider/'.$slide->slider_id)}}" class="active styling-edit" ui-toggle-class="">
Edit                </a>
                            <a onclick="return confirm('Bạn có chắc là muốn xóa slide này ko?')" href="{{URL::to('/delete-slider/'.$slide->slider_id)}}" class="active styling-edit" ui-toggle-class="">
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