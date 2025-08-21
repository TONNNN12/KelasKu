@extends('layouts/app')

@section('content')
<div class="container-fluid">
    <!-- Header Section -->
    <header class="header-section mb-4 p-4 rounded-lg position-relative overflow-hidden" 
            style="background: linear-gradient(135deg, #002D72 0%, #1E4A8C 100%);"
            role="banner"
            aria-labelledby="page-title">
        
        <!-- Decorative Elements -->
        <div class="decorative-circle decorative-circle-1" aria-hidden="true"></div>
        <div class="decorative-circle decorative-circle-2" aria-hidden="true"></div>
        
        <div class="d-flex align-items-center position-relative" style="z-index: 1;">
            <div class="header-icon rounded-lg p-3 d-inline-flex align-items-center justify-content-center mr-3 shadow">
                <i class="fas fa-tasks fa-2x font-weight-bold" aria-hidden="true"></i>
            </div>
            <div class="header-content">
                <h1 id="page-title" class="text-white font-weight-bold mb-0 page-title">
                    {{ $title }}
                </h1>
                <p class="mb-0 font-weight-medium header-subtitle">
                    Informasi tugas siswa
                </p>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="row" role="main">
        <div class="col-12">
            <article class="card border-0 rounded-lg shadow-lg overflow-hidden">
                
                <!-- Card Header -->
                <header class="card-header border-0 py-3 px-4 card-header-gradient">
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div class="d-flex align-items-center">
                            <div class="rounded p-2 mr-3 d-flex align-items-center justify-content-center card-header-icon">
                                <i class="fas fa-info-circle fa-lg" aria-hidden="true"></i>
                            </div>
                            <div>
                                <h2 class="mb-0 font-weight-bold card-header-title">
                                    Informasi Detail
                                </h2>
                                <small class="text-muted font-weight-medium">
                                    Status dan detail penugasan
                                </small>
                            </div>
                        </div>
                        
                        @if (auth()->user()->is_tugas == true)
                        <div class="mt-2 mt-md-0">
                            <a href="{{ route('tugasPdf') }}" 
                               target="_blank" 
                               class="btn btn-danger rounded-pill font-weight-semibold px-4 py-2 shadow-sm d-inline-flex align-items-center btn-hover-lift export-btn"
                               aria-label="Export tugas ke format PDF"
                               rel="noopener">
                                <i class="fas fa-file-pdf mr-2" aria-hidden="true"></i>
                                PDF
                            </a>
                        </div>
                        @endif
                    </div>
                </header>

                <!-- Card Body -->
                <div class="card-body p-4">
                    @if (auth()->user()->is_tugas == true)
                        <!-- Task Assigned Section -->
                        <section class="status-section rounded-lg p-4 mb-4 status-assigned" 
                                 role="status" 
                                 aria-labelledby="status-title">
                            <div class="row align-items-center mb-0">
                                <div class="col-auto">
                                    <div class="status-icon rounded-circle p-3 d-flex align-items-center justify-content-center shadow-sm">
                                        <i class="fas fa-check-circle fa-lg" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="col">
                                    <h3 id="status-title" class="text-success font-weight-bold mb-0">
                                        Status: Ditugaskan
                                    </h3>
                                    <p class="text-muted mb-0 status-description">
                                        Tugas telah diberikan
                                    </p>
                                </div>
                            </div>
                        </section>

                        <!-- Task Details -->
                        <div class="row">
                            <!-- Personal Info Column -->
                            <div class="col-lg-6 mb-4">
                                <section class="info-card rounded-lg p-3 h-100 personal-info-card" 
                                         aria-labelledby="personal-info-title">
                                    <h4 id="personal-info-title" class="font-weight-bold mb-3 d-flex align-items-center section-title">
                                        <i class="fas fa-user mr-2 text-warning" aria-hidden="true"></i>
                                        Informasi Pengguna
                                    </h4>
                                    
                                    <!-- Name -->
                                    <div class="detail-item d-flex align-items-center py-3 border-bottom detail-row">
                                        <div class="detail-label text-muted font-weight-semibold">
                                            <i class="fas fa-id-card mr-2 detail-icon" aria-hidden="true"></i>
                                            <span>Nama</span>
                                        </div>
                                        <div class="detail-value flex-fill font-weight-semibold text-dark">
                                            {{ $tugas->user->nama }}
                                        </div>
                                    </div>

                                    <!-- Email -->
                                    <div class="detail-item d-flex align-items-center py-3">
                                        <div class="detail-label text-muted font-weight-semibold">
                                            <i class="fas fa-envelope mr-2 detail-icon" aria-hidden="true"></i>
                                            <span>Email</span>
                                        </div>
                                        <div class="detail-value flex-fill">
                                            <span class="badge badge-pill px-3 py-2 font-weight-semibold shadow-sm email-badge">
                                                {{ $tugas->user->email }}
                                            </span>
                                        </div>
                                    </div>
                                </section>
                            </div>

                            <!-- Task Info Column -->
                            <div class="col-lg-6 mb-4">
                                <section class="info-card rounded-lg p-3 h-100 task-info-card" 
                                         aria-labelledby="task-info-title">
                                    <h4 id="task-info-title" class="font-weight-bold mb-3 d-flex align-items-center section-title">
                                        <i class="fas fa-clipboard-list mr-2 text-warning" aria-hidden="true"></i>
                                        Detail Tugas
                                    </h4>
                                    
                                    <!-- Task Description -->
                                    <div class="detail-item d-flex align-items-start py-3 border-bottom detail-row">
                                        <div class="detail-label text-muted font-weight-semibold mt-1">
                                            <i class="fas fa-tasks mr-2 text-warning" aria-hidden="true"></i>
                                            <span>Tugas</span>
                                        </div>
                                        <div class="detail-value flex-fill font-weight-semibold text-dark task-description">
                                            {{ $tugas->tugas }}
                                        </div>
                                    </div>

                                    <!-- Start Date -->
                                    <div class="detail-item d-flex align-items-center py-3 border-bottom detail-row">
                                        <div class="detail-label text-muted font-weight-semibold">
                                            <i class="fas fa-play-circle mr-2 text-warning" aria-hidden="true"></i>
                                            <span>Mulai</span>
                                        </div>
                                        <div class="detail-value flex-fill">
                                            <time class="badge badge-pill px-3 py-2 font-weight-semibold shadow-sm date-badge"
                                                  datetime="{{ $tugas->tanggal_mulai }}">
                                                <i class="fas fa-calendar-alt mr-1" aria-hidden="true"></i>
                                                {{ \Carbon\Carbon::parse($tugas->tanggal_mulai)->format('d M Y') }}
                                            </time>
                                        </div>
                                    </div>

                                    <!-- End Date -->
                                    <div class="detail-item d-flex align-items-center py-3">
                                        <div class="detail-label text-muted font-weight-semibold">
                                            <i class="fas fa-stop-circle mr-2 text-warning" aria-hidden="true"></i>
                                            <span>Selesai</span>
                                        </div>
                                        <div class="detail-value flex-fill">
                                            <time class="badge badge-pill px-3 py-2 font-weight-semibold shadow-sm date-badge"
                                                  datetime="{{ $tugas->tanggal_selesai }}">
                                                <i class="fas fa-calendar-check mr-1" aria-hidden="true"></i>
                                                {{ \Carbon\Carbon::parse($tugas->tanggal_selesai)->format('d M Y') }}
                                            </time>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>

                    @else
                        <!-- No Task Assigned Section -->
                        <section class="text-center py-5 px-4 no-task-section" 
                                 role="status" 
                                 aria-labelledby="no-task-title">
                            <div class="rounded-lg p-5 status-unassigned">
                                <div class="no-task-icon rounded-circle p-4 d-inline-flex align-items-center justify-content-center mb-4 shadow">
                                    <i class="fas fa-exclamation-triangle fa-3x" aria-hidden="true"></i>
                                </div>
                                
                                <h3 id="no-task-title" class="text-danger font-weight-bold mb-3">
                                    Belum Mendapat Tugas
                                </h3>
                                <p class="text-muted mb-4 no-task-description">
                                    Anda belum mendapat penugasan dari admin. Silakan menunggu atau hubungi admin untuk informasi lebih lanjut.
                                </p>
                                
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <div class="d-flex align-items-center justify-content-center p-4 bg-white rounded-lg shadow-sm status-card">
                                            <div class="text-muted font-weight-semibold mr-3 status-label">
                                                <i class="fas fa-info-circle mr-2 text-danger" aria-hidden="true"></i>
                                                Status
                                            </div>
                                            <div>
                                                <span class="badge badge-pill px-4 py-3 font-weight-bold shadow status-badge-unassigned"
                                                      role="status">
                                                    <i class="fas fa-times-circle mr-2" aria-hidden="true"></i>
                                                    BELUM DITUGASKAN
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    @endif
                </div>
            </article>
        </div>
    </main>
</div>

<style>
/* CSS Variables for consistent theming */
:root {
    --primary-blue: #002D72;
    --secondary-blue: #1E4A8C;
    --accent-yellow: #FFCB05;
    --accent-gold: #FFD700;
    --success-green: #28a745;
    --success-light: #34ce57;
    --danger-red: #dc3545;
    --danger-light: #e74c3c;
    --info-blue: #17a2b8;
    --info-light: #20c997;
    --border-radius-lg: 1rem;
    --border-radius-md: 0.5rem;
    --transition-smooth: all 0.3s ease;
    --shadow-lg: 0 1rem 3rem rgba(0, 0, 0, 0.175);
    --shadow-md: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    --shadow-sm: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
}

/* Enhanced Bootstrap 4 utilities */
.rounded-lg {
    border-radius: var(--border-radius-lg) !important;
}

.font-weight-semibold {
    font-weight: 600 !important;
}

.font-weight-medium {
    font-weight: 500 !important;
}

.shadow-lg {
    box-shadow: var(--shadow-lg) !important;
}

/* Header Section Styles */
.header-section {
    background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
    position: relative;
    overflow: hidden;
}

.decorative-circle {
    position: absolute;
    border-radius: 50%;
    pointer-events: none;
}

.decorative-circle-1 {
    top: -50px;
    right: -50px;
    width: 150px;
    height: 150px;
    background: rgba(255, 203, 5, 0.1);
    z-index: 0;
}

.decorative-circle-2 {
    bottom: -30px;
    left: -30px;
    width: 120px;
    height: 120px;
    background: rgba(255, 255, 255, 0.05);
    z-index: 0;
}

.header-icon {
    background: linear-gradient(135deg, var(--accent-yellow) 0%, var(--accent-gold) 100%);
    color: var(--primary-blue);
}

.page-title {
    font-size: 2.5rem;
    text-shadow: 0 2px 4px rgba(0,0,0,0.2);
}

.header-subtitle {
    color: rgba(255, 203, 5, 0.9);
    font-size: 1.1rem;
}

/* Card Header Styles */
.card-header-gradient {
    background: linear-gradient(135deg, rgba(255, 203, 5, 0.1) 0%, rgba(255, 203, 5, 0.05) 100%);
    border-bottom: 3px solid var(--accent-yellow);
}

.card-header-icon {
    background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
    color: var(--accent-yellow);
}

.card-header-title {
    color: var(--primary-blue);
    font-size: 1.3rem;
}

/* Button Styles */
.export-btn {
    background: linear-gradient(135deg, var(--danger-red) 0%, var(--danger-light) 100%);
    border: none;
    transition: var(--transition-smooth);
}

.btn-hover-lift:hover {
    transform: translateY(-2px);
    box-shadow: 0 0.5rem 1rem rgba(220, 53, 69, 0.4);
}

/* Status Section Styles */
.status-assigned {
    background: linear-gradient(135deg, rgba(40, 167, 69, 0.05) 0%, rgba(52, 206, 87, 0.05) 100%);
    border-left: 5px solid var(--success-green);
}

.status-unassigned {
    background: linear-gradient(135deg, rgba(220, 53, 69, 0.1) 0%, rgba(231, 76, 60, 0.1) 100%);
    border-left: 5px solid var(--danger-red);
}

.status-icon {
    background: linear-gradient(135deg, var(--success-green) 0%, var(--success-light) 100%);
    color: white;
}

.no-task-icon {
    background: linear-gradient(135deg, var(--danger-red) 0%, var(--danger-light) 100%);
    color: white;
}

/* Info Card Styles */
.personal-info-card {
    background: linear-gradient(135deg, rgba(0, 45, 114, 0.05) 0%, rgba(30, 74, 140, 0.05) 100%);
}

.task-info-card {
    background: linear-gradient(135deg, rgba(255, 203, 5, 0.05) 0%, rgba(255, 215, 0, 0.05) 100%);
}

.section-title {
    color: var(--primary-blue);
}

/* Detail Item Styles */
.detail-item {
    transition: var(--transition-smooth);
}

.detail-label {
    width: 120px;
    font-size: 0.9rem;
}

.detail-icon {
    color: var(--primary-blue);
}

.detail-value {
    font-size: 1.05rem;
}

.task-description {
    line-height: 1.6;
}

.detail-row {
    border-color: rgba(0, 45, 114, 0.1) !important;
}

.task-info-card .detail-row {
    border-color: rgba(255, 203, 5, 0.2) !important;
}

.detail-row:hover {
    background: rgba(0, 45, 114, 0.02);
    border-radius: var(--border-radius-md);
    transform: translateX(2px);
}

/* Badge Styles */
.email-badge {
    background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
    color: white;
    font-size: 0.9rem;
}

.date-badge {
    background: linear-gradient(135deg, var(--info-blue) 0%, var(--info-light) 100%);
    color: white;
    font-size: 0.9rem;
}

.status-badge-unassigned {
    background: linear-gradient(135deg, var(--danger-red) 0%, var(--danger-light) 100%);
    color: white;
    font-size: 1rem;
}

.badge {
    transition: var(--transition-smooth);
}

.badge:hover {
    transform: scale(1.05);
}

/* No Task Section Styles */
.no-task-description {
    font-size: 1.1rem;
    line-height: 1.6;
}

.status-label {
    font-size: 1.1rem;
}

/* Animations */
.card {
    animation: slideInUp 0.6s ease-out;
}

@keyframes slideInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Loading Animation */
.card::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 4px;
    background: linear-gradient(90deg, transparent, var(--accent-yellow), transparent);
    animation: loading 1.5s infinite;
    z-index: 10;
}

@keyframes loading {
    0% { left: -100%; }
    100% { left: 100%; }
}

/* Focus States for Accessibility */
.btn:focus,
a:focus {
    outline: 2px solid var(--accent-yellow);
    outline-offset: 2px;
}

/* Print Styles */
@media print {
    .header-section,
    .export-btn {
        display: none !important;
    }
    
    .card {
        box-shadow: none !important;
        border: 1px solid #ccc !important;
    }
    
    .badge {
        border: 1px solid #333 !important;
        color: #333 !important;
        background: white !important;
    }
}

/* High Contrast Mode Support */
@media (prefers-contrast: high) {
    .header-section {
        background: #000 !important;
        color: #fff !important;
    }
    
    .badge {
        border: 2px solid currentColor !important;
    }
}

/* Reduced Motion Support */
@media (prefers-reduced-motion: reduce) {
    * {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
    }
}

/* Dark Mode Support */
@media (prefers-color-scheme: dark) {
    :root {
        --bg-color: #1a1a1a;
        --text-color: #e0e0e0;
        --card-bg: #2d2d2d;
    }
    
    .card {
        background-color: var(--card-bg) !important;
        color: var(--text-color) !important;
    }
    
    .text-muted {
        color: #bbb !important;
    }
}

/* Responsive Design Improvements */
@media (max-width: 767.98px) {
    .page-title {
        font-size: 2rem;
    }
    
    .header-subtitle {
        font-size: 1rem;
    }
    
    .detail-item {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .detail-label {
        width: 100%;
        margin-bottom: 0.5rem;
    }
    
    .card-header .d-flex {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .card-header .d-flex > div:last-child {
        margin-top: 1rem;
        width: 100%;
    }
    
    .export-btn {
        width: 100%;
        justify-content: center;
    }
}

@media (max-width: 575.98px) {
    .page-title {
        font-size: 1.75rem;
    }
    
    .container-fluid {
        padding-left: 10px;
        padding-right: 10px;
    }
    
    .header-section,
    .card-body {
        padding: 1rem;
    }
    
    .status-section,
    .no-task-section .rounded-lg {
        padding: 1.5rem;
    }
}

/* Improved focus management */
.sr-only {
    position: absolute !important;
    width: 1px !important;
    height: 1px !important;
    padding: 0 !important;
    margin: -1px !important;
    overflow: hidden !important;
    clip: rect(0, 0, 0, 0) !important;
    white-space: nowrap !important;
    border: 0 !important;
}

/* Enhanced hover states */
.info-card:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
    transition: var(--transition-smooth);
}

.status-section:hover {
    transform: translateY(-1px);
    transition: var(--transition-smooth);
}
</style>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add loading state management
    const exportBtn = document.querySelector('.export-btn');
    if (exportBtn) {
        exportBtn.addEventListener('click', function(e) {
            const originalText = this.innerHTML;
            this.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Generating...';
            this.disabled = true;
            
            // Re-enable after 3 seconds (adjust based on your PDF generation time)
            setTimeout(() => {
                this.innerHTML = originalText;
                this.disabled = false;
            }, 3000);
        });
    }
    
    // Add smooth scrolling for better UX
    if (window.location.hash) {
        const target = document.querySelector(window.location.hash);
        if (target) {
            target.scrollIntoView({ behavior: 'smooth' });
        }
    }
    
    // Add keyboard navigation improvements
    const detailRows = document.querySelectorAll('.detail-row');
    detailRows.forEach((row, index) => {
        row.setAttribute('tabindex', '0');
        row.addEventListener('keydown', function(e) {
            if (e.key === 'ArrowDown' && detailRows[index + 1]) {
                detailRows[index + 1].focus();
            } else if (e.key === 'ArrowUp' && detailRows[index - 1]) {
                detailRows[index - 1].focus();
            }
        });
    });
    
    // Add intersection observer for animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    const animatedElements = document.querySelectorAll('.info-card, .status-section');
    animatedElements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'all 0.6s ease-out';
        observer.observe(el);
    });
});
</script>
@endpush
@endsection