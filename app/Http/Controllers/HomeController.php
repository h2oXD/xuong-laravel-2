<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Employee;
use App\Models\Log;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // DB::table('users')->insert([
        //     [
        //         'name' => 'vanB',
        //         'email' => 'b@gmail.com',
        //         'password' => bcrypt(123456789),
        //         'age' => 12,
        //         'status' => 'active'
        //     ],
        //     [
        //         'name' => 'vanc',
        //         'email' => 'c@gmail.com',
        //         'password' => bcrypt(123456789),
        //         'age' => 26,
        //         'status' => 'disable'
        //     ],
        //     [
        //         'name' => 'vane',
        //         'email' => 'e@gmail.com',
        //         'password' => bcrypt(123456789),
        //         'age' => 27,
        //         'status' => 'active'
        //     ],
        // ]);
        // for ($i = 20; $i <= 30; $i++) {
        //     User::query()->insert([
        //         'name' => "NguoiDung$i",
        //         'email' => "b$i@gmail.com",
        //         'password' => bcrypt(123456789),
        //         'age' => $i,
        //         'status' => 'completed'
        //     ]);
        // }


        // Yêu cầu 1: Truy vấn tất cả các bản ghi - 
        // Viết truy vấn để lấy tất cả các bản ghi từ bảng users.
        // $data['usersQRB'] = DB::table('users')->get();
        // $data['usersELQ'] = User::query()->get();

        // Yêu cầu 2: Truy vấn với điều kiện - 
        // Viết truy vấn để lấy các bản ghi từ bảng users mà cột age lớn hơn 25.
        // $data['usersQRB'] = DB::table('users')->where('age','>',25)->ddRawSql();
        // $data['usersELQ'] = User::query()->where('age','>',25)->get();

        // Yêu cầu 3: Truy vấn với nhiều điều kiện - 
        // Viết truy vấn để lấy các bản ghi từ bảng users mà cột age lớn hơn 25 và status bằng 'active'.
        // $data['usersQRB'] = DB::table('users')
        // ->where('age','>',25)
        // ->where('status','active')
        // ->ddRawSql();

        // $data['usersELQ'] = User::query()->where('age','>',25)->where('status','active')->get();

        // Yêu cầu 4: Sắp xếp kết quả - 
        // Viết truy vấn để lấy các bản ghi từ bảng users, sắp xếp theo age giảm dần.
        // $data['usersQRB'] = DB::table('users')->orderBy('age','asc')->ddRawSql();
        // $data['usersELQ'] = User::query()->orderBy('age')->get();

        // Yêu cầu 5: Giới hạn số lượng kết quả - Viết truy vấn để lấy 10 bản ghi đầu tiên từ bảng products.
        // $data['usersQRB'] = DB::table('products')->limit(10)->get();
        // $data['productsELQ'] = Product::query()->take(10)->ddRawSql();

        // Yêu cầu 6: Truy vấn với điều kiện OR - 
        // Viết truy vấn để lấy các bản ghi từ bảng orders mà status là 'completed' hoặc total lớn hơn 100.
        // $data['usersQRB'] = DB::table('orders')->Where('status','completed')->orWhere('total','>',100)->ddRawSql();
        // $data['usersELQ'] = Order::query()->Where('status','completed')->orWhere('total','>',100)->get();

        // Yêu cầu 7: Truy vấn với LIKE - Viết truy vấn để lấy các bản ghi từ bảng customers mà name chứa chuỗi 'John'.
        // $data['usersQRB'] = DB::table('customers')->Where('name','LIKE','%John%')->ddRawSql();
        // $data['usersELQ'] = Customer::where('name','LIKE','%John%')->get();

        // Yêu cầu 8: Truy vấn với BETWEEN - 
        // Viết truy vấn để lấy các bản ghi từ bảng sales mà amount nằm trong khoảng từ 1000 đến 5000.
        // $data['usersQRB'] = DB::table('sales')->whereBetween('amount',[1000,5000])->ddRawSql();
        // $data['usersELQ'] = Sale::whereBetween('amount',[1000,5000])->get();

        // Yêu cầu 9: Truy vấn với IN - 
        // Viết truy vấn để lấy các bản ghi từ bảng employees mà department_id nằm trong danh sách [1, 2, 3].
        // $data['usersQRB'] = DB::table('employees')->whereIn('department_id',[1, 2, 3])->ddRawSql();
        // $data['usersELQ'] = Employee::whereIn('department_id',[1, 2, 3])->get();

        // Yêu cầu 10: Thực hiện JOIN - 
        // Viết truy vấn để lấy thông tin từ bảng orders và bảng customers với điều kiện orders.customer_id = customers.id.
        // $data['usersQRB'] = DB::table('orders')->join('customers','orders.customer_id','customers.id')->ddRawSql();
        // $data['usersELQ'] = Order::join('customers','orders.customer_id','customers.id')->ddRawSql();

        // Yêu cầu 11: Truy vấn với nhóm và tổng hợp -
        // Viết truy vấn để tính tổng số lượng quantity của mỗi sản phẩm từ bảng order_items, nhóm theo product_id.
        // $data['usersQRB'] = DB::table('order_items')
        // ->select('product_id', DB::raw('SUM(quantity) as total'))
        // ->groupBy('product_id')
        // ->ddRawSql();
        // $data['usersELQ'] = OrderItem::select('product_id', DB::raw('SUM(quantity) as total'))->groupBy('product_id')->get();

        // Yêu cầu 12: Cập nhật bản ghi - 
        // Viết truy vấn để cập nhật status của tất cả các đơn hàng trong bảng orders thành 'shipped' nếu status hiện tại là 'processing'.
        // $data['usersELQ'] = Order::where('status','processing')->update(['status'=>'shipped']);
        // $data['usersQRB'] = DB::table('orders')->where('status','processing')->update(['status'=>'shipped']);

        // Yêu cầu 13: Xóa bản ghi - 
        // Viết truy vấn để xóa tất cả các bản ghi từ bảng logs mà created_at trước ngày 1/1/2020
        // $data['usersELQ'] = Log::where('created_at','<','2020/01/01')->delete();

        // Yêu cầu 14: Thêm bản ghi mới - 
        // Viết truy vấn để thêm một bản ghi mới vào bảng products với các thông tin về tên sản phẩm, giá và số lượng.
        // Product::insert([
        //     'name' => 'IPhone12',
        //     'price' => 100,
        //     'quantity' =>200,
        //     'status' => 'active'
        // ]);
        // $data['usersELQ'] = Product::get();

        // Yêu cầu 15: Sử dụng Raw Expressions - 
        // Viết truy vấn để lấy các bản ghi từ bảng users mà tháng sinh (birth_date) là tháng 5.
        // User::where(DB::raw('MONTH(birth_date)'), 5)->ddRawSql();

        //Bài 1
        // DB::table('employees as e')
        // ->where('d.department_name','IT')
        // ->select('e.first_name','e.last_name','d.department_name')
        // ->join('department as d','e.deparment_id','d.department_id')
        // ->ddRawSql();

        // Bài 2
        // Employee::from('employees as e')
        // ->where('e.salary','>',70000)
        // ->where('d.deparment_name','Marketing')
        // ->select('e.first_name','e.last_name','d.department_name')
        // ->join('department as d','e.deparment_id','d.department_id')
        // ->ddRawSql();

        // Bài 3
        // Employee::from('employees as e')
        // ->whereBetween('e.salary',[50000,70000])
        // ->select('e.first_name','e.last_name','d.department_name')
        // ->join('department as d','e.deparment_id','d.department_id')
        // ->ddRawSql();

        // Bài 4
        // Employee::from('employees as e')
        // ->where('d.department_name','<>','HR')
        // ->select('e.first_name','e.last_name','d.department_name')
        // ->join('department as d','e.deparment_id','d.department_id')
        // ->ddRawSql();

        // Bài 5
        // Employee::from('employees as e')
        // ->where('e.last_name','LIKE','D%')
        // ->select('e.first_name','e.last_name','d.department_name')
        // ->join('department as d','e.deparment_id','d.department_id')
        // ->ddRawSql();

        // Bài 6
        // Employee::from('employees as e')
        // ->where('e.salary',DB::raw('SELECT MAX(salary) FROM employees WHERE department_id = e.department_id'))
        // ->select('e.first_name','e.last_name','d.department_name')
        // ->join('department as d','e.deparment_id','d.department_id')
        // ->ddRawSql();

        // Bài 7
        // Employee::from('employees as e')
        // ->where('e.hire_date','<=', DB::raw("SELECT DATEADD(year,-3,GETDATE())"))
        // ->select('e.first_name','e.last_name','d.department_name')
        // ->join('department as d','e.deparment_id','d.department_id')
        // ->ddRawSql();

        // dd($data);
        return view('welcome', $data = []);
    }
}
