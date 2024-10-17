@extends('layouts.master')
@section('heading')
    Vòng Quay May Mắn
@endsection
@section('content')
    <div class="col-span-3">
        <div class="mt-2 pb-16">
            <div class="max-w mx-6 my-6">
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
            <div class="max-w-screen-xl mx-6 my-6">
                <div class="grid grid-cols-3 gap-8 p-4">
                    <div class="flex-col p-4 bg-white rounded-md dark:bg-darker">
                        <h1
                            class="text-sm font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                            Vòng quay hàng ngày
                        </h1>
                        <div class="flex-grow border-t dark:border-primary-light mt-1"></div>
                        <div class="flex mt-4 align-middle items-center">
                            Tất cả thành viên đều có thể tham gia, mỗi ngày 3 lần, item sẽ gởi trực tiếp vào tín sứ.
                        </div>
                        <div class="flex mt-4 align-middle items-center">
                            <!-- Submit Button -->
                            <form action="#" method="get">
                                <a type="submit" href="/vong-quay-may-man/1" target="_blank"
                                    class="w-full px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker w-auto"
                                    data-tippy="Execute the request!" data-tippy-arrow="true" data-tippy-size="large"
                                    data-tippy-trigger="mouseenter" data-tippy-animation="fade">
                                    Tham Gia (còn {{ $daily->num_of_times - $daily->usedTimes() }} lần)
                                </a>
                            </form>
                        </div>
                    </div>
                    <div class="flex-col p-4 bg-white rounded-md dark:bg-darker">
                        <h1
                            class="text-sm font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                            Vòng quay dành cho VIP
                        </h1>
                        <div class="flex-grow border-t dark:border-primary-light mt-1"></div>
                        <div class="flex mt-4 align-middle items-center">
                            Vòng quay dành cho VIP từ cấp 5 trở lên, mỗi ngày 3 lần, item sẽ gởi trực tiếp vào tín sứ.
                        </div>
                        <div class="flex mt-4 align-middle items-center">
                            <!-- Submit Button -->
                            <form action="#" method="get">
                                <a type="submit" href="/vong-quay-may-man/2" target="_blank"
                                    class="w-full px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker w-auto"
                                    data-tippy="Execute the request!" data-tippy-arrow="true" data-tippy-size="large"
                                    data-tippy-trigger="mouseenter" data-tippy-animation="fade">
                                    Tham Gia (còn {{ $vip->num_of_times - $vip->usedTimes() }} lần)
                                </a>
                            </form>
                        </div>
                    </div>
                    <div class="flex-col p-4 bg-white rounded-md dark:bg-darker">
                        <h1
                            class="text-sm font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                            Vòng quay tốn Xu
                        </h1>
                        <div class="flex-grow border-t dark:border-primary-light mt-1"></div>
                        <div class="flex mt-4 align-middle items-center">
                            Vòng quay tiêu tốn xu. Bạn sẽ nhận được những vật phẩm có giá trị cao. Giới hạn 50 lần/ngày
                        </div>
                        <div class="flex mt-4 align-middle items-center">
                            <!-- Submit Button -->
                            <form action="#" method="get">
                                <a type="submit" href="/vong-quay-may-man/3" target="_blank"
                                    class="w-full px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker w-auto"
                                    data-tippy="Execute the request!" data-tippy-arrow="true" data-tippy-size="large"
                                    data-tippy-trigger="mouseenter" data-tippy-animation="fade">
                                    Tham Gia (còn {{ $coin->num_of_times - $coin->usedTimes() }} lần)
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
