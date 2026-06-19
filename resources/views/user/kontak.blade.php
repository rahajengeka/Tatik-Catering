@extends('layouts.main')

@section('title', 'Kontak Kami - Tatik Catering')

@section('content')

<!-- 1. Load Fonts & AOS Library -->
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
        overflow-x: hidden;
    }
    
    .font-serif { font-family: 'Playfair Display', serif; }

    /* ANIMASI HERO */
    @keyframes slowZoom {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }

    /* INFO BOX STYLING */
    .contact-info-box {
        background: transparent;
        padding-right: 30px;
    }
    .contact-item {
        display: flex;
        align-items: center;
        margin-bottom: 25px;
        font-size: 1.1rem;
        color: #444;
        transition: transform 0.3s;
    }
    .contact-item:hover {
        transform: translateX(10px);
        color: var(--color-gold);
    }
    .contact-icon {
        width: 50px;
        height: 50px;
        background: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 20px;
        color: var(--color-gold);
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        font-size: 1.2rem;
        flex-shrink: 0;
    }

    /* FORM STYLING */
    .contact-card {
        background: white;
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.05);
        border: 1px solid rgba(0,0,0,0.02);
    }
    
    .form-group {
        margin-bottom: 25px;
    }
    
    .form-label {
        font-weight: 600;
        font-size: 0.9rem;
        color: var(--color-dark);
        margin-bottom: 8px;
        display: block;
    }
    
    .form-input {
        width: 100%;
        padding: 15px;
        border: 1px solid #eee;
        border-radius: 10px;
        background: #fcfcfc;
        font-family: 'Poppins', sans-serif;
        transition: all 0.3s;
    }
    
    .form-input:focus {
        border-color: var(--color-gold);
        background: #fff;
        outline: none;
        box-shadow: 0 0 0 4px rgba(200, 162, 93, 0.1);
    }

    .btn-submit {
        background-color: var(--color-gold);
        color: white;
        border: none;
        padding: 15px 40px;
        border-radius: 50px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        width: 100%;
        font-size: 1rem;
        box-shadow: 0 5px 15px rgba(200, 162, 93, 0.3);
    }
    
    .btn-submit:hover {
        background-color: #b18c4f;
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(200, 162, 93, 0.4);
    }

    /* MAP CONTAINER */
    .map-container {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        border: 5px solid white;
        height: 300px;
        transition: transform 0.3s;
    }
    .map-container:hover {
        transform: translateY(-5px);
    }
</style>

<!-- 1. HERO BANNER -->
<section class="d-flex align-items-center justify-content-center position-relative" style="height: 60vh; overflow: hidden;">
  
  <!-- Gambar Background -->
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
  
  <!-- Overlay Gelap -->
  <div style="position: absolute; inset: 0; background: rgba(0, 0, 0, 0.5); z-index: 1;"></div>

  <!-- Isi Teks -->
  <div class="container text-center position-relative" style="z-index: 2;" data-aos="fade-up" data-aos-duration="1000">
    <h1 class="font-serif text-white mb-3" style="font-size: 3.5rem; font-weight: 700;">
        Hubungi Kami
    </h1>
    <p class="text-white" style="font-size: 1.2rem; font-weight: 300;">
        Kami siap mendengar kebutuhan acara spesial Anda
    </p>
  </div>
</section>


<!-- 2. KONTEN UTAMA -->
<section style="padding: 80px 0;">
    <div class="container">
        <div class="row g-5">
            
            <!-- KOLOM KIRI: INFO & PETA -->
            <div class="col-lg-6">
                
                <!-- Intro Text -->
                <div class="mb-5" data-aos="fade-right" data-aos-duration="1000">
                    <h5 class="text-uppercase mb-2" style="color: var(--color-gold); letter-spacing: 2px; font-weight: 600; font-size: 0.9rem;">
                        Informasi Kontak
                    </h5>
                    <h2 class="font-serif mb-4" style="font-size: 2.5rem; font-weight: 700; color: var(--color-dark); line-height: 1.2;">
                        Mari Diskusikan <br> Acara Impian Anda
                    </h2>
                    <p style="color: #666; line-height: 1.7;">
                        Untuk informasi lebih lanjut mengenai paket catering, reservasi, atau pertanyaan lainnya, jangan ragu untuk menghubungi kami melalui kontak di bawah ini.
                    </p>
                </div>

                <!-- Contact List -->
                <div class="contact-info-box mb-5">
                    
                    <!-- Item 1: Instagram -->
                    <div class="contact-item" data-aos="fade-up" data-aos-delay="100">
                        <div class="contact-icon">
                            <!-- SVG Instagram -->
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                        </div>
                        <div>
                            <span style="display:block; font-size:0.85rem; color:#888;">Instagram</span>
                            <strong>@warung.butatik</strong>
                        </div>
                    </div>

                    <!-- Item 2: WhatsApp -->
                    <div class="contact-item" data-aos="fade-up" data-aos-delay="200">
                        <div class="contact-icon">
                            <!-- SVG Phone -->
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                        </div>
                        <div>
                            <span style="display:block; font-size:0.85rem; color:#888;">WhatsApp / Telepon</span>
                            <strong>0858 0474 1696</strong>
                        </div>
                    </div>

                    <!-- Item 3: Email -->
                    <div class="contact-item" data-aos="fade-up" data-aos-delay="300">
                        <div class="contact-icon">
                            <!-- SVG Mail -->
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                        </div>
                        <div>
                            <span style="display:block; font-size:0.85rem; color:#888;">Email</span>
                            <a href="mailto:warung.butatik@gmail.com" style="text-decoration:none; color:inherit; font-weight:bold;">warung.butatik@gmail.com</a>
                        </div>
                    </div>

                </div>

                <!-- PETA -->
                <div data-aos="zoom-in" data-aos-delay="400">
                    <h5 class="font-label mb-3 font-weight-bold" style="color:var(--color-dark);">Kunjungi Kami:</h5>
                    <p class="mb-3 text-muted">Gg. 4 No.897D, Bandulan, Kec. Sukun, Kota Malang, Jawa Timur 65146</p>
                    
                    <div class="map-container">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.1962388655866!2d112.607234!3d-7.978628!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78829b0b0b0b0b%3A0x0!2sBandulan%2C%20Malang!5e0!3m2!1sid!2sid!4v1600000000000" 
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
                        </iframe>
                    </div>
                </div>

            </div>


            <!-- KOLOM KANAN: FORM RESERVASI -->
            <div class="col-lg-6">
                <div class="contact-card" data-aos="fade-left" data-aos-duration="1000">
                    <h3 class="font-serif mb-4 text-center" style="font-weight: 700; font-size: 2rem; color: var(--color-dark);">
                        Formulir Reservasi
                    </h3>
                    <p class="text-center text-muted mb-5">
                        Isi formulir di bawah ini dan tim kami akan segera menghubungi Anda.
                    </p>

                    <form action="" method="POST">
                        @csrf
                        
                        <div class="form-group">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama" id="nama" class="form-input" placeholder="Masukkan nama Anda" required>
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">Alamat Email</label>
                            <input type="email" name="email" id="email" class="form-input" placeholder="contoh@email.com" required>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="form-label">Nomor WhatsApp</label>
                            <input type="tel" name="phone" id="phone" class="form-input" placeholder="0812xxxx" required>
                        </div>

                        <div class="form-group">
                            <label for="pesan" class="form-label">Detail Pesanan / Pesan</label>
                            <textarea name="pesan" id="pesan" rows="4" class="form-input" placeholder="Tuliskan kebutuhan acara Anda (Jenis acara, Tanggal, Jumlah porsi, dll)"></textarea>
                        </div>

                        <div class="mt-5">
                            <button type="submit" class="btn-submit">
                                Kirim Pesan &rarr;
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Init AOS Animation Library -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({
    once: true,
    offset: 50,
    duration: 800,
    easing: 'ease-out-cubic',
  });
</script>

@endsection