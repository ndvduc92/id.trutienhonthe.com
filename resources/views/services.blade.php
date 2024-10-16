@extends('layouts.master')
@section('heading')
    Dịch Vụ Game
@endsection
@section('content')
    <div class="col-span-3">
        <div class="grid gap-4 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2">
            <form action="/dich-vu-game/quang-ba/1" method="post">
                @csrf
                <div
                    class="flex flex-col dark:bg-darker shadow-lg hover:shadow-xl rounded-lg mb-6 border dark:border-primary-light h-full">
                    <div
                        class="flex flex-row p-2 align-middle align-center dark:text-primary-light border-b dark:border-primary-light">
                        <svg class="w-11 h-11 pr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"
                                d="M12 1a5 5 0 0 1 5 5v4a5 5 0 0 1-10 0V6a5 5 0 0 1 5-5zM3.055 11H5.07a7.002 7.002 0 0 0 13.858 0h2.016A9.004 9.004 0 0 1 13 18.945V23h-2v-4.055A9.004 9.004 0 0 1 3.055 11z">
                            </path>
                        </svg>
                        <div class="flex flex-col">
                            <h2 class="font-extrabold">
                                Phát thông báo
                            </h2>
                            <span class="text-sm">
                                Giá: 1000 xu
                            </span>
                        </div>
                    </div>
                    <div class="p-2 mt-2 text-sm">
                        <span>Phát thông báo trong game, bạn sẽ được lắng nghe!</span>
                        <span class="block" style="color:green">Yêu cầu: Nhân vật phải đang đăng nhập trong game</span>
                    </div>
                    <div class="p-2">
                        <input
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-cyan-500 focus:outline-none focus:ring-0 focus:border-cyan-600 peer"
                            name="message" type="text" placeholder="Tin nhắn" required>
                    </div>
                    <div class="mt-auto items-center justify-between p-2">
                        <button type="submit"
                            {{ youOnline() ? "" : "disabled"}}
                            class="w-full px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker">
                            {{ youOnline() ? "Mua" : "Người chơi không online"}}
                        </button>
                    </div>
                </div>
            </form>
            <form action="/dich-vu-game/quang-ba/2" method="post">
                @csrf
                <div
                    class="flex flex-col dark:bg-darker shadow-lg hover:shadow-xl rounded-lg mb-6 border dark:border-primary-light h-full">
                    <div
                        class="flex flex-row p-2 align-middle align-center dark:text-primary-light border-b dark:border-primary-light">
                        <svg class="w-11 h-11 pr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"
                                d="M12 1a5 5 0 0 1 5 5v4a5 5 0 0 1-10 0V6a5 5 0 0 1 5-5zM3.055 11H5.07a7.002 7.002 0 0 0 13.858 0h2.016A9.004 9.004 0 0 1 13 18.945V23h-2v-4.055A9.004 9.004 0 0 1 3.055 11z">
                            </path>
                        </svg>
                        <div class="flex flex-col">
                            <h2 class="font-extrabold">
                                Phát lời chúc mừng
                            </h2>
                            <span class="text-sm">
                                Giá: 5000 xu
                            </span>
                        </div>
                    </div>
                    <div class="p-2 mt-2 text-sm">
                        <span>Phát lời chúc mừng trong game!</span>
                        <span class="block" style="color:green">Yêu cầu: Nhân vật phải đang đăng nhập trong game</span>
                    </div>
                    <div class="p-2">
                        <input
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-cyan-500 focus:outline-none focus:ring-0 focus:border-cyan-600 peer"
                            name="message" type="text" placeholder="Tin nhắn" required>
                    </div>
                    <div class="mt-auto items-center justify-between p-2">
                        <button type="submit"
                            {{ youOnline() ? "" : "disabled"}}
                            class="w-full px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker">
                            {{ youOnline() ? "Mua" : "Người chơi không online"}}
                        </button>
                    </div>
                </div>
            </form>
            {{-- <form action="/dich-vu-game/level" method="post">
                @csrf
                <div
                    class="flex flex-col dark:bg-darker shadow-lg hover:shadow-xl rounded-lg mb-6 border dark:border-primary-light h-full">
                    <div
                        class="flex flex-row p-2 align-middle align-center dark:text-primary-light border-b dark:border-primary-light">
                        <svg class="w-11 h-11 pr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"
                                d="M12 12.586l4.243 4.242-1.415 1.415L13 16.415V22h-2v-5.587l-1.828 1.83-1.415-1.415L12 12.586zM12 2a7.001 7.001 0 0 1 6.954 6.194 5.5 5.5 0 0 1-.953 10.784L18 17a6 6 0 0 0-11.996-.225L6 17v1.97">
                            </path>
                        </svg>
                        <div class="flex flex-col">
                            <h2 class="font-extrabold">
                                Level Up
                            </h2>
                            <span class="text-sm">
                                Giá: 100.000 xu
                            </span>
                        </div>
                    </div>
                    <div class="p-2 mt-2 text-sm">
                        <span>Nhanh chóng nâng cấp level của nhân vật lên 150.</span>
                        <span class="block" style="color:green">Yêu cầu: Nhân vật phải đang LOG OUT</span>
                    </div>
                    <div class="p-2">
                        <input
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-cyan-500 focus:outline-none focus:ring-0 focus:border-cyan-600 peer"
                            name="quantity" type="number" placeholder="Số lượng">
                    </div>
                    <div class="mt-auto items-center justify-between p-2">
                        <button type="submit"
                            class="w-full px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker">
                            Mua
                        </button>
                    </div>
                </div>
            </form> --}}
        </div>
    </div>
@endsection
