@extends('layouts.main')

@section('title', 'Tatik Catering - FAQ')

@section('content')

<!-- Load Fonts & AOS Animation -->
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

    /* ACCORDION STYLING */
    .accordion-item {
        border: none;
        background: transparent;
        margin-bottom: 20px;
    }

    .accordion-button {
        background-color: #fff;
        color: var(--color-dark);
        font-weight: 600;
        font-size: 1.1rem;
        padding: 20px 25px;
        border-radius: 15px !important; /* Rounded corners */
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
    }

    /* Hilangkan border focus default/biru */
    .accordion-button:focus {
        box-shadow: none;
        border-color: rgba(0,0,0,.125);
    }

    /* State ketika Aktif/Terbuka */
    .accordion-button:not(.collapsed) {
        background-color: var(--color-gold);
        color: #fff;
        box-shadow: 0 8px 25px rgba(200, 162, 93, 0.4);
        transform: translateY(-2px);
    }

    /* Mengubah warna panah (chevron) menjadi putih saat aktif */
    .accordion-button:not(.collapsed)::after {
        filter: brightness(0) invert(1); /* Jadi putih */
    }

    /* Body Accordion */
    .accordion-collapse {
        background: transparent;
        border: none;
    }
    
    .accordion-body {
        background-color: #fff;
        border-radius: 0 0 15px 15px;
        padding: 25px;
        margin-top: -10px; /* Supaya nempel ke header */
        padding-top: 30px;
        color: #666;
        line-height: 1.8;
        box-shadow: 0 10px 20px rgba(0,0,0,0.03);
        border: 1px solid rgba(0,0,0,0.02);
    }

    /* CTA LINK */
    .cta-link {
        color: var(--color-gold);
        font-weight: 600;
        text-decoration: none;
        transition: 0.3s;
    }
    .cta-link:hover {
        color: var(--color-dark);
        text-decoration: underline;
    }
</style>

<section id="faq" style="padding: 80px 10%; min-height: 100vh;">

    <!-- HEADER SECTION -->
    <div style="text-align: center; margin-bottom: 60px;" data-aos="fade-down" data-aos-duration="1000">
        <h5 class="text-uppercase" style="color: var(--color-gold); letter-spacing: 2px; font-weight: 600; font-size: 0.9rem; margin-bottom: 10px;">
            Pusat Bantuan
        </h5>
        <h2 class="font-serif" style="font-size: 3rem; font-weight: 700; color: var(--color-dark);">
            Frequently Asked Questions
        </h2>
        <div style="width: 80px; height: 4px; background: var(--color-gold); margin: 20px auto 0; border-radius: 2px;"></div>
    </div>

    <!-- ACCORDION CONTAINER -->
    <div class="accordion" id="faqAccordion" style="max-width: 800px; margin: 0 auto;">

        <!-- FAQ 1 -->
        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                    Apa saja layanan Tatik Catering?
                </button>
            </h2>
            <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Kami menyediakan layanan catering lengkap untuk berbagai acara seperti pernikahan, ulang tahun, syukuran, rapat kantor, hingga nasi box harian. Menu dapat disesuaikan sepenuhnya dengan anggaran dan preferensi selera Anda.
                </div>
            </div>
        </div>

        <!-- FAQ 2 -->
        <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                    Apakah menu bisa custom sesuai permintaan?
                </button>
            </h2>
            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    <strong>Tentu saja!</strong> Fleksibilitas adalah keunggulan kami. Anda bisa request menu spesifik, mulai dari olahan ayam, daging, seafood, tumpeng hias, hingga menu prasmanan tradisional maupun modern. Kami siap mendengarkan kebutuhan acara Anda.
                </div>
            </div>
        </div>

        <!-- FAQ 3 -->
        <div class="accordion-item" data-aos="fade-up" data-aos-delay="300">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                    Bagaimana cara melakukan pemesanan?
                </button>
            </h2>
            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Pemesanan sangat mudah. Anda cukup menghubungi kami melalui <a href="https://wa.me/6281234567890" class="cta-link">WhatsApp</a>. Sampaikan detail acara (tanggal, lokasi, jumlah tamu) dan budget Anda. Tim kami akan segera memberikan penawaran menu terbaik untuk Anda.
                </div>
            </div>
        </div>

        <!-- FAQ 4 -->
        <div class="accordion-item" data-aos="fade-up" data-aos-delay="400">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                    Apakah makanan dijamin halal?
                </button>
            </h2>
            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Ya, kami menjamin 100% kehalalan produk kami. Mulai dari pemilihan bahan baku daging, bumbu, hingga proses pengolahan di dapur, semuanya dilakukan sesuai standar kehalalan dan higienitas yang ketat.
                </div>
            </div>
        </div>

        <!-- FAQ 5 -->
        <div class="accordion-item" data-aos="fade-up" data-aos-delay="500">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                    Minimal pemesanan berapa porsi?
                </button>
            </h2>
            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Untuk catering prasmanan atau nasi box, minimal pemesanan biasanya mulai dari <strong>20 porsi</strong>. Namun, untuk item khusus seperti Tumpeng, kami melayani pemesanan satuan. Hubungi kami untuk diskusi lebih lanjut.
                </div>
            </div>
        </div>

    </div>

    <!-- EXTRA CONTACT -->
    <div class="text-center mt-5" data-aos="fade-in" data-aos-delay="600">
        <p style="color: #666;">
            Masih punya pertanyaan lain? 
            <a href="https://wa.me/6281234567890" target="_blank" class="cta-link">
                Hubungi Admin Kami &rarr;
            </a>
        </p>
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