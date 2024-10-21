<header class="flex-shrink-0 sticky top-0 z-10 bg-white dark:bg-darker">
    @php
    $currentRoute = Route::currentRouteName();
    @endphp
    <div class="flex items-center justify-between p-2 border-b dark:border-primary-darker">
        <!-- Mobile menu button -->
        <button @click="isMobileMainMenuOpen = !isMobileMainMenuOpen"
            class="p-1 transition-colors duration-200 rounded-md text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark md:hidden focus:outline-none focus:ring">
            <span class="sr-only">Open main manu</span>
            <span aria-hidden="true">
                <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </span>
        </button>
        <!-- Brand -->
        <a href="/" class="inline-block text-2xl font-bold tracking-wider uppercase text-primary-dark dark:text-light">
            Age of Chaos
        </a>
        <!-- Mobile sub menu button -->
        <button @click="isMobileSubMenuOpen = !isMobileSubMenuOpen"
            class="p-1 transition-colors duration-200 rounded-md text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark md:hidden focus:outline-none focus:ring">
            <span class="sr-only">Open sub manu</span>
            <span aria-hidden="true">
                <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                </svg>
            </span>
        </button>
        <!-- Desktop Right buttons -->
        <nav aria-label="Secondary" class="hidden space-x-2 md:flex md:items-center">
            <button aria-hidden="true" class="relative focus:outline-none" x-cloak @click="toggleTheme">
                <span
                    class="inline-block px-2 py-px text-xs text-{{ youOnline() ? 'green' : 'red' }}-500 bg-{{ youOnline() ? 'green' : 'red' }}-100 font-semibold rounded-md">
                    {{ youOnline() ? 'Online' : 'Offline' }}
                </span>
            </button>
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open; $nextTick(() => { if(open){ $refs.characterMenu.focus() } })"
                    type="button" aria-haspopup="true" :aria-expanded="open ? 'true' : 'false'"
                    class="inline-flex p-2 transition-colors duration-200 rounded-full text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker">
                    {{ Auth::user()->main_id ? Auth::user()->getMain() : 'Chọn nhân vật' }}
                    <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>

                <div x-show="open" x-ref="characterMenu" x-transition:enter="transition-all transform ease-out"
                    x-transition:enter-start="translate-y-1/2 opacity-0"
                    x-transition:enter-end="translate-y-0 opacity-100"
                    x-transition:leave="transition-all transform ease-in"
                    x-transition:leave-start="translate-y-0 opacity-100"
                    x-transition:leave-end="translate-y-1/2 opacity-0" @click.away="open = false"
                    @keydown.escape="open = false"
                    class="absolute w-64 py-1 bg-white rounded-md shadow-lg top-12 ring-1 ring-black ring-opacity-5 dark:bg-dark focus:outline-none"
                    tabindex="-1" role="menu" aria-orientation="vertical" aria-label="Character menu">
                    @if (isOnline())
                    @foreach (Auth::user()->chars() as $item)
                    <a role="menuitem" href="/set_main_char/{{ $item->char_id }}"
                        class="block {{Auth::user()->main_id == $item->char_id ? 'bg-primary' : ''}} px-4 active py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                        {{ $item->getName() }} ({{ $item->char_id }} - {{ $item->class_name }})
                        </span>
                    </a>
                    @endforeach
                    <div
                        class="inline-block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                        Không thấy nhân vật? <a href="/chars"
                            class="inline-block px-2 py-px text-xs text-green-500 bg-green-100 font-semibold rounded-md">
                            Cập nhật
                        </a>
                    </div>
                    @else
                    <div
                        class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                        Server chưa hoạt động
                    </div>
                    @endif
                </div>
            </div>
            <div class="relative">
                <span
                    class="p-2 transition-colors duration-200 rounded-full text-primary-lighter hover:text-primary dark:hover:text-light focus:outline-none focus:bg-primary-100">
                    <a href="#">Xu
                        : {{ number_format(Auth::user()->balance) }}</a>
                </span>
                <span
                    class="p-2 transition-colors duration-200 rounded-full text-primary-lighter hover:text-primary dark:hover:text-light focus:outline-none focus:bg-primary-100">
                    <a href="#">VIP
                        : {{Auth::user()->viplevel}}</a>
                </span>
            </div>
            <!-- Settings button -->
            <button onclick="window.location.href='https://trutienhonthe.com'" title="Retrun to Main Site"
                class="p-2 transition-colors duration-200 rounded-full text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker">
                <span class="sr-only">Trang chủ</span>
                <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20 20a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-9H1l10.327-9.388a1 1 0 0 1 1.346 0L23 11h-3v9z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </button>
            <!-- User avatar button -->
            @include('layouts.menu-user-desktop')
        </nav>
        <!-- Mobile sub menu -->
        <nav x-transition:enter="transition duration-200 ease-in-out transform sm:duration-500"
            x-transition:enter-start="-translate-y-full opacity-0" x-transition:enter-end="translate-y-0 opacity-100"
            x-transition:leave="transition duration-300 ease-in-out transform sm:duration-500"
            x-transition:leave-start="translate-y-0 opacity-100" x-transition:leave-end="-translate-y-full opacity-0"
            x-show="isMobileSubMenuOpen" @click.away="isMobileSubMenuOpen = false"
            class="absolute flex items-center p-4 bg-white rounded-md shadow-lg dark:bg-darker top-16 inset-x-4 md:hidden"
            aria-label="Secondary">

            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open; $nextTick(() => { if(open){ $refs.characterMenu.focus() } })"
                    type="button" aria-haspopup="true" :aria-expanded="open ? 'true' : 'false'"
                    class="inline-flex p-2 transition-colors duration-200 rounded-full text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker">
                    {{ Auth::user()->main_id ? Auth::user()->getMain() : 'Chọn nhân vật' }}
                    <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>

                <div x-show="open" x-ref="characterMenu" x-transition:enter="transition-all transform ease-out"
                    x-transition:enter-start="translate-y-1/2 opacity-0"
                    x-transition:enter-end="translate-y-0 opacity-100"
                    x-transition:leave="transition-all transform ease-in"
                    x-transition:leave-start="translate-y-0 opacity-100"
                    x-transition:leave-end="translate-y-1/2 opacity-0" @click.away="open = false"
                    @keydown.escape="open = false"
                    class="absolute w-64 py-1 bg-white rounded-md shadow-lg top-12 ring-1 ring-black ring-opacity-5 dark:bg-dark focus:outline-none"
                    tabindex="-1" role="menu" aria-orientation="vertical" aria-label="Character menu">
                    @if (isOnline())
                    @foreach (Auth::user()->chars() as $item)
                    <a role="menuitem" href="/set_main_char/{{ $item->char_id }}"
                        class="block {{Auth::user()->main_id == $item->char_id ? 'bg-primary' : ''}} px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                        {{ $item->getName() }} ({{ $item->char_id }} - {{ $item->class_name }})
                        </span>
                    </a>
                    @endforeach
                    @else
                    <div
                        class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                        Server chưa hoạt động
                    </div>
                    @endif
                </div>
            </div>
            <!-- Settings button -->
            <button onclick="window.location.href='/'" title="Retrun to Main Site"
                class="p-2 transition-colors duration-200 rounded-full text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker">
                <span class="sr-only">Go to main site</span>
                <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20 20a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-9H1l10.327-9.388a1 1 0 0 1 1.346 0L23 11h-3v9z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </button>
            <!-- User avatar button -->
            @include('layouts.menu-user-mobile')
        </nav>
    </div>
    <!-- Mobile main menu -->
    <div class="border-b md:hidden dark:border-primary-darker" x-show="isMobileMainMenuOpen"
        @click.away="isMobileMainMenuOpen = false">
        @include('layouts.menu-item')
    </div>
</header>