<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    //
    public function add_brand(){
        return view('admin.brand.add_brand');
    }
    public function insert_brand(request $request){
        $request->validate([
            'brand_name'=>'required',
            'brand_image'=>'required|image',
            'brand_desc'=>'required',
       ]);
            $imagepath = request('brand_image')->store('brand','public');
            $brand = new Brand;
            $brand->brand_name = $request->brand_name;
            $brand->brand_image = $imagepath;
            $brand->brand_desc = $request->brand_desc;
            $brand->brand_status = $request->brand_status;
            $save = $brand->save();
            if($save){
                return back()->with('success','Tải Brand Thành Công');
             }else{
                 return back()->with('fail','Something went wrong, try again later');
             }

    }

    public function show_brand(){
        $get_brand = Brand::orderBy('brand_id','DESC')->get();
        $show_brand = view('admin.brand.show_brand')->with('show_brand',$get_brand);
        return view('admin_layout')->with('admin.brand.show_brand',$show_brand);
    }

    public function edit_brand($brand_id){
        $get_brand = Brand::where('brand_id',$brand_id)->get();
        $show_brand = view('admin.brand.edit_brand')->with('edit_brand',$get_brand);
        return view('admin_layout')->with('admin.brand.edit_brand',$show_brand);
    }

    public function update_brand(request $request, $brand_id){
        $request->validate([
            'brand_name'=>'required',
            'brand_image'=>'required|image',
            'brand_desc'=>'required',
       ]);
       $image = request('brand_image');
       $brand = brand::find($brand_id);


       if($image){
           $destinationPath = 'storage/'.$brand->brand_image;
           if(file_exists($destinationPath)){
               unlink($destinationPath);
           }

       $imagepath = request('brand_image')->store('brand','public');

       $brand->brand_name = $request->brand_name;
       $brand->brand_image = $imagepath;
       $brand->brand_desc = $request->brand_desc;
       $brand->brand_status = $request->brand_status;
       }else
       {
       $brand->brand_name = $request->brand_name;
       $brand->brand_desc = $request->brand_desc;
       $brand->brand_status = $request->brand_status;
       }
       $brand->save();
       return redirect('admin/brand/show-brand')->with('success','data insert thành công');

    }

    public function unactive_brand($brand_id){
        $all_brand = brand::where('brand_id',$brand_id)->update(['brand_status'=>0]);
        return redirect('admin/brand/show-brand');
    }

    public function active_brand($brand_id){
        $all_brand = brand::where('brand_id',$brand_id)->update(['brand_status'=>1]);
        return redirect('admin/brand/show-brand');
    }

    public function delete_brand($brand_id){
        $brand = brand::find($brand_id);
        $destinationPath = 'storage/'.$brand->brand_image;
        if(file_exists($destinationPath)){
            unlink($destinationPath);
        }
        $brand->delete();
        return Redirect('admin/brand/show-brand')->with('success','data insert thành công');

    }

}
