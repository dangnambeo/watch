<?php

namespace App\Http\Controllers;

use App\bill;
use App\category;
use App\custormer;
use App\news;
use App\orders;
use App\products;
use App\cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class pageController extends Controller
{
    public function Index(){
      $sp_all = products::leftjoin('orders','orders.product_id','=','products.id')
          ->groupBy('products.id','products.name','products.img','products.cate_id','products.quantity','products.price','products.description','products.discount_id')
          ->select(
              'products.id as id','products.name as name','products.img as img','products.cate_id as cate_id','products.quantity as quantity','products.price as price','products.description as description',
              'products.discount_id as discount_id',
              DB::raw('Sum(orders.number) as sl_ban')
          )->orderBy('id','desc')->paginate(12);
      return view('shop-page.index',compact('sp_all'));
    }
    public function viewall(){
        $sp_all =products::orderBy('id','desc')->paginate(12);
        return view('shop-page.viewall',compact('sp_all'));
    }
    public function viewpage($id){
        $cate_page = category::find($id);
        $sp_cate = products::where('cate_id',$id)->paginate(12);
        return view('shop-page.view-page',compact('sp_cate','cate_page'));
    }
    public function viewproducts($id){
        $sp_page = products::leftjoin('orders','orders.product_id','=','products.id')
            ->groupBy   ('products.id','products.name','products.img','products.cate_id','products.quantity','products.price','products.description','products.discount_id','products.diameter',
                        'products.face_material','products.shell_material','products.wire_material','products.power','products.waterproof','products.insurance','products.origin_id','products.size'
                        )
            ->select(
                'products.id as id','products.name as name','products.img as img','products.cate_id as cate_id','products.quantity as quantity','products.price as price','products.description as description',
                'products.discount_id as discount_id','products.diameter',
                DB::raw('Sum(orders.number) as sl_ban'),
                'products.face_material','products.shell_material','products.wire_material','products.power','products.waterproof','products.insurance','products.origin_id','products.size'
            )->find($id);
        $sp_other = products::all()->random()->paginate(6);
        //dd($price_sp);
       return view('shop-page.viewproducts',compact('sp_page','sp_other'));
    }
    public function viewlistNew(){
        $news = news::whereNotNull('img')->orderBy('id','desc')->paginate(4);
        return view('shop-page.view-list-new',compact('news'));
    }
    public function readNew($id){
        $new = news::find($id);
        return view('shop-page.read-new',compact('new'));
    }
    public function searchProducr(Request $request){
       // $search_sp = $_GET['query'];

        //$name =  products::select('name')->get()->pluck('name');
        $sp_all = products::where('name','like','%'.$request->key.'%')->paginate(12);
        return view('shop-page.viewall',compact('sp_all'));
//        if ($request -> filled('name')){
//            $sp_all -> where('name','like','%'.$request->name.'%');
//        }
//        return view('shop-page.viewall',
//            ['name' => $name],
//            ['sp_all' => $sp_all -> get()]
//        );
    }
    public function addCart(Request $request, $id){
        $product = products::where('id',$id)->first();
        if ($product != null){
            $oldcart = Session('Cart') ? Session('Cart') : null;
            $newCart = new cart($oldcart);
            $newCart->AddCart($product, $id);

            $request->session()->put('Cart', $newCart);
        }
        return view('shop-page.cart');
    }
    public function delCart(Request $request, $id){
        $oldcart = Session('Cart') ? Session('Cart') : null;
        $newCart = new cart($oldcart);
        $newCart->DelItemCart($id);
        if (count($newCart ->products) > 0){
            $request->session()->put('Cart', $newCart);
        }
        else{
            $request->session()->forget('Cart');
        }
        return view('shop-page.cart');
    }
    public function listCart(){
        return view('shop-page.viewlist-cart');
    }
    public function delListCart(Request $request, $id){
        $oldcart = Session('Cart') ? Session('Cart') : null;
        $newCart = new cart($oldcart);
        $newCart->DelItemCart($id);
        if (count($newCart ->products) > 0){
            $request->session()->put('Cart', $newCart);
        }
        else{
            $request->session()->forget('Cart');
        }
        return view('shop-page.list-cart');
    }
    public function editListCart(Request $request, $id, $quanty){
        $oldcart = Session('Cart') ? Session('Cart') : null;
        $newCart = new cart($oldcart);
        $newCart->UpdateItemCart($id, $quanty);
        $request->session()->put('Cart', $newCart);

        return view('shop-page.list-cart');
    }
    public function Delivery(){
        return view('shop-page.delivery');
    }
    public function postOrder(Request $request){
        $cartInfo = Session::get("Cart")->products;

        $customer = new custormer;
        $customer ->customer_name = $request->customer_name;
        $customer ->phone = $request->phone;
        $customer ->email = $request->email;
        $customer ->address = $request->address;
        $customer->save();

        $bill = new bill;
        $bill -> customer_id = $customer->id;
        $bill -> status = $request->status;
        $bill ->total = Session::get("Cart")->totalPrice;
        $bill ->save();

        if (Session::has("Cart")>0){
            foreach ($cartInfo as $key => $list){
                $order = new orders;
                $order ->bill_id = $bill->id;
                $order ->product_id = $list['productInfo']->id;
                $order ->number = $list['quanty'];
                $order ->price = $list['productInfo']->price;
                $order ->save();
            }
        }
        $data = $request->all();
        $email= $data['email']??'';

        Mail::to($email)->send(new \App\Mail\SendMail(['emails'=>$email]));
        Session::flash('flash_message','Send message successfully');
        //dd('ok');
        alert()->toast('Mua hàng thành công', 'success')->persistent(false)->autoClose(1200);
        return redirect(route('index'));
    }
}
