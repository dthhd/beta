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
                        <th>Mô tả</th>
                        <th>Hiển thị</th>
                        <th>Else</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Tên slide</th>
                        <th>Tình trạng</th>
                        <th>Else</th>
                </tfoot>
                <tbody>
                    @foreach ($show_category as $key=>$category) 
                    <tr>
                        <td>{{$category->category_name}}</td>
                        <td>{{$category->category_desc}}</td>
                        <td><span class="text-ellipsis">
                            <?php
                            if($category->category_status==0){
                             ?>
                             <a href="{{URL::to('/active-category/'.$category->category_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                             <?php
                              }else{
                             ?>
                              <a href="{{URL::to('/unactive-category/'.$category->category_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                             <?php
                            }
                            ?>

                            </span>
                        </td>
                        <td>
                            <a href="{{URL::to('/edit-category/'.$category->category_id)}}" class="active styling-edit" ui-toggle-class="">
                                        Edit                
</a>
                            <a onclick="return confirm('Bạn có chắc là muốn xóa slide này ko?')" href="{{URL('/delete-category/'.$category->category_id)}}" class="active styling-edit" ui-toggle-class="">
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