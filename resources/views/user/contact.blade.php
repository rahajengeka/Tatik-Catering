@extends('layouts.main')

@section('title', 'Hubungi Kami - Tatik Catering')

@section('content')

<!-- 1. Load Fonts & Animation Library -->
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

    h1, h2, h3, h4, h5 {
        font-family: 'Playfair Display', serif;
        color: var(--color-dark);
    }

    /* ANIMASI HERO */
    @keyframes slowZoom {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }

    /* CONTACT INFO STYLING */
    .contact-item {
        display: flex;
        align-items: center;
        margin-bottom: 25px;
        padding: 15px;
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.03);
        transition: transform 0.3s ease;
    }
    .contact-item:hover {
        transform: translateX(10px);
        box-shadow: 0 8px 20px rgba(200, 162, 93, 0.15);
    }
    .contact-icon {
        width: 50px;
        height: 50px;
        background: var(--color-cream);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 20px;
        color: var(--color-gold);
        font-size: 1.2rem;
        flex-shrink: 0;
    }

    /* FORM STYLING */
    .form-box {
        background: #fff;
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.05);
        border-top: 5px solid var(--color-gold);
    }

    .form-control-custom {
        width: 100%;
        padding: 15px;
        border: 1px solid #eee;
        border-radius: 10px;
        background: #f9f9f9;
        font-family: 'Poppins', sans-serif;
        margin-bottom: 20px;
        transition: all 0.3s;
    }

    .form-control-custom:focus {
        border-color: var(--color-gold);
        background: #fff;
        outline: none;
        box-shadow: 0 0 0 3px rgba(200, 162, 93, 0.1);
    }

    .btn-submit {
        background-color: var(--color-gold);
        color: white;
        border: none;
        padding: 12px 35px;
        border-radius: 50px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        float: right;
    }

    .btn-submit:hover {
        background-color: #b18c4f;
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(200, 162, 93, 0.3);
    }

    /* MAP STYLING */
    .map-box {
        margin-top: 30px;
        border-radius: 20px;
        overflow: hidden;
        border: 5px solid #fff;
        box-shadow: 0 10px 20px rgba(0,0,0,0.08);
        height: 300px;
    }
</style>


{{-- ================= 1. HERO SECTION (BANNER BERSIH) ================= --}}
<section class="position-relative" style="height: 50vh; overflow: hidden;">
    
    <!-- Background Image dengan Animasi -->
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 0; overflow: hidden;">
        <img src="{{ asset('images/banner.png') }}" 
             alt="Hero Background" 
             style="
               width: 100%; 
               height: 100%; 
               object-fit: cover; 
               object-position: center;
               animation: slowZoom 20s infinite ease-in-out;
             ">
    </div>
    
    <!-- Optional: Overlay sangat tipis (hanya untuk estetika, tidak menghalangi gambar) -->
    <div style="position: absolute; inset: 0; background: rgba(0, 0, 0, 0.1); z-index: 1;"></div>
  
    <!-- TIDAK ADA TEKS DI SINI AGAR BANNER TERLIHAT FULL -->
</section>


{{-- ================= 2. CONTENT SECTION ================= --}}
<section class="contact-section" style="padding: 60px 0 80px;">
    <div class="container">

        <!-- HEADER JUDUL (Dipindah ke sini) -->
        <div class="text-center mb-5" data-aos="fade-up">
            <h5 class="text-uppercase mb-2" style="color: var(--color-gold); letter-spacing: 2px; font-weight: 600; font-size: 0.9rem;">
                Tatik Catering
            </h5>
            <h1 style="font-size: 3.5rem; font-weight: 700; color: var(--color-dark); margin-bottom: 10px;">
                Hubungi Kami
            </h1>
            <p style="font-size: 1.1rem; color: #666; max-width: 600px; margin: 0 auto;">
                Silakan hubungi kami untuk pertanyaan seputar menu, harga, atau kustomisasi pesanan acara Anda.
            </p>
            <div style="width: 80px; height: 3px; background: var(--color-gold); margin: 25px auto 0;"></div>
        </div>

        <div class="row g-5">
            {{-- ===== LEFT CONTENT (INFO & MAP) ===== --}}
            <div class="col-lg-6">
                
                <h3 class="mb-4" style="font-weight: 700; color: var(--color-dark);" data-aos="fade-right">Kontak & Lokasi</h3>

                <!-- Contact Items -->
                <div class="contact-list">
                    <!-- Instagram -->
                    <div class="contact-item" data-aos="fade-up" data-aos-delay="100">
                        <div class="contact-icon">
                            <!-- SVG Instagram -->
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                        </div>
                        <div>
                            <small class="text-muted d-block">Instagram</small>
                            <span style="font-weight: 600; color: #333;">@warung.butatik</span>
                        </div>
                    </div>

                    <!-- WhatsApp -->
                    <div class="contact-item" data-aos="fade-up" data-aos-delay="200">
                        <div class="contact-icon">
                            <!-- SVG Phone -->
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                        </div>
                        <div>
                            <small class="text-muted d-block">WhatsApp</small>
                            <span style="font-weight: 600; color: #333;">0858 0474 1696</span>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="contact-item" data-aos="fade-up" data-aos-delay="300">
                        <div class="contact-icon">
                            <!-- SVG Mail -->
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                        </div>
                        <div>
                            <small class="text-muted d-block">Email</small>
                            <span style="font-weight: 600; color: #333;">warung.butatik@gmail.com</span>
                        </div>
                    </div>
                </div>

                <!-- Address & Map -->
                <div class="mt-5" data-aos="fade-up" data-aos-delay="400">
                    <h3 class="mb-3" style="font-weight: 700; color: var(--color-dark);">Alamat Kami</h3>
                    <p class="text-muted">
                        Gg. 4 No.897D, Bandulan, Kec. Sukun,<br>
                        Kota Malang, Jawa Timur 65146
                    </p>

                    <div class="map-box">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.1962388655866!2d112.607234!3d-7.978628!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78829b0b0b0b0b%3A0x0!2sBandulan%2C%20Malang!5e0!3m2!1sid!2sid!4v1600000000000"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
                        </iframe>
                    </div>
                </div>

            </div>


            {{-- ===== RIGHT FORM (FORMULIR RESERVASI) ===== --}}
            <div class="col-lg-6">
                <div class="form-box" data-aos="fade-left" data-aos-duration="1000">

                    <h2 class="text-center mb-4" style="font-family: 'Playfair Display', serif; font-weight: 700;">
                        <span style="color: var(--color-gold);">Formulir</span>
                        <span style="color: var(--color-dark);">Reservasi</span>
                    </h2>
                    
                    <p class="text-center text-muted mb-4 small">
                        Pesan akan otomatis terkirim ke WhatsApp Admin
                    </p>

                    {{-- ========= FORM TO WHATSAPP ========= --}}
                    <form onsubmit="kirimKeWA(event)">

                        <div class="mb-3">
                            <label class="fw-bold text-muted small mb-1">Nama Lengkap</label>
                            <input id="nama" type="text" class="form-control-custom" placeholder="Masukkan Nama" required>
                        </div>

                        <div class="mb-3">
                            <label class="fw-bold text-muted small mb-1">Alamat Email</label>
                            <input id="email" type="email" class="form-control-custom" placeholder="Masukkan Email" required>
                        </div>

                        <div class="mb-3">
                            <label class="fw-bold text-muted small mb-1">Nomor WhatsApp</label>
                            <input id="hp" type="text" class="form-control-custom" placeholder="Contoh: 081234567890" required>
                        </div>

                        <div class="mb-4">
                            <label class="fw-bold text-muted small mb-1">Detail Pesanan / Pesan</label>
                            <textarea id="pesan" rows="4" class="form-control-custom" placeholder="Tuliskan detail pesanan Anda..." required></textarea>
                        </div>

                        <button type="submit" class="btn-submit">
                            Kirim Pesan <i class="bi bi-whatsapp ms-2"></i>
                        </button>
                        <div style="clear: both;"></div>

                    </form>

                </div>
            </div>
        </div>

    </div>
</section>


{{-- ================= JS ================= --}}
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    // Init Animation
    AOS.init({
        once: true,
        offset: 50,
        duration: 800,
        easing: 'ease-out-cubic',
    });

    // Function Kirim WA
    function kirimKeWA(e) {
        e.preventDefault();

        let nama  = document.getElementById("nama").value;
        let email = document.getElementById("email").value;
        let hp    = document.getElementById("hp").value;
        let pesan = document.getElementById("pesan").value;

        // NOMOR WHATSAPP TARGET
        let nomorWA = "6285804741696";

        let text =
            "*FORM RESERVASI TATIK CATERING*\n\n" +
            "👤 *Nama:* " + nama + "\n" +
            "📧 *Email:* " + email + "\n" +
            "📱 *HP:* " + hp + "\n\n" +
            "📝 *Pesan:* \n" + pesan;

        let url = "https://wa.me/" + nomorWA + "?text=" + encodeURIComponent(text);

        window.open(url, "_blank");
    }
</script>

@endsection