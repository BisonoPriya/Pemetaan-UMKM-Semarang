<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>UMKM Semarang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .animate-fade-in {
            animation: fadeIn 0.5s ease-in;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>

<body class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen flex flex-col font-sans">

    <nav class="bg-gradient-to-r from-indigo-600 via-purple-600 to-blue-600 text-white shadow-2xl backdrop-blur-lg sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-5 flex justify-between items-center">
        <div class="flex items-center space-x-4">
            <!-- Ikon logo dengan animasi -->
            <div class="animate-pulse">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-9 h-9 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
            </div>
            <span class="text-2xl font-extrabold tracking-wider drop-shadow-2xl bg-clip-text text-transparent bg-gradient-to-r from-white to-blue-200">UMKM Semarang</span>
        </div>

        <!-- Navigation Links -->
        <div class="hidden md:flex space-x-10 text-base font-semibold">
            <a href="{{ route('kategori.index') }}"
               class="relative pb-3 transition-all duration-500 ease-out transform hover:scale-110 hover:-translate-y-1 {{ request()->routeIs('kategori.*') 
                   ? 'border-b-3 border-yellow-300 font-bold text-yellow-300 scale-110 -translate-y-1' 
                   : 'hover:border-b-3 hover:border-yellow-300 hover:text-yellow-200' }}">
                Kategori
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-yellow-300 transition-all duration-500 group-hover:w-full"></span>
            </a>
            <a href="{{ route('umkm.index') }}"
               class="relative pb-3 transition-all duration-500 ease-out transform hover:scale-110 hover:-translate-y-1 {{ request()->routeIs('umkm.*') 
                   ? 'border-b-3 border-yellow-300 font-bold text-yellow-300 scale-110 -translate-y-1' 
                   : 'hover:border-b-3 hover:border-yellow-300 hover:text-yellow-200' }}">
                UMKM
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-yellow-300 transition-all duration-500 group-hover:w-full"></span>
            </a>
            <a href="{{ route('dashboard') }}"
               class="relative pb-3 transition-all duration-500 ease-out transform hover:scale-110 hover:-translate-y-1 {{ request()->routeIs('dashboard') 
                   ? 'border-b-3 border-yellow-300 font-bold text-yellow-300 scale-110 -translate-y-1' 
                   : 'hover:border-b-3 hover:border-yellow-300 hover:text-yellow-200' }}">
                Peta
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-yellow-300 transition-all duration-500 group-hover:w-full"></span>
            </a>
        </div>

        <div class="md:hidden">
            <button id="mobile-menu-button" class="text-white focus:outline-none transition-all duration-300 hover:rotate-90 hover:scale-125">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </div>

    <div id="mobile-menu" class="md:hidden hidden bg-gradient-to-b from-blue-700 to-indigo-800 bg-opacity-95 backdrop-blur-xl px-6 py-6 space-y-4 transform transition-all duration-700 ease-in-out origin-top">
        <a href="{{ route('kategori.index') }}" class="block py-3 text-white hover:text-yellow-200 hover:bg-indigo-600 rounded-xl px-4 transition-all duration-400 shadow-md hover:shadow-lg">Kategori</a>
        <a href="{{ route('umkm.index') }}" class="block py-3 text-white hover:text-yellow-200 hover:bg-indigo-600 rounded-xl px-4 transition-all duration-400 shadow-md hover:shadow-lg">UMKM</a>
        <a href="{{ route('dashboard') }}" class="block py-3 text-white hover:text-yellow-200 hover:bg-indigo-600 rounded-xl px-4 transition-all duration-400 shadow-md hover:shadow-lg">Peta</a>
    </div>
</nav>

    <!-- MAIN CONTENT -->
    <main class="flex-grow container mx-auto px-6 py-8">
        @if(session('success'))
            <div class="mb-6 flex items-center gap-4 bg-gradient-to-r from-green-50 to-green-100 border border-green-300 text-green-800 px-6 py-4 rounded-xl shadow-lg animate-fade-in">
                <div class="flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <span class="font-medium">{{ session('success') }}</span>
                <button class="ml-auto text-green-600 hover:text-green-800 focus:outline-none" onclick="this.parentElement.style.display='none'">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-gradient-to-r from-gray-800 to-gray-900 text-white text-center py-6 border-t border-gray-700">
        <div class="max-w-7xl mx-auto px-6">
            <p class="text-sm text-gray-300">© {{ date('Y') }} UMKM Semarang • Sistem Informasi UMKM</p>
            <div class="mt-4 flex justify-center space-x-6">
                <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                    </svg>
                </a>
                <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                    </svg>
                </a>
                <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                    </svg>
                </a>
            </div>
        </div>
    </footer>

    <script>
       
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>

</body>
</html>