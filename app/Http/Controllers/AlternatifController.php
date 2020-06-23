<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Alternatif;
use App\Kriteria;
use App\NilaiEvaluasi;
use App\User;
use Illuminate\Validation\Rule;

class AlternatifController extends Controller
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

    public function
    default()
    {
        $id = User::where('level_user', 'Admin')->first();
        $defaultAlter = Alternatif::where('user_id', $id->id)->get();
        $defaultAlter2 = Alternatif::where('user_id', $id->id)->get();
        $kriteria = Kriteria::all();
        $user = User::where('id', Auth::user()->id)->get();

        // $data = [];
        // foreach ($defaultAlter2 as $default) {
        //     // $data[] = ['id' => $default['id']];
        //     // dd($data);
        //     $check = NilaiEvaluasi::where('user_id', Auth::user()->id)->where('alternatif_id', $default->id)->get();
        //     // foreach ($check as $check) {
        //     //     $data[] = ['id' => $check['nilai']];
        //     // }
        // }
        // dd($data);

        $params = [
            'alternatif' => $defaultAlter,
            'kriteria' => $kriteria,
            'user' => $user,
            // 'check' => $check
        ];

        return view('admin/view/defaultAlter')->with($params);
    }

    public function index()
    {
        $user_id = Auth::user()->id;
        $alternatif = Alternatif::where('user_id', $user_id)->get();
        $kriteria = Kriteria::all();
        $user = User::where('id', $user_id)->get();

        // $nilai = NilaiEvaluasi::where('user_id', 7)->get();

        $data = Alternatif::where('user_id', $user_id)->get();

        // dd($a);

        $params = [
            'alternatif' => $alternatif,
            'kriteria' => $kriteria,
            'user' => $user,
            'data' => $data
        ];

        return view('admin/view/alternatif')->with($params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/insert/alternatif');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_user = Auth::user()->id;

        // If Exist
        // $request->validate([
        //     'nama_alternatif' => [
        //         'required',
        //         Rule::exists('tb_alternatif')->where(function ($query) {
        //             $query->where('user_id', Auth::user()->id);
        //         }),
        //     ]
        // ]);

        // Unique
        $request->validate([
            'nama_alternatif' => [
                'required',
                Rule::unique('tb_alternatif')->where(function ($query) {
                    $query->where('user_id', Auth::user()->id);
                }),
            ]
        ]);

        Alternatif::create([
            'nama_alternatif' => $request->nama_alternatif,
            'user_id' => $id_user
        ]);

        $level = User::where('id', $id_user)->first();
        if ($level->level_user == 'Admin') {
            return redirect('/view/alternatif')->with('tambah', 'Data Berhasil Ditambahkan');
        } else {
            return redirect('/view/alternatif/user')->with('tambah', 'Data Berhasil Ditambahkan');
        }

        // $nama_alternatif = $request->mytext;
        // $data = [];
        // // $now = Carbon::now('utc')->toDateString();
        // $date = date('Y-m-d H:i:s');
        // foreach ($nama_alternatif as $names) {
        //     $data[] = [
        //         'nama_alternatif' => $names,
        //         'user_id' => $id_user,
        //         'created_at' => $date,
        //         'updated_at' => $date
        //     ];
        // }
        // Alternatif::insert($data);
        // return 1;
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
        $alternatif = Alternatif::findorFail($id);
        $alternatif->update($request->all());
        return redirect()->back()->with('update', 'update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alternatif = Alternatif::find($id);
        $nilai = NilaiEvaluasi::where('alternatif_id', $id)
            ->where('user_id', Auth::user()->id)->get();

        foreach ($nilai as $nilai) {
            $nilai->where('alternatif_id', $id)
                ->where('user_id', Auth::user()->id)->delete();
        }

        $alternatif->delete();
        return redirect()->back()->with('hapus', 'Data Berhasil Dihapus');
    }
}
