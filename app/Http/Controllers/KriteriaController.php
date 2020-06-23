<?php

namespace App\Http\Controllers;

use App\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kriteria = Kriteria::all();
        return view('admin/view/kriteria', compact('kriteria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kriteria = Kriteria::all();
        return view('admin/insert/kriteria', compact('kriteria'));
        // // return view('admin/insert/kriteria');

        // Example
        // $data['kriteria'] = Kriteria::orderBy('id_kriteria', 'desc');
        // return view('admin/insert/kriteria', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $id = Auth::user()->id;
        $request->validate([
            'nama_kriteria' => 'required|unique:tb_kriteria|max:255',
            'tipe_kriteria' => 'required',
            'bobot_kriteria' => 'required'
        ]);

        $kriteria = Kriteria::create([
            'nama_kriteria' => $request->nama_kriteria,
            'tipe_kriteria' => $request->tipe_kriteria,
            'bobot_kriteria' => $request->bobot_kriteria
        ]);
        return redirect('/view/kriteria')->with('tambah', 'Data Berhasil Ditambahkan');

        // // Example
        // // $id_kriteria = $request->id_kriteria;
        // // $kriteria = Kriteria::updateOrCreate(
        // //     ['id_kriteria => $id_kriteria'],
        // //     [
        // //         'nama_kriteria' => $request->nama_kriteria,
        // //         'tipe_kriteria' => $request->tipe_kriteria,
        // //         'bobot_kriteria' => $request->bobot_kriteria,
        // //     ]
        // // );
        // return Response::json($kriteria);
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
        $kriteria = Kriteria::findorFail($id);
        $kriteria->update($request->all());
        return redirect()->back()->with('update', 'Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kriteria = Kriteria::find($id);
        $kriteria->delete();
        // return redirect('/view/kriteria');
        return redirect()->back()->with('hapus', 'Data Berhasil Dihapus');
    }
}
