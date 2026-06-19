<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Review - Tatik Catering</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                    },
                    colors: {
                        'cream-bg': '#F9F7F2',
                        'white-card': '#FFFFFF',
                        'gold-accent': '#C8A25D',
                        'dark-text': '#1a2634',
                        'gray-border': '#e2e8f0',
                    }
                }
            }
        }
    </script>
    <style>
        /* Matikan animasi */
        * { transition: none !important; }
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #d1d5db; border-radius: 10px; }
    </style>
</head>
<body class="bg-cream-bg font-sans text-dark-text min-h-screen flex">

    <!-- === SIDEBAR === -->
    <aside id="sidebar" class="hidden md:flex flex-col w-72 bg-white-card border-r border-gray-border h-screen fixed left-0 top-0 z-50">
        <div class="p-8 border-b border-gray-100 flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-serif font-bold text-dark-text">Tatik Catering<span class="text-gold-accent">.</span></h1>
                <p class="text-xs text-gray-400 tracking-widest uppercase mt-1">Admin Panel</p>
            </div>
            <button onclick="toggleSidebar()" class="md:hidden text-gray-500">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>

        <nav class="flex-1 overflow-y-auto py-6 px-4 space-y-2">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-4 px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-dark-text rounded-lg">
                <i class="fas fa-home w-6 text-center"></i>
                <span>Dashboard</span>
            </a>

            <div class="pt-4 pb-2">
                <p class="px-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Kelola Konten</p>
            </div>

            <a href="{{ route('admin.menu') }}" class="flex items-center gap-4 px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-dark-text rounded-lg">
                <i class="fas fa-utensils w-6 text-center"></i>
                <span>Daftar Menu</span>
            </a>

            <!-- Review Aktif -->
            <a href="{{ route('admin.reviews') }}" class="flex items-center gap-4 px-4 py-3 bg-cream-bg text-gold-accent font-semibold rounded-lg border-l-4 border-gold-accent">
                <i class="fas fa-star w-6 text-center"></i>
                <span>Review Pelanggan</span>
            </a>

            <a href="{{ route('admin.promo') }}" class="flex items-center gap-4 px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-dark-text rounded-lg">
                <i class="fas fa-tags w-6 text-center"></i>
                <span>Promo & Diskon</span>
            </a>
        </nav>

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

    <!-- === MAIN CONTENT === -->
    <main class="flex-1 md:ml-72 min-h-screen flex flex-col">
        
        <!-- Topbar -->
        <header class="bg-white-card border-b border-gray-border h-20 px-8 flex items-center justify-between sticky top-0 z-30 shadow-sm">
            <div class="flex items-center gap-4">
                <button onclick="toggleSidebar()" class="md:hidden text-gray-600 p-2">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                <h2 class="text-xl font-serif font-bold text-dark-text">Kelola Ulasan</h2>
            </div>
            
            <div class="flex items-center gap-3">
                <div class="text-right hidden sm:block">
                    @php $admin = \App\Models\Admin::find(session('admin_id')); @endphp
                    <p class="text-sm font-bold text-dark-text">{{ $admin->nama_lengkap ?? 'Administrator' }}</p>
                </div>
                <div class="h-10 w-10 bg-gold-accent rounded-full flex items-center justify-center text-white font-bold">
                    {{ substr($admin->nama_lengkap ?? 'A', 0, 1) }}
                </div>
            </div>
        </header>

        <div class="p-8">

            @if(session('success'))
                <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg flex items-center gap-3">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            <div class="mb-6 flex items-center justify-between">
                <div>
                    <h3 class="text-xl font-serif font-bold text-dark-text">Ulasan Masuk</h3>
                    <p class="text-sm text-gray-500 mt-1">Total: {{ $reviews->count() }} ulasan pelanggan.</p>
                </div>
                <!-- Pagination Links (Jika ada) -->
                <div>
                    <!-- {{ $reviews->links() }} -->
                </div>
            </div>

            <!-- GRID REVIEW CARDS -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($reviews as $r)
                    <div class="bg-white-card rounded-2xl border border-gray-border shadow-sm p-6 flex flex-col relative group hover:border-gold-accent">
                        
                        <!-- Header Card: Avatar & Nama -->
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center gap-3">
                                <!-- Avatar Inisial -->
                                <div class="h-10 w-10 rounded-full bg-gray-100 flex items-center justify-center text-gold-accent font-bold text-lg">
                                    {{ substr($r->nama_pelanggan, 0, 1) }}
                                </div>
                                <div>
                                    <h4 class="font-bold text-dark-text text-sm">{{ $r->nama_pelanggan }}</h4>
                                    <p class="text-xs text-gray-400">{{ $r->created_at->format('d M Y') }}</p>
                                </div>
                            </div>
                            
                            <!-- Bintang Rating -->
                            <div class="flex text-yellow-400 text-xs">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star {{ $i <= $r->bintang ? '' : 'text-gray-200' }}"></i>
                                @endfor
                            </div>
                        </div>

                        <!-- Isi Komentar -->
                        <div class="flex-1 mb-4 bg-gray-50 p-3 rounded-lg relative">
                            <!-- Kutipan Icon -->
                            <i class="fas fa-quote-left text-gray-200 text-2xl absolute top-2 left-2 -z-0"></i>
                            <p class="text-sm text-gray-600 italic relative z-10 leading-relaxed">
                                "{{ $r->komentar }}"
                            </p>
                        </div>

                        <!-- Footer Card: Action & Status -->
                        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                            <!-- Status Visibility -->
                            <div class="flex items-center gap-2">
                                <span class="h-2 w-2 rounded-full {{ $r->is_visible ? 'bg-green-500' : 'bg-red-500' }}"></span>
                                <span class="text-xs font-semibold text-gray-500">
                                    {{ $r->is_visible ? 'Ditampilkan' : 'Disembunyikan' }}
                                </span>
                            </div>

                            <div class="flex gap-2">
                                <!-- Toggle Visibility Form -->
                                <form action="{{ route('admin.reviews.toggle', $r) }}" method="POST">
                                    @csrf @method('PUT')
                                    <button type="submit" 
                                            class="p-2 rounded-lg text-sm border 
                                            {{ $r->is_visible ? 'border-gray-200 text-gray-500 hover:bg-gray-100' : 'border-green-200 text-green-600 bg-green-50 hover:bg-green-100' }}"
                                            title="{{ $r->is_visible ? 'Sembunyikan' : 'Tampilkan' }}">
                                        <i class="fas {{ $r->is_visible ? 'fa-eye-slash' : 'fa-eye' }}"></i>
                                    </button>
                                </form>

                                <!-- Delete Form -->
                                <form action="{{ route('admin.reviews.destroy', $r) }}" method="POST" onsubmit="return confirm('Yakin hapus review ini permanen?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="p-2 rounded-lg border border-red-100 text-red-500 hover:bg-red-50 hover:text-red-600" title="Hapus Permanen">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-16 text-center bg-white-card rounded-2xl border border-dashed border-gray-300">
                        <div class="text-gray-300 mb-3 text-5xl"><i class="far fa-comment-dots"></i></div>
                        <h3 class="text-lg font-bold text-gray-600">Belum ada review</h3>
                        <p class="text-sm text-gray-400">Review pelanggan akan muncul di sini.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination (Jika diperlukan) -->
            <div class="mt-8">
                 {{ $reviews->links() }}
            </div>
            
        </div>
    </main>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            if (sidebar.classList.contains('hidden')) {
                sidebar.classList.remove('hidden');
                sidebar.classList.add('flex');
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