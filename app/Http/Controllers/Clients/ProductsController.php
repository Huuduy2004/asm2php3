<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function index()
    {
        $category=DB::table('cate')->get();
        $pr = DB::table('pr')->join('cate','cate.id','=','pr.category_id')
        ->select('pr.*','cate.name')
        ->take(8)->get();// Lấy tất cả dữ liệu từ bảng pr
        return view('clients.home',  compact('pr','category'));
        
    }
    public function detail($id) {
        $category=DB::table('cate')->get();
        $pr = DB::table('pr')->where('id', $id)->first();
        return view('clients.detail', compact('pr','category'));
    }
    public function listproducts()  {
        $category=DB::table('cate')->get();
        $pr = DB::table('pr')->paginate(6);// Lấy tất cả dữ liệu từ bảng pr
        return view('clients.listproduct', compact('pr','category'));
    }
    public function cateProduct($id){
        $cateProduct = DB::table('pr')->where('category_id',$id)->get();
        return view('clients.cateProduct',  compact('cateProduct'));
    }
}
