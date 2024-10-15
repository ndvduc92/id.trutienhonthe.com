@extends('layouts.master')
@section('heading')
    Thông Tin Tài Khoản
@endsection
@section('content')
    <div class="col-span-3">
        <div class="max-w-xl mx-auto mt-6 rounded-md dark:bg-darker bg-white p-4">
            
            <form method="post" action="">
                <div class="text-center">
                    <img id="current_logo"
                    class="text-center"
                        src="/fe/img/logo.png"
                        alt="Age of Chaos" width="200" height="200">
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <input
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-cyan-500 focus:outline-none focus:ring-0 focus:border-cyan-600 peer"
                        value="AOC{{ Auth::user()->userid }}" name="server_name" disabled placeholder="" required="required"
                        >
                    <label
                        class="absolute text-sm text-gray-500 dark:text-cyan-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-gray-600 peer-focus:dark:text-cyan-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                        for="server_name">
                        ID
                    </label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <input
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-cyan-500 focus:outline-none focus:ring-0 focus:border-cyan-600 peer"
                        value="{{ Auth::user()->username }}" name="server_name" disabled placeholder="" required="required"
                        >
                    <label
                        class="absolute text-sm text-gray-500 dark:text-cyan-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-gray-600 peer-focus:dark:text-cyan-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                        for="server_name">
                        Tên đăng nhập 
                    </label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <input
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-cyan-500 focus:outline-none focus:ring-0 focus:border-cyan-600 peer"
                        value="{{ Auth::user()->email2 }}" name="discord" disabled placeholder="" required="required"
                        >
                    <label
                        class="absolute text-sm text-gray-500 dark:text-cyan-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-gray-600 peer-focus:dark:text-cyan-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                        for="discord">
                        Email <a class="inline-block px-2 py-px text-xs text-red-500 bg-red-100 font-semibold rounded-md" href="/doi-mat-khau"><strong role="button">Thay đổi</strong></a>
                    </label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <input
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-cyan-500 focus:outline-none focus:ring-0 focus:border-cyan-600 peer"
                        value="{{ Auth::user()->phone }}" name="currency_name" disabled placeholder="" required="required"
                        >
                    <label
                        class="absolute text-sm text-gray-500 dark:text-cyan-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-gray-600 peer-focus:dark:text-cyan-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                        for="currency_name">
                        Số điện thoại
                    </label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <input
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-cyan-500 focus:outline-none focus:ring-0 focus:border-cyan-600 peer"
                        value="{{ Auth::user()->balance }} xu" name="gmwa" disabled placeholder="" required="required"
                        >
                    <label
                        class="absolute text-sm text-gray-500 dark:text-cyan-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-gray-600 peer-focus:dark:text-cyan-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                        for="gmwa">
                        Số dư
                    </label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <input
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-cyan-500 focus:outline-none focus:ring-0 focus:border-cyan-600 peer"
                        value="*********" name="fakeonline" disabled placeholder="" required="required"
                        >
                    <label
                        class="absolute text-sm text-gray-500 dark:text-cyan-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-gray-600 peer-focus:dark:text-cyan-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                        for="gmwa">
                        Mật khẩu <a class="inline-block px-2 py-px text-xs text-red-500 bg-red-100 font-semibold rounded-md" href="/doi-mat-khau"><strong role="button">Thay đổi</strong></a>
                    </label>
                </div>
            </form>
        </div>
    </div>
@endsection
