<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Extra;
use App\Models\Pos;

class CartController extends Controller
{
   public function addcart(Request $request,$id)
   {
        $product=Product::where('id',$id)->first();
        $check=Pos::where('product_id',$id)->first();
        if($check){
            $quantity= DB::table('pos')->where('product_id',$id)->increment('product_quantity');
            $product=DB::table('pos')->where('product_id',$id)->first();
             $rturn=$product->product_quantity;
               $subtotal=$product->product_quantity * $product->product_price;
            $update=Pos::where('product_id',$id)->update([
                'sub_total'=>$subtotal,
            ]);
        }else{
        $data=array();
        $data['product_id']=$id;
        $data['product_name']=$product->product_name;
        $data['product_quantity']=1;
        $data['product_price']=$product->selling_price;
        $data['sub_total']=$product->selling_price;

        DB::table('pos')->insert($data);
        }
   }

   public function allcartProduct()
   {
       $cartproduct=Pos::orderBy('id','desc')->get();
       return response()->json($cartproduct);
   }

    public function removeItem($id)
    {
        $remove=Pos::find($id)->delete();
        return response()->json($remove);
    }

    public function increment($id)
    {
        $quantity=DB::table('pos')->where('id',$id)->increment('product_quantity');
        $product=DB::table('pos')->where('id',$id)->first();
        $subtotal=$product->product_quantity * $product->product_price;
        $increment=Pos::where('id',$id)->update([
            'sub_total'=>$subtotal,
        ]);

    }

    public function decrement($id)
    {
        $quantity=DB::table('pos')->where('id',$id)->decrement('product_quantity');
        $product=DB::table('pos')->where('id',$id)->first();
        $subtotal=$product->product_quantity * $product->product_price;
        $decrement=Pos::where('id',$id)->update([
            'sub_total'=>$subtotal,
        ]);
    }

    public function vat()
    {
        $vat=Extra::first();
        return response($vat);
    }


    public function order_done(Request $request)
    {
        $validate=$request->validate([
            'customer_id'=>'required',
            'payby'=>'required',
            'pay'=>'required',
        ]);
        $data=[];
        $data['customer_id']=$request->customer_id;
        $data['sub_total']=$request->subtotal;
        $data['qty']=$request->qty;
        $data['vat']=$request->vat;
        $data['total']=$request->total;
        $data['pay']=$request->pay;
        $data['due']=$request->due;
        $data['payby']=$request->payby;
        $data['order_date']=date('d/m/Y');
        $data['order_month']=date('F');
        $data['order_year']=date('Y');
        $order_id=DB::table('orders')->insertGetId($data);
        $contents=DB::table('pos')->get();
        $odata=[];
        foreach($contents as $content){
            $odata['order_id']=$order_id;
            $odata['product_id']=$content->product_id;
            $odata['product_quantity']=$content->product_quantity;
            $odata['product_price']=$content->product_price;
            $odata['sub_total']=$content->sub_total;

            DB::table('order_details')->insert($odata);
            DB::table('products')
            ->where('id',$content->product_id)
            ->update([
                'product_quantity'=>DB::raw('product_quantity -' .$content->product_quantity)
            ]);
        }

        DB::table('pos')->delete();
        return response('Done');
    }
}
