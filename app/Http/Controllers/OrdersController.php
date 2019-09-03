<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Order;
class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::paginate(10);
        return view('bloodbank.orders.index',compact('orders')); 
    }

 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order=Order::find($id);

        $order->delete();

        return back();
    }
}
