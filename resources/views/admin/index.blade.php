@extends('layouts.master')

@section('pwd', 'Home')
@section('now', 'Dashboard')
@section('dashboard', 'active')

@section('content')
    @if (session('fUpdate'))
        @include('../layouts/sweetalert/gagal/update')
    @endif
    <div class="container-fluid mt-2">
        <h1><strong>SELAMAT DATANG</strong></h1>
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="{{ Auth::user()->level_user == "Admin" ? 'col-md-4' : 'col-md-4' }}">
                                <a href="{{ url('view/kriteria') }}">
                                    <div class="card bg-indigo-400">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <strong><h1>{{ $kriteria }}</h1></strong>
                                                    Jumlah Data Kriteria
                                                </div>
                                                <div class="col-md-3">
                                                    <span class="fa fa-book-open fa-5x"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <center><span class="fa fa-arrow-alt-circle-right"></span> Info lengkap</center>
                                        </div>
                                    </div>
                                </a>
                            </div>
        
                            @if (Auth::user()->level_user == "Admin")
                                <div class="{{ Auth::user()->level_user == "Admin" ? 'col-md-4' : 'col-md-6' }}">
                                    <a href="{{ url('view/alternatif') }}">
                                        <div class="card bg-green-400">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <strong><h1>{{ $alternatif }}</h1></strong>
                                                        Jumlah Data Alternatif Default
                                                    </div>
                                                    <div class="col-md-3">
                                                        <span class="fa fa-book fa-5x"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <center><span class="fa fa-arrow-alt-circle-right"></span> Info lengkap</center>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @elseif (Auth::user()->level_user == "Calon Siswa")
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="{{ url('view/alternatif/user') }}">
                                                <div class="card bg-danger-400">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <strong><h1>{{ $countAlter }}</h1></strong>
                                                                Jumlah Data Alternatif Siswa
                                                            </div>
                                                            <div class="col-md-3">
                                                                <span class="fa fa-book fa-5x"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <center><span class="fa fa-arrow-alt-circle-right"></span> Info lengkap</center>
                                                    </div>
                                                </div>
                                            </a>
        
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{ url('view/alternatif') }}">
                                                <div class="card bg-green-400">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <strong><h1>{{ $alternatif }}</h1></strong>
                                                                Jumlah Data Alternatif Default
                                                            </div>
                                                            <div class="col-md-3">
                                                                <span class="fa fa-book fa-5x"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <center><span class="fa fa-arrow-alt-circle-right"></span> Info lengkap</center>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
        
                            @if (Auth::user()->level_user == "Admin")
                            <div class="col-md-4">
                                <a href="{{ url('view/pengguna') }}">
                                    <div class="card bg-danger-400">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <strong><h1>{{ $calonSiswa }}</h1></strong>
                                                    Jumlah Data Calon Siswa
                                                </div>
                                                <div class="col-md-3">
                                                    <span class="fa fa-user fa-5x"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <center><span class="fa fa-arrow-alt-circle-right"></span> Info lengkap</center>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
        
                    {{-- Modal Update --}}
                    <div class="container">
                        <div class="modal fade" id="profil{{Auth::user()->id}}" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Update Profil</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    @foreach ($user as $user)
                                        <div class="modal-body">
                                            <form action="/update/user/{{ $user->id }}" method="POST">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <label for="nama" class="control-label">Nama</label>
                                                    <input type="text" name="nama" id="nama" class="form-control" value="{{ $user->level_user == 'Admin' ? $user->admin['nama_admin'] :  $user->calonSiswa['nama_calonSiswa'] }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email" class="control-label">Email</label>
                                                    <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="alamat" class="control-label">Alamat</label>
                                                    <input type="text" name="alamat" id="alamat" class="form-control" value="{{ $user->level_user == 'Admin' ? $user->admin['alamat_admin'] :  $user->calonSiswa['alamat_calonSiswa'] }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="telp" class="control-label">Telp</label>
                                                    <input type="tel" name="telp" id="telp" class="form-control" value="{{ $user->level_user == 'Admin' ? $user->admin['telp_admin'] :  $user->calonSiswa['telp_calonSiswa'] }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="jenisKelamin" class="control-label">Jenis Kelamin</label>
                                                    <select name="jenisKelamin" id="jenisKelamin" class="form-control">
                                                        <option value="Laki - Laki" 
                                                            @if($user->level_user == 'Admin')
                                                                @if($user->admin['jenisKelamin_admin'] == 'Laki - Laki')
                                                                    selected
                                                                @endif
                                                            @else
                                                                @if($user->calonSiswa['jenisKelamin_calonSiswa'] == 'Laki - Laki')
                                                                    selected
                                                                @endif
                                                            @endif
                                                        >Laki - Laki</option>
                                                        <option value="Perempuan" 
                                                            @if($user->level_user == 'Admin')
                                                                @if($user->admin['jenisKelamin_admin'] == 'Perempuan')
                                                                    selected
                                                                @endif
                                                            @else
                                                                @if($user->calonSiswa['jenisKelamin_calonSiswa'] == 'Perempuan')
                                                                    selected
                                                                @endif
                                                            @endif
                                                        >Perempuan</option>
                                                    </select>
                                                </div>
                                                <hr>
                                                <div class="form-group">
                                                    <label for="oldPass">Password Lama</label>
                                                    <input type="password" name="oldPassword" class="form-control"placeholder="masukkan password lama">
                                                </div>
                                                <div class="form-group">
                                                    <label for="newPass">Password Baru</label>
                                                    <input type="password" name="password" class="form-control"placeholder="masukkan password baru">
                                                </div>
                                                <div class="form-group">
                                                    <label for="newPass">Konfirmasi Password Baru</label>
                                                    <input type="password" name="password_confirmation" class="form-control" placeholder="masukkan konfirmasi password">
                                                    <span class="mt-1 font-size-xs font-weight-semibold">* kosongkan password jika tidak ingin mengganti password</span>
                                                </div>
                                            </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-success btn-lg">Update</button>
                                            </form>
                                        </div>
                                    @endforeach
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- End Modal --}}
        
                    {{-- <div class="container-fluid">
                        <div class="row ml-1 mb-3">
                            <table class="table table-active">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($default as $item)
                                        <tr>
                                            <td>
                                                {{$item['nama_alternatif']}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table> --}}
                            
                        </div>
                    </div>
                        
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h1><strong>INFORMASI</strong></h1>
                        </div>
                    </div>
                    <div class="card-body">
                        <ol>
                            <li>Data Kriteria merupakan data yang digunakan sebagai acuan untuk penilaian terhadap alternatif</li>
                            @if (Auth::user()->level_user == 'Calon Siswa')
                                <li>Data alternatif siswa merupakan data alternatif yang dimiliki oleh siswa yang untuk dilakukan penilaian selain dapat menggunakan alternatif default yang terdapat pada sistem</li> 
                                <li>Data alternatif default merupakan data alternatif yang terdapat secara default pada sistem dan dapat digunakan sebagai alternatif default untuk dilakukan perhitungan jika tidak ingin menggunakan alternatif sendiri</li>
                            @endif
                            @if (Auth::user()->level_user == 'Admin')
                            <li>Data alternatif default merupakan data alternatif yang terdapat secara default pada sistem dan dapat digunakan sebagai alternatif default untuk dilakukan perhitungan</li>
                                <li>Data pengguna merupakan jumlah pengguna siswa yang terdaftar pada sistem</li>
                            @endif
                            </ol>
                    </div>
                </div>
            </div>

        </div>

    </div>
    
@endsection