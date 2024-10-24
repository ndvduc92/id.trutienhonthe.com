@extends('layouts.master')
@section('heading')
Thêm tài khoản phụ
@endsection
@section('content')
<link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
<style>
    .gm-panel {
        display: none;
    }
</style>
<div class="col-span-3">
    <div class="dark:bg-darker shadow-lg hover:shadow-xl rounded-lg mb-6 border dark:border-primary-light">
        <div class="p-2 dark:text-primary-light border-b dark:border-primary-light">
            <h4 class="text-2xl font-semibold ">Lưu ý</h4>
        </div>
        <div class="p-2">
            <ul class="max-w-md space-y-1 list-inside">
                <li class="flex items-center">
                    <svg class="w-3.5 h-3.5 me-2 text-green-500 dark:text-green-400 flex-shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg> Thêm tài khoản Meta để tiện lợi hơn trong việc quản lý
                </li>
                <li class="flex items-center"><svg
                        class="w-3.5 h-3.5 me-2 text-green-500 dark:text-green-400 flex-shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg> Có thể đăng nhập nhanh tài khoản phụ từ menu</li>
                <li class="flex items-center"><svg
                        class="w-3.5 h-3.5 me-2 text-green-500 dark:text-green-400 flex-shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg> Chỉ cần nhập đúng tên tài khoản và mật khẩu của tài khoản phụ để xác thực là có thể liên kết
                    thành công</li>
            </ul>
        </div>
    </div>
    <div class="dark:bg-darker shadow-lg hover:shadow-xl rounded-lg mb-6 border dark:border-primary-light">
        <div class="p-2 dark:text-primary-light border-b dark:border-primary-light">
            <h4 class="text-2xl font-semibold ">Thông tin tài khoản phụ</h4>
        </div>
        <div class="p-2">
            <div class="max-w-xl mx-auto mt-6 rounded-md dark:bg-darker bg-white p-4">
                <form method="post" action="">
                    @csrf
                    <div class="relative z-0 mb-6 w-full group">
                        <input
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-cyan-500 focus:outline-none focus:ring-0 focus:border-cyan-600 peer"
                            name="username" required="required">
                        <label
                            class="absolute text-sm text-gray-500 dark:text-cyan-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-gray-600 peer-focus:dark:text-cyan-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                            for="username">
                            Tên đăng nhập
                        </label>
                    </div>
                    <div class="relative z-0 mb-6 w-full group">
                        <input
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-cyan-500 focus:outline-none focus:ring-0 focus:border-cyan-600 peer"
                            name="password" required="required">
                        <label
                            class="absolute text-sm text-gray-500 dark:text-cyan-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-gray-600 peer-focus:dark:text-cyan-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                            for="server_name">
                            Mật khẩu
                        </label>
                    </div>
                    <div class="relative z-0 mb-6 w-full group">
                        <button type="submit"
                            class="w-full px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md bg-primary-dark hover:bg-primary-dark outline-none ring-2 ring-primary ring-offset-1 dark:focus:ring-offset-darker mr-2">
                            Thêm tài khoản Meta
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection