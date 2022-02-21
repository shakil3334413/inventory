<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Salary;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeSalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salary= Salary::with('employee')->orderBy('id','desc')->get();
        return response()->json($salary, 200);
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
            'employee_id' => 'required',
            'amount' => 'required',
            'date' => 'required',
        ]);
        $expense=Salary::create([
            'employee_id'=>$request->employee_id,
            'amount'=>$request->amount,
            'date'=>Carbon::parse($request->date)->format('Y-m-d'),
        ]);
        return response()->json($expense, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $salary= Salary::find($id);
        return response()->json($salary, 200);
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
            'employee_id' => 'required',
            'amount' => 'required',
            'date' => 'required',
        ]);
        $salary=Salary::where('id',$id)->update([
            'employee_id'=>$request->employee_id,
            'amount'=>$request->amount,
            'date'=>Carbon::parse($request->date)->format('Y-m-d'),
        ]);
        return response()->json($salary, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $salary= Salary::find($id)->delete();
        return response()->json($salary, 200);
    }
}
