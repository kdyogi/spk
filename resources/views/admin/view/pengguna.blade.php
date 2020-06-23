@extends('../layouts.master')

@section('pwd', 'View')

@section('url', url('/view/pengguna') )

@section('icon', 'icon-user')

@section('now', 'Pengguna')

@section('view', 'active')
@section('menu-view-pengguna', 'nav-item-expanded nav-item-open')
@section('menu-view', 'nav-item-expanded nav-item-open')
@section('link-active-pengguna', 'active')

@section('content')

    <div class="container-fluid mt-2">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Data Pengguna</h5>
            </div>
            
            @if (session('hapus'))
                @include('../layouts/sweetalert/hapus')
            @endif
            @if (session('update'))
                @include('../layouts/sweetalert/update')
            @endif

            <div class="card-body">

                <div class="row">
                        <div class="col-md-11"></div>
                        <div class="col-md-1">
                            <a href="{{ url('insert/pengguna') }}">
                                <button type="button" class="btn btn-success">+ | Add Data</button>
                            </a>
                        </div>
                    </div>
                <table class="table table-bordered table-hover datatable-highlight">
						<thead>
							<tr>
								<th>No</th>
								<th>User Id</th>
								<th>Nama Pengguna</th>
								<th>Username</th>
								<th>Level</th>
								<th class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody>
                            @foreach ($user as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->id }}</td>
                                    <td>
                                        @if ($user->level_user == 'Admin')
                                            {{ $user->admin['nama_admin'] }}
                                        @else
                                            {{ $user->calonSiswa['nama_calonSiswa'] }}
                                        @endif
                                        {{-- {{ $user->level_user == 'Admin' ? $user->admin['nama_admin'] : $user->calonSiswa['nama_calonSiswa'] }} --}}
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->level_user }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#editdata{{$user->id}}"><i class="fas fa-edit mr-3 fa-1x"></i>Ubah</button>
                                        <button class="btn btn-warning" data-toggle="modal" data-target="#deletedata{{$user->id}}"><i class="fas fa-trash-alt mr-3 fa-1x"></i>Hapus</button>
                                    </td>
                                </tr>

                                {{-- Modal Ubah --}}
                                <div class="modal fade" id="editdata{{$user->id}}" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Update Pengguna</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <form action="/update/pengguna/{{ $user->id }}" method="POST">
                                                {{ @csrf_field() }}
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="nama">Nama</label>
                                                        <input type="text" id="nama" name="nama" class="form-control" required value="{{ $user->level_user == 'Admin' ? $user->admin['nama_admin'] : $user->calonSiswa['nama_calonSiswa'] }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="level">Level</label>
                                                        <select name="level" id="level" class="form-control">
                                                            <option value="Admin" {{ $user->level_user == 'Admin' ? 'selected' : '' }}>Admin</option>
                                                            <option value="Calon Siswa" {{ $user->level_user == 'Calon Siswa' ? 'selected' : '' }}>Calon Siswa</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-warning btn-lg">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- End Modal --}}


                                {{-- Modal Delete --}}
                                <div class="modal fade" id="deletedata{{$user->id}}" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Delete Pengguna</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                        <div class="modal-body">
                                            <center><h2>Hapus Data ?</h1></center>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="/delete/pengguna/{{ $user->id }}">
                                                <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Batal</button>
                                                <button type="button" class="btn btn-warning btn-lg">Hapus</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                {{-- End Modal --}}

                                

                            @endforeach
						</tbody>
					</table>
            </div>
        </div>
    </div>

@endsection