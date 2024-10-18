<div x-transition:enter="transition duration-300 ease-in-out" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition duration-300 ease-in-out"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-show="isSettingsPanelOpen"
    @click="isSettingsPanelOpen = false" class="fixed inset-0 z-10 bg-primary-darker" style="opacity: 0.5"
    aria-hidden="true">
</div>
<!-- Panel -->
<section x-transition:enter="transition duration-300 ease-in-out transform sm:duration-500"
    x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
    x-transition:leave="transition duration-300 ease-in-out transform sm:duration-500"
    x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full" x-ref="settingsPanel"
    tabindex="-1" x-show="isSettingsPanelOpen" @keydown.escape="isSettingsPanelOpen = false"
    class="fixed inset-y-0 right-0 z-20 w-full max-w-xs bg-white shadow-xl dark:bg-darker dark:text-light sm:max-w-md focus:outline-none"
    aria-labelledby="settinsPanelLabel">
    <div class="absolute left-0 p-2 transform -translate-x-full">
        <!-- Close button -->
        <button @click="isSettingsPanelOpen = false" class="p-2 text-white rounded-md focus:outline-none focus:ring">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
    <!-- Panel content -->
    <div class="flex flex-col h-screen">
        <!-- Panel header -->
        <div
            class="flex flex-col items-center justify-center flex-shrink-0 px-4 py-8 space-y-4 border-b dark:border-primary-dark">
            <span aria-hidden="true" class="text-gray-500 dark:text-primary">
                <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                </svg>
            </span>
            <h2 id="settinsPanelLabel" class="text-xl font-medium text-gray-500 dark:text-light">
                Cài Đặt</h2>
        </div>
        <!-- Content -->
        <div class="flex-1 overflow-hidden hover:overflow-y-auto">
           
            <!-- Colors -->
            <div class="p-4 space-y-4 md:p-8">
                <h6 class="text-lg font-medium text-gray-400 dark:text-light">Màu Sắc</h6>
                <div>
                    <button @click="setColors('cyan')" class="w-10 h-10 rounded-full"
                        style="background-color: var(--color-cyan)"></button>
                    <button @click="setColors('teal')" class="w-10 h-10 rounded-full"
                        style="background-color: var(--color-teal)"></button>
                    <button @click="setColors('green')" class="w-10 h-10 rounded-full"
                        style="background-color: var(--color-green)"></button>
                    <button @click="setColors('fuchsia')" class="w-10 h-10 rounded-full"
                        style="background-color: var(--color-fuchsia)"></button>
                    <button @click="setColors('blue')" class="w-10 h-10 rounded-full"
                        style="background-color: var(--color-blue)"></button>
                    <button @click="setColors('violet')" class="w-10 h-10 rounded-full"
                        style="background-color: var(--color-violet)"></button>
                </div>
            </div>
        </div>
    </div>
</section>
