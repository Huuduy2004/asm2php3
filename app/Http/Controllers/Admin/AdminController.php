<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard(){
        $category = DB::table('cate')
        ->join('pr','cate.id','=','pr.category_id')
        ->select('cate.id','cate.name',DB::raw('count(pr.id) as pr_count')) // viết truy vấn trong truy vấn
        ->groupBy('cate.id','cate.name')->get();
        $allProduct = DB::table('pr')->count('id');
        $allUser = DB::table('users')->where('role','user')->count('id');
        $allAdmin = DB::table('users')->where('role','admin')->count('id');

        $maxPrice = DB::table('pr')
        ->join('cate','cate.id','=','pr.category_id')  
        ->select('pr.*','cate.name as cateName')     
        ->orderBy('price','desc')->first();

        $minPrice = DB::table('pr')
        ->join('cate','cate.id','=','pr.category_id')  
        ->select('pr.*','cate.name as cateName')     
        ->orderBy('price','asc')->first();
        return view('admin.index',compact('category','allProduct','allUser','allAdmin','maxPrice','minPrice' ));

    }
    // category 
    public function cateProductAdmin($id){
        $pr = DB::table('pr')->where('category_id',$id)->get();
        $category = DB::table('cate')->get();
        return view('admin.category.listCategory',  compact('category','pr'));
    }
}
