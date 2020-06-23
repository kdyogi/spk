<?php

namespace App\Http\Controllers;

use App\Admin;
use App\CalonSiswa;
use App\Pengguna;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PenggunaController extends Controller
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
        if (Auth::user()->level_user == "Admin") {
            $user = User::all();
            return view('admin/view/pengguna', compact('user'));
        } else {
            return view('admin.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/insert/pengguna');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:users',
            'nama' => 'required|min:6|max:255',
            'password' => 'required|min:6|confirmed',
            'alamat' => 'required',
            'telp' => 'required|size:12',
            'jenisKelamin' => 'required',
            'level_user' => 'required'
        ]);
        // Pengguna::create($request->all());
        Pengguna::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level_user' => $request->level_user
        ]);

        $id_user = Pengguna::where('email', $request->email)->first();

        if ($request->level_user == 'Admin') {
            // INSERT TO TABLE SISWA
            // $id_user = Pengguna::where('email', $request->email)->first();
            // $id_user = Pengguna::where('email', $request->email)->get();
            Admin::create([
                'nama_admin' => $request->nama,
                'alamat_admin' => $request->alamat,
                'telp_admin' => $request->telp,
                'jenisKelamin_admin' => $request->jenisKelamin,
                'email_admin' => $request->email,
                'user_id' => $id_user->id
            ]);
            // return $id_user;
            return redirect('/view/pengguna');
        } else {
            // INSERT TO TABLE SISWA
            // $id_user = Pengguna::where('email', $request->email)->first();
            // $id_user = Pengguna::where('email', $request->email)->get();
            CalonSiswa::create([
                'nama_calonSiswa' => $request->nama,
                'alamat_calonSiswa' => $request->alamat,
                'telp_calonSiswa' => $request->telp,
                'jenisKelamin_calonSiswa' => $request->jenisKelamin,
                'email_calonSiswa' => $request->email,
                'user_id' => $id_user->id
            ]);
            // return $id_user;
            return redirect('/view/pengguna');
        }
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
        $pengguna = Pengguna::findorFail($id);
        // $pengguna->level_user = $request->level;
        // $pengguna->save();

        if ($pengguna->level_user == $request->level) {
            if ($pengguna->level_user == 'Admin') {
                // $admin = Admin::where('user_id', $id)->first();
                Admin::where('user_id', $id)->update(['nama_admin' => $request->nama]);
            } else {
                CalonSiswa::where('user_id', $id)->update(['nama_calonSiswa' => $request->nama]);
            }
            return redirect()->back()->with('update', 'update');
        } else {
            if ($request->level == 'Calon Siswa') {
                $data = Admin::where('user_id', $id)->first();
                CalonSiswa::create([
                    'nama_calonSiswa' => $request->nama,
                    'alamat_calonSiswa' => $data->alamat_admin,
                    'telp_calonSiswa' => $data->telp_admin,
                    'jenisKelamin_calonSiswa' => $data->jenisKelamin_admin,
                    'email_calonSiswa' => $data->email_admin,
                    'user_id' => $data->user_id
                ]);
                Admin::where('user_id', $id)->delete();
            } else {
                $data = CalonSiswa::where('user_id', $id)->first();
                Admin::create([
                    'nama_admin' => $request->nama,
                    'alamat_admin' => $data->alamat_calonSiswa,
                    'telp_admin' => $data->telp_calonSiswa,
                    'jenisKelamin_admin' => $data->jenisKelamin_calonSiswa,
                    'email_admin' => $data->email_calonSiswa,
                    'user_id' => $data->user_id
                ]);
                CalonSiswa::where('user_id', $id)->delete();
            }
            $pengguna->level_user = $request->level;
            $pengguna->save();
            return redirect()->back()->with('update', 'update');
        }
    }

    public function userUpdate(Request $request, $id)
    {
        $user = User::findorFail($id);
        // dd($user);

        // $request->validate([
        //     'email' => 'required|unique:users',
        //     'nama' => 'required|min:6|max:255',
        //     'password' => 'required|min:6|confirmed',
        //     'alamat' => 'required',
        //     'telp' => 'required|size:12',
        //     'jenisKelamin' => 'required',
        //     'level_user' => 'required'
        // ]);

        if ($request->oldPassword == null) {
            if ($user->level_user == 'Admin') {
                Admin::where('user_id', $id)->update([
                    'nama_admin' => $request->nama,
                    'alamat_admin' => $request->alamat,
                    'telp_admin' => $request->telp,
                    'email_admin' => $request->email,
                    'jenisKelamin_admin' => $request->email
                ]);
            } elseif ($user->level_user == 'Calon Siswa') {
                CalonSiswa::where('user_id', $id)->update([
                    'nama_calonSiswa' => $request->nama,
                    'alamat_calonSiswa' => $request->alamat,
                    'telp_calonSiswa' => $request->telp,
                    'email_calonSiswa' => $request->email,
                    'jenisKelamin_calonSiswa' => $request->email
                ]);
            }
            Pengguna::where('id', $id)->update([
                'email' => $request->email
            ]);
            // dd($request);
            return redirect()->back()->with('update', 'update');
        } elseif ($request->oldPassword != null) {
            if (password_verify($request->oldPassword, $user->password)) {
                if ($user->level_user == 'Admin') {
                    Admin::where('user_id', $id)->update([
                        'nama_admin' => $request->nama,
                        'alamat_admin' => $request->alamat,
                        'telp_admin' => $request->telp,
                        'email_admin' => $request->email,
                        'jenisKelamin_admin' => $request->email
                    ]);
                } elseif ($user->level_user == 'Calon Siswa') {
                    CalonSiswa::where('user_id', $id)->update([
                        'nama_calonSiswa' => $request->nama,
                        'alamat_calonSiswa' => $request->alamat,
                        'telp_calonSiswa' => $request->telp,
                        'email_calonSiswa' => $request->email,
                        'jenisKelamin_calonSiswa' => $request->email
                    ]);
                }
                Pengguna::where('id', $id)->update([
                    'email' => $request->email,
                    'password' => bcrypt($request->password)
                ]);
                Auth::logout();
                return redirect()->back();
            } else {
                return redirect()->back()->with('fUpdate', 'Failed');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengguna = Pengguna::findorFail($id);
        if ($pengguna->level_user == 'Admin') {
            Admin::where('user_id', $id)->delete();
            $pengguna->delete();
        } elseif ($pengguna->level_user = 'Calon Siswa') {
            CalonSiswa::where('user_id', $id)->delete();
            $pengguna->delete();
        }
        return redirect()->back()->with('hapus', 'Hapus');
    }
}
