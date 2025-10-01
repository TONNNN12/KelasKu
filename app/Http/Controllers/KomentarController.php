<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use App\Models\Komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KomentarController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'tugas_id'  => 'required|exists:tugas,id',
            'isi'       => 'required|string',
            'parent_id' => 'nullable|exists:komentars,id',
        ]);

        Komentar::create([
            'tugas_id'  => $request->tugas_id,
            'user_id'   => Auth::id(),
            'isi'       => $request->isi,
            'parent_id' => $request->parent_id,
        ]);

        return back()->with('success', 'Komentar berhasil dikirim!');
    }

    public function index()
    {
        $tugas = Tugas::with(['user', 'komentars.user'])->get();
        return view('admin.tugas.index', compact('tugas'))->with('title', 'Data Tugas');
    }

    public function destroy($id)
    {
        $komentar = Komentar::findOrFail($id);

        // hanya pemilik komentar atau guru yang bisa hapus
        if (Auth::id() == $komentar->user_id || Auth::user()->jabatan == 'guru') {
            $komentar->delete();
            return back()->with('success', 'Komentar berhasil dihapus.');
        }

        return back()->with('error', 'Anda tidak punya izin untuk menghapus komentar ini.');
    }
    public function show($id)
{
    // Ambil data tugas + komentar yang terkait
    $tugas = Tugas::with(['komentars.user'])->findOrFail($id);

    // Ambil komentar saja kalau mau
    $komentar = $tugas->komentars;

    // Kirim ke view
    return view('siswa.tugas.comen', compact('tugas', 'komentar'));
}

}
