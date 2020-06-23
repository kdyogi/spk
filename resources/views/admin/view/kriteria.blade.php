@extends('../layouts.master')

@section('pwd', 'View')
@section('now', 'Kriteria')
@section('link-active-view', 'active')
@section('content')
@section('menu-view-kriteria', 'nav-item-expanded nav-item-open')
@section('menu-view', 'nav-item-expanded nav-item-open')

    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Data Kriteria</h5>
                        @if (Auth::user()->level_user == 'Admin')
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#adddata">Tambah Data</button>
                        @endif
                    </div>
                    
                    @if (session('tambah'))
                        @include('../layouts/sweetalert/tambah')
                    @endif
                    @if (session('hapus'))
                        @include('../layouts/sweetalert/hapus')
                    @endif
                    @if (session('update'))
                        @include('../layouts/sweetalert/update')
                    @endif

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered table-hover datatable-highlight">
                                    <thead>
                                        <tr class="text-center">
                                            <th width="10px">No</th>
                                            <th>Nama Kriteria</th>
                                            <th>Tipe Kriteria</th>
                                            <th>Bobot Kriteria</th>
                                            @if (auth()->user()->level_user == 'Admin')
                                            <th class="text-center">Actions</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kriteria as $kriteria)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $kriteria->nama_kriteria }}</td>
                                                <td>{{ $kriteria->tipe_kriteria }}</td>
                                                <td>{{ $kriteria->bobot_kriteria }}</td>
                                                @if (auth()->user()->level_user == 'Admin')
                                                <td class="text-center">
                                                    <button class="btn btn-primary" data-toggle="modal" data-target="#updatedata{{$kriteria->id}}"><i class="fas fa-edit mr-3 fa-1x"></i>Ubah</button>
                                                    <button class="btn btn-warning" data-toggle="modal" data-target="#deletedata{{$kriteria->id}}"><i class="fas fa-trash-alt mr-3 fa-1x"></i>Hapus</button>
                                                </td>
                                                @endif
                                            </tr>

                                            {{-- Modal Update --}}
                                            <div class="container">
                                                <div class="modal fade" id="updatedata{{$kriteria->id}}" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Update Kriteria</h4>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                        <div class="modal-body">
                                                            <form action="/update/kriteria/{{ $kriteria->id }}" method="POST">
                                                                {{ csrf_field() }}
                                                                <div class="form-group">
                                                                    <label for="nama_kriteria" class="control-label">Nama Kriteria</label>
                                                                    <input type="text" name="nama_kriteria" id="nama_kriteria" class="form-control" value="{{ $kriteria->nama_kriteria }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="tipe_kriteria" class="control-label">Tipe Kriteria</label>
                                                                    <select name="tipe_kriteria" id="tipe_kriteria" class="form-control">
                                                                        <option {{ $kriteria->tipe_kriteria == 'Benefit' ? 'selected' : '' }} value="Benefit">Benefit</option>
                                                                        <option {{ $kriteria->tipe_kriteria == 'Cost' ? 'selected' : '' }} value="Cost">Cost</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="bobot_kriteria" class="control-label">Bobot Kriteria</label>
                                                                    <input type="number" name="bobot_kriteria" id="bobot_kriteria" class="form-control" value="{{ $kriteria->bobot_kriteria }}">
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-success btn-lg">Update</button>
                                                        </div>
                                                    </form>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- End Modal --}}

                                            {{-- Modal Delete --}}
                                            <div class="modal fade" id="deletedata{{$kriteria->id}}" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Delete Kriteria</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                    <div class="modal-body">
                                                        {{-- <i class="fas fa-trash-alt mr-3 fa-5x"></i> --}}
                                                        <center><h2>Hapus Data ?</h1></center>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="/delete/kriteria/{{ $kriteria->id }}">
                                                            <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Batal</button>
                                                            <button type="button" class="btn btn-warning btn-lg">Hapus</button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            {{-- Modal Tambah --}}
                            <div class="modal fade" id="adddata" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Tambah Alternatif</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <form action="/kriteria" method="POST">
                                            {{ csrf_field() }}
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="nama_alternayif">Nama Kriteria</label>
                                                    <input type="text" class="form-control" name="nama_kriteria" id="nama_kriteria" required autocomplete="off">
                                                </div>
                                                <div class="form-group">
                                                    <label for="tipe_kriteria">Tipe Kriteria</label>
                                                    <select name="tipe_kriteria" id="tipe_kriteria" class="form-control @error('tipe_kriteria') is-invalid @enderror">
                                                        <option value="Benefit">Benefit</option>
                                                        <option value="Cost">Cost</option>
                                                    </select>
                                                    @error('nama_kriteria')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="bobot">Bobot</label>
                                                    <input type="number" class="form-control @error('bobot_kriteria') is-invalid @enderror" autofocus autocomplete="bobot_kriteria" placeholder="masukkan bobot kriteria" name="bobot_kriteria">
                                                    @error('bobot_kriteria')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-success btn-lg">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- End Modal --}}
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection