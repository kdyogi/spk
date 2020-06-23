<?php

namespace App\Http\Controllers;

use App\Alternatif;
use App\Kriteria;
use App\NilaiEvaluasi;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use Illuminate\Support\Facades\Auth;

class PerhitunganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $alternatif = Alternatif::where('user_id', Auth::user()->id)->get();
        $kriteria = Kriteria::all();

        $data = Alternatif::where('user_id', Auth::user()->id)->get();

        // dd($nilai);

        // Contoh
        $kode_krit = [];
        foreach ($kriteria as $krit) {
            $kode_krit[$krit->id] = [];
            foreach ($alternatif as $al) {
                foreach ($al->nilai as $crip) {
                    if ($crip->kriteria->id == $krit->id) {
                        $kode_krit[$krit->id][] = $crip->nilai;
                    }
                }
            }

            if ($krit->tipe_kriteria == 'Cost') {
                $kode_krit[$krit->id] = min($kode_krit[$krit->id]);
            } elseif ($krit->tipe_kriteria == 'Benefit') {
                $kode_krit[$krit->id] = max($kode_krit[$krit->id]);
            }
        };
        // dd($kode_krit);

        // dd($id_kriteria);

        return view('admin.view.perhitungan', [
            'alternatif' => $alternatif,
            'kriteria' => $kriteria,
            'data' => $data,
            'kode_krit' => $kode_krit
        ]);
    }

    public function
    default()
    {
        $id = User::where('level_user', 'Admin')->first();
        $alternatif = Alternatif::where('user_id', $id->id)->get();
        $kriteria = Kriteria::all();

        $data = Alternatif::where('user_id', $id->id)->get();

        foreach ($alternatif as $al) {
            $test = NilaiEvaluasi::where('user_id', Auth::user()->id)->where('alternatif_id', $al['id'])->get();
        }

        // dd($test);

        // Contoh
        $kode_krit = [];
        foreach ($kriteria as $krit) {
            $kode_krit[$krit->id] = [];
            foreach ($alternatif as $al) {
                foreach ($al->nilai as $crip) {
                    if ($crip->kriteria->id == $krit->id) {
                        $kode_krit[$krit->id][] = $crip->nilai;
                    }
                }
            }

            if ($krit->tipe_kriteria == 'Cost') {
                $kode_krit[$krit->id] = min($kode_krit[$krit->id]);
            } elseif ($krit->tipe_kriteria == 'Benefit') {
                $kode_krit[$krit->id] = max($kode_krit[$krit->id]);
            }
        };
        // dd($kode_krit);

        // dd($id_kriteria);

        return view('admin.view.defaultPerhitungan', [
            'alternatif' => $alternatif,
            'kriteria' => $kriteria,
            'data' => $data,
            'kode_krit' => $kode_krit,
            'test' => $test
        ]);
    }
}
