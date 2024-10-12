
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="38isBOrZH2WZT8wwWJ6Ix4UrSxv0HBnNpEWvfCLG">
    <title>Age of Chaos  - Log in</title>

            <link rel="shortcut icon" href="/fe/img/logo/logo.png"/>
        <link
            rel="apple-touch-icon"
            sizes="76x76"
            href="/fe/img/logo/logo.png"
        />
    
    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap"
        rel="stylesheet"
    />
    <!-- Styles -->
    <link rel="stylesheet" href="/fe/css/app.css">

    <!-- Scripts -->
    <script src="/fe/js/app.js" defer></script>
</head>
<body class="antialiased">
<div x-data="setup()" x-init="$refs.loading.classList.add('hidden'); setColors(color);" :class="{ 'dark': isDark}">
    <!-- Loading screen -->
    <div
    x-ref="loading"
    class="fixed inset-0 z-50 flex items-center justify-center text-2xl font-semibold text-white bg-primary-darker"
>
    Loading...
</div>
    <div
    class="flex flex-col items-center justify-center min-h-screen p-4 space-y-4 antialiased text-gray-900 bg-gray-100 dark:bg-dark dark:text-light"
>
    <!-- Brand -->
        <div>
    <img width="128px" height="128px" src="/fe/img/logo/logo.png" >
</div>
<a
    href="http://localhost"
    class="inline-block mb-6 text-3xl font-bold tracking-wider uppercase text-primary-dark dark:text-light"
>
    Age of Chaos
</a>
        <main>
            <div class="w-full max-w-sm px-4 py-6 space-y-6 bg-white rounded-md dark:bg-darker">
    <h1 class="text-xl font-semibold text-center">
    Log in
</h1>

            <form method="POST" action="/fe/login" class="space-y-6">
        <input type="hidden" name="_token" value="38isBOrZH2WZT8wwWJ6Ix4UrSxv0HBnNpEWvfCLG">        <input  class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker" id="name" type="text" name="name" placeholder="Log in" autofocus="autofocus" required="required">

        <input  class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker" id="password" type="password" name="password" required="required" autocomplete="current-password" placeholder="Password">

        
        
        <div class="flex items-center justify-between">
            <!-- Remember me toggle -->
<label class="flex items-center">
    <div class="relative inline-flex items-center">
        <input
    type="checkbox" class="w-10 h-4 transition bg-gray-200 border-none rounded-full shadow-inner outline-none appearance-none toggle checked:bg-primary-light disabled:bg-gray-200 focus:outline-none" id="remember_me" name="remember">
<span
    class="absolute top-0 left-0 w-4 h-4 transition-all transform scale-150 bg-white rounded-full shadow-sm"
></span>
    </div>
    <span class="ml-3 text-sm font-normal text-gray-500 dark:text-gray-400">Remember me</span>
</label>
                            <a href="/fe/forgot-password"
                   class="text-sm text-blue-600 hover:underline">Forgot Password?</a>
                    </div>
        <button type="submit" class="w-full px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker">
    Log in
</button>
    </form>
</div>
        </main>
</div>
    <!-- Toggle dark mode button -->
    <div class="fixed bottom-5 left-5">
    <button
        aria-hidden="true"
        @click="toggleTheme"
        class="p-2 transition-colors duration-200 rounded-full shadow-md bg-primary hover:bg-primary-darker focus:outline-none focus:ring focus:ring-primary"
    >
        <svg
            x-show="isDark"
            class="w-8 h-8 text-white"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M12 18a6 6 0 1 1 0-12 6 6 0 0 1 0 12zm0-2a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM11 1h2v3h-2V1zm0 19h2v3h-2v-3zM3.515 4.929l1.414-1.414L7.05 5.636 5.636 7.05 3.515 4.93zM16.95 18.364l1.414-1.414 2.121 2.121-1.414 1.414-2.121-2.121zm2.121-14.85l1.414 1.415-2.121 2.121-1.414-1.414 2.121-2.121zM5.636 16.95l1.414 1.414-2.121 2.121-1.414-1.414 2.121-2.121zM23 11v2h-3v-2h3zM4 11v2H1v-2h3z"
            />
        </svg>
        <svg
            x-show="!isDark"
            class="w-8 h-8 text-white"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M11.38 2.019a7.5 7.5 0 1 0 10.6 10.6C21.662 17.854 17.316 22 12.001 22 6.477 22 2 17.523 2 12c0-5.315 4.146-9.661 9.38-9.981z"
            />
        </svg>
    </button>
</div>
</div>
<script>
    const setup = () => {
        const getTheme = () => {
            if (window.localStorage.getItem('dark')) {
                return JSON.parse(window.localStorage.getItem('dark'))
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
        }

        return {
            loading: true,
            isDark: getTheme(),
            color: getColor(),
            toggleTheme() {
                this.isDark = !this.isDark
                setTheme(this.isDark)
            },
            setColors,
        }
    }
</script>
</body>
</html>
