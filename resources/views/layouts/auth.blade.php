<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="38isBOrZH2WZT8wwWJ6Ix4UrSxv0HBnNpEWvfCLG">
    <title>Age of Chaos - Đăng Nhập</title>

    <link rel="shortcut icon" href="/fe/img/logo/logo.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="/fe/img/logo.png" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap"
        rel="stylesheet" />
    <!-- Styles -->
    <link rel="stylesheet" href="/fe/css/app.css">

    <!-- Scripts -->
    <script src="/fe/js/app.js" defer></script>
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
    <div x-data="setup()" x-init="$refs.loading.classList.add('hidden');" class="dark">
        <!-- Loading screen -->
        <div x-ref="loading"
            class="fixed inset-0 z-50 flex items-center justify-center text-2xl font-semibold text-white bg-primary-darker">
            Loading...
        </div>
        <div
            class="flex flex-col items-center justify-center min-h-screen p-4 space-y-4 antialiased text-gray-900 bg-gray-100 dark:bg-dark dark:text-light">
            <!-- Brand -->
            <div>
                <img width="256px" height="256px" src="/fe/img/logo.png">
            </div>
            <main>
                @yield('content')
            </main>
        </div>
    </div>
    <script>
        const setup = () => {
            return {
                loading: true
            }
        }
    </script>
</body>

</html>
