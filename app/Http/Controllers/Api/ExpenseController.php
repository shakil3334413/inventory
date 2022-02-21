<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Expense;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expense= Expense::orderBy('id','desc')->get();
        return response()->json($expense, 200);
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
            'details' => 'required',
            'amount' => 'required',
        ]);
        $expense=Expense::create([
            'details'=>$request->details,
            'amount'=>$request->amount,
            'expense_date'=>Carbon::parse($request->expense_date)->format('Y-m-d'),
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
        $expense= Expense::find($id);
        return response()->json($expense, 200);
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
            'details' => 'required',
            'amount' => 'required',
        ]);
        $expense=Expense::where('id',$id)->update([
            'details'=>$request->details,
            'amount'=>$request->amount,
            'expense_date'=>Carbon::parse($request->expense_date)->format('Y-m-d'),
        ]);

        return response()->json($expense, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expense= Expense::find($id)->delete();
        return response()->json($expense, 200);
    }
}
