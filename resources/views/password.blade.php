@extends('layouts.master')
@section('heading')
    Thông Tin Tài Khoản
@endsection
@section('content')
    <div class="col-span-3">
        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div wire:id="r1JN3rRrfXVuhWfVkdK7" class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1 flex justify-between">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-semibold text-gray-500 dark:text-light">Thông tin tài khoản</h3>

                        </div>

                        <div class="px-4 sm:px-0">

                        </div>
                    </div>

                    <div class="mt-5 md:mt-0 md:col-span-2 ">
                        <form wire:submit.prevent="updateProfileInformation">
                            <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md dark:bg-darker">
                                <div class="grid grid-cols-6 gap-6">

                                    <!-- Name -->
                                    <div class="col-span-6 sm:col-span-4">
                                        <label class="block font-medium text-sm text-gray-700 dark:text-light"
                                            for="truename">
                                            ID
                                        </label>
                                        <input
                                            class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker mt-1 block w-full"
                                            disabled readonly type="text" wire:model.defer="state.truename"
                                            autocomplete="truename" value="AOC{{ Auth::user()->userid }}">
                                    </div>

                                    <!-- Email -->
                                    <div class="col-span-6 sm:col-span-4">
                                        <label class="block font-medium text-sm text-gray-700 dark:text-light"
                                            for="email">
                                            Email
                                        </label>
                                        <input value="{{ Auth::user()->email }}"
                                            class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker mt-1 block w-full"
                                            id="email" type="email">
                                    </div>

                                    <!-- Phone -->
                                    <div class="col-span-6 sm:col-span-4">
                                        <label class="block font-medium text-sm text-gray-700 dark:text-light"
                                            for="phonenumber">
                                            Số điện thoại
                                        </label>
                                        <input value="{{ Auth::user()->phone }}"
                                            class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker mt-1 block w-full"
                                            id="phonenumber" type="text" autocomplete="phonenumber">
                                    </div>
                                    <div class="col-span-6 sm:col-span-4">
                                        <label class="block font-medium text-sm text-gray-700 dark:text-light"
                                            for="phonenumber">
                                            Số dư xu
                                        </label>
                                        <input value="{{ Auth::user()->balance }}"
                                            class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker mt-1 block w-full"
                                            id="phonenumber" type="text" autocomplete="phonenumber">
                                    </div>
                                </div>
                            </div>

                            <div
                                class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md dark:bg-darker">
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Livewire Component wire-end:r1JN3rRrfXVuhWfVkdK7 -->
                <div class="hidden sm:block">
                    <div class="py-8">
                        <div class="border-t border-gray-200"></div>
                    </div>
                </div>


                <div class="mt-10 sm:mt-0">
                    <div wire:id="Tnomw2wwo7ZWQNvHPEVp" class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1 flex justify-between">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-semibold text-gray-500 dark:text-light">Đổi Mật Khẩu</h3>
                            </div>

                            <div class="px-4 sm:px-0">

                            </div>
                        </div>

                        <div class="mt-5 md:mt-0 md:col-span-2 ">
                            <form wire:submit.prevent="updatePassword">
                                <div
                                    class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md dark:bg-darker">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-4">
                                            <label class="block font-medium text-sm text-gray-700 dark:text-light"
                                                for="current_password">
                                                Mật khẩu hiện tại
                                            </label>
                                            <input
                                                class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker mt-1 block w-full"
                                                id="current_password" type="password"
                                                wire:model.defer="state.current_password" autocomplete="current-password">
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <label class="block font-medium text-sm text-gray-700 dark:text-light"
                                                for="password">
                                                Mật khẩu mới
                                            </label>
                                            <input
                                                class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker mt-1 block w-full"
                                                id="password" type="password" wire:model.defer="state.password"
                                                autocomplete="new-password">
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <label class="block font-medium text-sm text-gray-700 dark:text-light"
                                                for="password_confirmation">
                                                Xác nhận mật khẩu mới
                                            </label>
                                            <input
                                                class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker mt-1 block w-full"
                                                id="password_confirmation" type="password"
                                                wire:model.defer="state.password_confirmation" autocomplete="new-password">
                                        </div>
                                        <div class="col-span-6 sm:col-span-4">
                                            <label class="block font-medium text-sm text-gray-700 dark:text-light"
                                                for="password_confirmation">
                                                OTP
                                            </label>
                                            <input
                                                class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker mt-1 block w-full"
                                                id="password_confirmation" type="password"
                                                wire:model.defer="state.password_confirmation" autocomplete="new-password">
                                        </div>
                                    </div>
                                </div>

                                <div
                                    class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md dark:bg-darker">
                                    <div x-data="{ shown: false, timeout: null }" x-init="window.livewire.find('Tnomw2wwo7ZWQNvHPEVp').on('saved', () => {
                                        clearTimeout(timeout);
                                        shown = true;
                                        timeout = setTimeout(() => { shown = false }, 2000);
                                    })"
                                        x-show.transition.out.opacity.duration.1500ms="shown"
                                        x-transition:leave.opacity.duration.1500ms="" style="display: none;"
                                        class="text-sm text-gray-600 mr-3">
                                        Saved.
                                    </div>

                                    <button type="submit"
                                        class="inline-flex items-center px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker">
                                        Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Livewire Component wire-end:Tnomw2wwo7ZWQNvHPEVp -->
                </div>

                <div class="hidden sm:block">
                    <div class="py-8">
                        <div class="border-t border-gray-200"></div>
                    </div>
                </div>

                <div class="mt-10 sm:mt-0">
                    <div wire:id="sIKjch9ibmiIeOlPq5rl" class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1 flex justify-between">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-semibold text-gray-500 dark:text-light">Two Factor Authentication
                                </h3>

                                <p class="text-sm text-gray-600 dark:text-light">
                                    Add additional security to your account using two factor authentication.
                                </p>
                            </div>

                            <div class="px-4 sm:px-0">

                            </div>
                        </div>

                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <div class="px-4 py-5 sm:p-6 bg-white shadow sm:rounded-lg dark:bg-darker">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-light">
                                    You have not enabled two factor authentication.
                                </h3>

                                <div class="mt-3 max-w-xl text-sm text-gray-600 dark:text-light">
                                    <p>
                                        When two factor authentication is enabled, you will be prompted for a secure, random
                                        token during authentication. You may retrieve this token from your phone's Google
                                        Authenticator application.
                                    </p>
                                </div>


                                <div class="mt-5">
                                    <span wire:then="enableTwoFactorAuthentication" x-data=""
                                        x-ref="span"
                                        x-on:click="$wire.startConfirmingPassword('ab2d1de5297198533ed96f794eb99eac')"
                                        x-on:password-confirmed.window="setTimeout(() => $event.detail.id === 'ab2d1de5297198533ed96f794eb99eac' &amp;&amp; $refs.span.dispatchEvent(new CustomEvent('then', { bubbles: false })), 250);">
                                        <button type="button"
                                            class="inline-flex items-center px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker"
                                            wire:loading.attr="disabled">
                                            Enable
                                        </button>
                                    </span>

                                    <div x-data="{
                                        show: window.Livewire.find('sIKjch9ibmiIeOlPq5rl').entangle('confirmingPassword').defer,
                                        focusables() {
                                            // All focusable element types...
                                            let selector = 'a, button, input:not([type=\'hidden\']), textarea, select, details, [tabindex]:not([tabindex=\'-1\'])'
                                    
                                            return [...$el.querySelectorAll(selector)]
                                                // All non-disabled elements...
                                                .filter(el => !el.hasAttribute('disabled'))
                                        },
                                        firstFocusable() { return this.focusables()[0] },
                                        lastFocusable() { return this.focusables().slice(-1)[0] },
                                        nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() },
                                        prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() },
                                        nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) },
                                        prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) - 1 },
                                    }" x-init="$watch('show', value => {
                                        if (value) {
                                            document.body.classList.add('overflow-y-hidden');
                                    
                                        } else {
                                            document.body.classList.remove('overflow-y-hidden');
                                        }
                                    })" x-on:close.stop="show = false"
                                        x-on:keydown.escape.window="show = false"
                                        x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()"
                                        x-on:keydown.shift.tab.prevent="prevFocusable().focus()" x-show="show"
                                        id="506a8cb247bad8f18658bdb3f794fabc"
                                        class="jetstream-modal fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50"
                                        style="display: none;">
                                        <div x-show="show" class="fixed inset-0 transform transition-all"
                                            x-on:click="show = false" x-transition:enter="ease-out duration-300"
                                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                            x-transition:leave="ease-in duration-200"
                                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                            style="display: none;">
                                            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                        </div>

                                        <div x-show="show"
                                            class="mb-6 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:max-w-2xl sm:mx-auto"
                                            x-transition:enter="ease-out duration-300"
                                            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                            x-transition:leave="ease-in duration-200"
                                            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                            style="display: none;">
                                            <div class="px-6 py-4 dark:bg-dark">
                                                <div class="text-lg">
                                                    Confirm Password
                                                </div>

                                                <div class="mt-4">
                                                    For your security, please confirm your password to continue.

                                                    <div class="mt-4" x-data="{}"
                                                        x-on:confirming-password.window="setTimeout(() => $refs.confirmable_password.focus(), 250)">
                                                        <input
                                                            class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker mt-1 block w-3/4"
                                                            type="password" placeholder="Password"
                                                            x-ref="confirmable_password"
                                                            wire:model.defer="confirmablePassword"
                                                            wire:keydown.enter="confirmPassword">

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="flex flex-row justify-end px-6 py-4 dark:bg-dark text-right">
                                                <button type="button"
                                                    class="inline-flex items-center px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker"
                                                    wire:click="stopConfirmingPassword" wire:loading.attr="disabled">
                                                    Batal
                                                </button>

                                                <button type="submit"
                                                    class="inline-flex items-center px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker ml-3"
                                                    dusk="confirm-password-button" wire:click="confirmPassword"
                                                    wire:loading.attr="disabled">
                                                    Confirm
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Livewire Component wire-end:sIKjch9ibmiIeOlPq5rl -->
                </div>

                <div class="hidden sm:block">
                    <div class="py-8">
                        <div class="border-t border-gray-200"></div>
                    </div>
                </div>

                <div class="mt-10 sm:mt-0">
                    <div wire:id="Hjn8a7K6XH7ZnEgvnlEd" class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1 flex justify-between">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-semibold text-gray-500 dark:text-light">Browser Sessions</h3>

                                <p class="text-sm text-gray-600 dark:text-light">
                                    Manage and log out your active sessions on other browsers and devices.
                                </p>
                            </div>

                            <div class="px-4 sm:px-0">

                            </div>
                        </div>

                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <div class="px-4 py-5 sm:p-6 bg-white shadow sm:rounded-lg dark:bg-darker">
                                <div class="max-w-xl text-sm text-gray-600 dark:text-light">
                                    If necessary, you may log out of all of your other browser sessions across all of your
                                    devices. Some of your recent sessions are listed below; however, this list may not be
                                    exhaustive. If you feel your account has been compromised, you should also update your
                                    password.
                                </div>

                                <div class="mt-5 space-y-6">
                                    <!-- Other Browser Sessions -->
                                    <div class="flex items-center">
                                        <div>
                                            <svg fill="none" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"
                                                class="w-8 h-8 text-gray-500">
                                                <path
                                                    d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                        </div>

                                        <div class="ml-3">
                                            <div class="text-sm text-gray-600 dark:text-light">
                                                Windows
                                                - Chrome
                                            </div>

                                            <div>
                                                <div class="text-xs text-gray-500 dark:text-light">
                                                    ::1,

                                                    <span class="text-green-500 font-semibold">This device</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center">
                                        <div>
                                            <svg fill="none" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"
                                                class="w-8 h-8 text-gray-500">
                                                <path
                                                    d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                        </div>

                                        <div class="ml-3">
                                            <div class="text-sm text-gray-600 dark:text-light">
                                                Windows
                                                - Chrome
                                            </div>

                                            <div>
                                                <div class="text-xs text-gray-500 dark:text-light">
                                                    ::1,

                                                    Last active 9 hours ago
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center">
                                        <div>
                                            <svg fill="none" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"
                                                class="w-8 h-8 text-gray-500">
                                                <path
                                                    d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                        </div>

                                        <div class="ml-3">
                                            <div class="text-sm text-gray-600 dark:text-light">
                                                Windows
                                                - Chrome
                                            </div>

                                            <div>
                                                <div class="text-xs text-gray-500 dark:text-light">
                                                    ::1,

                                                    Last active 11 hours ago
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center">
                                        <div>
                                            <svg fill="none" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"
                                                class="w-8 h-8 text-gray-500">
                                                <path
                                                    d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                        </div>

                                        <div class="ml-3">
                                            <div class="text-sm text-gray-600 dark:text-light">
                                                Windows
                                                - Chrome
                                            </div>

                                            <div>
                                                <div class="text-xs text-gray-500 dark:text-light">
                                                    ::1,

                                                    Last active 16 hours ago
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center">
                                        <div>
                                            <svg fill="none" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"
                                                class="w-8 h-8 text-gray-500">
                                                <path
                                                    d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                        </div>

                                        <div class="ml-3">
                                            <div class="text-sm text-gray-600 dark:text-light">
                                                Windows
                                                - Chrome
                                            </div>

                                            <div>
                                                <div class="text-xs text-gray-500 dark:text-light">
                                                    ::1,

                                                    Last active 1 day ago
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex items-center mt-5">
                                    <button type="submit"
                                        class="inline-flex items-center px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker"
                                        wire:click="confirmLogout" wire:loading.attr="disabled">
                                        Log Out Other Browser Sessions
                                    </button>

                                    <div x-data="{ shown: false, timeout: null }" x-init="window.livewire.find('Hjn8a7K6XH7ZnEgvnlEd').on('loggedOut', () => {
                                        clearTimeout(timeout);
                                        shown = true;
                                        timeout = setTimeout(() => { shown = false }, 2000);
                                    })"
                                        x-show.transition.out.opacity.duration.1500ms="shown"
                                        x-transition:leave.opacity.duration.1500ms="" style="display: none;"
                                        class="text-sm text-gray-600 ml-3">
                                        Done.
                                    </div>
                                </div>

                                <!-- Log Out Other Devices Confirmation Modal -->
                                <div x-data="{
                                    show: window.Livewire.find('Hjn8a7K6XH7ZnEgvnlEd').entangle('confirmingLogout').defer,
                                    focusables() {
                                        // All focusable element types...
                                        let selector = 'a, button, input:not([type=\'hidden\']), textarea, select, details, [tabindex]:not([tabindex=\'-1\'])'
                                
                                        return [...$el.querySelectorAll(selector)]
                                            // All non-disabled elements...
                                            .filter(el => !el.hasAttribute('disabled'))
                                    },
                                    firstFocusable() { return this.focusables()[0] },
                                    lastFocusable() { return this.focusables().slice(-1)[0] },
                                    nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() },
                                    prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() },
                                    nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) },
                                    prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) - 1 },
                                }" x-init="$watch('show', value => {
                                    if (value) {
                                        document.body.classList.add('overflow-y-hidden');
                                
                                    } else {
                                        document.body.classList.remove('overflow-y-hidden');
                                    }
                                })" x-on:close.stop="show = false"
                                    x-on:keydown.escape.window="show = false"
                                    x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()"
                                    x-on:keydown.shift.tab.prevent="prevFocusable().focus()" x-show="show"
                                    id="7bfef3bbc87b550e8528db202ce06cfb"
                                    class="jetstream-modal fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50"
                                    style="display: none;">
                                    <div x-show="show" class="fixed inset-0 transform transition-all"
                                        x-on:click="show = false" x-transition:enter="ease-out duration-300"
                                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                        x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
                                        x-transition:leave-end="opacity-0" style="display: none;">
                                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                    </div>

                                    <div x-show="show"
                                        class="mb-6 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:max-w-2xl sm:mx-auto"
                                        x-transition:enter="ease-out duration-300"
                                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                        x-transition:leave="ease-in duration-200"
                                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                        style="display: none;">
                                        <div class="px-6 py-4 dark:bg-dark">
                                            <div class="text-lg">
                                                Log Out Other Browser Sessions
                                            </div>

                                            <div class="mt-4">
                                                Please enter your password to confirm you would like to log out of your
                                                other browser sessions across all of your devices.

                                                <div class="mt-4" x-data="{}"
                                                    x-on:confirming-logout-other-browser-sessions.window="setTimeout(() => $refs.password.focus(), 250)">
                                                    <input
                                                        class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker mt-1 block w-3/4"
                                                        type="password" placeholder="Password" x-ref="password"
                                                        wire:model.defer="password"
                                                        wire:keydown.enter="logoutOtherBrowserSessions">

                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex flex-row justify-end px-6 py-4 dark:bg-dark text-right">
                                            <button type="button"
                                                class="inline-flex items-center px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker"
                                                wire:click="$toggle('confirmingLogout')" wire:loading.attr="disabled">
                                                Cancel
                                            </button>

                                            <button type="submit"
                                                class="inline-flex items-center px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker ml-3"
                                                wire:click="logoutOtherBrowserSessions" wire:loading.attr="disabled">
                                                Log Out Other Browser Sessions
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Livewire Component wire-end:Hjn8a7K6XH7ZnEgvnlEd -->
                </div>

            </div>
        </div>
    </div>
@endsection
