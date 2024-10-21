@extends('layouts.master')
@section('heading')
Vòng Quay May Mắn
@endsection
@section('content')
<link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
<style>
    .gm-panel {
        display: none;
    }
    .wheel {
        border: 1px dashed;
    }
</style>

@php
    $enableClass = "inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800";
    $disableClass = "py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700";
@endphp

<div class="col-span-3">
    <div class="dark:bg-darker shadow-lg hover:shadow-xl rounded-lg mb-6 border dark:border-primary-light">
        <div class="p-2 dark:text-primary-light border-b dark:border-primary-light">
            <h2 class="text-2xl font-semibold ">Hướng dẫn</h2>
        </div>
        <div class="p-2">
            <p>Sẽ có 3 loại vòng quay may mắn: Vòng quay hàng ngày, Vòng quay dành cho VIP và vòng quay tốn Xu
            </p>
            <code>* * * * * Vui lòng chọn đúng nhân vật trước khi tham gia</code>
        </div>
    </div>
</div>

<div class="col-span-3">
    <div class="dark:bg-darker shadow-lg hover:shadow-xl rounded-lg mb-6 border dark:border-primary-light">
        <div class="p-2 dark:text-primary-light border-b dark:border-primary-light">
            <h2 class="text-2xl font-semibold ">Hướng dẫn</h2>
        </div>
        <div class="p-2">
            <div class="grid grid-cols-3 gap-8 p-4">
                <div class="flex-col p-4 bg-white rounded-md dark:bg-darker wheel">
                    <h1
                        class="text-sm font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                        Vòng quay hàng ngày
                    </h1>
                    <div class="flex-grow border-t dark:border-primary-light mt-1"></div>
                    <div class="flex mt-4 align-middle items-center">
                        Tất cả thành viên đều có thể tham gia, mỗi ngày 3 lần, item sẽ gởi trực tiếp vào tín sứ. Tất cả đều là item khoá.
                    </div>
                    <div class="flex mt-4 align-middle items-center">
                        <!-- Submit Button -->
                        <a href="/vong-quay-may-man/1" method="get">
                            <button type="button"
                                class="{{ $daily->num_of_times - $daily->usedTimes() == 0 ? $disableClass : $enableClass }}">
                                Tham Gia (còn {{ $daily->num_of_times - $daily->usedTimes() }} lần)
                            </button>
                        </a>
                    </div>
                </div>
                <div class="flex-col p-4 bg-white rounded-md dark:bg-darker wheel">
                    <h1
                        class="text-sm font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                        Vòng quay dành cho VIP
                    </h1>
                    <div class="flex-grow border-t dark:border-primary-light mt-1"></div>
                    <div class="flex mt-4 align-middle items-center">
                        Vòng quay dành cho VIP từ cấp 5 trở lên, mỗi ngày 3 lần, item sẽ gởi trực tiếp vào tín sứ. Tất cả đều là item khoá.
                    </div>
                    <div class="flex mt-4 align-middle items-center">
                        <!-- Submit Button -->
                        <a href="/vong-quay-may-man/2" method="get">
                            <button type="button"
                                class="{{ $vip->num_of_times - $vip->usedTimes() == 0 ? $disableClass : $enableClass }}">
                                Tham Gia (còn {{ $vip->num_of_times - $vip->usedTimes() }} lần)
                            </button>
                        </a>
                    </div>
                </div>
                <div class="flex-col p-4 bg-white rounded-md dark:bg-darker wheel">
                    <h1
                        class="text-sm font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                        Vòng quay tốn Xu
                    </h1>
                    <div class="flex-grow border-t dark:border-primary-light mt-1"></div>
                    <div class="flex mt-4 align-middle items-center">
                        Vòng quay tiêu tốn xu. Giới hạn sẽ tuỳ thuộc vào cấp VIP của bạn, VIP càng cao số lượt càng nhiều. Tất cả đều là item KHÔNG khoá.
                    </div>
                    <div class="flex mt-4 align-middle items-center">
                        <!-- Submit Button -->
                        <a href="/vong-quay-may-man/3" method="get">
                            <button type="button"
                                class="{{ $coin->num_of_times - $coin->usedTimes() == 0 ? $disableClass : $enableClass }}">
                                Tham Gia (còn {{ $coin->num_of_times - $coin->usedTimes() }} lần)
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection