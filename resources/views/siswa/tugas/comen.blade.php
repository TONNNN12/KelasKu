@extends('layouts/app')

@section('content')
<style>
    :root {
        --oxford-blue: #002147;
        --maize-yellow: #FFCB05;
        --light-blue: #E3F2FD;
        --dark-blue: #001429;
        --text-muted: #6c757d;
        --white: #ffffff;
        --shadow: 0 4px 12px rgba(0, 33, 71, 0.1);
        --shadow-hover: 0 8px 25px rgba(0, 33, 71, 0.15);
    }

    body {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    .container {
        max-width: 1000px;
        margin: 0 auto;
        padding: 2rem 1rem;
    }

    /* Main Card */
    .elegant-card {
        background: var(--white);
        border-radius: 16px;
        box-shadow: var(--shadow);
        overflow: hidden;
        margin-bottom: 2rem;
        border: 1px solid rgba(0, 33, 71, 0.08);
    }

    /* Header */
    .elegant-header {
        background: linear-gradient(135deg, var(--oxford-blue) 0%, var(--dark-blue) 100%);
        padding: 1.5rem 2rem;
        position: relative;
    }

    .elegant-header::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 120px;
        height: 120px;
        background: radial-gradient(circle, rgba(255, 203, 5, 0.15), transparent);
        border-radius: 50%;
        transform: translate(30%, -30%);
    }

    .elegant-header h4 {
        color: var(--white);
        font-weight: 600;
        margin: 0;
        position: relative;
        z-index: 2;
        font-size: 1.4rem;
    }

    .elegant-header i {
        color: var(--maize-yellow);
        margin-right: 0.75rem;
    }

    /* Body */
    .elegant-body {
        padding: 2rem;
    }

    /* Submission Items */
    .submissions-list {
        margin-bottom: 2rem;
    }

    .submission-item {
        background: linear-gradient(135deg, var(--light-blue) 0%, #f8f9fa 100%);
        border-radius: 12px;
        padding: 1.25rem;
        margin-bottom: 1rem;
        transition: all 0.3s ease;
        border: 1px solid rgba(0, 33, 71, 0.05);
    }

    .submission-item:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-hover);
    }

    .submission-name {
        font-weight: 600;
        color: var(--oxford-blue);
        display: flex;
        align-items: center;
        font-size: 1rem;
    }

    .submission-icon {
        background: var(--oxford-blue);
        color: var(--white);
        width: 40px;
        height: 40px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        flex-shrink: 0;
    }

    .download-btn {
        background: linear-gradient(135deg, var(--maize-yellow), #F0B90B);
        border: none;
        color: var(--oxford-blue);
        font-weight: 600;
        padding: 0.6rem 1.25rem;
        border-radius: 8px;
        transition: all 0.3s ease;
        text-decoration: none;
        font-size: 0.9rem;
    }

    .download-btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(255, 203, 5, 0.3);
        color: var(--oxford-blue);
        text-decoration: none;
    }

    /* Comments Section */
    .comments-section {
        background: var(--light-blue);
        border-radius: 16px;
        padding: 1.5rem;
        margin-top: 2rem;
    }

    .comments-title {
        color: var(--oxford-blue);
        font-weight: 600;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        font-size: 1.2rem;
    }

    .comments-title i {
        background: var(--maize-yellow);
        color: var(--oxford-blue);
        width: 36px;
        height: 36px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 0.75rem;
    }

    /* Comment Cards */
    .comment-card {
        background: var(--white);
        border-radius: 12px;
        padding: 1.25rem;
        margin-bottom: 1rem;
        box-shadow: 0 2px 8px rgba(0, 33, 71, 0.06);
        transition: all 0.3s ease;
        border: 1px solid rgba(0, 33, 71, 0.05);
    }

    .comment-card:hover {
        box-shadow: 0 4px 15px rgba(0, 33, 71, 0.1);
    }

    /* Avatar */
    .comment-avatar {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        margin-right: 1rem;
        border: 2px solid var(--maize-yellow);
        overflow: hidden;
        flex-shrink: 0;
        position: relative;
    }

    .comment-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .online-indicator {
        width: 10px;
        height: 10px;
        background: #28a745;
        border-radius: 50%;
        position: absolute;
        bottom: 2px;
        right: 2px;
        border: 2px solid var(--white);
    }

    /* User Info */
    .user-name {
        color: var(--oxford-blue);
        font-weight: 700;
        font-size: 1rem;
        margin-bottom: 0.25rem;
        display: flex;
        align-items: center;
        flex-wrap: wrap;
    }

    .user-role {
        background: var(--maize-yellow);
        color: var(--oxford-blue);
        font-size: 0.7rem;
        font-weight: 600;
        padding: 0.2rem 0.5rem;
        border-radius: 12px;
        margin-left: 0.5rem;
        text-transform: uppercase;
    }

    .comment-date {
        color: var(--text-muted);
        font-size: 0.85rem;
        margin-bottom: 0.75rem;
    }

    .comment-text {
        color: #333;
        line-height: 1.5;
        margin-bottom: 1rem;
    }

    /* Reply Section */
    .reply-section {
        background: #f8f9fa;
        border-radius: 8px;
        padding: 1rem;
        margin-top: 1rem;
        border-left: 3px solid var(--maize-yellow);
    }

    .reply-item {
        background: var(--white);
        border-radius: 8px;
        padding: 1rem;
        margin-bottom: 0.75rem;
        box-shadow: 0 1px 3px rgba(0, 33, 71, 0.05);
        border: 1px solid rgba(0, 33, 71, 0.03);
    }

    .reply-item:last-child {
        margin-bottom: 0;
    }

    .reply-header {
        display: flex;
        align-items: center;
        margin-bottom: 0.5rem;
    }

    .reply-avatar {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        margin-right: 0.75rem;
        border: 2px solid var(--maize-yellow);
        overflow: hidden;
        flex-shrink: 0;
    }

    .reply-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .reply-author {
        color: var(--oxford-blue);
        font-weight: 600;
        font-size: 0.9rem;
    }

    .reply-content {
        margin-left: 48px;
        color: #555;
        font-size: 0.9rem;
        line-height: 1.4;
    }

    /* Buttons */
    .delete-btn {
        background: #dc3545;
        border: none;
        color: var(--white);
        padding: 0.4rem 0.7rem;
        border-radius: 6px;
        transition: all 0.2s ease;
        font-size: 0.8rem;
    }

    .delete-btn:hover {
        background: #c82333;
    }

    .reply-form {
        margin-top: 1rem;
        padding: 1rem;
        background: rgba(255, 203, 5, 0.05);
        border-radius: 8px;
    }

    .reply-input {
        border: 1px solid #ddd;
        border-radius: 6px;
        padding: 0.6rem 0.75rem;
        font-size: 0.9rem;
        flex: 1;
    }

    .reply-input:focus {
        border-color: var(--maize-yellow);
        box-shadow: 0 0 0 2px rgba(255, 203, 5, 0.2);
        outline: none;
    }

    .reply-btn {
        background: var(--oxford-blue);
        border: none;
        color: var(--white);
        padding: 0.6rem 1rem;
        border-radius: 6px;
        font-size: 0.9rem;
        margin-left: 0.5rem;
    }

    .reply-btn:hover {
        background: var(--dark-blue);
    }

    /* Add Comment Section */
    .add-comment-section {
        background: var(--white);
        border-radius: 12px;
        padding: 1.5rem;
        margin-top: 1.5rem;
        box-shadow: 0 2px 8px rgba(0, 33, 71, 0.06);
        border: 1px solid rgba(0, 33, 71, 0.05);
    }

    .form-label {
        color: var(--oxford-blue);
        font-weight: 600;
        margin-bottom: 0.75rem;
        font-size: 1rem;
    }

    .form-textarea {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 0.75rem;
        width: 100%;
        resize: vertical;
        min-height: 100px;
        font-size: 0.9rem;
        line-height: 1.4;
    }

    .form-textarea:focus {
        border-color: var(--maize-yellow);
        box-shadow: 0 0 0 2px rgba(255, 203, 5, 0.2);
        outline: none;
    }

    .submit-btn {
        background: linear-gradient(135deg, var(--oxford-blue), var(--dark-blue));
        border: none;
        color: var(--white);
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        font-weight: 600;
        margin-top: 1rem;
        transition: all 0.3s ease;
    }

    .submit-btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(0, 33, 71, 0.3);
    }

    /* No Content */
    .no-content {
        text-align: center;
        padding: 2rem;
        color: var(--text-muted);
        background: #f8f9fa;
        border-radius: 12px;
        border: 1px solid rgba(0, 33, 71, 0.05);
    }

    .no-content i {
        font-size: 2.5rem;
        margin-bottom: 1rem;
        opacity: 0.5;
        color: var(--maize-yellow);
    }

    .no-content p {
        margin: 0;
        font-size: 1rem;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .container {
            padding: 1rem 0.5rem;
        }

        .elegant-header {
            padding: 1.25rem 1.5rem;
        }

        .elegant-body {
            padding: 1.5rem;
        }

        .submission-item {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
        }

        .download-btn {
            align-self: flex-start;
        }

        .comment-date {
            font-size: 0.8rem;
        }

        .reply-content {
            margin-left: 0;
            margin-top: 0.5rem;
        }

        .comments-section {
            padding: 1.25rem;
        }
    }

    /* Input Group */
    .input-group {
        display: flex;
        align-items: center;
    }
</style>

<div class="container">
    <div class="elegant-card">
        <div class="elegant-header">
            <h4><i class="fas fa-clipboard-list"></i>Pengumpulan Tugas: {{ $tugas->tugas }}</h4>
        </div>
        <div class="elegant-body">
            <!-- Daftar Submissions -->
            @if($tugas->submissions->count() > 0)
                <div class="submissions-list">
                    @foreach($tugas->submissions as $submission)
                        <div class="submission-item d-flex justify-content-between align-items-center">
                            <div class="submission-name">
                                <div class="submission-icon">
                                    <i class="fas fa-user"></i>
                                </div>
                                <span>{{ $submission->user->name }}</span>
                            </div>
                            <a href="{{ asset('storage/' . $submission->file) }}" target="_blank" class="download-btn">
                                <i class="fas fa-download mr-2"></i>Lihat Tugas
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="no-content">
                    <i class="fas fa-inbox"></i>
                    <p>Belum ada tugas yang dikumpulkan.</p>
                </div>
            @endif

            <!-- Bagian Komentar -->
            <div class="comments-section">
                <h5 class="comments-title">
                    <i class="fas fa-comments"></i>
                    <span>Komentar & Diskusi</span>
                </h5>

                @forelse($tugas->komentars as $komentar)
                    <div class="comment-card">
                        <div class="d-flex align-items-start mb-3">
                            <div class="comment-avatar">
                                <img src="{{ asset('sbadmin2/img/undraw_profile.svg') }}" alt="{{ $komentar->user->name }}">
                                <div class="online-indicator"></div>
                            </div>

                            <div class="flex-grow-1">
                                <div class="user-name">
                                    {{ $komentar->user->name }}
                                    @if($komentar->user->jabatan ?? false)
                                        <span class="user-role">{{ $komentar->user->jabatan }}</span>
                                    @endif
                                </div>
                                <div class="comment-date">
                                    <i class="fas fa-clock mr-1"></i>
                                    {{ $komentar->created_at->format('d M Y H:i') }}
                                </div>
                            </div>

                            <!-- Tombol Hapus -->
                            @if(auth()->check() && (auth()->id() == $komentar->user_id || auth()->user()->jabatan == 'guru'))
                                <form action="{{ route('komentar.destroy', $komentar->id) }}" method="POST" 
                                      onsubmit="return confirm('Yakin ingin menghapus komentar ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-btn">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            @endif
                        </div>

                        <div class="comment-text">{{ $komentar->isi }}</div>

                        <!-- Balasan -->
                        @if($komentar->balasan->count())
                            <div class="reply-section">
                                @foreach($komentar->balasan as $balasan)
                                    <div class="reply-item">
                                        <div class="reply-header">
                                            <div class="reply-avatar">
                                                <img src="{{ asset('sbadmin2/img/undraw_profile.svg') }}" alt="{{ $balasan->user->name }}">
                                            </div>
                                            <div class="flex-grow-1">
                                                <div class="reply-author">
                                                    {{ $balasan->user->name }}
                                                    @if($balasan->user->jabatan ?? false)
                                                        <span class="user-role">{{ $balasan->user->jabatan }}</span>
                                                    @endif
                                                </div>
                                                <small class="text-muted">
                                                    {{ $balasan->created_at->format('d M Y H:i') }}
                                                </small>
                                            </div>
                                            @if(auth()->check() && (auth()->id() == $balasan->user_id || auth()->user()->jabatan == 'guru'))
                                                <form action="{{ route('komentar.destroy', $balasan->id) }}" method="POST" 
                                                      onsubmit="return confirm('Yakin ingin menghapus balasan ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="delete-btn">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                        <div class="reply-contephpnt">{{ $balasan->isi }}</div>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        <!-- Form Balasan (hanya guru) -->
                        @if(auth()->check() && auth()->user()->jabatan == 'guru')
                            <form action="{{ route('komentar.reply', $komentar->id) }}" method="POST" class="reply-form">
                                @csrf
                                <div class="input-group">
                                    <input type="text" name="isi" class="reply-input" placeholder="Balas komentar..." required>
                                    <button class="reply-btn" type="submit">
                                        <i class="fas fa-paper-plane"></i>
                                    </button>
                                </div>
                            </form>
                        @endif
                    </div>
                @empty
                    <div class="no-content">
                        <i class="fas fa-comment-slash"></i>
                        <p>Belum ada komentar.</p>
                    </div>
                @endforelse
            </div>

            <!-- Form Tambah Komentar -->
            <div class="add-comment-section">
                <form action="{{ route('komentar.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="tugas_id" value="{{ $tugas->id }}">
                    <div class="form-group">
                        <label for="isi" class="form-label">
                            <i class="fas fa-pen mr-2"></i>Tulis Komentar
                        </label>
                        <textarea name="isi" id="isi" class="form-textarea" placeholder="Tulis komentar Anda..." required></textarea>
                    </div>
                    <button type="submit" class="submit-btn">
                        <i class="fas fa-paper-plane mr-2"></i>Kirim Komentar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto-resize textarea
    const textarea = document.getElementById('isi');
    if (textarea) {
        textarea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });
    }

    // Form loading states
    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', function() {
            const btn = this.querySelector('button[type="submit"]');
            if (btn && !btn.dataset.loading) {
                btn.dataset.loading = 'true';
                btn.disabled = true;
                const originalText = btn.innerHTML;
                btn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Mengirim...';
                
                setTimeout(() => {
                    btn.innerHTML = originalText;
                    btn.disabled = false;
                    delete btn.dataset.loading;
                }, 3000);
            }
        });
    });
});
</script>

@endsection