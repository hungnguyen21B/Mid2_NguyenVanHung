<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Slide;
use App\Product;
use App\TypeProduct;
use App\Cart;
use DB;
use Mail;
use App\Customer;
use App\BillDetail;
use App\Mail\mailForgot;
use App\Mail\mailOrder;
use App\Bill;
use App\User;
use Session;
class PageController extends Controller
{
    //
    public function getIndex(){
        $slide=Slide::All();
        $new_products=Product::where('new',1)->paginate(4);
        $products=DB::table('products')->where('promotion_price','<>',0)->paginate(8);
        return view('index')->with(['slide'=>$slide,'new_products'=>$new_products,'products'=>$products]);
    }
    public function getSearch(Request $request){
        $slide=Slide::All();
        $result = null;
        $this->validate($request, [
            's' => 'required|min:3|max:50',
        ]);
            if (!empty($request->s)) {
                $result = Product::where('name', 'like', '%'.$request->s.'%')
                ->orWhere('unit_price', $request->s)
                ->limit(8)
                ->get();
            }
            return view('search')->with(['slide'=>$slide,'products'=>$result]);
    }

    public function getLoaiSp($type){
        $sp_theoloai = Product::where('id_type',$type)->limit(3)->get();
        $sp_khac = Product::where('id_type','<>',$type)->limit(3)->get();
        $cacloai = TypeProduct::all();
        return view ('loaisanpham',compact('sp_theoloai','sp_khac','cacloai'));
    }
    public function getChitiet($idChitiet){
        $product= Product::where ('id',$idChitiet)->first();
        $new_products=Product::where('new',1)->paginate(4);
        $best_sellers=Product::where('promotion_price',0)->paginate(4);
        $productRelative= Product::where ('id_type',$product->id_type)->paginate(3);
        return view('chitiet',compact('product','productRelative','new_products','best_sellers'));
    }
    public function getAddToCart(Request $req,$id){
        $product= Product::find($id);
        $oldCart=Session('cart')?Session::get('cart'):null;
        $cart= new Cart($oldCart);
        $cart->add($product,$id);
        // echo ($cart);
        $req->session()->put('cart',$cart);
        return redirect()->back();
    }
    public function getDeleteProductCart(Request $req,$id){
        $oldCart=Session('cart')?Session::get('cart'):null;
        $cart= new Cart($oldCart);
        $cart->reduceByOne($id);
        $req->session()->put('cart',$cart);
        return redirect()->back();
    }
    public function getRemoveProductCart(Request $req,$id){
        $oldCart=Session('cart')?Session::get('cart'):null;
        $cart= new Cart($oldCart);
        $cart->removeItem($id);
        $req->session()->put('cart',$cart);
        return redirect()->back();
    }
    public function getOrder(){
        return view('order');
    }
    public function getForgot(){
        return view('forgot');
    }
    public function postCheckCode(Request $request){
        if(Session::get('codeForgot')==$request->code){
            return view('resetPassword');
        }else{
            return redirect()->back(); 
        }
    }
    public function postForgot(Request $request){
        $code=rand(10,100);
        Session::put('codeForgot',$code);
        Session::put('emailForgot',$request->email);
        \Mail::to($request->email)->send(new mailForgot($code));
        return view('code');
    }
    public function getLogin(){
        return view('login');
    }
    public function getIndexAdmin(){
        $new_products=Product::all();
        return view('Admin.admin')->with(['products'=>$new_products]);
    }
    public function postAdminDelete($id){
        $product = Product::find($id);
        $product->delete();
        return $this->getIndexAdmin();
    }
    public function postAdminAdd(Request $request){
        $product = new Product();
        if ($request->hasFile('image')){
            $file=$request->file('image');
            $fileName=$file->getClientOriginalName('image');
            $file->move('source/image/product',$fileName);
        }
		$file_name=null;
        if($request->file('image')!=null){
            $file_name = $request->file('image')->getClientOriginalName();
        }
        $product->name = $request->name;
        $product->image=$file_name;
        $product->description=$request->description;
        $product->unit_price = $request->unit_price;
        $product->promotion_price = $request->promotion;
        $product->unit = $request->unit;
        $product->new = $request->new;
        $product->id_type = $request->type;
		$product->save();
		return $this->getIndexAdmin();
    }
    public function getAdminAdd(){
        return view('Admin.formAdd');
    }
    public function getAdminEdit($id){
        $product = Product::find($id);
        return view('Admin.formEdit')->with(['product'=>$product]);
    }
    public function postAdminEdit(Request $request){
        $id=$request->id;
        $product = Product::find($id);
        if ($request->hasFile('image')){
            $file=$request->file('image');
            $fileName=$file->getClientOriginalName('image');
            $file->move('source/image/product',$fileName);
        }
        if($request->file('image')!=null){
            $product->image=$fileName;
        }
        $product->name = $request->name;
        $product->description=$request->description;
        $product->unit_price = $request->unit_price;
        $product->promotion_price = $request->promotion;
        $product->unit = $request->unit;
        $product->new = $request->new;
        $product->id_type = $request->type;
		$product->save();
		return $this->getIndexAdmin();
    }
    public function getLogout(){
        Session::forget('checkLogin');
        return $this->getLogin();
    }
    public function postLogin(Request $request){
        $user = User::where('email', '=', $request->email )->first();
        if (Hash::check($request->password, $user->password)) {
            Session::put('checkLogin','true');
            if($request->email=='anhanh5811@gmail.com'){
                return redirect()->route('index-admin');
            }else{
                return $this->getIndex();
            } 
        }else{
            Session::put('checkLogin','fail');
            return redirect()->back();
        }  
    }
    public function resetPassword(Request $req){
        $this->validate($req, [
            'password' => 'required|confirmed|min:6',
        ]);
        $user = User::where('email', '=', Session::get('emailForgot'))->first();
        $user->password= Hash::make($req->password);
        try
        {
            $user->save();
            return $this->getLogin();
        } catch(Throwable $e) {
            return $this->getForgot();
        }
        
    }
    public function getSignup(){
        return view('signup');
    }
    public function getContact(){
        return view('contact');
    }
    public function getIntro(){
        return view('intro');
    }
    public function clearCart(){
        Session::forget('cart');
        return redirect()->back();
    }
    public function postSignup(Request $req){
        $this->validate($req, [
            'name' => 'required|min:3|max:50',
            'email' => 'email',
            'phone' => 'max:13',
            'password' => 'required|confirmed|min:6',
        ]);
        $user = new User();
        $user->full_name= $req->name;
        $user->email=$req->email;
        $user->phone=$req->phone;
        $user->address=$req->address;
        $user->password= Hash::make($req->password);
        try
        {
            $user->save();
            return $this->getIndex();
        } catch(Throwable $e) {
            return redirect()->back();
        }
        
    }
    public function postOrder(Request $req){
        $cart = Session::get('cart');
        $cus = new Customer();
        $cus->name= $req->name;
        $cus->gender=$req->gender;
        $cus->email=$req->email;
        $cus->address=$req->address;
        $cus->note=$req->notes;
        $cus->phone_number=$req->phone;
        $cus->save();
        $bill = new Bill();
        $bill->id_customer= $cus->id;
        $bill->date_order=date('Y-m-d');
        $bill->total=$cart->totalPrice;
        $bill->payment=$req->payment_method;
        $bill->note=$req->notes;
        $bill->save();
        foreach($cart->items as $item){
            $billdetail = new BillDetail();
            $billdetail->id_bill= $bill->id;
            $billdetail->id_product=$item['item']['id'];
            //lay gia tung san pham theo cach la chia so luong
            $billdetail->unit_price=$item['price']/$item['qty'];
            $billdetail->quantity=$item['qty'];
            $billdetail->save();
        }
        \Mail::to($cus->email)->send(new mailOrder($cart->items,$cus->name,$cart->totalPrice));
        Session::forget('cart');
        return redirect()->back();
    }
}
