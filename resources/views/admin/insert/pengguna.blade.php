@extends('../layouts.master')

@section('pwd', 'Insert')

@section('now', 'Pengguna')
@section('insert', 'active')
@section('menu-insert-pengguna', 'nav-item-expanded nav-item-open')
@section('menu-insert', 'nav-item-expanded nav-item-open')
@section('link-active-insert-pengguna', 'active')

@section('content')
    <div class="container-fluid mt-2">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Form Input Pengguna</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('insert.pengguna') }}" method="POST">
                    {{{ csrf_field() }}}
                    <div class="form-group row">
                        <label for="nama" class="col-form-label col-lg-1">Nama Pengguna</label>
                        <div class="col-lg-4">
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" autofocus autocomplete="nama" placeholder="masukkan nama pengguna">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-form-label col-lg-1">Email Pengguna</label>
                        <div class="col-lg-4">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" autofocus autocomplete="email" placeholder="masukkan nama pengguna">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-form-label col-lg-1">Password</label>
                        <div class="col-lg-4">
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"  autofocus autocomplete="new-password" placeholder="masukkan password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password_confirmation" class="col-form-label col-lg-1">Password</label>
                        <div class="col-lg-4">
                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" autofocus autocomplete="new-password" placeholder="masukkan password_confirmation">
                            @error('password_confirmation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="alamat" class="col-form-label col-lg-1">Alamat Pengguna</label>
                        <div class="col-lg-4">
                            <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}" autofocus autocomplete="alamat" placeholder="masukkan alamat pengguna"></textarea>
                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="telp" class="col-form-label col-lg-1">Telp Pengguna</label>
                        <div class="col-lg-4">
                            <input type="tel" name="telp" class="form-control @error('telp') is-invalid @enderror" value="{{ old('telp') }}" autofocus autocomplete="telp" placeholder="masukkan nama kriteria">
                            @error('telp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="jenisKelamin" class="col-form-label col-lg-1">Jenis Kelamin</label>
                        <div class="col-lg-4">
                            <input type="radio" name="jenisKelamin" class="@error('jenisKelamin') is-invalid @enderror" value="Laki - Laki"> Laki - Laki
                            <input type="radio" name="jenisKelamin" class="@error('jenisKelamin') is-invalid @enderror" value="Perempuan"> Perempuan
                            @error('jenisKelamin')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="level" class="col-form-label col-lg-1">Level User</label>
                        <div class="col-lg-4">
                            <select name="level_user" id="level" class="form-control @error('level_user') is-invalid @enderror">
                                <option value="Admin">Admin</option>
                                <option value="Calon Siswa">Calon Siswa</option>
                            </select>
                            @error('level_user')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-2">
                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection