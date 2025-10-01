@extends('layouts/app')

@section('content')
<style>
    :root {
        --oxford-blue: #002147;
        --maize-yellow: #FFCB05;
        --light-blue: #E3F2FD;
        --dark-blue: #001429;
        --text-muted: #6c757d;
        --shadow: 0 4px 6px rgba(0, 33, 71, 0.1);
    }

    .elegant-card {
        background: linear-gradient(135deg, var(--oxford-blue) 0%, var(--dark-blue) 100%);
        border-radius: 16px;
        box-shadow: var(--shadow);
        overflow: hidden;
        margin-bottom: 2rem;
    }

    .elegant-header {
        background: linear-gradient(45deg, var(--oxford-blue), var(--dark-blue));
        padding: 2rem;
        position: relative;
        overflow: hidden;
    }

    .elegant-header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 100%;
        height: 100%;
        background: var(--maize-yellow);
        opacity: 0.1;
        border-radius: 50%;
        transform: rotate(45deg);
    }

    .elegant-header h4 {
        color: white;
        font-weight: 600;
        margin: 0;
        position: relative;
        z-index: 2;
        font-size: 1.5rem;
    }

    .elegant-body {
        background: white;
        padding: 2rem;
        border-radius: 0 0 16px 16px;
    }

    .submission-item {
        background: linear-gradient(135deg, var(--light-blue) 0%, #f8f9fa 100%);
        border: none;
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 1rem;
        transition: all 0.3s ease;
        box-shadow: 0 2px 4px rgba(0, 33, 71, 0.05);
    }

    .submission-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(0, 33, 71, 0.15);
    }

    .submission-name {
        font-weight: 600;
        color: var(--oxford-blue);
        display: flex;
        align-items: center;
    }

    .submission-icon {
        background: var(--oxford-blue);
        color: white;
        width: 40px;
        height: 40px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
    }

    .download-btn {
        background: linear-gradient(45deg, var(--maize-yellow), #F0B90B);
        border: none;
        color: var(--oxford-blue);
        font-weight: 600;
        padding: 0.5rem 1.25rem;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .download-btn:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 12px rgba(255, 203, 5, 0.3);
        color: var(--oxford-blue);
    }

    .comments-section {
        background: var(--light-blue);
        border-radius: 16px;
        padding: 2rem;
        margin-top: 2rem;
    }

    .comments-title {
        color: var(--oxford-blue);
        font-weight: 600;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
    }

    .comments-title i {
        background: var(--maize-yellow);
        color: var(--oxford-blue);
        width: 40px;
        height: 40px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
    }

    .comment-card {
        background: white;
        border: none;
        border-radius: 16px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 3px 10px rgba(0, 33, 71, 0.08);
        transition: all 0.3s ease;
    }

    .comment-card:hover {
        transform: translateY(-1px);
        box-shadow: 0 5px 20px rgba(0, 33, 71, 0.12);
    }

    .comment-avatar {
        width: 56px;
        height: 56px;
        border-radius: 50%;
        margin-right: 1.25rem;
        box-shadow: 0 4px 12px rgba(0, 33, 71, 0.2);
        border: 3px solid white;
        overflow: hidden;
        background: linear-gradient(45deg, var(--oxford-blue), var(--dark-blue));
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }
    
    .comment-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
    }
    
    .comment-avatar-fallback {
        color: white;
        font-weight: 700;
        font-size: 1.4rem;
    }

    .comment-author {
        color: var(--oxford-blue);
        font-weight: 700;
        font-size: 1.1rem;
        margin-bottom: 0.25rem;
    }

    .comment-date {
        color: var(--text-muted);
        font-size: 0.875rem;
        font-weight: 500;
    }

    .reply-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-right: 0.75rem;
        box-shadow: 0 2px 6px rgba(255, 203, 5, 0.3);
        border: 2px solid white;
        flex-shrink: 0;
        overflow: hidden;
        background: linear-gradient(45deg, var(--maize-yellow), #F0B90B);
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }
    
    .reply-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
    }
    
    .reply-avatar-fallback {
        color: var(--oxford-blue);
        font-weight: 600;
        font-size: 0.9rem;
    }

    .user-info {
        display: flex;
        flex-direction: column;
    }

    .user-name {
        color: var(--oxford-blue);
        font-weight: 700;
        font-size: 1.1rem;
        margin-bottom: 0.25rem;
        display: flex;
        align-items: center;
    }

    .user-role {
        display: inline-block;
        background: var(--maize-yellow);
        color: var(--oxford-blue);
        font-size: 0.75rem;
        font-weight: 600;
        padding: 0.2rem 0.5rem;
        border-radius: 12px;
        margin-left: 0.5rem;
        text-transform: capitalize;
    }

    .online-indicator {
        width: 12px;
        height: 12px;
        background: #28a745;
        border-radius: 50%;
        position: absolute;
        bottom: 2px;
        right: 2px;
        border: 2px solid white;
    }

    .reply-author {
        color: var(--oxford-blue);
        font-weight: 600;
        font-size: 1rem;
    }

    .reply-header {
        display: flex;
        align-items: center;
        margin-bottom: 0.5rem;
    }

    .reply-content {
        margin-left: 44px;
    }

    .comment-text {
        color: #333;
        line-height: 1.6;
        margin: 1rem 0;
    }

    .reply-section {
        background: #f8f9fa;
        border-radius: 12px;
        padding: 1rem;
        margin-top: 1rem;
        border-left: 4px solid var(--maize-yellow);
    }

    .reply-item {
        background: white;
        border-radius: 8px;
        padding: 1rem;
        margin-bottom: 0.75rem;
        box-shadow: 0 1px 3px rgba(0, 33, 71, 0.05);
    }

    .reply-author {
        color: var(--oxford-blue);
        font-weight: 600;
    }

    .delete-btn {
        background: #dc3545;
        border: none;
        color: white;
        padding: 0.4rem 0.8rem;
        border-radius: 6px;
        transition: all 0.3s ease;
    }

    .delete-btn:hover {
        background: #c82333;
        transform: scale(1.05);
    }

    .reply-form {
        margin-top: 1rem;
    }

    .reply-input {
        border: 2px solid #e9ecef;
        border-radius: 8px;
        padding: 0.75rem;
        transition: all 0.3s ease;
    }

    .reply-input:focus {
        border-color: var(--maize-yellow);
        box-shadow: 0 0 0 0.2rem rgba(255, 203, 5, 0.25);
    }

    .reply-btn {
        background: var(--oxford-blue);
        border: none;
        color: white;
        padding: 0.75rem 1rem;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .reply-btn:hover {
        background: var(--dark-blue);
        transform: scale(1.05);
    }

    .add-comment-section {
        background: white;
        border-radius: 16px;
        padding: 2rem;
        margin-top: 2rem;
        box-shadow: var(--shadow);
    }

    .form-label {
        color: var(--oxford-blue);
        font-weight: 600;
        margin-bottom: 0.75rem;
    }

    .form-textarea {
        border: 2px solid #e9ecef;
        border-radius: 12px;
        padding: 1rem;
        transition: all 0.3s ease;
        resize: vertical;
    }

    .form-textarea:focus {
        border-color: var(--maize-yellow);
        box-shadow: 0 0 0 0.2rem rgba(255, 203, 5, 0.25);
    }

    .submit-btn {
        background: linear-gradient(45deg, var(--oxford-blue), var(--dark-blue));
        border: none;
        color: white;
        padding: 1rem 2rem;
        border-radius: 10px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(0, 33, 71, 0.3);
    }

    .no-content {
        text-align: center;
        padding: 3rem;
        color: var(--text-muted);
        background: #f8f9fa;
        border-radius: 12px;
        margin: 1rem 0;
    }

    .no-content i {
        font-size: 3rem;
        margin-bottom: 1rem;
        opacity: 0.5;
    }
</style>

<div class="elegant-card">
    <div class="elegant-header">
        <h4><i class="fas fa-clipboard-list mr-3"></i>Pengumpulan Tugas: {{ $tugas->tugas }}</h4>
    </div>
    <div class="elegant-body">
        {{-- Daftar submissions --}}
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
                <span>Komentar Siswa & Balasan Guru</span>
            </h5>

            @forelse($tugas->komentars as $komentar)
                <div class="comment-card">
                    <div class="d-flex align-items-start mb-3">
                        <div class="comment-avatar">
    <img class="img-profile rounded-circle" 
         src="{{ asset('sbadmin2/img/undraw_profile.svg') }}" 
         alt="{{ $komentar->user->name }}">
    <div class="online-indicator"></div>
</div>

                        <div class="flex-grow-1 user-info">
                            <div class="user-name">
                                {{ $komentar->user->name }}
                                @if($komentar->user->jabatan ?? false)
                                    <span class="user-role">{{ $komentar->user->jabatan }}</span>
                                @endif
                            </div>
                            <div class="comment-date">
                                <i class="fas fa-clock mr-1"></i>
                                {{ $komentar->created_at->format('d M Y H:i') }}
                                <span class="mx-2">•</span>
                                <i class="fas fa-comment mr-1"></i>
                                Komentar
                            </div>
                        </div>

                        <!-- Tombol Hapus Komentar -->
                        @if(auth()->check() && (auth()->id() == $komentar->user_id || auth()->user()->jabatan == 'guru'))
                            <form action="{{ route('komentar.destroy', $komentar->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus komentar ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        @endif
                    </div>

                    <div class="comment-text">{{ $komentar->isi }}</div>

                    <!-- Daftar Balasan -->
                    @if($komentar->balasan->count())
                        <div class="reply-section">
                            @foreach($komentar->balasan as $balasan)
                                <div class="reply-item">
                                    <div class="reply-header">
                                        <div class="reply-avatar">
    <img class="img-profile rounded-circle" 
         src="{{ asset('sbadmin2/img/undraw_profile.svg') }}" 
         alt="{{ $balasan->user->name }}">
</div>

                                        <div class="flex-grow-1">
                                            <div class="reply-author">
                                                {{ $balasan->user->name }}
                                                @if($balasan->user->jabatan ?? false)
                                                    <span class="user-role">{{ $balasan->user->jabatan }}</span>
                                                @endif
                                            </div>
                                            <small class="text-muted">
                                                <i class="fas fa-clock mr-1"></i>
                                                {{ $balasan->created_at->format('d M Y H:i') }}
                                                <span class="mx-2">•</span>
                                                <i class="fas fa-reply mr-1"></i>
                                                Balasan
                                            </small>
                                        </div>
                                        <!-- Tombol Hapus Balasan -->
                                        @if(auth()->check() && (auth()->id() == $balasan->user_id || auth()->user()->jabatan == 'guru'))
                                            <form action="{{ route('komentar.destroy', $balasan->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus balasan ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                    <div class="reply-content">
                                        {{ $balasan->isi }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <!-- Form Balasan (hanya guru) -->
                    @if(auth()->check() && auth()->user()->jabatan == 'guru')
                        <form action="{{ route('komentar.reply', $komentar->id) }}" method="POST" class="reply-form">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="isi" class="form-control reply-input" placeholder="Balas komentar..." required>
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
                    <p>Belum ada komentar dari siswa.</p>
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
                    <textarea name="isi" id="isi" rows="4" class="form-control form-textarea" placeholder="Tulis komentar Anda di sini..." required></textarea>
                </div>
                <button type="submit" class="submit-btn">
                    <i class="fas fa-paper-plane mr-2"></i>Kirim Komentar
                </button>
            </form>
        </div>
    </div>
</div>
@endsection