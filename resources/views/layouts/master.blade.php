<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="HVG6814FIcyJTCy07iujNAKPrsNv4gJ18Xg6Ourt">
    <title>Age of Chaos - Dashboard</title>

    <link rel="shortcut icon" href="/fe/img/logo.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="/fe/img/logo.png" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <!-- Styles -->
    <link rel="stylesheet" href="/fe/css/app.css">
    <link rel="stylesheet" href="/spin/AdminLTE-3.1.0/plugins/toastr/toastr.min.css">
    <!-- Scripts -->
    <script src="/fe/js/app.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/spin/AdminLTE-3.1.0/plugins/toastr/toastr.min.js"></script>
    <style>
        .alert .error {
            color: red;
        }

        .alert .success {
            color: rgb(34 173 87);
        }
    </style>

</head>

<body class="antialiased">
    <div x-data="setup()" x-init="$refs.loading.classList.add('hidden');
    setColors(color);" :class="{ 'dark': isDark }">
        <div class="flex h-screen antialiased text-gray-900 bg-gray-100 dark:bg-dark dark:text-light">
            <div x-ref="loading"
                class="fixed inset-0 z-50 flex items-center justify-center text-2xl font-semibold text-white bg-primary-darker">
                Loading...
            </div>

            @include('layouts.menu')

            <div class="flex flex-col flex-1 h-full overflow-x-hidden overflow-y-auto">
                <!-- Navbar -->
                @include('layouts.header')

                <!-- Main content -->
                <main class="flex-1">

                    <!-- Content header -->
                    <div
                        class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
                        <h1 class="text-2xl font-semibold">@yield('heading')</h1>
                    </div>
                    <!-- Content -->
                    <div class="mt-2 pb-16">
                        <div class="max-w mx-6 my-6">
                            <div class="grid grid-cols-2 md:grid-cols-2 xl:grid-cols-4 gap-4">
                                @yield('content')
                                @include('layouts.gm')
                            </div>
                        </div>
                    </div>
                </main>
                <!-- Main footer -->
                @include('layouts.footer')
            </div>
            @include('layouts.setting')
        </div>
    </div>

    <script src="/fe/js/kamona-wd.js"></script>
    <script>

        const setup = () => {
            const getTheme = () => {
                if (window.localStorage.getItem('dark')) {
                    return JSON.parse(window.localStorage.getItem('dark'))
                } else {
                    window.localStorage.setItem('dark', true)
                }

                return !!window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
            }

            const setTheme = (value) => {
                window.localStorage.setItem('dark', value)
            }

            const getColor = () => {
                if (window.localStorage.getItem('color')) {
                    return window.localStorage.getItem('color')
                }
                return 'cyan'
            }

            const setColors = (color) => {
                const root = document.documentElement
                root.style.setProperty('--color-primary', `var(--color-${color})`)
                root.style.setProperty('--color-primary-50', `var(--color-${color}-50)`)
                root.style.setProperty('--color-primary-100', `var(--color-${color}-100)`)
                root.style.setProperty('--color-primary-light', `var(--color-${color}-light)`)
                root.style.setProperty('--color-primary-lighter', `var(--color-${color}-lighter)`)
                root.style.setProperty('--color-primary-dark', `var(--color-${color}-dark)`)
                root.style.setProperty('--color-primary-darker', `var(--color-${color}-darker)`)
                this.selectedColor = color
                window.localStorage.setItem('color', color)
                //
            }

            return {
                loading: false,
                isDark: true,
                toggleTheme() {
                    this.isDark = !this.isDark
                    setTheme(this.isDark)
                },
                setLightTheme() {
                    this.isDark = false
                    setTheme(this.isDark)
                },
                setDarkTheme() {
                    this.isDark = true
                    setTheme(this.isDark)
                },
                color: getColor(),
                selectedColor: 'cyan',
                setColors,
                toggleSidbarMenu() {
                    this.isSidebarOpen = !this.isSidebarOpen
                },
                isSettingsPanelOpen: false,
                openSettingsPanel() {
                    this.isSettingsPanelOpen = true
                    this.$nextTick(() => {
                        this.$refs.settingsPanel.focus()
                    })
                },
                isNotificationsPanelOpen: false,
                openNotificationsPanel() {
                    this.isNotificationsPanelOpen = true
                    this.$nextTick(() => {
                        this.$refs.notificationsPanel.focus()
                    })
                },
                isSearchPanelOpen: false,
                openSearchPanel() {
                    this.isSearchPanelOpen = true
                    this.$nextTick(() => {
                        this.$refs.searchInput.focus()
                    })
                },
                isMobileSubMenuOpen: false,
                openMobileSubMenu() {
                    this.isMobileSubMenuOpen = true
                    this.$nextTick(() => {
                        this.$refs.mobileSubMenu.focus()
                    })
                },
                isMobileMainMenuOpen: false,
                openMobileMainMenu() {
                    this.isMobileMainMenuOpen = true
                    this.$nextTick(() => {
                        this.$refs.mobileMainMenu.focus()
                    })
                }
            }
        }

        /* Make dynamic date appear */
        (function() {
            if (document.getElementById("get-current-year")) {
                document.getElementById(
                    "get-current-year"
                ).innerHTML = new Date().getFullYear();
            }
        })();

        /* Make dynamic copyright appear */
        (function() {
            if (document.getElementById("copyright-by")) {
                document.getElementById(
                    "copyright-by"
                ).innerHTML = "Harris Marfel";
            }
        })();
    </script>
</body>
<script>
    const error = "{{ Session::has('error') }}"
    const success = "{{ Session::has('success') }}"
    if (error) {
        toastr.error("{{ Session::get('error') }}");
    }
    if (success) {
        toastr.success("{{ Session::get('success') }}");
    }
    
</script>
</html>
