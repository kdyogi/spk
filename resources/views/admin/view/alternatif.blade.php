@extends('../layouts.master')

@section('pwd', 'view')

@section('now', 'Alternatif')

@section('link-active-view', 'active')
@section('link-active-alternatif', 'active')
@section('menu-view-alternatif', 'nav-item-expanded nav-item-open')
@section('menu-view', 'nav-item-expanded nav-item-open')

@section('content')

    <div class="container-fluid mt-2">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Data Alternatif</h5>
            </div>
            
            @if (session('hapus'))
                @include('../layouts/sweetalert/hapus')
            @endif
            @if (session('update'))
                @include('../layouts/sweetalert/update')
            @endif
            @if (session('tambah'))
                @include('../layouts/sweetalert/tambah')
            @endif

            
            <div class="card-body">
                <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#adddata">+ | Add Data</button>
                <div class="mt-4"></div>
                <table class="table table-bordered table-hover datatable-highlight">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Alternatif</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $alternatif)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $alternatif['nama_alternatif'] }} </td>
                                <td class="text-center">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#updatedata{{$alternatif->id}}"><i class="fas fa-edit mr-1 fa-1x"></i>Ubah</button>
                                    <button class="btn btn-warning" data-toggle="modal" data-target="#deletedata{{$alternatif->id}}"><i class="fas fa-trash-alt mr-1 fa-1x"></i>Hapus</button>
                                    @foreach ($alternatif->nilai->where('user_id', Auth::user()->id) as $nilai)
                                    @endforeach
                                    @if (count($alternatif->nilai->where('user_id', Auth::user()->id)) == 0)
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#nilai{{$alternatif->id}}"><i class="fas fa-edit mr-1 fa-1x"></i>Nilai</button>
                                    @else
                                        @if ($alternatif['id'] == $nilai['alternatif_id'])
                                        <span class="icon-checkmark-circle2 mr-3 icon-2x"></span>
                                        <button class="btn btn-secondary" data-toggle="modal" data-target="#dataNilai{{$nilai->alternatif_id}}"><i class="fas fa-compass mr-1 fa-1x"></i>Ubah Nilai</button>
                                        {{-- @else
                                            <button class="btn btn-secondary" data-toggle="modal" data-target="#nilai{{$alternatif->id}}"><i class="fas fa-compass mr-3 fa-1x"></i>Nilai</button> --}}
                                        @endif
                                    @endif
                                    {{-- @if (!empty($alternatif->nilai['0']))
                                        <span class="icon-checkmark-circle2 mr-3 icon-2x"></span>
                                    @else
                                    <button class="btn btn-secondary" data-toggle="modal" data-target="#nilai{{$alternatif->id}}"><i class="fas fa-compass mr-3 fa-1x"></i>Nilai</button>
                                    @endif --}}
                                </td>
                            </tr>

                            {{-- Modal Update --}}
                            <div class="container">
                                <div class="modal fade" id="updatedata{{$alternatif->id}}" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Update Alternatif</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                        <div class="modal-body">
                                            <form action="/update/alternatif/{{ $alternatif->id }}" method="POST">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <label for="nama_alternatif" class="control-label">Nama Alternatif</label>
                                                    <input type="text" name="nama_alternatif" id="nama_alternatif" class="form-control" value="{{ $alternatif->nama_alternatif }}">
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
                            <div class="modal fade" id="deletedata{{$alternatif->id}}" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Delete Alternatif</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            {{-- <i class="fas fa-trash-alt mr-3 fa-5x"></i> --}}
                                            <center><h2>Hapus Data ?</h1></center>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="/delete/alternatif/{{ $alternatif->id }}">
                                                <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Batal</button>
                                                <button type="button" class="btn btn-warning btn-lg">Hapus</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- End Modal --}}

                            {{-- Modal Tambah Nilai --}}
                            <div class="modal fade" id="nilai{{$alternatif->id}}" role="dialog">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Tambah Alternatif ({{$alternatif->nama_alternatif}})</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="modal-body">
                                                    <ol>
                                                        <li>Materi</li>
                                                            Kriteria materi ini berdasarkan mata 
                                                            pelajaran yang diberikan selama mengikuti 
                                                            bimbingan belajar, baik itu saintek ataupun 
                                                            soshum dan tes potensi akademik ataupun meliputi try out,
                                                            quis dan lain sebagainya
                                                            <ul>
                                                                <li>> 8 Materi (Baik)</li>
                                                                <li>5 Materi > 7 Materi (Sedang)</li>
                                                                <li>< 5 Materi (Buruk)</li>
                                                            </ul>
                                                        <li>Biaya</li>
                                                            Kriteria biaya ini berdasarkan harga yang 
                                                            dibayarkan untuk mengikuti bimbel selama 
                                                            masa 1 bulan atau intensif selama 1 bulan
                                                            <ul>
                                                                <li>1 Juta - 2 Juta (Baik)</li>
                                                                <li>> 2 Juta - 3 Juta (Sedang)</li>
                                                                <li>> 3 Juta (Buruk)</li>
                                                            </ul>
                                                        <li>Fasilitas</li>
                                                            Kriteria fasilitas ini berdasarkan fasilitas 
                                                            atau penunjang yang didapatkan selama mengikuti bimbel, seperti
                                                            ac, ruangdiskusi, konsultasi, bimbingan online, wifi dan lain 
                                                            sebagainya
                                                            <ul>
                                                                <li>> 7 Fasilitas (Baik)</li>
                                                                <li>4 Fasilitas > 7 Fasilitas (Sedang)</li>
                                                                <li><= 3 Fasilitas (Buruk)</li>
                                                            </ul>
                                                        <li>Jumlah Pertemuan</li>
                                                            Kriteria jumlah pertemuan ini merupakan jumlah 
                                                            pertemuan yang didapatkan selama mengikuti bimbel
                                                            <ul>
                                                                <li>> 12 Pertemuan (Baik)</li>
                                                                <li>9 Pertemuan > 10 Pertemuan (Sedang)</li>
                                                                <li><= 8 Pertemuan (Buruk)</li>
                                                            </ul>
                                                        <li>Kapasitas per Kelas</li>
                                                            Kriteria kapasitas per kelas ini merupakan jumlah 
                                                            siswa yang efisien diajar oleh pengajar
                                                            <ul>
                                                                <li>8 Siswa > 10 Siswa (Baik)</li>
                                                                <li>11 Siswa > 15 Siswa (Sedang)</li>
                                                                <li>> 15 Siswa (Buruk)</li>
                                                            </ul>
                                                    </ol>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <form action="/evaluasi/store" method="POST">
                                                    {{ csrf_field() }}
                                                    <div class="modal-body">
                                                        @foreach ($kriteria as $item)
                                                        <?php
                                                            $param = explode(" ", $item['nama_kriteria']);
                                                        ?>
                                                            <input type="text" name="alternatif_id[]" value="{{$alternatif->id}}" hidden>
        
                                                            <div class="form-group">
                                                                <label>{{ $item['nama_kriteria'] }}</label>
                                                                <input type="text" name="kriteria_id[]" value="{{$item['id']}}" hidden>
                                                                <select name="nilai[]" class="form-control">
                                                                    <option value="1">Buruk</option>
                                                                    <option value="2">Sedang</option>
                                                                    <option value="3">Baik</option>
                                                                </select>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-success btn-lg">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- End Modal --}}
                            
                            {{-- Modal Update Nilai--}}
                            @if (count($alternatif->nilai->where('user_id', Auth::user()->id)) > 0)
                                <div class="container">
                                    <div class="modal fade" id="dataNilai{{$nilai->alternatif_id}}" role="dialog">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Update Data Nilai Alternatif ({{$alternatif->nama_alternatif}})</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <ol>
                                                            <li>Materi</li>
                                                                Kriteria materi ini berdasarkan mata 
                                                                pelajaran yang diberikan selama mengikuti 
                                                                bimbingan belajar, baik itu saintek ataupun 
                                                                soshum dan tes potensi akademik ataupun meliputi try out,
                                                                quis dan lain sebagainya
                                                                <ul>
                                                                    <li>> 8 Materi (Baik)</li>
                                                                    <li>5 Materi > 7 Materi (Sedang)</li>
                                                                    <li>< 5 Materi (Buruk)</li>
                                                                </ul>
                                                            <li>Biaya</li>
                                                                Kriteria biaya ini berdasarkan harga yang 
                                                                dibayarkan untuk mengikuti bimbel selama 
                                                                masa 1 bulan atau intensif selama 1 bulan
                                                                <ul>
                                                                    <li>1 Juta - 2 Juta (Baik)</li>
                                                                    <li>> 2 Juta - 3 Juta (Sedang)</li>
                                                                    <li>> 3 Juta (Buruk)</li>
                                                                </ul>
                                                            <li>Fasilitas</li>
                                                                Kriteria fasilitas ini berdasarkan fasilitas 
                                                                atau penunjang yang didapatkan selama mengikuti bimbel, seperti
                                                                ac, ruangdiskusi, konsultasi, bimbingan online, wifi dan lain 
                                                                sebagainya
                                                                <ul>
                                                                    <li>> 7 Fasilitas (Baik)</li>
                                                                    <li>4 Fasilitas > 7 Fasilitas (Sedang)</li>
                                                                    <li><= 3 Fasilitas (Buruk)</li>
                                                                </ul>
                                                            <li>Jumlah Pertemuan</li>
                                                                Kriteria jumlah pertemuan ini merupakan jumlah 
                                                                pertemuan yang didapatkan selama mengikuti bimbel
                                                                <ul>
                                                                    <li>> 12 Pertemuan (Baik)</li>
                                                                    <li>9 Pertemuan > 10 Pertemuan (Sedang)</li>
                                                                    <li><= 8 Pertemuan (Buruk)</li>
                                                                </ul>
                                                            <li>Kapasitas per Kelas</li>
                                                                Kriteria kapasitas per kelas ini merupakan jumlah 
                                                                siswa yang efisien diajar oleh pengajar
                                                                <ul>
                                                                    <li>8 Siswa > 10 Siswa (Baik)</li>
                                                                    <li>11 Siswa > 15 Siswa (Sedang)</li>
                                                                    <li>> 15 Siswa (Buruk)</li>
                                                                </ul>
                                                        </ol>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="modal-body">
                                                            <form action="/evaluasi/nilai/{{ $alternatif->id }}" method="POST">
                                                                {{ csrf_field() }}
                                                                @foreach ($kriteria as $krit)
            
                                                                    <div class="form-group">
                                                                        <label>{{ $krit['nama_kriteria'] }}</label>
                                                                        <input type="text" name="kriteria_id[]" value="{{$krit['id']}}" hidden>
            
                                                                        @foreach ($krit->nilai->where('alternatif_id', $alternatif['id'])->where('user_id', Auth::user()->id) as $nilai)
                                                                            <select name="nilai[]" class="form-control">
                                                                                <option value="1" {{ $nilai['nilai'] == '1' ? 'selected' : ''}}>Buruk</option>
                                                                                <option value="2" {{ $nilai['nilai'] == '2' ? 'selected' : ''}}>Sedang</option>
                                                                                <option value="3" {{ $nilai['nilai'] == '3' ? 'selected' : ''}}>Baik</option>
                                                                            </select>
                                                                        @endforeach
            
                                                                        
                                                                    </div>
                                                                @endforeach
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-success btn-lg">Update</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            {{-- End Modal --}}

                        @endforeach
                    </tbody>
                    </table>
                    {{-- Modal Tambah --}}
                    <div class="modal fade" id="adddata" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambah Alternatif</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <form action="/alternatif" method="POST">
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="nama_alternayif">Nama Alternatif</label>
                                            <input type="text" class="form-control" name="nama_alternatif" id="nama_alternatif" required autocomplete="off">
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

@endsection