<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suplier= Supplier::orderBy('id','desc')->get();
        return response()->json($suplier, 201);
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
            'email' => 'required|unique:employees',
            'name' => 'required|string|between:2,100',
            'phone' => 'required|unique:employees',
            'photo' =>'nullable','mimes:jpeg,png,jpg','max:2048',
        ]);
        $supplier=Supplier::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'shop_name'=>$request->shop_name,
            'photo'=>$this->imageUpload($request, 'photo', 'upload/employee') ?? '',
        ]);

        return response()->json($supplier, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplier= Supplier::find($id);
        return response()->json($supplier, 200);
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
        $supplier=Supplier::where('id',$id)
                ->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'address'=>$request->address,
                'photo'=>$this->imageUpload($request, 'photo', 'upload/employee') ?? '',
                'shop_name'=>$request->shop_name,
            ]);

        return response()->json($supplier, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier= Supplier::find($id)->delete();
        return response()->json($supplier, 200);
    }
}
