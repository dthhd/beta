<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Slider;


class HomeController extends Controller
{
    //
    public function index(request $request){
        $get_slider = Slider::orderBy('slider_id','ASC')->where('slider_status','1')->take(4)->get();
        $get_product = Product::orderBy('product_id','DESC')->where('product_status','0')->take(10)->get();
        return view('fontend.home')->with('get_slider',$get_slider)->with('get_product',$get_product);
    }
}
