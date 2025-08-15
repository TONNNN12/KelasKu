<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class TugasController extends Controller
{
    public function index (){
        $user = Auth::user();
        if ($user->jabatan=='Admin'){
             $data = array(
            'title'           => 'Data Tugas',
            'MenuAdminTugas'   =>'Active',
            'tugas'            => Tugas::with('user')->get(),
        );
        return view('admin.tugas.index',$data);
        }else{
               $data = array(
            'title'           => 'Data Tugas',
            'MenuSiswaTugas'   =>'Active',
            'tugas'            => Tugas::with('user')->where('user_id',$user->id)->first(),
        );
        return view('siswa.tugas.index',$data);
        }
       
    }
    public function create (){
        $data = array(
            'title'            => 'Tambah Data Tugas',
            'MenuAdminTugas'   => 'Active',
            'user'             => User::where('jabatan','Siswa')->where('is_tugas',false)->get(),
        );
        return view('admin/tugas/create',$data);
    }
    public function store(Request $request){
        $request->validate([
            'user_id'            => 'required',
            'tugas'              => 'required',
            'tanggal_mulai'      => 'required',
            'tanggal_selesai'    => 'required',
        ],[
            'user_id.required'            => 'Nama Tidak Boleh Kosong',
            'tugas.required'              => 'Tugas Tidak Boleh Kosong',
            'tanggal_mulai.required'      => 'Tanggal mulai Tidak Boleh Kosong',
            'tanggal_selesai.required'    => 'Tanggal selesai Tidak Boleh Kosong',
        ]);

        $user = User::findOrFail($request->user_id);
        $tugas = new Tugas;
        $tugas->user_id = $request->user_id;
        $tugas->tugas = $request->tugas;
        $tugas->tanggal_mulai = $request->tanggal_mulai;
        $tugas->tanggal_selesai = $request->tanggal_selesai;
        $tugas->save();
        $user->is_tugas = true;
        $user->save();

        return redirect()->route('tugas')->with('success','Data Berhasil Ditambahkan');
    }
    public function edit ($id){
        $data = array(
            'title'            => 'Edit Data Tugas',
            'MenuAdminTugas'   => 'Active',
            'tugas'            => Tugas::with('user')->findOrFail($id),
        );
        return view('admin/tugas/update',$data);
    }
    public function update(Request $request, $id){
        $request->validate([
            'tugas'              => 'required',
            'tanggal_mulai'      => 'required',
            'tanggal_selesai'    => 'required',
        ],[
            'user_id.required'            => 'Nama Tidak Boleh Kosong',
            'tugas.required'              => 'Tugas Tidak Boleh Kosong',
            'tanggal_mulai.required'      => 'Tanggal mulai Tidak Boleh Kosong',
            'tanggal_selesai.required'    => 'Tanggal selesai Tidak Boleh Kosong',
        ]);

        $tugas = Tugas::findOrFail($id);
        $tugas->tugas = $request->tugas;
        $tugas->tanggal_mulai = $request->tanggal_mulai;
        $tugas->tanggal_selesai = $request->tanggal_selesai;
        $tugas->save();

        return redirect()->route('tugas')->with('success','Data Berhasil Diedit');
    }
    public function destroy ($id){
        $tugas = Tugas::findOrFail($id);
        $tugas->delete();
        $user = User::where('id',$tugas->user_id)->first();
        $user->is_tugas = false;
        $user->save();
        return redirect()->route('tugas')->with('success','Data Berhasil Di Hapus');
    }
     public function pdf (){
        date_default_timezone_set('Asia/Jakarta');
              $user = Auth::user(); 
        $filename = now()->format('d-m-Y_H.i.s');
        if ($user->jabatan=='Admin') {
             $data = array(
            'tugas' => Tugas::with('user')->get(),
            'tanggal' => now()->format('d-m-Y'),
            'jam'     => now()->format('H.i.s'),
        );
        $pdf = Pdf::loadView('admin/tugas/pdf', $data);
    return $pdf->setPaper('a4', 'landscape')->stream('DataTugas_'.$filename.'.pdf');
        } else {
            $data = array(
            'tanggal' => now()->format('d-m-Y'),
            'jam'     => now()->format('H.i.s'),
            'tugas'            => Tugas::with('user')->where('user_id',$user->id)->first(),
        );
        $pdf = Pdf::loadView('siswa/tugas/pdf', $data);
    return $pdf->setPaper('a4', 'portrait')->stream('DataTugas_'.$filename.'.pdf');
        }
        


       
    }
}
