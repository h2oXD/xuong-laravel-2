@extends('admin.master')
@section('title')
    Cập nhật nhà cung cấp
@endsection
@section('content')
    <h1>Cập nhật nhà cung cấp</h1>
    @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <form action="{{ route('suppliers.update', $supplier) }}" method="post" class="row">
        @csrf
        @method('PUT')
        <div class="col-6 my-3">
            <label class="form-label" for="">Name</label>
            <input type="text" name="name" id="" class="form-control" value="{{ $supplier->name }}">
        </div>
        <div class="col-6 my-3">
            <label class="form-label" for="">Address</label>
            <input type="text" name="address" id="" class="form-control" value="{{ $supplier->address }}">
        </div>
        <div class="col-6 my-3">
            <label class="form-label" for="">Phone</label>
            <input type="text" name="phone" id="" class="form-control" value="{{ $supplier->phone }}">
        </div>
        <div class="col-6 my-3">
            <label class="form-label" for="">Email</label>
            <input type="text" name="email" id="" class="form-control" value="{{ $supplier->email }}">
        </div>
        <div class="col-3">
            <button class="btn btn-success" type="submit">Cập nhật</button>
            <a class="btn btn-warning" href="{{ route('suppliers.index') }}">Danh sách</a>
        </div>
    </form>
@endsection
