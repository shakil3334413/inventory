<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Input\Input;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product=Product::with('category','supplier')->orderBy('id','desc')->get();
        return response()->json($product, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator =$request->validate([
            'product_name' => 'required',
            'selling_price' => 'required',
            'product_quantity' => 'required',
            'category_id' => 'required',
            'supplier_id' => 'required',
            'image' => 'required',
        ]);
        $product=new Product;
        $image=$request->image;
        if ($request->image) {
            $position = strpos($request->image, ';');
            $sub = substr($request->image, 0, $position);
            $ext = explode('/', $sub)[1];

            $name = time().".".$ext;
            $img = Image::make($request->image)->resize(240,200);
            $upload_path = 'backend/product/';
            //$image_url = $upload_path.$name;
            if(!file_exists('images/product')){
                mkdir('images/product',0777,true);
            }
            //$image->move('images/product',$img);
            $img->move(public_path($upload_path),$img);
            // $img->save($image_url);
            try {
                $product->product_name=$request->product_name;
                $product->product_code=$request->product_code;
                $product->category_id=$request->category_id;
                $product->supplier_id=$request->supplier_id;
                $product->root=$request->root;
                $product->image=$img;
                $product->selling_price=$request->selling_price;
                $product->buying_price=$request->buying_price;
                $product->product_quantity=$request->product_quantity;
                $product->buying_date=$request->buying_date;
                $product->save();
             } catch (\PDOException $e) {
                 Session::put(['message.error' => $e->getMessage()]);
             }
        }else{
        $product=Product::create([
            'product_name'=>$request->product_name,
            'product_code'=>$request->product_code,
            'category_id'=>$request->category_id,
            'supplier_id'=>$request->supplier_id,
            'root'=>$request->root,
            'buying_price'=>$request->buying_price,
            'selling_price'=>$request->selling_price,
            'product_quantity'=>$request->product_quantity,
            'buying_date'=>$request->buying_date,
        ]);

    }

    return response()->json($product, 201);



        // $product=Product::create([
        //     'product_name'=>$request->product_name,
        //     'product_code'=>$request->product_code,
        //     'category_id'=>$request->category_id,
        //     'supplier_id'=>$request->supplier_id,
        //     'root'=>$request->root,
        //     // 'image'=>$this->imageUpload($request, 'image', 'upload/product'),
        //     'image'=>'img/products/'.$filename,
        //     'buying_price'=>$request->buying_price,
        //     'selling_price'=>$request->selling_price,
        //     'product_quantity'=>$request->product_quantity,
        //     'buying_date'=>$request->buying_date,
        // ]);
    // else{
    //     $product=Product::create([
    //         'product_name'=>$request->product_name,
    //         'product_code'=>$request->product_code,
    //         'category_id'=>$request->category_id,
    //         'supplier_id'=>$request->supplier_id,
    //         'root'=>$request->root,
    //         'buying_price'=>$request->buying_price,
    //         'selling_price'=>$request->selling_price,
    //         'product_quantity'=>$request->product_quantity,
    //         'buying_date'=>$request->buying_date,
    //     ]);

        //return response()->json($product, 201);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product= Product::find($id);
        return response()->json($product, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator =$request->validate([
            'product_name' => 'required',
            'selling_price' => 'required',
            'product_quantity' => 'required',
            'category_id' => 'required',
            'image' =>'nullable','mimes:jpeg,png,jpg','max:2048',
            'supplier_id' => 'required',
        ]);
        $product=Product::where('id',$id)->update([
            'product_name'=>$request->product_name,
            'product_code'=>$request->product_code,
            'category_id'=>$request->category_id,
            'supplier_id'=>$request->supplier_id,
            'root'=>$request->root,
            'image'=>$this->imageUpload($request, 'image', 'upload/product') ?? '',
            'buying_price'=>$request->buying_price,
            'selling_price'=>$request->selling_price,
            'product_quantity'=>$request->product_quantity,
            'buying_date'=>$request->buying_date,
        ]);

        return response()->json($product, 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product= Product::find($id)->delete();
        return response()->json($product, 200);
    }


    public function stockUpdate(Request $request, $id)
    {
        $validator =$request->validate([
            'product_quantity' => 'required',
        ]);
        $product=Product::where('id',$id)->update([
            'product_quantity'=>$request->product_quantity,
        ]);
        return response()->json($product, 200);
    }

    public function getcategoryproduct($id)
    {
        $product=Product::where('category_id',$id)->get();
        return response()->json($product,200);
    }
}
