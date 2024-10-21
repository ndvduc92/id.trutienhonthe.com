<div class="relative ml-auto" x-data="{ open: false }">
    <button @click="open = !open" type="button" aria-haspopup="true" :aria-expanded="open ? 'true' : 'false'"
        class="block transition-opacity duration-200 rounded-full dark:opacity-75 dark:hover:opacity-100 focus:outline-none focus:ring dark:focus:opacity-100">
        <span class="sr-only">User menu</span>
        <img class="w-10 h-10 rounded-full"
            src="https://ui-avatars.com/api/?name=h&amp;color=7F9CF5&amp;background=EBF4FF" alt="haz1" />

    </button>

    <!-- User dropdown menu -->
    <div x-show="open" x-transition:enter="transition-all transform ease-out"
        x-transition:enter-start="translate-y-1/2 opacity-0" x-transition:enter-end="translate-y-0 opacity-100"
        x-transition:leave="transition-all transform ease-in" x-transition:leave-start="translate-y-0 opacity-100"
        x-transition:leave-end="translate-y-1/2 opacity-0" @click.away="open = false"
        class="absolute right-0 w-48 py-1 origin-top-right bg-white rounded-md shadow-lg top-12 ring-1 ring-black ring-opacity-5 dark:bg-dark"
        role="menu" aria-orientation="vertical" aria-label="User menu">
        <a href="#" role="menuitem"
            class="block px-4 py-2 transition-colors duration-200 rounded-full text-primary-lighter hover:text-primary dark:hover:text-light focus:outline-none focus:bg-primary-100">
            Xu : {{number_format(Auth::user()->balance)}}
        </a>
        <hr>
        <a href="/ca-nhan" role="menuitem"
            class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
            Cá nhân
        </a>
        <div>
            <a href="/logout" role="menuitem"
                class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                Thoát
            </a>
        </div>
    </div>
</div>