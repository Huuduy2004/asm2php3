<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function index()
    {
        $category = DB::table('cate')->get();
        $products = DB::table('pr')->get();
        return view('admin.products.index', compact('products', 'category'));
    }
    // hiển thị form add sản phẩm
    public function createProduct()
    {
        $category = DB::table('cate')->get();
        return view('admin.products.create', compact('category'));
    }
    // add sản phẩm
    public function addProduct(Request $request)
    {
        $request->validate(
            [
            'title' => 'required',
            'image' => 'required',
            'price' => 'required',
            'priceDel' => 'required',  
            'name' => 'required',  
            ],
          [
                'title.required' => 'Title không được để trống',
                'image.required' => 'Image không được để trống',
                'price.required' => 'Price không được để trống',
                'priceDel.required' => 'priceDel không được để trống',
                'name.required' => 'Category không được để trống',
            ]
        );
        $data = $request->except('image');
        $data['image'] = "";
        // Kiểm tra file
        if ($request->hasFile('image')) {
            $path_image = $request->file('image')->store('image');
            $data['image'] = $path_image;
        }
        DB::table('pr')->insert([
            'title' => $data['title'],
            'image' => $data['image'],
            'price' => $data['price'],
            'priceDel' => $data['priceDel'],
            'category_id' => $data['category_id']
        ]);
        return redirect()->route('indexAdmin')->with('message', 'Thêm dữ liệu thành công');
    }
    // hiển thị forrm edit
    public function editProduct($id)
    {
        $category = DB::table('cate')->get();
        $editproduct = DB::table('pr')->where('id', $id)->first();
        return view('admin.products.edit', compact('editproduct', 'category'));
    }
    // edit sản phẩm
    public function updateProduct(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'priceDel' => 'required',  
            // 'name'=>'required' 
         ]);
        $data = [
            'title' => $request['title'],
            'image' => $request['image'],
            'price' => $request['price'],
            'priceDel' => $request['priceDel'],
            'category_id' => $request['category_id']
        ];
        $product = DB::table('pr')->where('id', $id)->first();
        $old_image = $product->image; // giu lai anh cu
        $data['image'] = $old_image; // ng dungf k nhap anh moi

        if ($request->hasFile('image')) {
            $path_image = $request->file('image')->store('image');
            $data['image'] = $path_image;
        }
        DB::table('pr')->where('id', $id)->update($data);
        return redirect()->route('indexAdmin')->with('message', 'Sửa dữ liệu thành công');
    }
    // xóa sản phẩm theo id
    public function deleteProduct($id)
    {
        DB::table('pr')->where('id', $id)->delete();
        return back()->with('message', 'Xóa dữ liệu thành công');
    }
    
    //acount
    public function indexAccount(){
        $account = User::all();
        return view('auth.listAccount',compact('account'));
    }
    // hiển thi form addAccount
    public function createAccount(){
        $account = User::all();
        return view('auth.create',compact('account'));
    }
    // thêm tài khoản
    public function addAccount(Request $request){
        $request->validate([
            'fullname'=>'required',
            'username'=>'required',
            'email'=>'required',
            'image'=>'required',
            'password'=>'required',
        ]);
        $data = $request->except('image');// lấy tất cả trừ image
        $data['image'] = "";
        if($request->hasFile('image')){
            $path_image = $request->file('image')->store('image');
            $data['image'] = $path_image;
        }
        User::query()->create($data);
        return redirect()->route('indexAccount')->with('message','Thêm tài khoản thành công');
    }
    // hiển thị form edit tài khoản
    public function editAccount(Request $request,$id){
        $editAccount = User::all()->where('id',$id)->first();
        return view('auth.edit',compact('editAccount'));
    }
    // update tài khoản
    public function updateAccount(Request $request , $id){
        $request->validate([
            'fullname'=>'required',
            'username'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);
        $account = User::where('id',$id)->first();
        $data = $request->except('image'); // lấy tất cả trừ ảnh
        $old_image = $account->image; // giữ lại ảnh cũ
        $data['image'] = $old_image ;// ng dùng k nhập ảnh mới
        // ng dùng nhập ảnh mới
        if($request->hasFile('image')){
            $path_image = $request->file('image')->store('image');
            $data['image'] = $path_image;            
        }
        $account->update($data);
        // nhập ảnh mới xóa ảnh cũ
        if($request->hasFile('image')){
            if(file_exists('storage/' . $old_image )){
                unlink('storage/' . $old_image);
            }
        }     
        return redirect()->route('indexAccount')->with('message','Sửa tài khoản thành công');
    }
    // xóa tài khoản
    public function deleteAccount($id){
        if(Auth::user()->id == $id){
            return back()->with('errorDelete', 'Bạn không thể tự xóa chính mình.');
        }
        User::where('id',$id)->delete();
        return back()->with('message','Xóa tài khoản thành công');
    }

    
    
}
