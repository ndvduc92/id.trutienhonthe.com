@extends('layouts.master')
@section('heading')
    Khu Vực Trò Chuyện
@endsection
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <style>
        .gm-panel {
            display: none;
        }
    </style>
    <div class="col-span-3">
        <div class="dark:bg-darker shadow-lg hover:shadow-xl rounded-lg mb-6 border dark:border-primary-light">
            <div class="p-2 dark:text-primary-light border-b dark:border-primary-light">
                <h4 class="text-2xl font-semibold ">Lịch sử chat</h4>
            </div>
            <div class="p-2">
                <div class="flex-1 p:2 sm:p-6 justify-between flex flex-col h-screen" style="max-height: 500px">
                    <div id="messages"
                        class="flex flex-col space-y-4 p-3 overflow-y-auto scrollbar-thumb-blue scrollbar-thumb-rounded scrollbar-track-blue-lighter scrollbar-w-2 scrolling-touch">
                        @foreach ($chs as $ch)
                            <div class="chat-message">
                                <div class="flex items-end">
                                    <div class="flex flex-col space-y-2 text-xs mx-2 order-2">
                                        <div> {{ $ch['date'] }} <span style="color: {{ $ch['color'] }}"
                                                class="px-4 py-2 rounded-lg inline-block rounded-bl-none">
                                                [{{ $ch['from'] }}]<strong
                                                    style="color: #abb794">{{ getName($ch['uid']) }}</strong>:
                                                {{ $ch['msg'] }}
                                            </span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="border-t-2 border-gray-200 px-4 pt-4 mb-2 sm:mb-0">
                        <form class="relative flex" action="/message" method="POST" style="">
                            @csrf
                            <input style=" padding: 12px 20px" required name="msg"
                                placeholder=" Gửi tin nhắn miễn phí vào game kênh [Thế Giới]! Yêu cầu nhân vật phải online"
                                class="w-full focus:outline-none focus:placeholder-gray-400 text-gray-600 placeholder-gray-600 pl-12 bg-gray-200 rounded-md py-3">
                            <div class="absolute right-0 items-center inset-y-0 hidden sm:flex">

                                <button type="submit"
                                    class="inline-flex items-center justify-center rounded-lg px-4 py-3 transition duration-500 ease-in-out text-white bg-blue-500 hover:bg-blue-400 focus:outline-none">
                                    <span class="font-bold">Gửi</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="h-6 w-6 ml-2 transform rotate-90">
                                        <path
                                            d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
