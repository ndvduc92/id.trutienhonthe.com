<div>
    <!-- GM's Widget -->
    <div class="w-64">
        <div class="flex-col bg-white rounded-md dark:bg-darker border dark:border-primary">
            <div class="p-2 border-b dark:border-primary">
                <h1
                    class="text-sm font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                    LIÊN HỆ GM
                </h1>
            </div>
            <div class="flex align-middle items-center">
                <div class="flex flex-col mx-2 my-2 w-full rounded" role="alert">
                    <a class="font-bold" href="https://www.messenger.com/t/zhuxian.AOC" target="_blank">
                        <svg style="display:inline" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-messenger" viewBox="0 0 16 16">
                            <path
                                d="M0 7.76C0 3.301 3.493 0 8 0s8 3.301 8 7.76-3.493 7.76-8 7.76c-.81 0-1.586-.107-2.316-.307a.64.64 0 0 0-.427.03l-1.588.702a.64.64 0 0 1-.898-.566l-.044-1.423a.64.64 0 0 0-.215-.456C.956 12.108 0 10.092 0 7.76m5.546-1.459-2.35 3.728c-.225.358.214.761.551.506l2.525-1.916a.48.48 0 0 1 .578-.002l1.869 1.402a1.2 1.2 0 0 0 1.735-.32l2.35-3.728c.226-.358-.214-.761-.551-.506L9.728 7.381a.48.48 0 0 1-.578.002L7.281 5.98a1.2 1.2 0 0 0-1.735.32z" />
                        </svg> Messenger</strong>

                        <a class="font-bold" href="https://zalo.me/0332141485" target="_blank">
                            <svg style="display:inline" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-messenger" viewBox="0 0 16 16">
                                <path
                                    d="M0 7.76C0 3.301 3.493 0 8 0s8 3.301 8 7.76-3.493 7.76-8 7.76c-.81 0-1.586-.107-2.316-.307a.64.64 0 0 0-.427.03l-1.588.702a.64.64 0 0 1-.898-.566l-.044-1.423a.64.64 0 0 0-.215-.456C.956 12.108 0 10.092 0 7.76m5.546-1.459-2.35 3.728c-.225.358.214.761.551.506l2.525-1.916a.48.48 0 0 1 .578-.002l1.869 1.402a1.2 1.2 0 0 0 1.735-.32l2.35-3.728c.226-.358-.214-.761-.551-.506L9.728 7.381a.48.48 0 0 1-.578.002L7.281 5.98a1.2 1.2 0 0 0-1.735.32z" />
                            </svg> Zalo 1 (0332.141485)</strong>
                            <a class="font-bold" href="https://www.messenger.com/t/zhuxian.AOC" target="_blank">
                                <svg style="display:inline" xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" fill="currentColor" class="bi bi-messenger" viewBox="0 0 16 16">
                                    <path
                                        d="M0 7.76C0 3.301 3.493 0 8 0s8 3.301 8 7.76-3.493 7.76-8 7.76c-.81 0-1.586-.107-2.316-.307a.64.64 0 0 0-.427.03l-1.588.702a.64.64 0 0 1-.898-.566l-.044-1.423a.64.64 0 0 0-.215-.456C.956 12.108 0 10.092 0 7.76m5.546-1.459-2.35 3.728c-.225.358.214.761.551.506l2.525-1.916a.48.48 0 0 1 .578-.002l1.869 1.402a1.2 1.2 0 0 0 1.735-.32l2.35-3.728c.226-.358-.214-.761-.551-.506L9.728 7.381a.48.48 0 0 1-.578.002L7.281 5.98a1.2 1.2 0 0 0-1.735.32z" />
                                </svg> Zalo 2 (0332.141485)</strong>


                </div>
            </div>
        </div>
    </div>

    <!-- Server Status Widget -->
    <div class="py-4 w-64">
        <div class="flex flex-col bg-white rounded-md dark:bg-darker border dark:border-primary">
            <div class="flex align-middle items-center justify-between p-2">
                <div>
                    <h6
                        class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                        Server Time
                    </h6>
                    <span class="text-sm font-semibold">{{ \Carbon\Carbon::now()->format('d/m/Y H:i:s') }}</span>
                </div>
            </div>

            <div class="flex align-middle items-center p-2">
                <div>
                    <span class="text-xl font-semibold"><a href="/" target="_blank"><img
                                src="/fe/img/discordlogo.png" alt="Age of Chaos" /> </a></span>
                </div>
            </div>
            <div class="flex align-middle items-center justify-between p-2">
                <div>
                    <h6
                        class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                        Trạng thái máy chủ
                    </h6>
                    <span
                        class="inline-block px-2 py-px text-xs text-{{ $api->online ? 'green' : 'red' }}-500 bg-{{ $api->online ? 'green' : 'red' }}-100 font-semibold rounded-md">
                        {{ $api->online ? 'Online' : 'Offline' }}
                    </span>
                </div>
                <div>
                    @if (!$api->online)
                        <span>
                            <svg class="w-12 h-12 text-gray-300 dark:text-red-500" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M12 2c5.52 0 10 4.48 10 10s-4.48 10-10 10S2 17.52 2 12 6.48 2 12 2zm0 18c4.42 0 8-3.58 8-8s-3.58-8-8-8-8 3.58-8 8 3.58 8 8 8zm1-8h3l-4 4-4-4h3V8h2v4z" />
                            </svg>
                        </span>
                    @else
                        <span>
                            <svg class="w-12 h-12 text-gray-300 dark:text-green-500" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M12 2c5.52 0 10 4.48 10 10s-4.48 10-10 10S2 17.52 2 12 6.48 2 12 2zm0 18c4.42 0 8-3.58 8-8s-3.58-8-8-8-8 3.58-8 8 3.58 8 8 8zm1-8v4h-2v-4H8l4-4 4 4h-3z" />
                            </svg>
                        </span>
                    @endif
                </div>
            </div>
            @php
                $response = gameApi("GET", "/api/online.php");
            @endphp
            <div class="flex align-middle items-center justify-between p-2">
                <div>
                    <h6
                        class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                        Người chơi online
                    </h6>
                    <span class="text-xl font-semibold">{{ $response["online"]}}</span>

                </div>
                <div>
                    <span>
                        <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M4 22a8 8 0 1 1 16 0h-2a6 6 0 1 0-12 0H4zm8-9c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm0-2c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="flex align-middle items-center justify-between p-2">
                <div>
                    <h6
                        class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                        Tài khoản đăng ký
                    </h6>
                    <span class="text-xl font-semibold">{{ $response["account"]}}</span>
                </div>
                <div>
                    <span>
                        <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M2 22a8 8 0 1 1 16 0h-2a6 6 0 1 0-12 0H2zm8-9c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm0-2c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm8.284 3.703A8.002 8.002 0 0 1 23 22h-2a6.001 6.001 0 0 0-3.537-5.473l.82-1.824zm-.688-11.29A5.5 5.5 0 0 1 21 8.5a5.499 5.499 0 0 1-5 5.478v-2.013a3.5 3.5 0 0 0 1.041-6.609l.555-1.943z" />
                        </svg>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
