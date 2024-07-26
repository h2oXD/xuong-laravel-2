@extends('admin.master')
@section('title')
    Danh sách nhà cung cấp
@endsection
@section('content')
    <a class="btn btn-success" href="{{ route('suppliers.create') }}">Thêm mới</a>
    <h1>Danh sách nhà cung cấp</h1>
    <table class="table table-triped">
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        @foreach ($suppliers as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>
                    <a class="btn btn-warning" href="{{ route('suppliers.edit', $item->id) }}">Sửa</a>
                    <form class="d-inline w-auto"  action="{{ route('suppliers.destroy', $item->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Bạn có chắc muốn xoá?')"
                            class="btn btn-danger">Xoá</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
