<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer= Customer::orderBy('id','desc')->get();
        return response()->json($customer, 201);
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
                'name' => 'required|string|between:2,100',
                'phone' => 'required',
                'photo' =>'nullable','mimes:jpeg,png,jpg','max:2048',
            ]);
        try{
            $customer=Customer::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'address'=>$request->address,
                'photo'=>$this->imageUpload($request, 'photo', 'upload/employee') ?? '',
            ]);
        return response()->json($customer, 201);
        }catch (\Exception $e) {

            $data['data'] = [];
            $data['status_code'] = 400;
            $data['message'] = $e;
            return response()->json($data);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer= Customer::find($id);
        return response()->json($customer, 200);
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
            'name' => 'required|string|between:2,100',
            'phone' => 'required',
            'photo' =>'nullable','mimes:jpeg,png,jpg','max:2048',
        ]);
        $customer=Customer::where('id',$id)
        ->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'photo'=>$this->imageUpload($request, 'photo', 'upload/employee') ?? '',
        ]);

        return response()->json($customer, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer= Customer::find($id)->delete();
        return response()->json($customer, 200);
    }
}
