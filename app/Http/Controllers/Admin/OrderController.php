<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Customer;
use App\Models\Product;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = 'admin.orders.';
    public function index()
    {
        $data['orders'] = Order::from('orders as o')->select(
            'o.id',
            'c.name as c_name',
            'o.created_at',
            'o.total'
        )->join('customers as c','o.customer_id','c.id')->get();
        return view(self::PATH_VIEW . __FUNCTION__,$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['customers'] = Customer::get();
        $data['products'] = Product::from('products as p')->select([
            'p.id',
            'p.name',
            'p.price',
            'p.quantity',
            's.name as s_name',
            'p.created_at',
            'p.updated_at'

        ])->join('suppliers as s','s.id','p.supplier_id')->get();
        return view(self::PATH_VIEW . __FUNCTION__, $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
