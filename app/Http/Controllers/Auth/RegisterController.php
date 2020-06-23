<?php

namespace App\Http\Controllers\Auth;

use App\Pengguna;
use App\CalonSiswa;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'nama' => ['required', 'string', 'min:6', 'max:255'],
            'password' => ['required', 'min:6', 'confirmed'],
            'alamat' => ['required'],
            'telp' => ['required', 'size:12'],
            'jenisKelamin' => ['required']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        Pengguna::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'level_user' => 'Calon Siswa'
        ]);

        $id_user = Pengguna::where('email', $data['email'])->first();

        return CalonSiswa::create([
            'nama_calonSiswa' => $data['nama'],
            'alamat_calonSiswa' => $data['alamat'],
            'telp_calonSiswa' => $data['telp'],
            'jenisKelamin_calonSiswa' => $data['jenisKelamin'],
            'email_calonSiswa' => $data['email'],
            'user_id' => $id_user['id']
        ]);

        // return Pengguna::create([
        //     'name' => $data['nama'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        // ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        return $this->registered($request, $user)
            ?: redirect($this->redirectPath())->with('sukses', 'Registrasi Berhasil');
    }
}
