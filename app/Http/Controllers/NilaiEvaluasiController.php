<?php

namespace App\Http\Controllers;

use App\NilaiEvaluasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class NilaiEvaluasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [];
        $alternatif_id = $request->alternatif_id;
        $kriteria_id = $request->kriteria_id;
        $nilai = $request->nilai;
        $user_id = Auth::user()->id;

        for ($i = 0; $i < count($alternatif_id); $i++) {
            $data = new NilaiEvaluasi();
            $data->alternatif_id = $alternatif_id[$i];
            $data->kriteria_id = $kriteria_id[$i];
            $data->nilai = $nilai[$i];
            $data->user_id = $user_id;

            $data->save();
        }
        return redirect()->back()->with('tambah', 'Nilai Berhasil di masukkan!');
    }

    public function updateDefault(Request $request, $id)
    {
        $dataNilai = NilaiEvaluasi::where('alternatif_id', $id)
            ->where('user_id', Auth::user()->id)
            ->get();
        // $data = [];

        for ($i = 0; $i < count($dataNilai); $i++) {
            NilaiEvaluasi::where('alternatif_id', $id)
                ->where('kriteria_id', $request->kriteria_id[$i])
                ->where('user_id', Auth::user()->id)
                ->update([
                    'nilai' => $request->nilai[$i]
                ]);
        }
        return redirect()->back()->with('update', 'Nilai Berhasil di masukkan!');
        // dd(count($dataNilai));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
