<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    public function add_category(){
        return view('admin.category.add_category');
    }

    public function insert_category(request $request){

        $request->validate([
            'category_name'=>'required',
            'category_desc'=>'required',
       ]);
            $category = new Category;
            $category->category_name = $request->category_name;
            $category->category_desc = $request->category_desc;
            $category->category_status = $request->category_status;
            $save = $category->save();
            if($save){
                return back()->with('success','Tải Danh Mục Thành Công');
             }else{
                 return back()->with('fail','Something went wrong, try again later');
             }
    
    }
    public function show_category(){
        $get_all_category = Category::orderBy('category_id','DESC')->get();
        $view_category = view('admin.category.show_category')->with('show_category',$get_all_category);
        return view('admin_layout')->with('admin.category.show_category',$view_category);
    }
    public function unactive_category($category_id){
        $all_category = Category::where('category_id',$category_id)->update(['category_status'=>0]);
        return redirect('admin/category/show-category');
    }

    public function active_category($category_id){
        $all_category = Category::where('category_id',$category_id)->update(['category_status'=>1]);
        return redirect('admin/category/show-category');
    }
    public function edit_category($category_id){
        $edit_category_id = Category::where('category_id',$category_id)->get();
        $get_category_id = view('admin.category.edit_category')->with('edit_category',$edit_category_id);
        return view('admin_layout')->with('admin.category.edit_category',$get_category_id);
    }
    
    public function update_category(request $request,$category_id){

        $request->validate([
            'category_name'=>'required',
            'category_desc'=>'required',
       ]);
            $category = Category::find($category_id);
            $category->category_name = $request->category_name;
            $category->category_desc = $request->category_desc;
            $category->category_status = $request->category_status;
            $category->save();
            return redirect('admin/category/show-category')->with('success','data insert thành công');
    
    }

    public function delete_category($category_id){
        $category = Category::find($category_id);
        $category->delete();
         return redirect('admin/category/show-category')->with('success','xoá data thành công');
    }

}
