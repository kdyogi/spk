@extends('layouts.app')

@section('content')
<div class="content full-page register-page section-image" filter-color="black" data-image="{{url('assets/login/image/bg13.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-md-5 ml-auto">
                <div class="info-area info-horizontal mt-5">
                    <div class="icon icon-primary">
                        <i class="now-ui-icons media-2_sound-wave"></i>
                    </div>
                    <div class="description">
                        <h5 class="info-title">Sistem Pendukung Keputusan</h5>
                        <p class="description">
                            Penentuan Lembaga Bimbingan Belajar
                            bagi Calon Peserta SBMPTN
                            Menggunakan Metode SAW
                        </p>
                    </div>
                </div>

                {{-- <div class="info-area info-horizontal">
                    <div class="icon icon-primary">
                        <i class="now-ui-icons media-1_button-pause"></i>
                    </div>
                    <div class="description">
                        <h5 class="info-title">Fully Coded in HTML5</h5>
                        <p class="description">
                            We've developed the website with HTML5 and CSS3. The client has access to the code using GitHub.
                        </p>
                    </div>
                </div>

                <div class="info-area info-horizontal">
                    <div class="icon icon-info">
                        <i class="now-ui-icons users_single-02"></i>
                    </div>
                    <div class="description">
                        <h5 class="info-title">Built Audience</h5>
                        <p class="description">
                            There is also a Fully Customizable CMS Admin Dashboard for this product.
                        </p>
                    </div>
                </div> --}}
            </div>
            <div class="col-md-4 mr-auto">
                <div class="card card-signup text-center">
                    <div class="card-header ">
                        <h4 class="card-title">Register</h4>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="now-ui-icons users_circle-08"></i></span>
                            </div>
                            <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" autocomplete="nama" autofocus placeholder="Nama">
                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="now-ui-icons ui-1_email-85"></i></span>
                            </div>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="now-ui-icons objects_key-25"></i></span>
                            </div>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="now-ui-icons arrows-1_refresh-69"></i></span>
                            </div>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder="Konfirmasi Password">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="now-ui-icons travel_istanbul"></i></span>
                            </div>
                            <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" autocomplete="alamat" autofocus placeholder="Alamat">
                            @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="now-ui-icons users_single-02"></i></span>
                            </div>
                            <input id="telp" type="number" class="form-control @error('telp') is-invalid @enderror" name="telp" value="{{ old('telp') }}" autocomplete="telp" autofocus placeholder="Telp">
                            @error('telp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="radio" name="jenisKelamin" class="@error('jenisKelamin') is-invalid @enderror" value="Laki - Laki"> Laki - Laki
                                </div>
                                <div class="col-md-6">
                                    <input type="radio" name="jenisKelamin" class="@error('jenisKelamin') is-invalid @enderror" value="Perempuan"> Perempuan
                                </div>
                            </div>
                            @error('jenisKelamin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="full-page register-page section-image" filter-color="black" data-image="{{url('assets/login/image/bg13.jpg')}}">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-5 ml-auto">
                    <div class="info-area info-horizontal mt-5">
                        <div class="icon icon-primary">
                            <i class="now-ui-icons media-2_sound-wave"></i>
                        </div>
                        <div class="description">
                            <h5 class="info-title">Marketing</h5>
                            <p class="description">
                                We've created the marketing campaign of the website. It was a very interesting collaboration.
                            </p>
                        </div>
                    </div>

                    <div class="info-area info-horizontal">
                        <div class="icon icon-primary">
                            <i class="now-ui-icons media-1_button-pause"></i>
                        </div>
                        <div class="description">
                            <h5 class="info-title">Fully Coded in HTML5</h5>
                            <p class="description">
                                We've developed the website with HTML5 and CSS3. The client has access to the code using GitHub.
                            </p>
                        </div>
                    </div>

                    <div class="info-area info-horizontal">
                        <div class="icon icon-info">
                            <i class="now-ui-icons users_single-02"></i>
                        </div>
                        <div class="description">
                            <h5 class="info-title">Built Audience</h5>
                            <p class="description">
                                There is also a Fully Customizable CMS Admin Dashboard for this product.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mr-auto">
                    <div class="card card-signup text-center">
                        <div class="card-header ">
                            <h4 class="card-title">Register</h4>
                        </div>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
    
                            <div class="form-group row">
                                <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>
    
                                <div class="col-md-6">
                                    <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" autocomplete="nama" autofocus>
    
                                    @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>
    
                                <div class="col-md-6">
                                    <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" autocomplete="alamat" autofocus>
    
                                    @error('telp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="telp" class="col-md-4 col-form-label text-md-right">{{ __('Telp') }}</label>
    
                                <div class="col-md-6">
                                    <input id="telp" type="number" class="form-control @error('telp') is-invalid @enderror" name="telp" value="{{ old('telp') }}" autocomplete="telp" autofocus>
    
                                    @error('telp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="jenisKelamin" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Kelamin') }}</label>
    
                                <div class="col-md-6">
                                    <input type="radio" name="jenisKelamin" class="@error('jenisKelamin') is-invalid @enderror" value="Laki - Laki"> Laki - Laki
                                    <input type="radio" name="jenisKelamin" class="@error('jenisKelamin') is-invalid @enderror" value="Perempuan"> Perempuan
                                    @error('jenisKelamin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}


{{-- Contoh --}}
{{-- <form class="form" method="POST" action="{{ route('register') }}">
    <div class="card-body ">    
        @csrf
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="now-ui-icons users_circle-08"></i>
                </div>
            </div>
            <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" autocomplete="nama" autofocus placeholder="Nama">
            @error('nama')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="now-ui-icons ui-1_email-85"></i>
                </div>                                
            </div>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="now-ui-icons objects_key-25"></i>
                </div>
            </div>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="now-ui-icons arrows-1_refresh-69"></i>
                </div>
            </div>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder="Confirm Password">
        </div>

        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="now-ui-icons travel_istanbul"></i>
                </div>                                
            </div>
            <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" autocomplete="alamat" autofocus placeholder="Alamat">

            @error('alamat')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="now-ui-icons users_circle-08"></i>
                </div>                                
            </div>
            <input id="telp" type="number" class="form-control @error('telp') is-invalid @enderror" name="telp" value="{{ old('telp') }}" autocomplete="telp" autofocus placeholder="Telp">

            @error('telp')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="now-ui-icons users_single-02"></i>
                </div>                                
            </div>
            <select name="jenisKelammin" id="jenisKelamin" class="form-control">
                <option value="Laki - Laki">Laki - Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary btn-round btn-lg">
            {{ __('Register') }}
        </button>
    </div>
</form> --}}
@endsection
