<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Slider;

class SliderController extends Controller
{
    //
    
    public function add_slider(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=', session('LoggedUser'))->first()];

        return view('admin.slider.add_slider',$data);
    }
    public function insert_slider(request $request){

        $request->validate([
            'slider_name'=>'required',
            'slider_image'=>'required|image',
            'slider_desc'=>'required',
       ]);
            $imagepath = request('slider_image')->store('slider','public');

            $slider = new Slider;
            $slider->slider_name = $request->slider_name;
            $slider->slider_image = $imagepath;
            $slider->slider_desc = $request->slider_desc;
            $slider->slider_status = $request->slider_status;
            $save = $slider->save();
            if($save){
                return back()->with('success','Tải Banner Thành Công');
             }else{
                 return back()->with('fail','Something went wrong, try again later');
             }
    
    }

    public function show_slider(){
        $all_slider = Slider::orderBy('slider_id','DESC')->get();
    	$get_slider  = view('admin.slider.show_slider')->with('show_slider',$all_slider);
    	return view('admin_layout')->with('admin.slider.show_slider',$get_slider);
    }

    public function unactive_slider($slider_id){
        $all_slider = Slider::where('slider_id',$slider_id)->update(['slider_status'=>0]);
        return redirect('admin/slider/show-slider');
    }

    public function active_slider($slider_id){
        $all_slider = Slider::where('slider_id',$slider_id)->update(['slider_status'=>1]);
        return redirect('admin/slider/show-slider');
    }

    public function delete_slider($slider_id){
        $slider = Slider::find($slider_id);
        $destinationPath = 'storage/'.$slider->slider_image;
        if(file_exists($destinationPath)){
            unlink($destinationPath);
        }
        $slider->delete();
        return Redirect('admin/slider/show-slider')->with('success','data insert thành công');

    }

    public function edit_slider($slider_id){
        $edit_slider = Slider::where('slider_id',$slider_id)->get();
        $get_slider = view('admin.slider.edit_slider')->with('edit_slider',$edit_slider);
        return view('admin_layout')->with('admin.slider.edit_slider',$get_slider);
    }

    public function update_slider(request $request,$slider_id){
        
        $request->validate([
            'slider_name'=>'required',
            'slider_image'=>'required|image',
            'slider_desc'=>'required',
       ]);
            $image = request('slider_image');
            $slider = Slider::find($slider_id);


            if($image){
                $destinationPath = 'storage/'.$slider->slider_image;
                if(file_exists($destinationPath)){
                    unlink($destinationPath);
                }
    
            $imagepath = request('slider_image')->store('slider','public');

            $slider->slider_name = $request->slider_name;
            $slider->slider_image = $imagepath;
            $slider->slider_desc = $request->slider_desc;
            $slider->slider_status = $request->slider_status;
            }else
            {
            $slider->slider_name = $request->slider_name;
            $slider->slider_desc = $request->slider_desc;
            $slider->slider_status = $request->slider_status;
            }
            $slider->save();
            return redirect('admin/slider/show-slider')->with('success','data insert thành công');

    }

}