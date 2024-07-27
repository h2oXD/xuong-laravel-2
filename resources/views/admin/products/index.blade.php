@extends('admin.master')
@section('title')
    Danh sách sản phẩm
@endsection
@section('content')
    <h3>Danh sách sản phẩm</h3>
    <a class="btn btn-success mb-3" href="{{ route('products.create') }}">Thêm mới</a>
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Supplier</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th colspan="2">Action</th>
        </tr>
        @foreach ($products as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->s_name }}</td>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->updated_at }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('products.show', $item) }}">Chi tiết</a>
                    <a class="btn btn-warning" href="{{ route('products.edit', $item) }}">Sửa</a>
                </td>
                <td>
                    <form action="{{ route('products.destroy', $item) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit" onclick="return confirm('Bạn có chắc chắn không?')"><i
                                class="bi bi-trash3"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
