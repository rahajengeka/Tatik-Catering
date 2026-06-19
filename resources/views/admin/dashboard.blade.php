<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Tatik Catering</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Font Awesome untuk Ikon (Agar lebih profesional) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                    },
                    colors: {
                        'cream-bg': '#F9F7F2',       // Background utama lebih terang
                        'white-card': '#FFFFFF',     // Warna kartu
                        'gold-accent': '#C8A25D',    // Warna aksen emas/coklat
                        'gold-dark': '#A68545',      // Hover state
                        'dark-text': '#1a2634',      // Warna teks utama
                        'gray-text': '#64748b',      // Warna teks deskripsi
                    }
                }
            }
        }
    </script>
    
    <style>
        /* Menghapus semua transisi halus sesuai request */
        * {
            transition: none !important;
        }
    </style>
</head>
<body class="bg-cream-bg font-sans text-dark-text min-h-screen flex">

    <!-- SIDEBAR (Fixed Desktop, Hidden Mobile) -->
    <!-- Logika: Di layar besar (md) selalu muncul. Di layar kecil, default hidden -->
    <aside id="sidebar" class="hidden md:flex flex-col w-72 bg-white-card border-r border-gray-200 h-screen fixed left-0 top-0 z-50">
        
        <!-- Header Sidebar -->
        <div class="p-8 border-b border-gray-100 flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-serif font-bold text-dark-text">
                    Tatik Catering<span class="text-gold-accent">.</span>
                </h1>
                <p class="text-xs text-gray-400 tracking-widest uppercase mt-1">Admin Panel</p>
            </div>
            <!-- Tombol close hanya untuk mobile -->
            <button onclick="toggleSidebar()" class="md:hidden text-gray-500">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 overflow-y-auto py-6 px-4 space-y-2">
            
            <!-- Dashboard (Active State Example) -->
            <a href="#" class="flex items-center gap-4 px-4 py-3 bg-cream-bg text-gold-accent font-semibold rounded-lg border-l-4 border-gold-accent">
                <i class="fas fa-home w-6"></i>
                <span>Dashboard</span>
            </a>

            <div class="pt-4 pb-2">
                <p class="px-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Kelola Konten</p>
            </div>

            <!-- Menu -->
            <a href="{{ route('admin.menu') }}" class="flex items-center gap-4 px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-dark-text rounded-lg">
                <i class="fas fa-utensils w-6"></i>
                <span>Daftar Menu</span>
            </a>

            <!-- Review -->
            <a href="{{ route('admin.reviews') }}" class="flex items-center gap-4 px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-dark-text rounded-lg">
                <i class="fas fa-star w-6"></i>
                <span>Review Pelanggan</span>
            </a>

            <!-- Promo -->
            <a href="{{ route('admin.promo') }}" class="flex items-center gap-4 px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-dark-text rounded-lg">
                <i class="fas fa-tags w-6"></i>
                <span>Promo & Diskon</span>
            </a>
        </nav>

        <!-- Footer Sidebar (Logout) -->
        <div class="p-4 border-t border-gray-100">
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 text-red-500 hover:bg-red-50 rounded-lg font-medium">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Keluar</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- MOBILE OVERLAY -->
    <div id="overlay" onclick="toggleSidebar()" class="fixed inset-0 bg-black/50 z-40 hidden"></div>

    <!-- MAIN CONTENT -->
    <main class="flex-1 md:ml-72 min-h-screen flex flex-col">
        
        <!-- Topbar -->
        <header class="bg-white-card border-b border-gray-200 h-20 px-8 flex items-center justify-between sticky top-0 z-30">
            
            <!-- Toggle Sidebar Mobile -->
            <div class="flex items-center gap-4">
                <button onclick="toggleSidebar()" class="md:hidden text-gray-600 p-2">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                <h2 class="text-xl font-serif font-bold text-dark-text hidden sm:block">Dashboard Overview</h2>
            </div>

            <!-- Admin Profile -->
            <div class="flex items-center gap-4">
                <div class="text-right hidden sm:block">
                    @php
                        $admin = \App\Models\Admin::find(session('admin_id'));
                    @endphp
                    <p class="text-sm font-bold text-dark-text">{{ $admin->nama_lengkap ?? 'Administrator' }}</p>
                    <p class="text-xs text-gray-500">Super Admin</p>
                </div>
                <div class="h-10 w-10 bg-gold-accent rounded-full flex items-center justify-center text-white font-bold text-lg">
                    {{ substr($admin->nama_lengkap ?? 'A', 0, 1) }}
                </div>
            </div>
        </header>

        <!-- Dashboard Content -->
        <div class="p-8">
            
            <!-- Welcome Banner -->
            <div class="bg-dark-text rounded-2xl p-8 text-white mb-10 flex flex-col md:flex-row items-start md:items-center justify-between shadow-lg relative overflow-hidden">
                <div class="relative z-10">
                    <h2 class="text-3xl font-serif font-bold mb-2">Selamat Datang, Admin!</h2>
                    <p class="text-gray-300 max-w-xl">Kelola menu catering, lihat ulasan pelanggan, dan atur promo spesial dengan mudah dari panel ini.</p>
                </div>
                <!-- Dekorasi lingkaran transparan -->
                <div class="absolute -right-10 -bottom-20 w-64 h-64 bg-white opacity-5 rounded-full pointer-events-none"></div>
            </div>

            <!-- Quick Stats / Cards Grid -->
            <!-- Menggunakan Grid agar tidak kosong -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <!-- Card 1: Menu -->
                <div class="bg-white-card p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md hover:border-gold-accent group">
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-3 bg-blue-50 text-blue-600 rounded-xl">
                            <i class="fas fa-utensils text-2xl"></i>
                        </div>
                        <a href="{{ route('admin.menu') }}" class="text-sm font-bold text-gold-accent hover:text-gold-dark hover:underline">Kelola &rarr;</a>
                    </div>
                    <h3 class="text-gray-500 text-sm font-medium mb-1">Total Menu</h3>
                    <p class="text-3xl font-bold text-dark-text mb-2">
                        {{ \App\Models\Menu::count() }} <span class="text-sm font-normal text-gray-400">item</span>
                    </p>
                    <p class="text-xs text-gray-400">Tambahkan atau edit menu catering</p>
                </div>

                <!-- Card 2: Reviews -->
                <div class="bg-white-card p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md hover:border-gold-accent group">
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-3 bg-yellow-50 text-yellow-600 rounded-xl">
                            <i class="fas fa-star text-2xl"></i>
                        </div>
                        <a href="{{ route('admin.reviews') }}" class="text-sm font-bold text-gold-accent hover:text-gold-dark hover:underline">Lihat &rarr;</a>
                    </div>
                    <h3 class="text-gray-500 text-sm font-medium mb-1">Ulasan Masuk</h3>
                    <p class="text-3xl font-bold text-dark-text mb-2">
                        {{ \App\Models\Review::count() }} <span class="text-sm font-normal text-gray-400">ulasan</span>
                    </p>
                    <p class="text-xs text-gray-400">Pantau feedback dari pelanggan</p>
                </div>

                <!-- Card 3: Promo -->
                <div class="bg-white-card p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md hover:border-gold-accent group">
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-3 bg-green-50 text-green-600 rounded-xl">
                            <i class="fas fa-tag text-2xl"></i>
                        </div>
                        <a href="{{ route('admin.promo') }}" class="text-sm font-bold text-gold-accent hover:text-gold-dark hover:underline">Atur &rarr;</a>
                    </div>
                    <h3 class="text-gray-500 text-sm font-medium mb-1">Promo Aktif</h3>
                    <p class="text-3xl font-bold text-dark-text mb-2">
                        {{ \App\Models\Promo::where('is_active', true)->count() }} <span class="text-sm font-normal text-gray-400">promo</span>
                    </p>
                    <p class="text-xs text-gray-400">Kelola diskon dan penawaran</p>
                </div>

            </div>

            <!-- Shortcut Section -->
            <div class="mt-10">
                <h3 class="text-xl font-serif font-bold text-dark-text mb-6">Aksi Cepat</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                    <a href="{{ route('admin.menu') }}" class="bg-white-card p-4 rounded-xl border border-gray-200 text-center hover:bg-gold-accent hover:text-white hover:border-gold-accent">
                        <i class="fas fa-plus mb-2"></i>
                        <span class="block font-medium">Tambah Menu</span>
                    </a>
                    <!-- Tambahkan shortcut lain jika ada -->
                </div>
            </div>

        </div>
    </main>

    <script>
        // Logika Sidebar Mobile Sederhana (Tanpa Animasi)
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            
            // Toggle class 'hidden' untuk menampilkan/menyembunyikan
            if (sidebar.classList.contains('hidden')) {
                sidebar.classList.remove('hidden');
                sidebar.classList.add('flex'); // Pastikan flex saat muncul
                overlay.classList.remove('hidden');
            } else {
                sidebar.classList.add('hidden');
                sidebar.classList.remove('flex');
                overlay.classList.add('hidden');
            }
        }
    </script>
</body>
</html>