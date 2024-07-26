@extends('admin.master')
@section('title')
    Chi tiết sản phẩm
@endsection
@section('content')
    <h1>Chi tiết {{ $product->name }}</h1>
    <div class="row">
        <div class="col-6 my-3">
            <label class="form-label" for="">Name</label>
            <input disabled class="form-control" type="text" name="name" value="{{ $product->name }}" id=""
                placeholder="Nhập tên">
        </div>
        <div class="col-6 my-3">
            <label class="form-label" for="">Price</label>
            <input disabled class="form-control" type="number" min="0" value="{{ $product->price }}" name="price"
                id="" placeholder="Nhập giá">
        </div>
        <div class="col-6 my-3">
            <label class="form-label" for="">Quantity</label>
            <input disabled class="form-control" type="number" min="0" name="quantity" value="{{ $product->quantity }}"
                id="" placeholder="Nhập số lượng">
        </div>
        <div class="col-6 my-3">
            <label class="form-label" for="">Supplier</label>
            <select disabled class="form-select" name="supplier_id" id="">
                <option value="">-Chọn-Supplier-</option>
                @foreach ($suppliers as $item)
                    <option @if ($item->id == $product->supplier_id) selected @endif value="{{ $item->id }}">
                        {{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="my-3">
            <label class="form-label" for="">Description</label>
            <textarea disabled class="form-control" name="description" id="" cols="20" rows="5" placeholder="Nhập mô tả">{{ $product->description }}</textarea>
        </div>
    </div>
@endsection
