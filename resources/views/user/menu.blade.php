@extends('layouts.main')

@section('title', 'Detail Menu - Tatik Catering')

@section('content')

<!-- 1. Load Fonts & AOS Animation -->
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<style>
    /* VARIABLES */
    :root {
        --color-gold: #C8A25D;
        --color-dark: #0d233a;
        --color-cream: #FBF9F1;
        --color-text: #555;
    }

    /* GLOBAL STYLES */
    body {
        font-family: 'Poppins', sans-serif;
        background-color: var(--color-cream);
        color: var(--color-text);
    }
    .font-serif { font-family: 'Playfair Display', serif; }

    /* MENU CARD STYLING */
    .menu-card {
        display: flex;
        gap: 30px;
        background: white;
        padding: 25px;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.03);
        margin-bottom: 30px;
        transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275), box-shadow 0.3s ease;
        border: 1px solid transparent;
        align-items: center;
    }
    
    .menu-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(200, 162, 93, 0.15);
        border-color: rgba(200, 162, 93, 0.2);
    }

    /* IMAGE STYLING */
    .menu-img-wrapper {
        flex: 0 0 160px;
        height: 160px;
        border-radius: 15px;
        overflow: hidden;
        position: relative;
    }
    
    .menu-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .menu-card:hover .menu-img {
        transform: scale(1.1); /* Zoom effect saat hover card */
    }

    /* TEXT CONTENT */
    .menu-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--color-dark);
        margin-bottom: 10px;
    }
    
    .menu-desc {
        color: #666;
        line-height: 1.6;
        font-size: 0.95rem;
        margin-bottom: 20px;
    }

    /* BUTTON STYLE */
    .btn-pesan {
        display: inline-block;
        background-color: var(--color-gold);
        color: white;
        padding: 10px 25px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 10px rgba(200, 162, 93, 0.3);
    }
    
    .btn-pesan:hover {
        background-color: #b18c4f;
        transform: translateX(5px); /* Geser sedikit ke kanan */
        box-shadow: 0 6px 15px rgba(200, 162, 93, 0.4);
        color: white;
    }

    /* RESPONSIVE (HP) */
    @media (max-width: 768px) {
        .menu-card {
            flex-direction: column;
            text-align: center;
            gap: 20px;
        }
        .menu-img-wrapper {
            width: 100%;
            height: 200px;
            flex: none;
        }
        .btn-pesan {
            width: 100%;
        }
    }
</style>

<!-- HEADER SECTION -->
<section style="padding: 60px 0 40px; text-align: center; background: linear-gradient(to bottom, #fff, var(--color-cream));">
    <div class="container" data-aos="fade-down" data-aos-duration="1000">
        <h5 class="text-uppercase" style="color: var(--color-gold); letter-spacing: 2px; font-weight: 600; font-size: 0.9rem; margin-bottom: 10px;">
            Taste of Perfection
        </h5>
        <h2 style="font-family: 'Playfair Display', serif; font-size: 3rem; font-weight: 700; color: var(--color-dark);">
            Detail Menu Kami
        </h2>
        <div style="width: 60px; height: 3px; background: var(--color-gold); margin: 20px auto 0;"></div>
    </div>
</section>

<!-- MENU LIST SECTION -->
<section style="padding: 20px 5% 80px; min-height: 80vh;">
    
    <!-- AMBIL DARI DATABASE -->
    <div style="max-width: 900px; margin: 0 auto;">
        @forelse(\App\Models\Menu::where('is_active', true)->latest()->get() as $m)
            <!-- Gunakan $loop->iteration untuk membuat delay animasi berjenjang -->
            <div class="menu-card" 
                 data-aos="fade-up" 
                 data-aos-delay="{{ $loop->iteration * 100 }}" 
                 data-aos-duration="800">
                
                <!-- Gambar -->
                <div class="menu-img-wrapper">
                    <img src="{{ asset('images/menus/' . $m->gambar) }}" 
                         alt="{{ $m->nama_menu }}"
                         class="menu-img">
                </div>
                
                <!-- Konten -->
                <div style="flex:1;">
                    <h3 class="menu-title">
                        {{ $m->nama_menu }}
                    </h3>
                    <p class="menu-desc">
                        {{ $m->deskripsi }}
                    </p>

                    <a href="https://wa.me/6285804741696?text=Halo%20Tatik%20Catering,%20saya%20mau%20pesan%20{{ urlencode($m->nama_menu) }}%20nih!" 
                       target="_blank"
                       class="btn-pesan">
                       Pesan Sekarang ➝
                    </a>
                </div>
            </div>
        @empty
            <!-- Tampilan Kosong -->
            <div style="text-align:center; padding: 60px 20px;" data-aos="zoom-in">
                <div style="font-size: 4rem; margin-bottom: 20px;">🍽️</div>
                <h3 class="font-serif" style="color: var(--color-dark);">Menu Belum Tersedia</h3>
                <p style="color:#888;">Silakan kembali lagi nanti untuk melihat menu spesial kami.</p>
            </div>
        @endforelse
    </div>

</section>

<!-- Init AOS Animation -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({
    once: true,
    offset: 50,
  });
</script>

@endsection