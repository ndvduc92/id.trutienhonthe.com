@extends('layouts.auth')
@section('content')
    <div class="w-full max-w-sm px-4 py-6 space-y-6 bg-white rounded-md dark:bg-darker">
        <h1 class="text-xl font-semibold text-center">
            ĐĂNG KÝ
        </h1>

        <form method="POST" action="" class="space-y-6">
            @csrf
            @if ($errors->any())
            <div class="alert p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    <span class="error font-medium">{{ $errors->first() }}</span>
                </div>
            @endif
            @if (Session::has('error'))
                <div class="alert p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    <span class="error font-medium">{{ Session::get('error') }}</span>
                </div>
            @endif
            @if (Session::has('success'))
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                    role="alert">
                    <span class="success font-medium">{{ Session::get('success') }}</span>
                </div>
            @endif
            <input
                class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker"
                id="name" type="text" name="login" placeholder="Tên đăng nhập" autofocus="autofocus"
                required="required" value="{{ old('login') }}">

            <input
                class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker"
                id="password" type="password" name="passwd" placeholder="Mật khẩu" autofocus="autofocus"
                required="required">

            <input
                class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker"
                id="password_confirmation" type="password" name="passwdConfirm" placeholder="Nhập lại mật khẩu"
                autofocus="autofocus" required="required">

            <input
                class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker"
                id="email" type="email" name="email" placeholder="Địa chỉ email" autofocus="autofocus"
                required="required">

            <input
                class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker"
                id="phonenumber" type="phonenumber" name="phone" placeholder="Số điện thoại" autofocus="autofocus"
                required="required">
            <button type="submit"
                class="w-full px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker">
                Đăng Ký
            </button>
        </form>
        <div class="text-sm text-gray-600 dark:text-gray-400">
            Đã có tài khoản? <a href="/dang-nhap" class="text-blue-600 hover:underline">Đăng Nhập</a>
        </div>
    </div>
@endsection
