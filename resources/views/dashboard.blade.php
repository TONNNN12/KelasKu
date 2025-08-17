@extends('layouts/app')

@section('content')
<style>
    :root {
        --oxford-blue: #002147;
        --oxford-light: #003366;
        --oxford-dark: #001122;
        --maize-yellow: #FFCB05;
        --maize-light: #FFD700;
        --maize-dark: #E6B800;
        --oxford-gradient: linear-gradient(135deg, #002147 0%, #003366 50%, #1e3a5f 100%);
        --maize-gradient: linear-gradient(135deg, #FFCB05 0%, #FFD700 50%, #FFA500 100%);
        --glass-bg: rgba(255, 255, 255, 0.95);
        --glass-border: rgba(255, 255, 255, 0.2);
        --text-primary: #1a1a2e;
        --text-secondary: #6c7293;
    }
    
    * {
        box-sizing: border-box;
    }
    
    body {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        min-height: 100vh;
    }
    
    .dashboard-container {
        padding: 2rem;
        max-width: 1400px;
        margin: 0 auto;
    }
    
    .dashboard-hero {
        background: var(--oxford-gradient);
        border-radius: 30px;
        padding: 4rem 3rem;
        margin-bottom: 3rem;
        position: relative;
        overflow: hidden;
        box-shadow: 
            0 20px 60px rgba(0, 33, 71, 0.3),
            inset 0 1px 0 rgba(255, 255, 255, 0.1);
    }
    
    .dashboard-hero::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, var(--maize-yellow) 0%, transparent 70%);
        opacity: 0.1;
        animation: heroFloat 20s linear infinite;
    }
    
    .dashboard-hero::after {
        content: '';
        position: absolute;
        bottom: -30%;
        left: -15%;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, var(--maize-yellow) 0%, transparent 60%);
        opacity: 0.08;
        animation: heroFloat 25s linear infinite reverse;
    }
    
    @keyframes heroFloat {
        0% { transform: rotate(0deg) translateX(0px) rotate(0deg); }
        100% { transform: rotate(360deg) translateX(20px) rotate(-360deg); }
    }
    
    .hero-content {
        position: relative;
        z-index: 10;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    
    .hero-text h1 {
        font-size: 3.5rem;
        font-weight: 800;
        color: white;
        margin: 0 0 1rem 0;
        text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        line-height: 1.1;
    }
    
    .hero-subtitle {
        font-size: 1.2rem;
        color: rgba(255, 255, 255, 0.9);
        font-weight: 400;
        margin: 0;
    }
    
    .hero-icon {
        width: 120px;
        height: 120px;
        background: var(--maize-gradient);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 
            0 20px 40px rgba(255, 203, 5, 0.3),
            inset 0 2px 0 rgba(255, 255, 255, 0.3);
        animation: heroIconFloat 6s ease-in-out infinite;
    }
    
    .hero-icon i {
        font-size: 3rem;
        color: var(--oxford-blue);
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }
    
    @keyframes heroIconFloat {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-15px) rotate(5deg); }
    }
    
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }
    
    .perfect-card {
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 20px;
        padding: 1.8rem;
        position: relative;
        overflow: hidden;
        transition: all 0.5s cubic-bezier(0.23, 1, 0.320, 1);
        box-shadow: 
            0 10px 25px rgba(0, 33, 71, 0.08),
            0 3px 10px rgba(0, 0, 0, 0.05);
    }
    
    .perfect-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        border-radius: 20px 20px 0 0;
        transition: all 0.3s ease;
    }
    
    .perfect-card:hover {
        transform: translateY(-8px) scale(1.01);
        box-shadow: 
            0 20px 40px rgba(0, 33, 71, 0.12),
            0 8px 20px rgba(0, 0, 0, 0.06);
    }
    
    .perfect-card:hover::before {
        height: 5px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.15);
    }
    
    /* Card Color Variants */
    .card-users::before { background: var(--oxford-gradient); }
    .card-admin::before { background: var(--maize-gradient); }
    .card-siswa::before { 
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); 
    }
    .card-ditugaskan::before { 
        background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%); 
    }
    .card-belum::before { 
        background: linear-gradient(135deg, #ff6b6b 0%, #ffa726 100%); 
    }
    .card-status::before {
        background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
    }
    .card-status.danger::before {
        background: linear-gradient(135deg, #ff6b6b 0%, #ffa726 100%);
    }
    
    .card-content {
        display: flex;
        align-items: center;
        justify-content: space-between;
        position: relative;
        z-index: 2;
    }
    
    .card-info {
        flex: 1;
    }
    
    .card-label {
        font-size: 0.85rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 1rem;
        opacity: 0.7;
        color: var(--text-secondary);
    }
    
    .card-number {
        font-size: 2.8rem;
        font-weight: 900;
        color: var(--text-primary);
        margin-bottom: 0.3rem;
        line-height: 1;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    
    .card-description {
        font-size: 1rem;
        color: var(--text-secondary);
        font-weight: 500;
        margin: 0;
    }
    
    .card-icon-wrapper {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        transition: all 0.4s cubic-bezier(0.23, 1, 0.320, 1);
        box-shadow: 
            0 8px 20px rgba(0, 0, 0, 0.1),
            inset 0 1px 0 rgba(255, 255, 255, 0.3);
    }
    
    .perfect-card:hover .card-icon-wrapper {
        transform: scale(1.08) rotate(8deg);
        box-shadow: 
            0 12px 25px rgba(0, 0, 0, 0.12),
            inset 0 1px 0 rgba(255, 255, 255, 0.4);
    }
    
    .card-icon-wrapper::before {
        content: '';
        position: absolute;
        top: -2px;
        left: -2px;
        right: -2px;
        bottom: -2px;
        border-radius: 50%;
        padding: 2px;
        background: conic-gradient(from 0deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
        mask-composite: exclude;
        animation: iconBorder 4s linear infinite;
    }
    
    @keyframes iconBorder {
        to { transform: rotate(360deg); }
    }
    
    .card-icon {
        font-size: 1.8rem;
        color: white;
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
        z-index: 1;
    }
    
    /* Icon Background Variants */
    .icon-users { background: var(--oxford-gradient); }
    .icon-admin { 
        background: var(--maize-gradient);
    }
    .icon-admin .card-icon { color: var(--oxford-blue); text-shadow: 0 2px 8px rgba(0, 33, 71, 0.3); }
    .icon-siswa { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
    .icon-ditugaskan { background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%); }
    .icon-belum { background: linear-gradient(135deg, #ff6b6b 0%, #ffa726 100%); }
    
    /* Status Card Special Styling */
    .status-card {
        min-height: 220px;
        display: flex;
        align-items: center;
        max-width: 500px;
        margin: 0 auto;
    }
    
    .status-badge {
        background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
        color: white;
        padding: 0.8rem 1.5rem;
        border-radius: 50px;
        font-weight: 700;
        font-size: 1.1rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        box-shadow: 
            0 8px 20px rgba(17, 153, 142, 0.3),
            inset 0 1px 0 rgba(255, 255, 255, 0.2);
        border: none;
        position: relative;
        overflow: hidden;
        display: inline-flex;
        align-items: center;
        margin-bottom: 0.8rem;
    }
    
    .status-badge.danger {
        background: linear-gradient(135deg, #ff6b6b 0%, #ffa726 100%);
        box-shadow: 
            0 10px 25px rgba(255, 107, 107, 0.3),
            inset 0 1px 0 rgba(255, 255, 255, 0.2);
    }
    
    .status-badge::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        animation: statusShimmer 2s infinite;
    }
    
    @keyframes statusShimmer {
        0% { left: -100%; }
        50% { left: 100%; }
        100% { left: 100%; }
    }
    
    /* Responsive Design */
    @media (max-width: 1200px) {
        .stats-grid {
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        }
    }
    
    @media (max-width: 768px) {
        .dashboard-container {
            padding: 1rem;
        }
        
        .dashboard-hero {
            padding: 2.5rem 2rem;
            margin-bottom: 2rem;
        }
        
        .hero-content {
            flex-direction: column;
            text-align: center;
        }
        
        .hero-text h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }
        
        .hero-icon {
            width: 80px;
            height: 80px;
            margin-top: 2rem;
        }
        
        .hero-icon i {
            font-size: 2rem;
        }
        
        .stats-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }
        
        .perfect-card {
            padding: 2rem;
        }
        
        .card-number {
            font-size: 2.5rem;
        }
        
        .card-icon-wrapper {
            width: 70px;
            height: 70px;
        }
        
        .card-icon {
            font-size: 1.8rem;
        }
    }
    
    @media (max-width: 480px) {
        .hero-text h1 {
            font-size: 2rem;
        }
        
        .card-content {
            flex-direction: column;
            text-align: center;
        }
        
        .card-icon-wrapper {
            margin-top: 1.5rem;
        }
    }
    
    /* Advanced Animations */
    .perfect-card {
        opacity: 0;
        transform: translateY(30px);
        animation: cardSlideIn 0.8s cubic-bezier(0.23, 1, 0.320, 1) forwards;
    }
    
    .perfect-card:nth-child(1) { animation-delay: 0.1s; }
    .perfect-card:nth-child(2) { animation-delay: 0.2s; }
    .perfect-card:nth-child(3) { animation-delay: 0.3s; }
    .perfect-card:nth-child(4) { animation-delay: 0.4s; }
    .perfect-card:nth-child(5) { animation-delay: 0.5s; }
    .perfect-card:nth-child(6) { animation-delay: 0.6s; }
    
    @keyframes cardSlideIn {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .dashboard-hero {
        opacity: 0;
        transform: translateY(-50px);
        animation: heroSlideIn 1s cubic-bezier(0.23, 1, 0.320, 1) 0.3s forwards;
    }
    
    @keyframes heroSlideIn {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<div class="dashboard-container">
    <!-- Hero Section -->
    <div class="dashboard-hero">
        <div class="hero-content">
            <div class="hero-text">
                <h1>{{ $title }}</h1>
                <p class="hero-subtitle">Kelola sistem dengan mudah dan efisien</p>
            </div>
            <div class="hero-icon">
                <i class="fas fa-tachometer-alt"></i>
            </div>
        </div>
    </div>

    <!-- Statistics Grid -->
    <div class="stats-grid">
        @if (auth()->user()->jabatan == 'Admin')
            <!-- Total Users Card -->
            <div class="perfect-card card-users">
                <div class="card-content">
                    <div class="card-info">
                        <div class="card-label">Total Users</div>
                        <div class="card-number" id="count-users">{{ $jumlahUser }}</div>
                        <p class="card-description">Pengguna terdaftar dalam sistem</p>
                    </div>
                    <div class="card-icon-wrapper icon-users">
                        <i class="fas fa-users card-icon"></i>
                    </div>
                </div>
            </div>

            <!-- Total Admin Card -->
            <div class="perfect-card card-admin">
                <div class="card-content">
                    <div class="card-info">
                        <div class="card-label">Total Admin</div>
                        <div class="card-number" id="count-admin">{{ $jumlahAdmin }}</div>
                        <p class="card-description">Administrator aktif sistem</p>
                    </div>
                    <div class="card-icon-wrapper icon-admin">
                        <i class="fas fa-user-shield card-icon"></i>
                    </div>
                </div>
            </div>

            <!-- Total Siswa Card -->
            <div class="perfect-card card-siswa">
                <div class="card-content">
                    <div class="card-info">
                        <div class="card-label">Total Siswa</div>
                        <div class="card-number" id="count-siswa">{{ $jumlahSiswa }}</div>
                        <p class="card-description">Siswa terdaftar dalam sistem</p>
                    </div>
                    <div class="card-icon-wrapper icon-siswa">
                        <i class="fas fa-graduation-cap card-icon"></i>
                    </div>
                </div>
            </div>

            <!-- Total Ditugaskan Card -->
            <div class="perfect-card card-ditugaskan">
                <div class="card-content">
                    <div class="card-info">
                        <div class="card-label">Ditugaskan</div>
                        <div class="card-number" id="count-ditugaskan">{{ $jumlahDitugaskan }}</div>
                        <p class="card-description">Siswa yang telah mendapat tugas</p>
                    </div>
                    <div class="card-icon-wrapper icon-ditugaskan">
                        <i class="fas fa-check-circle card-icon"></i>
                    </div>
                </div>
            </div>

            <!-- Total Belum Ditugaskan Card -->
            <div class="perfect-card card-belum">
                <div class="card-content">
                    <div class="card-info">
                        <div class="card-label">Belum Ditugaskan</div>
                        <div class="card-number" id="count-belum">{{ $jumlahBelumDitugaskan }}</div>
                        <p class="card-description">Menunggu pemberian tugas</p>
                    </div>
                    <div class="card-icon-wrapper icon-belum">
                        <i class="fas fa-hourglass-half card-icon"></i>
                    </div>
                </div>
            </div>
        @endif

        @if (auth()->user()->jabatan == 'Siswa' && auth()->user()->is_tugas == true)
            <!-- Status Ditugaskan -->
            <div class="perfect-card card-status status-card">
                <div class="card-content" style="flex-direction: column; text-align: center;">
                    <div class="card-info">
                        <div class="card-label">Status Penugasan</div>
                        <span class="status-badge">
                            <i class="fas fa-check-circle mr-2"></i>
                            Ditugaskan
                        </span>
                        <p class="card-description">Anda memiliki tugas aktif yang perlu diselesaikan dengan baik</p>
                    </div>
                    <div class="card-icon-wrapper icon-ditugaskan" style="margin-top: 1.5rem;">
                        <i class="fas fa-tasks card-icon"></i>
                    </div>
                </div>
            </div>     
        @endif

        @if (auth()->user()->jabatan == 'Siswa' && auth()->user()->is_tugas == false)
            <!-- Status Belum Ditugaskan -->
            <div class="perfect-card card-status status-card danger">
                <div class="card-content" style="flex-direction: column; text-align: center;">
                    <div class="card-info">
                        <div class="card-label">Status Penugasan</div>
                        <span class="status-badge danger">
                            <i class="fas fa-exclamation-triangle mr-2"></i>
                            Belum Ditugaskan
                        </span>
                        <p class="card-description">Menunggu penugasan dari administrator sistem</p>
                    </div>
                    <div class="card-icon-wrapper icon-belum" style="margin-top: 1.5rem;">
                        <i class="fas fa-clock card-icon"></i>
                    </div>
                </div>
            </div>     
        @endif
    </div>
</div>

<script>
$(document).ready(function() {
    // Perfect number counting animation
    function animateNumber(element, start, end, duration) {
        const obj = $(element);
        const range = end - start;
        const increment = end > start ? 1 : -1;
        const stepTime = Math.abs(Math.floor(duration / range));
        let current = start;
        
        const timer = setInterval(function() {
            current += increment;
            obj.text(current);
            if (current === end) {
                clearInterval(timer);
            }
        }, stepTime);
    }
    
    // Trigger number animations with intersection observer
    const observerOptions = {
        threshold: 0.5,
        rootMargin: '0px 0px -100px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                const target = entry.target;
                const finalNumber = parseInt(target.textContent);
                target.textContent = '0';
                animateNumber(target, 0, finalNumber, 2000);
                observer.unobserve(target);
            }
        });
    }, observerOptions);
    
    // Observe all number elements
    $('.card-number').each(function() {
        observer.observe(this);
    });
    
    // Add smooth scroll behavior
    $('html').css('scroll-behavior', 'smooth');
    
    // Enhanced card hover effects
    $('.perfect-card').hover(
        function() {
            $(this).find('.card-icon-wrapper').addClass('animate__animated animate__pulse');
        },
        function() {
            $(this).find('.card-icon-wrapper').removeClass('animate__animated animate__pulse');
        }
    );
    
    // Parallax effect for hero background
    $(window).on('scroll', function() {
        const scrolled = $(this).scrollTop();
        const heroElements = $('.dashboard-hero::before, .dashboard-hero::after');
        const rate = scrolled * -0.5;
        heroElements.css('transform', 'translate3d(0, ' + rate + 'px, 0)');
    });
    
    // Add loading states
    $('.perfect-card').each(function(index) {
        $(this).css('animation-delay', (index * 0.1) + 's');
    });
});
</script>
@endsection