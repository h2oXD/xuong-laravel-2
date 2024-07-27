<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = 'admin.suppliers.';
    public function index()
    {
        $data['suppliers'] = Supplier::get();
        return view(self::PATH_VIEW . __FUNCTION__, $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSupplierRequest $request)
    {
        $validatedData = $request->validate(
            [
                'name'      => 'required|min:3|max:255',
                'address'   => 'required|min:3|max:255',
                'phone'     => 'required|numeric|min:10',
                'email'     => 'required|email',
            ],
            [
                'required'  => ':attribute không hợp lệ',
                'min'       => ':attribute không hợp lệ',
                'max'       => ':attribute phải tối đa là 255 ký tự',
                'numeric'   => ':attribute phải là kiểu số',
                'email'     => ':attribute không hợp lệ',
            ]
        );
        Supplier::create($validatedData);
        return redirect(route('suppliers.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        $data['supplier'] = $supplier->get();
        return view(self::PATH_VIEW . __FUNCTION__, $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        $data['supplier'] = $supplier;
        return view(self::PATH_VIEW . __FUNCTION__, $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupplierRequest $request, Supplier $supplier)
    {
        $validatedData = $request->validate(
            [
                'name'      => 'required|min:3|max:255',
                'address'   => 'required|min:3|max:255',
                'phone'     => 'required|numeric|min:10',
                'email'     => 'required|email',
            ],
            [
                'required'  => ':attribute không hợp lệ',
                'min'       => ':attribute không hợp lệ',
                'max'       => ':attribute phải tối đa là 255 ký tự',
                'numeric'   => ':attribute phải là kiểu số',
                'email'     => ':attribute không hợp lệ',
            ]
        );
        $supplier->update($validatedData);
        return redirect(route('suppliers.index'))->with('msg', 'Thao tác thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return back()->with('msg', 'Thao tác thành công');
    }
}
