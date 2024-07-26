<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Supplier;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = 'admin.products.';
    public function index()
    {
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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['suppliers'] = Supplier::get();
        return view(self::PATH_VIEW . __FUNCTION__, $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        Product::create($request->all());
        return redirect(route('products.index'))->with('msg','Thao tác thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $data['product'] = $product;
        $data['suppliers'] = Supplier::get();
        return view(self::PATH_VIEW . __FUNCTION__,$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $data['product'] = $product;
        $data['suppliers'] = Supplier::get();
        return view(self::PATH_VIEW . __FUNCTION__, $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->all());
        return redirect(route('products.index'))->with('msg','Thao tác thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('msg','Thao tác thành công');
    }
}
