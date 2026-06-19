<!-- Overlay Sidebar -->
<div id="sidebarOverlay" onclick="toggleSidebar()" class="fixed inset-0 bg-black/50 z-40 hidden transition-opacity opacity-0"></div>

<!-- SIDEBAR -->
<aside id="sidebar" class="fixed top-0 left-0 w-72 h-full bg-cream-dark z-50 transform -translate-x-full sidebar-transition flex flex-col justify-between shadow-2xl border-r border-brown-btn/20">
    <div class="p-8">
        <div class="flex items-center justify-between mb-8">
            <div class="relative">
                <h1 class="text-2xl font-serif font-bold text-gray-800 leading-none">Tatik<br><span class="ml-4">Catering</span></h1>
                <svg class="absolute bottom-2 left-0 w-24 h-4 z-0" viewBox="0 0 100 20" fill="none"><path d="M0 10 Q 50 25 100 5" stroke="#F59E0B" stroke-width="2" fill="none"/></svg>
            </div>
            <button onclick="toggleSidebar()" class="text-gray-700 hover:text-red-600 transition">
                <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
            </button>
        </div>
        <hr class="border-gray-400/50 mb-8">
        
        <nav class="space-y-6">
            <a href="{{ route('admin.menu') }}" class="flex items-center justify-between text-lg {{ request()->routeIs('admin.menu') ? 'text-brown-btn font-bold' : 'text-gray-800 hover:text-brown-btn font-medium' }} group transition">
                <span>Menu</span>
                <svg class="h-6 w-6 {{ request()->routeIs('admin.menu') ? 'text-brown-btn' : 'text-gray-600 group-hover:text-brown-btn' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
            </a>
            <a href="{{ route('admin.reviews') }}" class="flex items-center justify-between text-lg {{ request()->routeIs('admin.reviews') ? 'text-brown-btn font-bold' : 'text-gray-800 hover:text-brown-btn font-medium' }} group transition">
                <span>Review</span>
                <svg class="h-6 w-6 {{ request()->routeIs('admin.reviews') ? 'text-brown-btn' : 'text-gray-600 group-hover:text-brown-btn' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" /></svg>
            </a>
            <a href="{{ route('admin.promo') }}" class="flex items-center justify-between text-lg {{ request()->routeIs('admin.promo') ? 'text-brown-btn font-bold' : 'text-gray-800 hover:text-brown-btn font-medium' }} group transition">
                <span>Promo</span>
                <svg class="h-6 w-6 {{ request()->routeIs('admin.promo') ? 'text-brown-btn' : 'text-gray-600 group-hover:text-brown-btn' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" /></svg>
            </a>
        </nav>
    </div>
    <div class="p-8">
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf 
            <button type="submit" class="w-full flex items-center justify-between text-lg text-gray-800 hover:text-red-600 font-medium group transition">
                <span>Log Out</span>
                <svg class="h-6 w-6 text-gray-600 group-hover:text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
            </button>
        </form>
    </div>
</aside>
