@extends('layouts.home')
@section('title', 'Tatik Catering - Home')

@php use Illuminate\Support\Str; @endphp

@section('content')

<!-- 1. Load Fonts, Animation Library & SweetAlert -->
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<!-- AOS Animation CSS -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<!-- SweetAlert2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

<style>
    /* UTILITIES & VARIABLES */
    :root {
        --color-gold: #C8A25D;
        --color-dark: #0d233a;
        --color-cream: #FBF9F1;
        --color-text: #555;
    }

    /* GLOBAL TYPOGRAPHY */
    body {
        font-family: 'Poppins', sans-serif;
        color: var(--color-text);
        background-color: var(--color-cream);
        overflow-x: hidden;
    }

    h1, h2, h3, h4, h5, .font-heading {
        font-family: 'Playfair Display', serif;
        color: var(--color-dark);
    }

    /* ANIMASI BACKGROUND HERO */
    @keyframes slowZoom {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }

    /* BUTTON STYLE */
    .btn-custom {
        background-color: var(--color-gold);
        color: #fff;
        font-weight: 600;
        padding: 12px 32px;
        border-radius: 50px;
        text-decoration: none;
        transition: all 0.3s ease;
        border: none;
        display: inline-block;
        box-shadow: 0 4px 15px rgba(200, 162, 93, 0.3);
    }
    .btn-custom:hover {
        background-color: #b18c4f;
        color: #fff;
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(200, 162, 93, 0.5);
    }

    /* CARDS */
    .card-modern {
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        border: none;
        overflow: hidden;
        transition: transform 0.4s ease, box-shadow 0.4s ease;
    }
    .card-modern:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.1);
    }

    /* FORM STYLE */
    .form-control-custom {
        width: 100%;
        padding: 15px;
        border-radius: 12px;
        border: 1px solid #ddd;
        margin-bottom: 15px;
        font-family: 'Poppins', sans-serif;
        transition: border-color 0.3s;
    }
    .form-control-custom:focus {
        border-color: var(--color-gold);
        outline: none;
    }

    /* SECTION SPACING */
    .section-padding { padding: 100px 0; }

    /* SCROLLBAR HIDE */
    .no-scrollbar::-webkit-scrollbar { display: none; }
    .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    
    /* SWEETALERT CUSTOM */
    .swal2-popup {
        border-radius: 20px !important;
        font-family: 'Poppins', sans-serif !important;
    }
    .swal2-title {
        font-family: 'Playfair Display', serif !important;
        color: var(--color-dark) !important;
    }
    .swal2-confirm {
        background-color: var(--color-gold) !important;
        border-radius: 50px !important;
    }
</style>

<!-- ==================== 1. HERO BANNER ==================== -->
<section class="d-flex align-items-center justify-content-center position-relative" style="height: 90vh; overflow: hidden;">
  
  <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 0; overflow: hidden;">
      <img src="{{ asset('images/bg.jpeg') }}" 
           alt="Hero Background" 
           style="
             width: 100%; 
             height: 100%; 
             object-fit: cover; 
             animation: slowZoom 20s infinite ease-in-out;
           ">
  </div>
  
  <div style="position: absolute; inset: 0; background: rgba(0, 0, 0, 0.55); z-index: 1;"></div>

  <div class="container text-center position-relative" style="z-index: 2;">
    <h2 data-aos="fade-up" data-aos-duration="1000"
        style="
          font-family: 'Playfair Display', serif;
          font-size: 4.0rem;
          font-weight: 700;
          color: #F5F5DC;
          letter-spacing: 1px;
          margin-bottom: 1.5rem;
          line-height: 1.2;
        ">
      Setiap Acara Punya Rasa,<br>Setiap Rasa Punya Cerita
    </h2>
    
    <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200"
       style="
         font-family: 'Poppins', sans-serif;
         font-size: 1.25rem;
         color: #F5F5DC;
         max-width: 700px;
         margin: 0 auto;
         font-weight: 300;
       ">
      Hadirkan kehangatan dalam setiap momen spesial Anda dengan sajian istimewa penuh cita rasa autentik.
    </p>

    <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400" style="margin-top: 50px;">
        <a href="#menu" class="btn-custom">Lihat Menu</a>
    </div>
  </div>
</section>


<!-- ==================== 2. TENTANG KAMI ==================== -->
<section id="tentangkami" class="section-padding bg-white">
  <div class="container">
    <div class="row align-items-center">
        
        <div class="col-lg-6 text-start" data-aos="fade-right" data-aos-duration="1000">
            <h5 class="text-uppercase mb-2" style="color: var(--color-gold); letter-spacing: 2px; font-weight: 600; font-size: 0.9rem;">Tentang Kami</h5>
            <h2 class="mb-4" style="font-size: 3rem; font-weight: 700; line-height: 1.1;">
                Melayani dengan Hati,<br>Memasak dengan Cinta
            </h2>
            <div style="width: 80px; height: 4px; background: var(--color-gold); margin-bottom: 30px; border-radius: 2px;"></div>
            
            <p style="font-size: 1.1rem; line-height: 1.8; color: #666; margin-bottom: 35px;">
                Tatik Catering hadir untuk membuat setiap acara lebih hangat dan berkesan. 
                Kami menyajikan beragam menu pilihan dengan cita rasa autentik, bahan segar, 
                dan 100% halal. Fokus kami adalah kualitas rasa dan pelayanan yang membuat Anda tenang menikmati acara.
            </p>
            <a href="https://wa.me/6281234567890" target="_blank" class="btn-custom">
                Hubungi Kami Sekarang
            </a>
        </div>

        <div class="col-lg-6 d-none d-lg-block ps-lg-5" data-aos="fade-left" data-aos-duration="1000">
             <div style="position: relative;">
                 <img src="{{ asset('images/tentangkami.jpeg') }}" 
                      alt="Tentang Kami" 
                      style="width: 100%; border-radius: 20px; box-shadow: 20px 20px 0px rgba(200, 162, 93, 0.2);">
                 
                 <div style="
                    position: absolute; 
                    bottom: -30px; 
                    left: -30px; 
                    background: #fff; 
                    padding: 20px; 
                    border-radius: 15px; 
                    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
                    display: flex;
                    align-items: center;
                    gap: 15px;
                 ">
                    <div style="font-size: 2rem;">👩‍🍳</div>
                    <div>
                        <h6 class="m-0 fw-bold font-heading">Sejak 2019</h6>
                        <small class="text-muted">Melayani Kota Malang</small>
                    </div>
                 </div>
             </div>
        </div>
    </div>
  </div>
</section>


<!-- ==================== 3. PROMO SPESIAL ==================== -->
@php
    $promo = \App\Models\Promo::where('is_active', true)->latest()->first();
@endphp

@if($promo)
<section class="section-padding" style="background: linear-gradient(135deg, #fff8e8 0%, #fff 100%); overflow: hidden;">
    <div class="container">
        <div class="card-modern mx-auto" style="max-width: 1000px;" data-aos="zoom-in" data-aos-duration="1000">
            <div class="row g-0 align-items-center">
                
                <div class="col-md-5">
                    <div style="height: 100%; min-height: 450px; overflow: hidden;">
                        <img src="{{ asset('storage/promos/' . $promo->gambar) }}" 
                             alt="{{ $promo->judul_promo }}" 
                             style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s hover:scale-110;">
                    </div>
                </div>

                <div class="col-md-7 p-5 text-start">
                    <span class="badge mb-3" style="background: #e74c3c; color: white; padding: 8px 16px; border-radius: 30px; font-weight: 500; font-size: 0.9rem;">
                        PROMO SPESIAL
                    </span>
                    
                    <h3 class="mb-2 font-heading" style="font-weight: 700; font-size: 2.2rem;">{{ $promo->judul_promo }}</h3>
                    
                    <div class="d-flex align-items-center mb-4">
                        <span style="font-family: 'Playfair Display', serif; font-size: 4rem; font-weight: 800; color: #e74c3c; line-height: 1;">
                            {{ $promo->diskon_persen }}%
                        </span>
                        <span class="ms-3" style="font-size: 1.5rem; color: #e74c3c; font-weight: 600;">OFF</span>
                    </div>

                    <p class="text-muted mb-5" style="font-size: 1.1rem; line-height: 1.6;">
                        {{ $promo->deskripsi }}
                    </p>

                    <div class="d-flex flex-wrap align-items-center gap-3">
                        <a href="https://wa.me/6281234567890?text=Halo%20Tatik%20Catering!%20Saya%20mau%20pesan%20dengan%20promo%20{{ urlencode($promo->judul_promo) }}"
                           target="_blank"
                           class="btn-custom" style="background: #25d366; padding-left: 25px; padding-right: 25px;">
                           Ambil Promo via WA
                        </a>
                        <small class="text-muted d-block mt-2 mt-sm-0">
                            Berlaku s/d {{ $promo->tanggal_selesai->format('d M Y') }}
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif


<!-- ==================== 4. MENU SECTION ==================== -->
<section id="menu" class="section-padding bg-cream">
    <div class="container">
        <div class="mb-5 d-flex flex-wrap justify-content-between align-items-end" data-aos="fade-up">
            <div>
                <h5 class="text-uppercase mb-2 text-gold fw-bold" style="letter-spacing: 2px; font-size: 0.9rem;">Menu Favorit</h5>
                <h2 class="fw-bold mb-0" style="font-size: 3rem;">Hidangan Pilihan</h2>
            </div>
            <a href="{{ url('/menu') }}" class="text-decoration-none fw-bold text-gold d-none d-md-block mt-3 mt-md-0" style="font-size: 1.1rem;">
                Lihat Semua Menu &rarr;
            </a>
        </div>

        <div class="no-scrollbar d-flex gap-4 pb-5 pt-2" style="overflow-x: auto; padding: 10px 5px;">
            @forelse(\App\Models\Menu::where('is_active', true)->latest()->get() as $index => $menu)
                <a href="{{ url('/menu') }}" class="text-decoration-none" style="flex: 0 0 280px;" 
                   data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="card-modern h-100 pb-3">
                        <div style="height: 200px; overflow: hidden; position: relative;">
                            <img src="{{ asset('images/menus/' . $menu->gambar) }}" 
                                 alt="{{ $menu->nama_menu }}" 
                                 style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s;">
                        </div>
                        <div class="p-4 text-start"> 
                            <h5 class="mb-2 text-dark font-heading" style="font-size: 1.3rem; font-weight: 700;">{{ $menu->nama_menu }}</h5>
                            <small class="text-muted">Klik untuk detail menu</small>
                        </div>
                    </div>
                </a>
            @empty
                <div class="w-100 text-center py-5">
                    <p class="text-muted">Belum ada menu yang ditampilkan.</p>
                </div>
            @endforelse
        </div>
        
        <div class="text-center mt-2 d-md-none">
             <a href="{{ url('/menu') }}" class="btn-custom">Lihat Semua Menu</a>
        </div>
    </div>
</section>


<!-- ==================== 5. REVIEW PELANGGAN ==================== -->
<section id="review" class="section-padding bg-white">
    <div class="container">
        <div class="text-start mb-5" data-aos="fade-up">
            <h5 class="text-uppercase mb-2 text-gold fw-bold" style="letter-spacing: 2px; font-size: 0.9rem;">Testimoni</h5>
            <h2 class="fw-bold" style="font-size: 3rem;">Kata Mereka</h2>
        </div>

        <!-- Grid Reviews -->
        <div class="row g-4 mb-5">
            @forelse(\App\Models\Review::visible()->orderByDesc('created_at')->limit(3)->get() as $index => $review)
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ $index * 150 }}">
                    <div class="card-modern p-4 h-100 text-start" style="background-color: #fcfcfc; border: 1px solid #f0f0f0;">
                        <div class="d-flex align-items-center mb-3">
                            <div class="text-warning me-2" style="font-size: 1.1rem;">
                                @for($i=1; $i<=5; $i++)
                                    {{ $i <= $review->bintang ? '★' : '☆' }}
                                @endfor
                            </div>
                        </div>
                        <p class="text-muted fst-italic mb-4" style="line-height: 1.6;">"{{ $review->komentar }}"</p>
                        <div class="d-flex align-items-center mt-auto">
                            <div style="width: 40px; height: 40px; background: #eee; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; color: #aaa; margin-right: 10px;">
                                {{ substr($review->nama_pelanggan, 0, 1) }}
                            </div>
                            <small class="text-dark fw-bold font-heading">{{ $review->nama_pelanggan }}</small>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted">Belum ada ulasan.</div>
            @endforelse
        </div>

        <!-- Form Ulasan -->
        <div class="row justify-content-center mt-5" data-aos="fade-up" data-aos-offset="100">
            <div class="col-md-8 col-lg-7">
                <div class="card-modern p-5" style="background-color: var(--color-cream); box-shadow: none; border: 1px dashed var(--color-gold);">
                    <h3 class="text-center mb-4 fw-bold font-heading">Bagikan Pengalaman Anda</h3>
                    
                    <!-- Kotak Alert dihapus, diganti Pop Up SweetAlert -->

                    <form action="{{ route('kirim-review') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold small text-muted">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control-custom" value="{{ old('nama') }}" required placeholder="Contoh: Budi Santoso">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold small text-muted">Rating</label>
                                <select name="rating" class="form-control-custom" required>
                                    <option value="" disabled selected>Pilih Bintang</option>
                                    <option value="5">⭐⭐⭐⭐⭐ (Sempurna)</option>
                                    <option value="4">⭐⭐⭐⭐ (Sangat Baik)</option>
                                    <option value="3">⭐⭐⭐ (Cukup)</option>
                                    <option value="2">⭐⭐ (Kurang)</option>
                                    <option value="1">⭐ (Kecewa)</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold small text-muted">Ulasan</label>
                            <textarea name="pesan" rows="3" class="form-control-custom" required placeholder="Ceritakan bagaimana rasanya..."></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn-custom w-100">Kirim Ulasan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ==================== 6. CONTACT SECTION ==================== -->
<section id="contact" class="text-center py-5 text-white" style="background-color: var(--color-dark);">
  <div class="container" data-aos="fade-in">
    <h2 class="mb-4 fw-bold text-white">Hubungi Kami</h2>
    <div class="d-flex justify-content-center flex-wrap gap-4 mb-4" style="font-size: 1.1rem; opacity: 0.9;">
        <span>📞 0813-0429-4928</span>
        <span class="d-none d-md-inline text-gold">|</span>
        <span>📧 tatikcatering@gmail.com</span>
        <span class="d-none d-md-inline text-gold">|</span>
        <span>📷 @tatikcatering</span>
    </div>
    <a href="{{ route('contact') }}" class="btn btn-outline-light rounded-pill px-5 py-2 fw-bold" style="border-width: 2px;">
        Lihat Alamat Lengkap
    </a>
  </div>
</section>

<!-- Scripts: Animation & SweetAlert -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  // 1. Init AOS (Animasi Scroll)
  AOS.init({
    once: true,
    offset: 100,
    duration: 800,
    easing: 'ease-out-cubic',
  });

  // 2. Logic Pop Up Review
  @if(session('success'))
    // Step A: Tampilkan Pop Up
    Swal.fire({
      icon: 'success',
      title: 'Berhasil!',
      text: 'Terimakasih review telah terkirim.', // Pesan di-hardcode sesuai request
      confirmButtonText: 'Oke',
      timer: 4000,
      timerProgressBar: true
    });

    // Step B: Paksa layar kembali ke bagian #review agar tidak lompat ke atas
    document.addEventListener("DOMContentLoaded", function() {
        const reviewSection = document.getElementById('review');
        if(reviewSection) {
            reviewSection.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    });
  @endif
</script>

@endsection