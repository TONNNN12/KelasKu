<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
      $data = array(
        "title"            => "Dashboard",
        "menuDashboard"    => "active",
        "jumlahUser"       => User::count(),
        "jumlahAdmin"      => User::where('jabatan', 'Admin')->count(),
        "jumlahSiswa"      => User::where('jabatan', 'Siswa')->count(),
        "jumlahDitugaskan"      => User::where('jabatan', 'Siswa')->where('is_tugas',true)->count(),
        "jumlahBelumDitugaskan"      => User::where('jabatan', 'Siswa')->where('is_tugas',false)->count(),
      );
      return view('dashboard', $data);
    }
}
