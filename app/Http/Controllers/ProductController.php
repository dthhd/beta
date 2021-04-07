<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;

class ProductController extends Controller
{
    //    public function add_product(){
    public function add_product(){
        $category_for_product = Category::orderBy('category_id','DESC')->get(); 
        $brand_for_product = Brand::orderBy('brand_id','DESC')->get(); 
        return view('admin.product.add_product')->with('category_for_product',$category_for_product)->with('brand_for_product',$brand_for_product);
    }

    public function insert_product(request $request){
        $request->validate([
            'product_name'=>'required',
            'product_image'=>'required|image',

       ]);
            $imagepath = request('product_image')->store('product','public');
            $product = new Product;
            $product->product_name = $request->product_name;
            $product->product_image = $imagepath;
            $product->product_desc = $request->product_desc;
            $product->product_slug = $request->product_slug;
            $product->product_quantity = $request->product_quantity;
            $product->product_content = $request->product_content;
            $product->product_price = $request->product_price;
            $product->category_id = $request->category_id_product;
            $product->brand_id = $request->brand_id_product;
            $product->product_status = $request->product_status;

            $save = $product->save();
            if($save){
                return back()->with('success','Tải Product Thành Công');
             }else{
                 return back()->with('fail','Something went wrong, try again later');
             }

    }
        public function show_product(){
            $all_product = DB::table('product')
            ->join('category','category.category_id','=','product.category_id')
            ->join('brand','brand.brand_id','=','product.brand_id')
            ->orderby('product.product_id','desc')->paginate(20);
            $manager_product  = view('admin.product.show_product')->with('show_product',$all_product);
            return view('admin_layout')->with('admin.product.show_product', $manager_product);
    
        }

        public function unactive_product($product_id){
        $get_product = Product::where('product_id',$product_id)->update(['product_status'=>1]);
           return Redirect('admin/product/show-product');
   
       }
       public function active_product($product_id){
        $get_product = Product::where('product_id',$product_id)->update(['product_status'=>0]);
        return Redirect('admin/product/show-product');
       }       
        public function delete_product($product_id){
            $product = Product::find($product_id);
            $destinationPath = 'storage/'.$product->product_image;
            if(file_exists($destinationPath)){
                unlink($destinationPath);
            }
            $product->delete();
            return Redirect('admin/product/show-product')->with('success','data insert thành công');
    
        }
        public function edit_product($product_id){
            $category_for_product = Category::orderBy('category_id','DESC')->get(); 
            $brand_for_product = Brand::orderBy('brand_id','DESC')->get();
            $get_product = Product::where('product_id',$product_id)->get();
            return view('admin.product.edit_product')->with('category_for_product',$category_for_product)->with('brand_for_product',$brand_for_product)->with('get_product',$get_product );
        }
    
        public function update_product(request $request, $product_id){
            $request->validate([
                'product_name'=>'required',
                'product_desc'=>'required',
           ]);
                $image = request('product_image');
                $product = Product::find($product_id);
    
    
                if($image){
                    $destinationPath = 'storage/'.$product->product_image;
                    if(file_exists($destinationPath)){
                        unlink($destinationPath);
                    }
        
                $imagepath = request('product_image')->store('product','public');
    
                $product->product_name = $request->product_name;
                $product->product_image = $imagepath;
                $product->product_desc = $request->product_desc;
                $product->product_slug = $request->product_slug;
                $product->product_quantity = $request->product_quantity;
                $product->product_content = $request->product_content;
                $product->product_price = $request->product_price;
                $product->category_id = $request->category_id_product;
                $product->brand_id = $request->brand_id_product;
                $product->product_status = $request->product_status;
                    }else
                {
                    $product->product_name = $request->product_name;
                    $product->product_desc = $request->product_desc;
                    $product->product_slug = $request->product_slug;
                    $product->product_quantity = $request->product_quantity;
                    $product->product_content = $request->product_content;
                    $product->product_price = $request->product_price;
                    $product->category_id = $request->category_id_product;
                    $product->brand_id = $request->brand_id_product;
                    $product->product_status = $request->product_status;
                    }
                $product->save();
                return redirect('admin/product/show-product')->with('success','data insert thành công');
        
        }
}


