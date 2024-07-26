@extends('admin.master')
@section('title')
    Thêm mới sản phẩm
@endsection
@section('content')
    <h1>Thêm mới sản phẩm</h1>
    <form action="{{ route('products.store') }}" method="post" class="row">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @csrf
        <div class="col-6 my-3">
            <label class="form-label" for="">Name</label>
            <input class="form-control" type="text" name="name" id="" placeholder="Nhập tên">
        </div>
        <div class="col-6 my-3">
            <label class="form-label" for="">Price</label>
            <input class="form-control" type="number" min="0" name="price" id="" placeholder="Nhập giá">
        </div>
        <div class="col-6 my-3">
            <label class="form-label" for="">Quantity</label>
            <input class="form-control" type="number" min="0" name="quantity" id=""
                placeholder="Nhập số lượng">
        </div>
        <div class="col-6 my-3">
            <label class="form-label" for="">Supplier</label>
            <select class="form-select" name="supplier_id" id="">
                <option value="">-Chọn-Supplier-</option>
                @foreach ($suppliers as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="my-3">
            <label class="form-label" for="">Description</label>
            <textarea class="form-control" name="description" id="" cols="20" rows="5" placeholder="Nhập mô tả"></textarea>
        </div>
        <div class="col-3">
            <button class="btn btn-success" type="submit">Thêm mới</button>
            <a class="btn btn-warning" href="{{ route('products.index') }}">Danh sách</a>
        </div>

    </form>
@endsection
