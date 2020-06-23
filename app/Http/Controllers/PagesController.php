<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use App\User;
use App\Kriteria;
use App\Alternatif;
use App\CalonSiswa;
use App\Pengguna;
use Illuminate\Support\Facades\Auth;


class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kriteria = Kriteria::count();
        $calonSiswa = User::where('level_user', 'Calon Siswa')->count();
        $id_user = User::where('level_user', 'admin')->first();
        $alternatif = Alternatif::where('user_id', $id_user->id)->count();
        $user = User::where('id', Auth::user()->id)->get();

        // $defaul = [];
        if (Auth::user()->level_user == 'Calon Siswa') {
            $id = User::where('level_user', 'Admin')->get();
            foreach ($id as $id) {
                $default = Alternatif::where('user_id', $id['id'])->count();
            }
            $countAlter = Alternatif::where('user_id', Auth::user()->id)->count();
        }
        // dd($default);

        // nama user
        $getId = User::where('id', Auth::user()->id)->first();
        if ($getId->level_user == "Admin") {
            $dataAdmin = Admin::where('user_id', Auth::user()->id)->first();
            $nama = $dataAdmin['nama_admin'];
        } else {
            $dataSiswa = CalonSiswa::where('user_id', Auth::user()->id)->first();
            $nama = $dataSiswa['nama_calonSiswa'];
        }

        if (Auth::user()->level_user == 'Calon Siswa') {
            $params = [
                'user' => $user,
                'kriteria' => $kriteria,
                'calonSiswa' => $calonSiswa,
                'alternatif' => $alternatif,
                'nama' => $nama,
                'default' => $default,
                'countAlter' => $countAlter
            ];
        } elseif (Auth::user()->level_user == 'Admin') {
            $params = [
                'user' => $user,
                'kriteria' => $kriteria,
                'calonSiswa' => $calonSiswa,
                'alternatif' => $alternatif,
                'nama' => $nama
            ];
        }

        return view('admin.index')->with($params);
    }
}
