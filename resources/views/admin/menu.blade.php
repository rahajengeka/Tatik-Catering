<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Menu - Tatik Catering</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <!-- CROPPER.JS CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css"/>

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
        * { transition: none !important; }
        
        /* Custom Scrollbar untuk Modal */
        .modal-scroll::-webkit-scrollbar { width: 6px; }
        .modal-scroll::-webkit-scrollbar-track { background: #f1f1f1; }
        .modal-scroll::-webkit-scrollbar-thumb { background: #d1d5db; border-radius: 10px; }

        /* Area Crop: Batasi tinggi agar tidak memenuhi layar */
        .img-container {
            height: 50vh; /* Tinggi crop area fix 50% layar */
            width: 100%;
            background-color: #333; /* Background gelap biar fokus */
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .img-container img {
            max-width: 100%;
            max-height: 100%;
            display: block;
        }
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
            <a href="{{ route('admin.menu') }}" class="flex items-center gap-4 px-4 py-3 bg-cream-bg text-gold-accent font-semibold rounded-lg border-l-4 border-gold-accent">
                <i class="fas fa-utensils w-6 text-center"></i>
                <span>Daftar Menu</span>
            </a>
            <a href="{{ route('admin.reviews') }}" class="flex items-center gap-4 px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-dark-text rounded-lg">
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

    <div id="overlay" onclick="toggleSidebar()" class="fixed inset-0 bg-black/50 z-40 hidden"></div>

    <!-- === MAIN CONTENT === -->
    <main class="flex-1 md:ml-72 min-h-screen flex flex-col">
        
        <header class="bg-white-card border-b border-gray-border h-20 px-8 flex items-center justify-between sticky top-0 z-30 shadow-sm">
            <div class="flex items-center gap-4">
                <button onclick="toggleSidebar()" class="md:hidden text-gray-600 p-2">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                <h2 class="text-xl font-serif font-bold text-dark-text">Kelola Menu Catering</h2>
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

            <!-- FORM TAMBAH MENU -->
            <div class="bg-white-card rounded-2xl shadow-sm border border-gray-border p-6 mb-10">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-lg font-bold text-dark-text">Tambah Menu Baru</h3>
                        <p class="text-sm text-gray-500">Gambar akan otomatis di-crop menjadi Persegi (1:1).</p>
                    </div>
                    <div class="bg-gold-accent/10 p-3 rounded-full text-gold-accent">
                        <i class="fas fa-plus text-xl"></i>
                    </div>
                </div>

                <form action="{{ route('admin.menu.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-600 mb-2">Nama Menu</label>
                            <input type="text" name="nama_menu" required 
                                   class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:bg-white focus:border-gold-accent focus:outline-none"
                                   placeholder="Contoh: Ayam Bakar Madu">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-600 mb-2">Upload Foto</label>
                            <input type="file" id="add_image_input" name="gambar" required accept="image/*"
                                   onchange="triggerCrop(this, 'add_preview_img')"
                                   class="w-full px-4 py-2 bg-gray-50 border border-gray-200 rounded-lg text-sm file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-gold-accent file:text-white hover:file:bg-opacity-90 cursor-pointer">
                            
                            <div id="add_preview_container" class="hidden mt-4">
                                <p class="text-xs text-gray-400 mb-1">Hasil Crop:</p>
                                <img id="add_preview_img" class="w-24 h-24 object-cover rounded-lg border border-gray-300 shadow-sm">
                            </div>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-semibold text-gray-600 mb-2">Deskripsi Menu</label>
                            <textarea name="deskripsi" rows="3" required 
                                      class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:bg-white focus:border-gold-accent focus:outline-none"
                                      placeholder="Jelaskan detail rasa..."></textarea>
                        </div>
                    </div>
                    <div class="mt-6 flex justify-end">
                        <button type="submit" class="bg-gold-accent hover:bg-opacity-90 text-white font-semibold py-3 px-8 rounded-lg flex items-center gap-2">
                            <i class="fas fa-save"></i> Simpan Menu
                        </button>
                    </div>
                </form>
            </div>

            <!-- DAFTAR MENU -->
            <div class="mb-6 flex items-center justify-between">
                <h3 class="text-xl font-serif font-bold text-dark-text">Daftar Menu Tersedia</h3>
                <span class="text-sm bg-gray-100 text-gray-600 px-3 py-1 rounded-full font-medium">Total: {{ $menus->count() }}</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($menus as $m)
                    <div class="bg-white-card rounded-2xl border border-gray-border shadow-sm overflow-hidden flex flex-col relative group">
                        <div class="absolute top-3 left-3 z-10">
                            @if($m->is_active)
                                <span class="bg-green-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">Aktif</span>
                            @else
                                <span class="bg-gray-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">Nonaktif</span>
                            @endif
                        </div>
                        <div class="h-48 w-full bg-gray-100">
                            <img src="{{ asset('images/menus/' . $m->gambar) }}" alt="{{ $m->nama_menu }}" class="w-full h-full object-cover">
                        </div>
                        <div class="p-5 flex-1 flex flex-col">
                            <h4 class="text-lg font-bold text-dark-text mb-2">{{ $m->nama_menu }}</h4>
                            <p class="text-sm text-gray-500 line-clamp-2 mb-4 flex-1">{{ $m->deskripsi }}</p>

                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                <form action="{{ route('admin.menu.toggle', $m) }}" method="POST">
                                    @csrf @method('PATCH')
                                    <button type="submit" class="text-xs font-bold uppercase tracking-wider {{ $m->is_active ? 'text-gray-400 hover:text-gray-600' : 'text-green-600 hover:text-green-800' }}">
                                        {{ $m->is_active ? 'Sembunyikan' : 'Tampilkan' }}
                                    </button>
                                </form>
                                <div class="flex gap-2">
                                    <button 
                                        onclick="openEditModal(this)"
                                        data-id="{{ $m->id }}"
                                        data-nama="{{ htmlspecialchars($m->nama_menu) }}"
                                        data-deskripsi="{{ htmlspecialchars($m->deskripsi) }}"
                                        data-gambar="{{ asset('images/menus/' . $m->gambar) }}"
                                        data-active="{{ $m->is_active }}"
                                        class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form action="{{ route('admin.menu.destroy', $m) }}" method="POST" onsubmit="return confirm('Hapus permanen?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="p-2 text-red-500 hover:bg-red-50 rounded-lg">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-12 text-center border border-dashed border-gray-300 rounded-xl">
                        <p class="text-gray-500">Belum ada menu.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </main>

    <!-- ================= MODAL CROPPER (FIXED HEIGHT) ================= -->
    <div id="cropperModal" class="hidden fixed inset-0 bg-black/80 z-[70] flex items-center justify-center p-4">
        <!-- Max Width lebih kecil (lg) dan Max Height 90vh supaya tidak mentok atas bawah -->
        <div class="bg-white w-full max-w-lg rounded-2xl overflow-hidden shadow-2xl flex flex-col max-h-[90vh]">
            
            <!-- Header Modal -->
            <div class="p-4 bg-gray-50 border-b border-gray-200 flex justify-between items-center shrink-0">
                <h3 class="font-bold text-gray-800"><i class="fas fa-crop-alt mr-2"></i>Sesuaikan (1:1)</h3>
                <button onclick="closeCropper()" class="text-gray-500 hover:text-red-500"><i class="fas fa-times text-xl"></i></button>
            </div>
            
            <!-- Body Modal (Image Container) -->
            <div class="p-0 bg-gray-900 flex-1 overflow-hidden flex justify-center items-center">
                <div class="img-container">
                    <img id="imageToCrop" src="" alt="Picture">
                </div>
            </div>

            <!-- Footer Modal -->
            <div class="p-4 bg-gray-50 border-t border-gray-200 flex justify-end gap-3 shrink-0">
                <button onclick="closeCropper()" class="px-4 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100 font-medium text-sm">Batal</button>
                <button id="btnCrop" class="px-5 py-2 rounded-lg bg-gold-accent text-white hover:bg-opacity-90 font-medium shadow-md text-sm">
                    <i class="fas fa-check mr-2"></i>Simpan
                </button>
            </div>
        </div>
    </div>

    <!-- ================= MODAL EDIT (SCROLLABLE) ================= -->
    <div id="editModalBackdrop" class="hidden fixed inset-0 bg-black/60 z-[60] flex items-center justify-center p-4">
        <!-- Tambahkan max-h-[90vh] dan flex-col agar modal tidak kepanjangan -->
        <div id="editModal" class="bg-white w-full max-w-lg rounded-2xl shadow-2xl relative flex flex-col max-h-[90vh] hidden">
            
            <!-- Header Fixed -->
            <div class="bg-gray-50 px-6 py-4 border-b border-gray-100 flex justify-between items-center shrink-0 rounded-t-2xl">
                <h3 class="text-lg font-bold text-dark-text">Edit Menu</h3>
                <button onclick="closeEditModal()" class="text-gray-400 hover:text-red-500 text-xl"><i class="fas fa-times"></i></button>
            </div>

            <!-- Form Body (Scrollable) -->
            <div class="overflow-y-auto p-6 modal-scroll">
                <form id="editForm" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')

                    <div class="grid gap-5">
                        <!-- Nama -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-600 mb-2">Nama Menu</label>
                            <input id="edit_nama" name="nama_menu" type="text" required class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-gold-accent text-sm">
                        </div>

                        <!-- Deskripsi -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-600 mb-2">Deskripsi</label>
                            <textarea id="edit_deskripsi" name="deskripsi" rows="3" required class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-gold-accent text-sm"></textarea>
                        </div>

                        <!-- Upload -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-600 mb-2">Ganti Gambar</label>
                            <div class="flex gap-4 items-start">
                                <div class="flex-1">
                                    <input type="file" id="edit_image_input" name="gambar" accept="image/*"
                                           onchange="triggerCrop(this, 'edit_preview_img')"
                                           class="w-full text-xs text-gray-500 file:mr-3 file:py-2 file:px-3 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200 cursor-pointer">
                                </div>
                                <div class="flex gap-2">
                                    <img id="currentImagePreview" class="w-16 h-16 object-cover rounded-lg border border-gray-200" title="Gambar Lama">
                                    <div id="edit_preview_container" class="hidden">
                                        <img id="edit_preview_img" class="w-16 h-16 object-cover rounded-lg border border-green-400 shadow-sm" title="Gambar Baru">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Active Checkbox -->
                        <div>
                            <label class="flex items-center gap-3 cursor-pointer bg-gray-50 p-3 rounded-lg border border-gray-100">
                                <input id="edit_active" name="is_active" type="checkbox" class="w-5 h-5 text-gold-accent rounded focus:ring-gold-accent">
                                <span class="text-sm font-medium text-gray-700">Tampilkan di Homepage</span>
                            </label>
                        </div>
                    </div>
                    
                    <!-- Tombol Submit (Hidden di sini, dipindah ke Footer agar fixed) -->
                    <button type="submit" id="realSubmitBtn" class="hidden"></button>
                </form>
            </div>

            <!-- Footer Fixed -->
            <div class="bg-gray-50 px-6 py-4 border-t border-gray-100 flex justify-end gap-3 shrink-0 rounded-b-2xl">
                <button type="button" onclick="closeEditModal()" class="px-5 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100 font-medium text-sm">Batal</button>
                <!-- Tombol ini men-trigger form submit di atas -->
                <button onclick="document.getElementById('realSubmitBtn').click()" class="px-5 py-2 rounded-lg bg-gold-accent text-white hover:bg-opacity-90 font-medium text-sm">Simpan</button>
            </div>
        </div>
    </div>

    <!-- SCRIPTS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>
    <script>
        // Sidebar Toggle
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

        // --- CROPPER LOGIC ---
        let cropper;
        let currentInput;
        let currentPreviewId;
        const imageToCrop = document.getElementById('imageToCrop');
        const cropperModal = document.getElementById('cropperModal');

        function triggerCrop(inputElement, previewImgId) {
            const files = inputElement.files;
            if (files && files.length > 0) {
                const file = files[0];
                currentInput = inputElement;
                currentPreviewId = previewImgId;

                const reader = new FileReader();
                reader.onload = function (e) {
                    imageToCrop.src = e.target.result;
                    cropperModal.classList.remove('hidden');

                    if (cropper) cropper.destroy();

                    cropper = new Cropper(imageToCrop, {
                        aspectRatio: 1 / 1,
                        viewMode: 2,
                        autoCropArea: 1,
                    });
                };
                reader.readAsDataURL(file);
            }
        }

        document.getElementById('btnCrop').addEventListener('click', function () {
            if (!cropper) return;
            const canvas = cropper.getCroppedCanvas({ width: 600, height: 600 });

            canvas.toBlob(function (blob) {
                const newFile = new File([blob], "cropped_image.jpg", { type: "image/jpeg" });
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(newFile);
                currentInput.files = dataTransfer.files; 

                const previewImg = document.getElementById(currentPreviewId);
                previewImg.src = URL.createObjectURL(blob);
                
                if (currentPreviewId === 'add_preview_img') {
                    document.getElementById('add_preview_container').classList.remove('hidden');
                }
                if (currentPreviewId === 'edit_preview_img') {
                    document.getElementById('edit_preview_container').classList.remove('hidden');
                }

                closeCropper();
            }, 'image/jpeg');
        });

        function closeCropper() {
            cropperModal.classList.add('hidden');
            if (cropper) {
                cropper.destroy();
                cropper = null;
            }
            // Optional: reset input value jika batal
            // if (currentInput) currentInput.value = '';
        }

        // --- EDIT MODAL LOGIC ---
        function openEditModal(btn) {
            const id = btn.getAttribute('data-id');
            const nama = btn.getAttribute('data-nama');
            const deskripsi = btn.getAttribute('data-deskripsi');
            const gambar = btn.getAttribute('data-gambar');
            const active = btn.getAttribute('data-active');

            document.getElementById('editForm').action = '/admin/menu/' + id;
            document.getElementById('edit_nama').value = nama;
            document.getElementById('edit_deskripsi').value = deskripsi;
            document.getElementById('currentImagePreview').src = gambar;
            document.getElementById('edit_active').checked = (active == 1 || active == '1');

            document.getElementById('edit_image_input').value = '';
            document.getElementById('edit_preview_container').classList.add('hidden');

            const backdrop = document.getElementById('editModalBackdrop');
            const modal = document.getElementById('editModal');
            
            backdrop.classList.remove('hidden');
            modal.classList.remove('hidden');
        }

        function closeEditModal() {
            document.getElementById('editModalBackdrop').classList.add('hidden');
            document.getElementById('editModal').classList.add('hidden');
        }
    </script>
</body>
</html>