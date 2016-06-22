<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Order;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class OrderController extends Controller
{

    private $orderModel;

    public function __construct(Order $orderModel)
    {
        $this->orderModel = $orderModel;
    }

    public function index()
    {
        $orders = $this->orderModel->paginate(10);
        return view('orders.index',compact('orders'));
    }


    public function edit($id)
    {
        $order = $this->orderModel->find($id);

        return view('orders.edit',compact('order'));
    }

    public function update(Request $request, $id)
    {
        $this->orderModel->find($id)->update($request->all());
        return redirect()->route('orders');

    }


    public function orders()
    {

        $orders = $this->orderModel->paginate(10);
        return view('orders.index',compact('orders'));
    }
}
