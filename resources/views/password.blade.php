@extends('layouts.master')
@section('heading')
    Đổi Mật Khẩu
@endsection
@php
    $inputClass =
        'w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker mt-1 block w-full';
@endphp
@section('content')
    <div class="col-span-3">
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="mt-5 md:mt-0 md:col-span-2 ">
                        <form action="" method="POST">
                            @csrf
                            <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md dark:bg-darker">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <label class="block font-medium text-sm text-gray-700 dark:text-light"
                                            for="current_password">
                                            Mật khẩu hiện tại
                                        </label>
                                        <input class="{{ $inputClass }}" type="password" name="old" required>
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label class="block font-medium text-sm text-gray-700 dark:text-light"
                                            for="password">
                                            Mật khẩu mới
                                        </label>
                                        <input class="{{ $inputClass }}" type="password" name="new" required>
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label class="block font-medium text-sm text-gray-700 dark:text-light"
                                            for="password_confirmation">
                                            Xác nhận mật khẩu mới
                                        </label>
                                        <input class="{{ $inputClass }}" type="password" name="newcf" required>
                                    </div>
                                    <div class="col-span-6 sm:col-span-4">
                                        <label class="block font-medium text-sm text-gray-700 dark:text-light">
                                            OTP <span>(<strong role="button" id="otp" style="color:green">Nhấn
                                                    vào ĐÂY</strong> lấy OTP về email)</span>
                                        </label>
                                        <input class="{{ $inputClass }}" name="otp" required>

                                    </div>
                                    <div class="col-span-6 sm:col-span-4" id="optsuccess" style="display: none">
                                        <label style="color:green"
                                            class="block font-medium text-sm text-red-700 dark:text-light">
                                            *Vui lòng kiểm tra email để lấy mã OTP.
                                        </label>

                                    </div>
                                </div>
                            </div>

                            <div
                                class="flex items-center px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md dark:bg-darker">
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker">
                                    Thực Hiện
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js">
    </script>
    <script>
        $("#otp").click(function() {
            $.LoadingOverlay("show", {
                image: "",
                text: "Chờ một chút..."
            })
            $("#optsuccess").css("display", "none")
            var base_url = '/otp'
            event.preventDefault();

            $.ajax({
                url: base_url,
                dataType: 'json',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                type: "POST"
            }).done(function() {
                $.LoadingOverlay("hide")
                $("#optsuccess").css("display", "block")
            }).fail(function(data) {
                $.LoadingOverlay("hide")
                alert("Có lỗi xảy ra, vui lòng thử lại sau!");
            });;
        })
    </script>
@endsection
