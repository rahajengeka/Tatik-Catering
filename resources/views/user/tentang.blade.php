@extends('layouts.main')

@section('title', 'Tentang Kami')

@section('content')

<!-- 1. Load Fonts & Animation Library -->
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
<!-- AOS Animation CSS -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<style>
    /* UTILITIES */
    .font-serif { font-family: 'Playfair Display', serif; }
    .font-sans { font-family: 'Poppins', sans-serif; }
    .text-gold { color: #C8A25D; }
    .text-dark-blue { color: #0d233a; }
    .bg-cream { background-color: #FBF9F1; }
    
    /* ANIMASI HERO */
    @keyframes slowZoom {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }

    /* CARD STYLING & HOVER */
    .feature-card {
        background-color: #EFE4CD;
        border-radius: 20px;
        padding: 30px 20px;
        height: 100%;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); /* Efek membal halus */
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        border: 1px solid transparent;
    }
    .feature-card:hover { 
        transform: translateY(-10px); 
        box-shadow: 0 15px 30px rgba(200, 162, 93, 0.2);
        border-color: rgba(200, 162, 93, 0.3);
        background-color: #f7eedb;
    }
    .feature-icon {
        width: 60px;
        height: 60px;
        margin-bottom: 15px;
        color: #C8A25D;
        transition: transform 0.4s ease;
    }
    .feature-card:hover .feature-icon {
        transform: scale(1.1) rotate(5deg);
    }

    /* WAVE STYLING (Disiapkan jika nanti dipakai lagi) */
    .wave-container {
        width: 100%;
        overflow: hidden; 
        line-height: 0;
        position: relative;
        z-index: 1;
        pointer-events: none;
    }
    .wave-img {
        display: block;
        width: 70%;
        min-width: 600px;
        height: auto;
    }
    
    /* IMAGE STYLING */
    .img-hover-zoom {
        transition: transform 0.5s ease;
    }
    .img-hover-container:hover .img-hover-zoom {
        transform: scale(1.03);
    }
</style>

<!-- 1. HERO BANNER -->
<section class="text-center d-flex align-items-center justify-content-center position-relative"
    style="height: 60vh; overflow: hidden;">

    <!-- Background Gambar dengan Animasi Zoom -->
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 0; overflow: hidden;">
        <img src="{{ asset('images/bg.jpeg') }}"
            alt="Tentang Kami Background"
            style="
                width: 100%; 
                height: 100%;
                object-fit: cover;
                animation: slowZoom 20s infinite ease-in-out;
            ">
    </div>

    <!-- Overlay Gelap -->
    <div style="position: absolute; inset: 0; background: rgba(0, 0, 0, 0.45); z-index: 1;"></div>

    <!-- Konten Hero -->
    <div class="container position-relative" style="z-index: 2;">
        <h1 class="font-serif text-white mb-4" 
            data-aos="fade-up" 
            data-aos-duration="1000"
            style="font-size: 3.5rem; font-weight: 700;">
            #RayakanMomenmu Bersama <br> Tatik Catering
        </h1>

        <div data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
            <a href="https://wa.me/6281234567890?text=Halo%20kak,%20saya%20ingin%20konsultasi."
               target="_blank"
               class="btn"
               style="
                   background-color: #C8A25D;
                   color: #fff;
                   padding: 12px 30px;
                   font-size: 1.1rem;
                   font-weight: 600;
                   border-radius: 8px;
                   border: none;
                   transition: transform 0.3s;
               "
               onmouseover="this.style.transform='scale(1.05)'"
               onmouseout="this.style.transform='scale(1)'">
                Konsultasi Sekarang
            </a>
        </div>
    </div>
</section>

<!-- WRAPPER UTAMA -->
<div class="bg-cream font-sans text-dark-blue position-relative" style="overflow-x: hidden;">

    <!-- 2. SECTION ABOUT US (PROFIL) -->
    <section class="pt-5 pb-0 container position-relative" style="z-index: 2;">
        
        <!-- Judul About Us -->
        <div class="row mb-4">
            <div class="col-12 text-end" data-aos="fade-left" data-aos-duration="800">
                <h2 class="font-serif" style="font-size: 3rem; font-weight: 700;">About Us</h2>
                <div style="height: 3px; width: 80px; background: #C8A25D; margin-left: auto; margin-top: 5px;"></div>
            </div>
        </div>

        <div class="row align-items-center">
            
            <!-- Kolom Gambar (KIRI) -->
            <div class="col-md-5 mb-4 mb-md-0 text-center" data-aos="fade-right" data-aos-duration="1000">
                <div class="img-hover-container" style="
                    background: #ddd; 
                    height: 550px; 
                    width: 100%; 
                    border-radius: 40px 10px 40px 10px; 
                    overflow: hidden;
                    box-shadow: 20px 20px 0px rgba(200, 162, 93, 0.2);
                ">
                     <img src="{{ asset('images/tentangkami.jpeg') }}" 
                          class="img-hover-zoom"
                          style="width:100%; height:100%; object-fit:cover;" 
                          alt="Ibu Munika Hartatik">
                </div>
            </div>

            <!-- Kolom Teks (KANAN) -->
            <div class="col-md-7 ps-md-5" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
                <h4 class="font-serif mb-3" style="font-weight: 700; font-size: 1.5rem; color: #C8A25D;">Ibu Munika Hartatik</h4>
                
                <p style="line-height: 1.8; color: #555; margin-bottom: 20px;">
                    Pendiri Tatik Catering yang sejak muda memang gemar memasak ini merupakan pribadi yang pekerja keras, suka menolong dan haus akan hal-hal baru. Sejak 2019 berdiri, Tatik Catering hadir di Kota Malang.
                </p>
                
                <p style="line-height: 1.8; color: #555; margin-bottom: 20px;">
                    Ibu Tatik percaya bahwa makanan bukan sekadar pengisi perut, melainkan bagian penting dari kebersamaan. Oleh karena itu, kami selalu menggunakan bahan-bahan segar, berkualitas, dan halal, diproses dengan penuh perhatian agar menghasilkan cita rasa terbaik.
                </p>

                <p style="line-height: 1.8; color: #555;">
                    Dengan pengalaman dalam melayani berbagai kebutuhan—mulai dari catering harian, paket mahasiswa, hingga acara besar seperti rapat, pernikahan, dan syukuran, kami siap membantu menghadirkan sajian yang berkesan di setiap kesempatan.
                </p>
            </div>

        </div>
    </section>


    <!-- 3. SECTION KENAPA HARUS KAMI -->
    <section class="py-5 position-relative" style="background: transparent; z-index: 2;">
        
        <div class="container mt-5 pt-4"> 
            
            <div class="text-end mb-5" data-aos="fade-up">
                <h2 class="font-serif mb-0" style="font-weight: 700; font-size: 2.5rem;">Kenapa harus</h2>
                <h2 class="font-serif" style="font-weight: 700; font-size: 2.5rem; color: #C8A25D;">Tatik Catering?</h2>
            </div>

            <div class="row text-center">
                <!-- Card 1: Higienis -->
                <div class="col-md-6 col-lg-3 mb-4" data-aos="zoom-in-up" data-aos-delay="100">
                    <div class="feature-card d-flex flex-column align-items-center justify-content-center">
                        <div class="feature-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:100%; height:100%;"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                        </div>
                        <h5 class="font-serif fw-bold mb-3">Higienis</h5>
                        <p class="small text-muted">Selain menjaga kebersihan dapur, kami menjaga agar bahan-bahan yang kami masak tetap baik dan fresh.</p>
                    </div>
                </div>

                <!-- Card 2: Menu Variatif -->
                <div class="col-md-6 col-lg-3 mb-4" data-aos="zoom-in-up" data-aos-delay="200">
                    <div class="feature-card d-flex flex-column align-items-center justify-content-center">
                        <div class="feature-icon">
                            <!-- Icon Cloche -->
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:100%; height:100%;">
                                <path d="M18.15 13H5.85C4.2 13 3 14.5 3 16.5v1a1.5 1.5 0 0 0 1.5 1.5h15a1.5 1.5 0 0 0 1.5-1.5v-1c0-2-1.2-3.5-2.85-3.5z"></path>
                                <path d="M12 13a7.5 7.5 0 0 0-7.5-7.5h15A7.5 7.5 0 0 0 12 13z"></path>
                                <path d="M12 5.5V3"></path>
                            </svg>
                        </div>
                        <h5 class="font-serif fw-bold mb-3">Menu Variatif</h5>
                        <p class="small text-muted">Menu yang beragam dengan pilihan paket sesuai kebutuhan acara anda.</p>
                    </div>
                </div>

                <!-- Card 3: Profesional -->
                <div class="col-md-6 col-lg-3 mb-4" data-aos="zoom-in-up" data-aos-delay="300">
                    <div class="feature-card d-flex flex-column align-items-center justify-content-center">
                        <div class="feature-icon">
                             <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:100%; height:100%;"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"/></svg>
                        </div>
                        <h5 class="font-serif fw-bold mb-3">Profesional</h5>
                        <p class="small text-muted">Dedikasi kami pada pelanggan merupakan yang utama. Crew profesional siap melayani anda.</p>
                    </div>
                </div>

                <!-- Card 4: Harga Terbaik -->
                <div class="col-md-6 col-lg-3 mb-4" data-aos="zoom-in-up" data-aos-delay="400">
                    <div class="feature-card d-flex flex-column align-items-center justify-content-center">
                        <div class="feature-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:100%; height:100%;"><rect x="2" y="5" width="20" height="14" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/></svg>
                        </div>
                        <h5 class="font-serif fw-bold mb-3">Harga Terbaik</h5>
                        <p class="small text-muted">Dengan segala kelebihan yang kami miliki, kami menawarkan harga yang terjangkau dan rasional.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- 5. SECTION VISI & MISI -->
    <section class="container pb-5 pt-5 position-relative" style="z-index: 2;">
        
        <!-- VISI -->
        <div class="row mb-5 mt-4"> 
            <div class="col-md-8" data-aos="fade-up" data-aos-duration="1000">
                <h2 class="font-serif mb-4" style="font-size: 3rem; font-weight: 700;">Visi</h2>
                <p class="font-serif" style="font-size: 1.5rem; line-height: 1.4; color: #555; border-left: 5px solid #C8A25D; padding-left: 20px;">
                    Menjadi penyedia layanan catering terpercaya yang menghadirkan hidangan lezat, sehat, dan terjangkau untuk setiap momen berharga pelanggan.
                </p>
            </div>
        </div>

        <!-- MISI -->
        <div class="row justify-content-end">
            <div class="col-md-8 text-end" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                <h2 class="font-serif mb-4" style="font-size: 3rem; font-weight: 700;">Misi</h2>
                <ul class="list-unstyled font-serif" style="font-size: 1.25rem; line-height: 1.8; color: #555;">
                    <li class="mb-3" data-aos="fade-left" data-aos-delay="300">
                        1. Menyajikan makanan dengan bahan berkualitas, segar, dan halal.
                    </li>
                    <li class="mb-3" data-aos="fade-left" data-aos-delay="400">
                        2. Memberikan pelayanan ramah, cepat, dan profesional.
                    </li>
                    <li class="mb-3" data-aos="fade-left" data-aos-delay="500">
                        3. Menyediakan pilihan menu variatif sesuai kebutuhan pelanggan.
                    </li>
                    <li class="mb-3" data-aos="fade-left" data-aos-delay="600">
                        4. Menjaga kebersihan, cita rasa, dan kepuasan pelanggan sebagai prioritas utama.
                    </li>
                </ul>
            </div>
        </div>
    </section>

</div>

<!-- Init AOS Animation Library -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({
    once: true, /* Animasi hanya terjadi sekali saat scroll ke bawah */
    offset: 50, /* Trigger animasi sedikit lebih cepat */
    duration: 800,
    easing: 'ease-out-cubic',
  });
</script>

@endsection