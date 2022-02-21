<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Salary;
use App\Models\Employee;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use App\Http\Controllers\Controller;

class SalaryController extends Controller
{
    public function index()
    {
        $salary= Salary::with('employee')->select('employee_id')->groupBy('employee_id')->get();
        //$salary= Salary::with('employee')->orderBy('id','desc')->get();
        return response()->json($salary, 200);
    }

   public function give_salray(Request $request,$id)
   {
    $validator =$request->validate([
        'date' => 'required',
    ]);

    $salary=Employee::where('id',$id)->first();
    $expense=Salary::create([
        'employee_id'=>$id,
        'amount'=>$salary->salary,
        'date'=>Carbon::parse($request->date)->format('Y-m-d'),
    ]);
    return response()->json($expense, 201);
   }

   public function show($id)
   {
       $salray=Salary::with('employee')->where('employee_id',$id)->get();
       return response()->json($salray, 200);
   }
}
