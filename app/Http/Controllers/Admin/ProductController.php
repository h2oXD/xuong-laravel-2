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
        $validatedData = $request->validate([
            'name'          => 'required|min:8|max:255',
            'price'         => 'required|numeric',
            'quantity'      => 'required|integer',
            'description'   => 'required',
            'supplier_id'   => 'required'
        ],
        [
            'name.required'         => 'Tên là bắt buộc',
            'name.min'              => 'Tên phải lớn hơn 8 ký tự',
            'name.max'              => 'Tên phải nhỏ hơn 255 ký tự',
            'price.required'        => 'Giá là bắt buộc',
            'price.numeric'         => 'Giá là bắt buộc',
            'quantity.required'     => 'Số lượng là bắt buộc',
            'quantity.integer'      => 'Giá phải là số nguyên',
            'description.required'  => 'Mô tả không hợp lệ',
            'supplier_id.required'  => 'Nhà cung cấp không hợp lệ',

        ]);
        Product::create($validatedData);
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
        $validatedData = $request->validate([
            'name'          => 'required|min:8|max:255',
            'price'         => 'required|numeric',
            'quantity'      => 'required|integer',
            'description'   => 'required',
            'supplier_id'   => 'required'
        ],
        [
            'name.required'         => 'Tên là bắt buộc',
            'name.min'              => 'Tên phải lớn hơn 8 ký tự',
            'name.max'              => 'Tên phải nhỏ hơn 255 ký tự',
            'price.required'        => 'Giá là bắt buộc',
            'price.numeric'         => 'Giá là bắt buộc',
            'quantity.required'     => 'Số lượng là bắt buộc',
            'quantity.integer'      => 'Giá phải là số nguyên',
            'description.required'  => 'Mô tả không hợp lệ',
            'supplier_id.required'  => 'Nhà cung cấp không hợp lệ',

        ]);
        $product->update($validatedData);
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
