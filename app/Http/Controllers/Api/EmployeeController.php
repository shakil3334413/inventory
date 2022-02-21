<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeStore;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee= Employee::orderBy('id','desc')->get();
        return response()->json($employee, 201);
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
            'salary' => 'required',
            'photo' =>'nullable','mimes:jpeg,png,jpg','max:2048',
            'nid' => 'required|unique:employees',
        ]);
        $employee=Employee::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'salary'=>$request->salary,
            'photo'=>$this->imageUpload($request, 'photo', 'upload/employee') ?? '',
            'nid'=>$request->nid,
            'join_date'=>Carbon::parse($request->join_date)->format('Y-m-d'),
        ]);

        return response()->json($employee, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee= Employee::find($id);
        return response()->json($employee, 200);
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
        //   $validator =$request->validate([
        //     'email' => 'required|unique:employees,email'.$id,
        //     'name' => 'required|string|between:2,100',
        //     'phone' => 'required|unique:employees,phone'.$id,
        //     'salary' => 'required',
        //     'photo' =>'nullable','mimes:jpeg,png,jpg','max:2048',
        //     'nid' => 'required|unique:employees,nid'.$id,
        // ]);
        $employee=Employee::where('id',$id)
        ->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'salary'=>$request->salary,
            'photo'=>$this->imageUpload($request, 'photo', 'upload/employee') ?? '',
            'nid'=>$request->nid,
            'join_date'=>Carbon::parse($request->join_date)->format('Y-m-d'),
        ]);

        return response()->json($employee, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee= Employee::find($id)->delete();
        return response()->json($employee, 200);
    }
}
