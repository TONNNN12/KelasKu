@extends('layouts/app')

@section('content')
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
                    Detail informasi tugas siswa
                </p>
            </div>
        </div>
    </header>

    <div class="card">
        <div class="card-header d-flex flex-wrap">
            <div class="mt-2 mt-md-0">
                            <a href="{{ route('tugasCreate') }}" 
                                class="btn btn-primary rounded-pill font-weight-semibold px-4 py-2 shadow-sm d-inline-flex align-items-center btn-hover-lift export-btn mr-4"
                                aria-label="Export tugas ke format PDF"
                                rel="noopener">
                                <i class="fas fa-file-pdf mr-2" aria-hidden="true"></i>
                                Tambah Data
                            </a>
            </div>
            
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
        </div>
        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead style="background-color: #002147; color: #ffffff;">
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Tugas</th>
                                            <th>Tangggal Mulai</th>
                                            <th>Tanggal Selesai</th>
                                            <th>
                                                <i class="fas fa-cog"></i>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tugas as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $item->user->nama }}</td>
                                            <td>{{ $item->tugas }}</td>
                                            <td class="text-center">
                                                <span class="badge badge-info">
                                                    {{ $item->tanggal_mulai }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <span class="badge badge-info">
                                                    {{ $item->tanggal_selesai }}
                                                </span>
                                            </td>
                                            
                                            <td class="text-center">
                                                <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#modalTugasShow{{ $item->id }}">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <a href="{{ route('tugasEdit', $item->id) }}" class="btn btn-sm btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalTugasDestroy{{ $item->id }}">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                @include('admin/tugas/modal')
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
        </div>
    </div>
<style>
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

    </style>
@endsection