<header class="flex-shrink-0 sticky top-0 z-10 bg-white dark:bg-darker">
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
        <a href="/"
            class="inline-block text-2xl font-bold tracking-wider uppercase text-primary-dark dark:text-light">
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
            <!-- Toggle dark theme button -->
            <button aria-hidden="true" class="relative focus:outline-none" x-cloak @click="toggleTheme">
                <div class="w-12 h-6 transition rounded-full outline-none bg-primary-100 dark:bg-primary-lighter">
                </div>
                <div class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-150 transform scale-110 rounded-full shadow-sm"
                    :class="{
                        'translate-x-0 -translate-y-px  bg-white text-primary-dark': !
                            isDark,
                        'translate-x-6 text-primary-100 bg-primary-darker': isDark
                    }">
                    <svg x-show="!isDark" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                    <svg x-show="isDark" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                    </svg>
                </div>
            </button>
            <!-- Language button -->
            {{-- <div class="relative" x-data="{ open: false }">
                <button
                    @click="open = !open; $nextTick(() => { if(open){ $refs.languageMenu.focus() } })"
                    type="button" aria-haspopup="true" :aria-expanded="open ? 'true' : 'false'"
                    class="p-2 transition-colors duration-200 rounded-full text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker">
                    <span class="sr-only">Language Menu</span>
                    <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.235 6.453a8 8 0 0 0 8.817 12.944c.115-.75-.137-1.47-.24-1.722-.23-.56-.988-1.517-2.253-2.844-.338-.355-.316-.628-.195-1.437l.013-.091c.082-.554.22-.882 2.085-1.178.948-.15 1.197.228 1.542.753l.116.172c.328.48.571.59.938.756.165.075.37.17.645.325.652.373.652.794.652 1.716v.105c0 .391-.038.735-.098 1.034a8.002 8.002 0 0 0-3.105-12.341c-.553.373-1.312.902-1.577 1.265-.135.185-.327 1.132-.95 1.21-.162.02-.381.006-.613-.009-.622-.04-1.472-.095-1.744.644-.173.468-.203 1.74.356 2.4.09.105.107.3.046.519-.08.287-.241.462-.292.498-.096-.056-.288-.279-.419-.43-.313-.365-.705-.82-1.211-.96-.184-.051-.386-.093-.583-.135-.549-.115-1.17-.246-1.315-.554-.106-.226-.105-.537-.105-.865 0-.417 0-.888-.204-1.345a1.276 1.276 0 0 0-.306-.43zM12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z" />
                    </svg>
                </button>

                <div x-show="open" x-ref="languageMenu"
                    x-transition:enter="transition-all transform ease-out"
                    x-transition:enter-start="translate-y-1/2 opacity-0"
                    x-transition:enter-end="translate-y-0 opacity-100"
                    x-transition:leave="transition-all transform ease-in"
                    x-transition:leave-start="translate-y-0 opacity-100"
                    x-transition:leave-end="translate-y-1/2 opacity-0" @click.away="open = false"
                    @keydown.escape="open = false"
                    class="absolute right-0 w-48 py-1 bg-white rounded-md shadow-lg top-12 ring-1 ring-black ring-opacity-5 dark:bg-dark focus:outline-none"
                    tabindex="-1" role="menu" aria-orientation="vertical"
                    aria-label="Language menu">
                    <a role="menuitem" href="http://localhost:9000/dashboard?language=en"
                        class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                        <img class="inline-flex" src="http://localhost:9000/img/flags/en.png"
                            alt="" /> English
                    </a>
                    <a role="menuitem" href="http://localhost:9000/dashboard?language=vn"
                        class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                        <img class="inline-flex" src="http://localhost:9000/img/flags/vn.png"
                            alt="" /> Việt Nam
                    </a>
                </div>
            </div> --}}
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
                    class="absolute right-0 w-48 py-1 bg-white rounded-md shadow-lg top-12 ring-1 ring-black ring-opacity-5 dark:bg-dark focus:outline-none"
                    tabindex="-1" role="menu" aria-orientation="vertical" aria-label="Character menu">
                    @if (isOnline())
                        @foreach (Auth::user()->chars() as $item)
                            <a role="menuitem" href="/set_main_char/{{ $item->char_id }}"
                                class="block px-4 active py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                                {{ $item->getName() }} (ID: {{ $item->char_id }})
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
            <div class="relative">
                <span
                    class="p-2 transition-colors duration-200 rounded-full text-primary-lighter hover:text-primary dark:hover:text-light focus:outline-none focus:bg-primary-100">
                    <a href="#">Xu
                        : {{ number_format(Auth::user()->balance) }}</a>
                </span>
                {{-- <span
                    class="p-2 transition-colors duration-200 rounded-full text-primary-lighter hover:text-primary dark:hover:text-light focus:outline-none focus:bg-primary-100">
                    <a href="#">Point
                        : 0 Point</a>
                </span> --}}
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
            <div class="relative" x-data="{ open: false }" @click.away="open = false" @close.stop="open = false">
                <button @click="open = !open; $nextTick(() => { if(open){ $refs.userMenu.focus() } })" type="button"
                    aria-haspopup="true" :aria-expanded="open ? 'true' : 'false'"
                    class="transition-opacity duration-200 rounded-full dark:opacity-75 dark:hover:opacity-100 focus:outline-none focus:ring dark:focus:opacity-100">
                    <img class="w-10 h-10 rounded-full"
                        src="https://ui-avatars.com/api/?name=a&amp;color=7F9CF5&amp;background=EBF4FF"
                        alt="aoc" />
                </button>

                <div x-show="open" x-ref="userMenu" x-transition:enter="transition-all transform ease-out"
                    x-transition:enter-start="translate-y-1/2 opacity-0"
                    x-transition:enter-end="translate-y-0 opacity-100"
                    x-transition:leave="transition-all transform ease-in"
                    x-transition:leave-start="translate-y-0 opacity-100"
                    x-transition:leave-end="translate-y-1/2 opacity-0" @click.away="open = false"
                    @keydown.escape="open = false"
                    class="absolute right-0 w-48 py-1 bg-white rounded-md shadow-lg top-12 ring-1 ring-black ring-opacity-5 dark:bg-dark focus:outline-none"
                    tabindex="-1" role="menu" aria-orientation="vertical" aria-label="User menu">
                    <a class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary"
                        role="menuitem" href="/user/profile">Cá nhân</a>
                    <a class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary"
                        role="menuitem" href="http://localhost:9000/dashboard/donate/history">Transaction History</a>
                    <div>
                        <a class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary"
                            role="menuitem" href="/logout">Thoát</a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Mobile sub menu -->
        <nav x-transition:enter="transition duration-200 ease-in-out transform sm:duration-500"
            x-transition:enter-start="-translate-y-full opacity-0" x-transition:enter-end="translate-y-0 opacity-100"
            x-transition:leave="transition duration-300 ease-in-out transform sm:duration-500"
            x-transition:leave-start="translate-y-0 opacity-100" x-transition:leave-end="-translate-y-full opacity-0"
            x-show="isMobileSubMenuOpen" @click.away="isMobileSubMenuOpen = false"
            class="absolute flex items-center p-4 bg-white rounded-md shadow-lg dark:bg-darker top-16 inset-x-4 md:hidden"
            aria-label="Secondary">
            <!-- Toggle dark theme button -->
            <button aria-hidden="true" class="relative focus:outline-none" x-cloak @click="toggleTheme">
                <div class="w-12 h-6 transition rounded-full outline-none bg-primary-100 dark:bg-primary-lighter">
                </div>
                <div class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-150 transform scale-110 rounded-full shadow-sm"
                    :class="{
                        'translate-x-0 -translate-y-px  bg-white text-primary-dark': !
                            isDark,
                        'translate-x-6 text-primary-100 bg-primary-darker': isDark
                    }">
                    <svg x-show="!isDark" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                    <svg x-show="isDark" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                    </svg>
                </div>
            </button>
            <!-- Language button -->
            {{-- <div class="relative ml-auto" x-data="{ open: false }">
                <button @click="open = !open" type="button" aria-haspopup="true"
                    :aria-expanded="open ? 'true' : 'false'"
                    class="p-2 transition-colors duration-200 rounded-full text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker">
                    <span class="sr-only">Language Menu</span>
                    <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6.235 6.453a8 8 0 0 0 8.817 12.944c.115-.75-.137-1.47-.24-1.722-.23-.56-.988-1.517-2.253-2.844-.338-.355-.316-.628-.195-1.437l.013-.091c.082-.554.22-.882 2.085-1.178.948-.15 1.197.228 1.542.753l.116.172c.328.48.571.59.938.756.165.075.37.17.645.325.652.373.652.794.652 1.716v.105c0 .391-.038.735-.098 1.034a8.002 8.002 0 0 0-3.105-12.341c-.553.373-1.312.902-1.577 1.265-.135.185-.327 1.132-.95 1.21-.162.02-.381.006-.613-.009-.622-.04-1.472-.095-1.744.644-.173.468-.203 1.74.356 2.4.09.105.107.3.046.519-.08.287-.241.462-.292.498-.096-.056-.288-.279-.419-.43-.313-.365-.705-.82-1.211-.96-.184-.051-.386-.093-.583-.135-.549-.115-1.17-.246-1.315-.554-.106-.226-.105-.537-.105-.865 0-.417 0-.888-.204-1.345a1.276 1.276 0 0 0-.306-.43zM12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z" />
                    </svg>
                </button>

                <div x-show="open" x-transition:enter="transition-all transform ease-out"
                    x-transition:enter-start="translate-y-1/2 opacity-0"
                    x-transition:enter-end="translate-y-0 opacity-100"
                    x-transition:leave="transition-all transform ease-in"
                    x-transition:leave-start="translate-y-0 opacity-100"
                    x-transition:leave-end="translate-y-1/2 opacity-0" @click.away="open = false"
                    class="absolute right-0 w-48 py-1 origin-top-right bg-white rounded-md shadow-lg top-12 ring-1 ring-black ring-opacity-5 dark:bg-dark"
                    role="menu" aria-orientation="vertical" aria-label="Language menu">
                    <a href="http://localhost:9000/dashboard?language=langen" role="menuitem"
                        class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                        <img class="inline-flex" src="http://localhost:9000/img/flags/langen.png" alt="" />
                        language.langen
                    </a>
                    <a href="http://localhost:9000/dashboard?language=langvn" role="menuitem"
                        class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                        <img class="inline-flex" src="http://localhost:9000/img/flags/langvn.png" alt="" />
                        language.langvn
                    </a>
                </div>
            </div> --}}
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open; $nextTick(() => { if(open){ $refs.characterMenu.focus() } })"
                    type="button" aria-haspopup="true" :aria-expanded="open ? 'true' : 'false'"
                    class="inline-flex p-2 transition-colors duration-200 rounded-full text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker">
                    Chọn nhân vật
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
                    class="absolute right-0 w-48 py-1 bg-white rounded-md shadow-lg top-12 ring-1 ring-black ring-opacity-5 dark:bg-dark focus:outline-none"
                    tabindex="-1" role="menu" aria-orientation="vertical" aria-label="Character menu">
                    @if ($api->online)
                        @foreach (Auth::user()->chars() as $item)
                            <a role="menuitem" href=""
                                class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                                {{ $item->name }}
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
            <button onclick="window.location.href='http://localhost:9000'" title="Retrun to Main Site"
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
            <div class="relative ml-auto" x-data="{ open: false }">
                <button @click="open = !open" type="button" aria-haspopup="true"
                    :aria-expanded="open ? 'true' : 'false'"
                    class="block transition-opacity duration-200 rounded-full dark:opacity-75 dark:hover:opacity-100 focus:outline-none focus:ring dark:focus:opacity-100">
                    <span class="sr-only">User menu</span>
                    <img class="w-10 h-10 rounded-full"
                        src="https://ui-avatars.com/api/?name=h&amp;color=7F9CF5&amp;background=EBF4FF"
                        alt="haz1" />

                </button>

                <!-- User dropdown menu -->
                <div x-show="open" x-transition:enter="transition-all transform ease-out"
                    x-transition:enter-start="translate-y-1/2 opacity-0"
                    x-transition:enter-end="translate-y-0 opacity-100"
                    x-transition:leave="transition-all transform ease-in"
                    x-transition:leave-start="translate-y-0 opacity-100"
                    x-transition:leave-end="translate-y-1/2 opacity-0" @click.away="open = false"
                    class="absolute right-0 w-48 py-1 origin-top-right bg-white rounded-md shadow-lg top-12 ring-1 ring-black ring-opacity-5 dark:bg-dark"
                    role="menu" aria-orientation="vertical" aria-label="User menu">
                    <a href="#" role="menuitem"
                        class="block px-4 py-2 transition-colors duration-200 rounded-full text-primary-lighter hover:text-primary dark:hover:text-light focus:outline-none focus:bg-primary-100">
                        Xu : 0
                    </a>
                    <hr>
                    <a href="/user/profile" role="menuitem"
                        class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                        Cá nhân
                    </a>
                    <a href="/dashboard/donate/history" role="menuitem"
                        class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                        Transaction History
                    </a>
                    <div>
                        <a href="/logout" role="menuitem"
                            class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                            Thoát
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- Mobile main menu -->
    <div class="border-b md:hidden dark:border-primary-darker" x-show="isMobileMainMenuOpen"
        @click.away="isMobileMainMenuOpen = false">
        <nav aria-label="Main" class="px-2 py-4 space-y-2">
            <!-- Dashboards links -->
            <div x-data="{ isActive: true, open: true }">
                <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                <a href="http://localhost:9000/dashboard"
                    class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                    :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }" role="button"
                    aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
                    <span aria-hidden="true">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                    </span>
                    <span class="ml-2 text-sm"> Dashboard </span>
                </a>
            </div>
            <!-- Shop links -->
            <div x-data="{ isActive: false, open: false }">
                <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                <a href="#" @click="$event.preventDefault(); open = !open"
                    class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                    :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }" role="button"
                    aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
                    <span aria-hidden="true">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M21 13v7a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-7H2v-2l1-5h18l1 5v2h-1zM5 13v6h14v-6H5zm1 1h8v3H6v-3zM3 3h18v2H3V3z" />
                        </svg>
                    </span>
                    <span class="ml-2 text-sm"> Shop </span>
                    <span class="ml-auto" aria-hidden="true">
                        <!-- active class 'rotate-180' -->
                        <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </span>
                </a>
                <div role="menu" x-show="open" class="mt-2 space-y-2 px-7" aria-label="Shop">
                    <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                    <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                    <a href="http://localhost:9000/dashboard/shop" role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                        All
                    </a>
                    <a href="http://localhost:9000/dashboard/shop/mask/1" role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                        Weapons
                    </a>
                    <div x-data="{ isActive: false, open: false }">
                        <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                        <a href="#" @click="$event.preventDefault(); open = !open"
                            class="flex items-center py-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
                            role="button" aria-haspopup="true"
                            :aria-expanded="(open || isActive) ? 'true' : 'false'">
                            <span class="ml-2 text-sm"> Equipment </span>
                            <span class="ml-auto" aria-hidden="true">
                                <!-- active class 'rotate-180' -->
                                <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>
                        </a>
                        <div role="menu" x-show="open" class="mt-2 space-y-2 px-7" aria-label="Equipment">
                            <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                            <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                            <a href="http://localhost:9000/dashboard/shop/mask/2" role="menuitem"
                                class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                                Helmet
                            </a>
                            <a href="http://localhost:9000/dashboard/shop/mask/256" role="menuitem"
                                class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                                Arms
                            </a>
                            <a href="http://localhost:9000/dashboard/shop/mask/16" role="menuitem"
                                class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                                Chest
                            </a>
                            <a href="http://localhost:9000/dashboard/shop/mask/8" role="menuitem"
                                class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                                Robe
                            </a>
                            <a href="http://localhost:9000/dashboard/shop/mask/64" role="menuitem"
                                class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                                Leg
                            </a>
                            <a href="http://localhost:9000/dashboard/shop/mask/128" role="menuitem"
                                class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                                Feet
                            </a>
                        </div>
                    </div>
                    <div x-data="{ isActive: false, open: false }">
                        <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                        <a href="#" @click="$event.preventDefault(); open = !open"
                            class="flex items-center py-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
                            role="button" aria-haspopup="true"
                            :aria-expanded="(open || isActive) ? 'true' : 'false'">
                            <span class="ml-2 text-sm"> Fashion </span>
                            <span class="ml-auto" aria-hidden="true">
                                <!-- active class 'rotate-180' -->
                                <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>
                        </a>
                        <div role="menu" x-show="open" class="mt-2 space-y-2 px-7" aria-label="Equipment">
                            <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                            <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                            <a href="http://localhost:9000/dashboard/shop/mask/65536" role="menuitem"
                                class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                                Arms
                            </a>
                            <a href="http://localhost:9000/dashboard/shop/mask/8192" role="menuitem"
                                class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                                Chest
                            </a>
                            <a href="http://localhost:9000/dashboard/shop/mask/16384" role="menuitem"
                                class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                                Leg
                            </a>
                            <a href="http://localhost:9000/dashboard/shop/mask/32768" role="menuitem"
                                class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                                Feet
                            </a>
                        </div>
                    </div>
                    <div x-data="{ isActive: false, open: false }">
                        <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                        <a href="#" @click="$event.preventDefault(); open = !open"
                            class="flex items-center py-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
                            role="button" aria-haspopup="true"
                            :aria-expanded="(open || isActive) ? 'true' : 'false'">
                            <span class="ml-2 text-sm"> Accessories </span>
                            <span class="ml-auto" aria-hidden="true">
                                <!-- active class 'rotate-180' -->
                                <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>
                        </a>
                        <div role="menu" x-show="open" class="mt-2 space-y-2 px-7" aria-label="Equipment">
                            <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                            <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                            <a href="http://localhost:9000/dashboard/shop/mask/1536" role="menuitem"
                                class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                                Ring
                            </a>
                            <a href="http://localhost:9000/dashboard/shop/mask/32" role="menuitem"
                                class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                                Belt
                            </a>
                            <a href="http://localhost:9000/dashboard/shop/mask/4" role="menuitem"
                                class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                                Necklace
                            </a>
                        </div>
                    </div>
                    <div x-data="{ isActive: false, open: false }">
                        <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                        <a href="#" @click="$event.preventDefault(); open = !open"
                            class="flex items-center py-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
                            role="button" aria-haspopup="true"
                            :aria-expanded="(open || isActive) ? 'true' : 'false'">
                            <span class="ml-2 text-sm"> Charms </span>
                            <span class="ml-auto" aria-hidden="true">
                                <!-- active class 'rotate-180' -->
                                <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>
                        </a>
                        <div role="menu" x-show="open" class="mt-2 space-y-2 px-7" aria-label="Charms">
                            <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                            <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                            <a href="http://localhost:9000/dashboard/shop/mask/1048576" role="menuitem"
                                class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                                HP
                            </a>
                            <a href="http://localhost:9000/dashboard/shop/mask/2097152" role="menuitem"
                                class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                                MP
                            </a>
                        </div>
                    </div>
                    <a href="http://localhost:9000/dashboard/shop/mask/262144" role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                        Heaven Book/Tome
                    </a>
                    <a href="http://localhost:9000/dashboard/shop/mask/524288" role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                        Chat Smiley
                    </a>
                    <a href="http://localhost:9000/dashboard/shop/mask/4096" role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                        Flying Mount
                    </a>
                    <a href="http://localhost:9000/dashboard/shop/mask/0" role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                        Other
                    </a>
                </div>
            </div>

            <!-- Shop links -->
            <div x-data="{ isActive: false, open: false }">
                <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                <a href="#" @click="$event.preventDefault(); open = !open"
                    class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                    :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }" role="button"
                    aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
                    <span aria-hidden="true">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M22 10v10a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V10h20zm0-2H2V4a1 1 0 0 1 1-1h18a1 1 0 0 1 1 1v4zm-7 8v2h4v-2h-4z" />
                        </svg>
                    </span>
                    <span class="ml-2 text-sm"> TopUp </span>
                    <span class="ml-auto" aria-hidden="true">
                        <!-- active class 'rotate-180' -->
                        <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </span>
                </a>
                <div role="menu" x-show="open" class="mt-2 space-y-2 px-7" aria-label="TopUp">
                    <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                    <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                    <a href="http://localhost:9000/dashboard/donate/history" role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                        Transaction History
                    </a>
                </div>
            </div>

            <!-- Dashboards links -->
            <div x-data="{ isActive: false, open: false }">
                <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                <a href="/dashboard/vote"
                    class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                    :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }" role="button"
                    aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
                    <span aria-hidden="true">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 3c.552 0 1 .448 1 1v14c0 .552-.448 1-1 1H6.455L2 22.5V4c0-.552.448-1 1-1h18zm-8 4h-2v8h2V7zm4 2h-2v6h2V9zm-8 2H7v4h2v-4z" />
                        </svg>
                    </span>
                    <span class="ml-2 text-sm"> Vote </span>
                </a>
            </div>


            <!-- Dashboards links -->
            <div x-data="{ isActive: false, open: false }">
                <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                <a href="/dashboard/services"
                    class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                    :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }" role="button"
                    aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
                    <span aria-hidden="true">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14.121 10.48a1 1 0 0 0-1.414 0l-.707.706a2 2 0 1 1-2.828-2.828l5.63-5.632a6.5 6.5 0 0 1 6.377 10.568l-2.108 2.135-4.95-4.95zM3.161 4.468a6.503 6.503 0 0 1 8.009-.938L7.757 6.944a4 4 0 0 0 5.513 5.794l.144-.137 4.243 4.242-4.243 4.243a2 2 0 0 1-2.828 0L3.16 13.66a6.5 6.5 0 0 1 0-9.192z" />
                        </svg>
                    </span>
                    <span class="ml-2 text-sm"> Ingame Services </span>
                </a>
            </div>

            <!-- Members links -->
            <div x-data="{ isActive: false, open: false }">
                <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                <a href="#" @click="$event.preventDefault(); open = !open"
                    class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                    :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }" role="button"
                    aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
                    <span aria-hidden="true">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M5 3v16h16v2H3V3h2zm14.94 2.94l2.12 2.12L16 14.122l-3-3-3.94 3.94-2.12-2.122L13 6.88l3 3 3.94-3.94z" />
                        </svg>
                    </span>
                    <span class="ml-2 text-sm"> Ranking </span>
                    <span class="ml-auto" aria-hidden="true">
                        <!-- active class 'rotate-180' -->
                        <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </span>
                </a>
                <div role="menu" x-show="open" class="mt-2 space-y-2 px-7" aria-label="Ranking">
                    <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                    <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                    <a href="/ranking/player/level" role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                        Players Rank
                    </a>
                    <a href="/ranking/faction/level" role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                        Faction Rank
                    </a>
                </div>
            </div>
        </nav>
    </div>
</header>
