<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use DateTime;

class OrderController extends Controller
{
    public function todayOrder()
    {
        $date=date('d/m/Y');
        $order=DB::table('orders')
        ->join('customers','orders.customer_id','customers.id')
        ->where('orders.order_date',$date)
        ->select('customers.name','orders.*')
        ->orderBy('orders.id','DESC')->get();

        return response()->json($order);
        
    }

    public function orderDetails($id)
    {
        $order=DB::table('orders')
        ->join('customers','orders.customer_id','customers.id')
        ->where('orders.id',$id)
        ->select('customers.name','customers.phone','customers.address','orders.*')
        ->first();

        return response()->json($order);
    }

    public function orderDetailsAll($id)
    {
        $details=DB::table('order_details')
        ->join('products','order_details.product_id','products.id')
        ->where('order_details.order_id',$id)
        ->select('products.product_name','products.product_code','products.image','order_details.*')
        ->get();
        return response()->json($details);
    }

    public function searchOrder(Request $request)
    {
        $orderdate=$request->date;
        $newDate= new DateTime($orderdate);
        $done=$newDate->format('d/m/Y');
        $order=DB::table('orders')
        ->join('customers','orders.customer_id','customers.id')
        ->select('customers.name','orders.*')
        ->where('orders.order_date',$done)
        ->orderBy('orders.id','DESC')->get();
        return response()->json($order);

    }

    public function TodaySell()
    {
        $date=date('d/m/Y');
        $total=DB::table('orders')
        ->where('orders.order_date',$date)
       ->sum('total');
        return response()->json($total);
    }
    public function Todayincome()
    {
        $date=date('d/m/Y');
        $pay=DB::table('orders')
        ->where('orders.order_date',$date)
       ->sum('pay');
        return response()->json($pay);
    }
    public function Todaydue()
    {
        $date=date('d/m/Y');
        $due=DB::table('orders')
        ->where('orders.order_date',$date)
       ->sum('due');
        return response()->json($due);
    }
    public function Todayexpense()
    {
        $date=date('d/m/Y');
        $due=DB::table('expenses')
        ->where('expenses.expense_date',$date)
       ->sum('amount');
        return response()->json($due);
    }
}
