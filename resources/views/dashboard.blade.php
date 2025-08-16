@extends('layouts/app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-tachometer-alt mr-2"></i>
        {{ $title }}
    </h1>

<div class="row">
    @if (auth()->user()->jabatan == 'Admin')
        <div class="col-xl-3 col-md-6 mb-4">
        <div class="card" 
        onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 0.75rem 1.5rem rgba(0, 0, 0, 0.1)';"
        style="border-left: 4px solid #4e73df; box-shadow: 0 0.15rem 1.75rem 0 rgba(58,59,69,.15); height: 100%; padding: 1rem 0.5rem; border-radius: 12px; transition: transform 0.3s ease, box-shadow 0.3s ease;"
        onmouseout="this.style.transform='none'; this.style.boxShadow='0 0.15rem 1.75rem 0 rgba(58,59,69,.15)';">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div style="font-size: 0.75rem; font-weight: 700; color: #4e73df; text-transform: uppercase; margin-bottom: 0.5rem; letter-spacing: 1px;">
                            TOTAL USER
                        </div>
                        <div style="font-size: 1.5rem; font-weight: 700; color: #5a5c69;">
                            {{ $jumlahUser }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <div style="background-color: #4e73df; color: white; border-radius: 50%; padding: 12px; box-shadow: 0 0.15rem 0.5rem rgba(0,0,0,0.15); display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-users fa-lg"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card" 
        onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 0.75rem 1.5rem rgba(0, 0, 0, 0.1)';"
        style="border-left: 4px solid #000000; box-shadow: 0 0.15rem 1.75rem 0 rgba(58,59,69,.15); height: 100%; padding: 1rem 0.5rem; border-radius: 12px; transition: transform 0.3s ease, box-shadow 0.3s ease;"
        onmouseout="this.style.transform='none'; this.style.boxShadow='0 0.15rem 1.75rem 0 rgba(58,59,69,.15)';">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div style="font-size: 0.75rem; font-weight: 700; color: #000000; text-transform: uppercase; margin-bottom: 0.5rem; letter-spacing: 1px;">
                            TOTAL ADMIN
                        </div>
                        <div style="font-size: 1.5rem; font-weight: 700; color: #5a5c69;">
                            {{ $jumlahAdmin }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <div style="background-color: #4e73df; color: white; border-radius: 50%; padding: 12px; box-shadow: 0 0.15rem 0.5rem rgba(0,0,0,0.15); display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-user fa-lg"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card" 
        onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 0.75rem 1.5rem rgba(0, 0, 0, 0.1)';"
        style="border-left: 4px solid #000000; box-shadow: 0 0.15rem 1.75rem 0 rgba(58,59,69,.15); height: 100%; padding: 1rem 0.5rem; border-radius: 12px; transition: transform 0.3s ease, box-shadow 0.3s ease;"
        onmouseout="this.style.transform='none'; this.style.boxShadow='0 0.15rem 1.75rem 0 rgba(58,59,69,.15)';">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div style="font-size: 0.75rem; font-weight: 700; color: #000000; text-transform: uppercase; margin-bottom: 0.5rem; letter-spacing: 1px;">
                            TOTAL SISWA
                        </div>
                        <div style="font-size: 1.5rem; font-weight: 700; color: #5a5c69;">
                            {{ $jumlahSiswa }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <div style="background-color: #4e73df; color: white; border-radius: 50%; padding: 12px; box-shadow: 0 0.15rem 0.5rem rgba(0,0,0,0.15); display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-user fa-lg"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card" 
        onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 0.75rem 1.5rem rgba(0, 0, 0, 0.1)';"
        style="border-left: 4px solid #000000; box-shadow: 0 0.15rem 1.75rem 0 rgba(58,59,69,.15); height: 100%; padding: 1rem 0.5rem; border-radius: 12px; transition: transform 0.3s ease, box-shadow 0.3s ease;"
        onmouseout="this.style.transform='none'; this.style.boxShadow='0 0.15rem 1.75rem 0 rgba(58,59,69,.15)';">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div style="font-size: 0.75rem; font-weight: 700; color: #000000; text-transform: uppercase; margin-bottom: 0.5rem; letter-spacing: 1px;">
                            TOTAL DITUGASKAN
                        </div>
                        <div style="font-size: 1.5rem; font-weight: 700; color: #5a5c69;">
                            {{ $jumlahDitugaskan }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <div style="background-color: #4e73df; color: white; border-radius: 50%; padding: 12px; box-shadow: 0 0.15rem 0.5rem rgba(0,0,0,0.15); display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-check fa-lg"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card" 
        onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 0.75rem 1.5rem rgba(0, 0, 0, 0.1)';"
        style="border-left: 4px solid #000000; box-shadow: 0 0.15rem 1.75rem 0 rgba(58,59,69,.15); height: 100%; padding: 1rem 0.5rem; border-radius: 12px; transition: transform 0.3s ease, box-shadow 0.3s ease;"
        onmouseout="this.style.transform='none'; this.style.boxShadow='0 0.15rem 1.75rem 0 rgba(58,59,69,.15)';">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div style="font-size: 0.75rem; font-weight: 700; color: #000000; text-transform: uppercase; margin-bottom: 0.5rem; letter-spacing: 1px;">
                            TOTAL BELUM DITUGASKAN
                        </div>
                        <div style="font-size: 1.5rem; font-weight: 700; color: #5a5c69;">
                            {{ $jumlahBelumDitugaskan }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <div style="background-color: #4e73df; color: white; border-radius: 50%; padding: 12px; box-shadow: 0 0.15rem 0.5rem rgba(0,0,0,0.15); display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-times fa-lg"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

     @endif

     @if (auth()->user()->jabatan == 'Siswa'&&auth()->user()->is_tugas == true)
        <div class="col-xl-6 col-md-6 mb-4">
        <div class="card" 
        onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 0.75rem 1.5rem rgba(0, 0, 0, 0.1)';"
        style="border-left: 4px solid #000000; box-shadow: 0 0.15rem 1.75rem 0 rgba(58,59,69,.15); height: 100%; padding: 1rem 0.5rem; border-radius: 12px; transition: transform 0.3s ease, box-shadow 0.3s ease;"
        onmouseout="this.style.transform='none'; this.style.boxShadow='0 0.15rem 1.75rem 0 rgba(58,59,69,.15)';">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div style="font-size: 0.75rem; font-weight: 700; color: #000000; text-transform: uppercase; margin-bottom: 0.5rem; letter-spacing: 1px;">
                            STATUS
                        </div>
                        <div style="font-size: 1.5rem; font-weight: 700; color: #5a5c69;">
                            <span class="badge badge-success">
                                DITUGASKAN
                            </span>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div style="background-color: #4e73df; color: white; border-radius: 50%; padding: 12px; box-shadow: 0 0.15rem 0.5rem rgba(0,0,0,0.15); display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-check fa-lg"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>     
     @endif

     @if (auth()->user()->jabatan == 'Siswa'&&auth()->user()->is_tugas == false)
        <div class="col-xl-6 col-md-6 mb-4">
        <div class="card" 
        onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 0.75rem 1.5rem rgba(0, 0, 0, 0.1)';"
        style="border-left: 4px solid #000000; box-shadow: 0 0.15rem 1.75rem 0 rgba(58,59,69,.15); height: 100%; padding: 1rem 0.5rem; border-radius: 12px; transition: transform 0.3s ease, box-shadow 0.3s ease;"
        onmouseout="this.style.transform='none'; this.style.boxShadow='0 0.15rem 1.75rem 0 rgba(58,59,69,.15)';">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div style="font-size: 0.75rem; font-weight: 700; color: #000000; text-transform: uppercase; margin-bottom: 0.5rem; letter-spacing: 1px;">
                            STATUS
                        </div>
                        <div style="font-size: 1.5rem; font-weight: 700; color: #5a5c69;">
                            <span class="badge badge-danger">
                                BELUM DITUGASKAN
                            </span>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div style="background-color: #4e73df; color: white; border-radius: 50%; padding: 12px; box-shadow: 0 0.15rem 0.5rem rgba(0,0,0,0.15); display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-times fa-lg"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>     
    @endif
    
</div>


@endsection