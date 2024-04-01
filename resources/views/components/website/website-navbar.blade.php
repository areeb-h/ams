<nav class="text-slate-500 font-medium bg-white shadow-sm dark:text-slate-50 dark:bg-gray-800 p-4 mx-auto items-center">
    <div class="container max-w-7xl mx-auto flex justify-between items-center h-10">
        <a href="{{ route('website.index') }}" class="flex items-center justify-center hover:underline rounded-xl p-2">
            <x-application-mark class="w-20 bg-green-50 p-1.5 rounded-md" />
            <h1 class="hidden">Site Name</h1>
        </a>

        <div class="hidden md:flex md:w-auto gap-2 justify-center">
            <a href="{{ route('website.index') }}" class="px-3 py-2 rounded-md text-sm font-semibold hover:bg-slate-200 transition-colors duration-300 {{ request()->routeIs('website.index') ? 'bg-slate-200 text-slate-800' : 'bg-slate-100 text-slate-700' }}">Home</a>
            <a href="{{ route('website.about') }}" class="px-3 py-2 rounded-md text-sm font-semibold hover:bg-slate-200 transition-colors duration-300 {{ request()->routeIs('website.about') ? 'bg-slate-200 text-slate-800' : 'bg-slate-100 text-slate-700' }}">About</a>
            <!-- Add more links as needed -->
            <a href="/" class="px-3 py-2 rounded-md text-sm font-semibold hover:bg-slate-200 transition-colors duration-300 {{ request()->routeIs('website.index') ? 'bg-slate-200 text-slate-800' : 'bg-slate-100 text-slate-700' }}">Home</a>
            <a href="/about" class="px-3 py-2 rounded-md text-sm font-semibold hover:bg-slate-200 transition-colors duration-300 {{ request()->routeIs('website.about') ? 'bg-slate-200 text-slate-800' : 'bg-slate-100 text-slate-700' }}">About</a>
        </div>

        <button id="menuToggle" class="md:hidden px-3 py-1 bg-gray-200 text-gray-700 rounded-md">Menu</button>
    </div>

    <div id="mobileMenu" class="hidden md:hidden">
        <a href="/" class="block py-1 px-3 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">Home</a>
        <a href="/about" class="block py-1 px-3 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">About</a>
        <!-- Add more links as needed -->
    </div>
</nav>
