<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel App') }}</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <nav class="bg-white shadow px-6 py-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-2xl font-bold text-blue-600">
                Home
            </a>
            <div class="space-x-6">
                <a href="{{ url('/penjualan') }}" class="hover:text-blue-600">Penjualan</a>
                <a href="{{ url('/master-toko') }}" class="hover:text-blue-600">Master Toko</a>
                <a href="{{ url('/master-sales') }}" class="hover:text-red-600">Master Sales</a>
                <a href="{{ url('/area-sales') }}" class="hover:text-red-600">Master Area Sales</a>
            </div>
        </div>
    </nav>

    <main class="p-6">
        @yield('content')
    </main>

    <footer class="bg-white border-t mt-10">
        <div class="max-w-7xl mx-auto px-6 py-4 text-center text-gray-500 text-sm">
            &copy; {{ date('Y') }} . All rights reserved.
        </div>
    </footer>

    @yield('scripts')
</body>
</html>
