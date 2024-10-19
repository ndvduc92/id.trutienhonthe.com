@extends('layouts.master')
@section('heading')
    Chuyển đổi KNB vào game
@endsection
@section('content')
    <div class="col-span-3">
        <div class="dark:bg-darker shadow-lg hover:shadow-xl rounded-lg mb-6 border dark:border-primary-light">
            <div class="p-2 dark:text-primary-light border-b dark:border-primary-light">
                <h4 class="text-2xl font-semibold ">Đổi KNB</h4>
            </div>
            <div class="p-2">
                <form action=""method="post">
                    @csrf
                    <div class="flex flex-row z-0 mb-6 w-full group">
                        <span class="my-4 mx-4"> Xu </span>
                        <input
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-cyan-500 focus:outline-none focus:ring-0 focus:border-cyan-600 peer"
                            id="donation_dollars" name="cash" type="number" step="1000" min="0">
                        <span class="my-4 mx-4">=</span>
                        <input
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-cyan-500 focus:outline-none focus:ring-0 focus:border-cyan-600 peer"
                            id="donation_tokens" name="tokens" type="" placeholder="" disabled
                            data-tippy="Amount Coin you will receive." data-tippy-arrow="true" data-tippy-size="large"
                            data-tippy-trigger="mouseenter" data-tippy-animation="fade">
                        <span class="my-4 mx-4">KNB</span>
                    </div>
                    <div class="flex flex-row z-0 mb-6 gap-6 w-full group justify-between">
                        <div class="flex flex-row z-0 mb-6 w-1/2 group bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded"
                            role="alert">
                            <span class="block sm:inline">Mỗi lần nạp tối thiểu là 50000 xu</span>
                        </div>
                        <div class="flex flex-row z-0 mb-6 w-1/2 group bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded"
                            role="alert">
                            <span class="block sm:inline">Tỉ lệ: 1000 xu = 3 KNB</span>
                        </div>
                    </div>
                    <div class="flex flex-row z-0 mb-6 w-full group justify-center">
                        <button type="submit"
                            class="w-full px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker w-1/2">
                            Đổi KNB
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="dark:bg-darker shadow-lg hover:shadow-xl rounded-lg mb-6 border dark:border-primary-light">
            <div class="p-2 dark:text-primary-light border-b dark:border-primary-light">
                <h4 class="text-2xl font-semibold ">Bảng Cấp VIP</h4>
            </div>
            <div class="p-2">
                <table class="w-full table-auto">
                    <thead>
                        <tr
                            class="bg-gray-200 dark:bg-primary dark:text-light text-gray-600 uppercase text-xs leading-normal">
                            <th class="py-3 px-6 text-left">Cấp VIP</th>
                            <th class="py-3 px-6 text-left">Số KNB Cần</th>
                            <th class="py-3 px-6 text-left">Số Xu Cần</th>

                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-xs dark:text-light">
                        @foreach($vips as $vip)
                        <tr
                            class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100 dark:border-primary dark:bg-darker dark:hover:bg-primary-dark">
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    {{ $vip["level"] }}
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    {{ $vip["knb"] }}
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    {{ $vip["xu"] }}
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $("#donation_dollars").change(function() {
            $("#donation_tokens").val(($(this).val() / 1000 * 3))
        })
    </script>
@endsection
