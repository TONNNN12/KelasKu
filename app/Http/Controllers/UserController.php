<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

use function Pest\Laravel\delete;
use Illuminate\Support\Facades\Hash;
use function Laravel\Prompts\password;

class UserController extends Controller
{
    public function index (){
        $data = array(
            'title'           => 'Data User',
            'MenuAdminUser'   =>'Active',
            'user'            => User::orderBy('jabatan','asc')->get(),
        );
        return view('admin/user/index',$data);
    }
    public function create (){
        $data = array(
            'title'           => 'Tambah Data User',
            'MenuAdminUser'   =>'Active',
        );
        return view('admin/user/create',$data);
    }
    public function store(Request $request){
        $request->validate([
            'nama'      => 'required',
            'email'     => 'required|unique:users,email',
            'jabatan'   => 'required',
            'password'  => 'required|confirmed|min:8',
        ],[
            'nama.required'      => 'Nama Tidak Boleh Kosong',
            'email.required'     => 'Email Tidak Boleh Kosong',
            'email.unique'       => 'Email Sudah Ada',
            'jabatan.required'   => 'Jabatan Harus Di Pilih',
            'password.required'  => 'Password Tidak Boleh Kosong',
            'password.cormirmed' => 'Password KOnfirmasi Tidak Sama',
            'password.min'       => 'Password Minimal 8 Karakter',
        ]);

        $user = new User;
        $user->nama      = $request->nama;
        $user->email     = $request->email;
        $user->jabatan   = $request->jabatan;
        $user->password  = Hash::make($request->password);
        $user->is_tugas  = false;
        $user->save();

        return redirect()->route('user')->with('success','Data Berhasil Ditambahkan');
    }

    public function edit ($id){
        $data = array(
            'title'           => 'Edit Data User',
            'MenuAdminUser'   =>'Active',
            'user'            => User::findOrFail($id),
        );
        return view('admin/user/edit',$data);
    }
    public function update(Request $request, $id){
        $request->validate([
            'nama'      => 'required',
            'email'     => 'required|unique:users,email,'.$id,
            'jabatan'   => 'required',
            'password'  => 'nullable|confirmed|min:8',
        ],[
            'nama.required'      => 'Nama Tidak Boleh Kosong',
            'email.required'     => 'Email Tidak Boleh Kosong',
            'email.unique'       => 'Email Sudah Ada',
            'jabatan.required'   => 'Jabatan Harus Di Pilih',
            'password.cormirmed' => 'Password Konfirmasi Tidak Sama',
            'password.min'       => 'Password Minimal 8 Karakter',
        ]);

        $user = User::findOrFail($id);
        $user->nama      = $request->nama;
        $user->email     = $request->email;
        $user->jabatan   = $request->jabatan;
        if ($request->filled('password')) {
            $user->password  = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('user')->with('success','Data Berhasil Di Edit');
    }
    public function destroy ($id){
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user')->with('success','Data Berhasil Di Hapus');
    }
    public function pdf (){
         date_default_timezone_set('Asia/Jakarta'); 
        $filename = now()->format('d-m-Y_H.i.s');
        $data = array(
            'user' => User::get(),
            'tanggal' => now()->format('d-m-Y'),
            'jam'     => now()->format('H.i.s'),
        );
         $pdf = Pdf::loadView('admin/user/pdf', $data);
    return $pdf->setPaper('a4', 'landscape')->stream('DataUser_'.$filename.'.pdf');
    }
}
