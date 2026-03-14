<section class="hero-section position-relative overflow-hidden">
    <div class="hero-bg parallax" 
         style="background: linear-gradient(rgba(139,69,19,0.8), rgba(210,105,30,0.7)), 
                url('{{ $bg ?? asset('build/assets/Pakean adat.jpg') }}');
         background-size: cover; background-position: center; min-height: 100vh; display: flex; align-items: center;">
        <div class="container position-relative z-10">
            <div class="row justify-content-center text-center text-white animate__animated animate__fadeInUp">
                <div class="col-lg-10 col-xl-8">
                    <h1 class="display-2 font-display fw-bold mb-5 text-gradient animate__delay-1s" 
                        data-aos="fade-up" data-aos-delay="200">
                        {{ $title ?? 'Keindahan Tradisi Batak' }}
                    </h1>
                    <p class="lead fs-4 opacity-90 mb-5 animate__delay-2s pb-4" 
                       data-aos="fade-up" data-aos-delay="400">
                        {{ $subtitle ?? 'Koleksi premium ulos, songket, dan busana adat asli Sumatra Utara dari pengrajin terbaik' }}
                    </p>
                    <div class="d-flex flex-column flex-lg-row gap-3 justify-content-center animate__delay-3s">
                        <a href="{{ $primary_link ?? route('frontend.produk') }}" 
                           class="btn btn-gradient btn-lg px-5 py-3 shadow-lg hover-lift">
                            <i class="fas fa-gem me-2"></i>
                            {{ $primary_btn ?? 'Jelajahi Koleksi' }}
                        </a>
                        <a href="{{ $secondary_link ?? route('frontend.tentang') }}" 
                           class="btn btn-outline-light btn-lg px-5 py-3 hover-lift">
                            <i class="fas fa-play me-2"></i>
                            {{ $secondary_btn ?? 'Lihat Cerita Kami' }}
                        </a>
                    </div>
                </div>
            </div>
            <!-- Scroll indicator -->
            <div class="scroll-indicator animate__bounce">
                <i class="fas fa-chevron-down fs-2 opacity-75"></i>
            </div>
        </div>
        <!-- Floating particles -->
        <div class="hero-particles">
            <div class="particle particle-1"></div>
            <div class="particle particle-2"></div>
            <div class="particle particle-3"></div>
        </div>
    </div>
</section>

<style>
.hero-bg {
    position: relative;
}
.parallax {
    background-attachment: fixed;
}
.hover-lift {
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}
.hover-lift:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.3);
}
.scroll-indicator {
    position: absolute;
    bottom: 30px;
    left: 50%;
    transform: translateX(-50%);
    animation: bounce 2s infinite;
}
@keyframes bounce {
    0%, 20%, 50%, 80%, 100% { transform: translateX(-50%) translateY(0); }
    40% { transform: translateX(-50%) translateY(-10px); }
    60% { transform: translateX(-50%) translateY(-5px); }
}
.hero-particles {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    overflow: hidden;
}
.particle {
    position: absolute;
    width: 4px;
    height: 4px;
    background: rgba(255,215,0,0.6);
    border-radius: 50%;
    animation: float 6s ease-in-out infinite;
}
.particle-1 { top: 20%; left: 10%; animation-delay: 0s; }
.particle-2 { top: 60%; left: 80%; animation-delay: 2s; }
.particle-3 { top: 80%; left: 20%; animation-delay: 4s; }
@keyframes float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(180deg); }
}
@media (max-width: 768px) {
    .parallax { background-attachment: scroll; }
}
</style>
