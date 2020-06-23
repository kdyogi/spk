@extends('../layouts.master')

@section('pwd', 'Insert')
@section('now', 'Kriteria')
@section('insert', 'active')
@section('menu-insert-kriteria', 'nav-item-expanded nav-item-open')
@section('menu-insert', 'nav-item-expanded nav-item-open')
@section('link-active-insert-kriteria', 'active')

@section('content')
    <div class="container-fluid mt-2">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Form Input Kriteria</h5>
            </div>
            <div class="card-body">
                <form action="/kriteria" method="POST">
                    {{{ csrf_field() }}}
                    <div class="form-group row">
                        <label for="kriteria" class="col-form-label col-lg-1">Kriteria</label>
                        <div class="col-lg-4">
                            <input type="text" name="nama_kriteria" class="form-control @error('nama_kriteria') is-invalid @enderror" autofocus autocomplete="nama_kriteria" placeholder="masukkan nama kriteria">
                            @error('nama_kriteria')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tipe_kriteria" class="col-form-label col-lg-1">Tipe Kriteria</label>
                        <div class="col-lg-4">
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
                    </div>

                    <div class="form-group row">
                        <label for="bobot" class="col-form-label col-lg-1">Bobot</label>
                        <div class="col-lg-4">
                            <input type="number" class="form-control @error('bobot_kriteria') is-invalid @enderror" autofocus autocomplete="bobot_kriteria" placeholder="masukkan bobot kriteria" name="bobot_kriteria">
                            @error('bobot_kriteria')
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


        {{-- <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="id">ID:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="fid" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="name">Name:</label>
                                <div class="col-sm-10">
                                    <input type="name" class="form-control" id="n">
                                </div>
                            </div>
                        </form>
                        <div class="deleteContent">
                            Are you Sure you want to delete <span class="dname"></span> ? <span
                                class="hidden did"></span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn actionBtn" data-dismiss="modal">
                                <span id="footer_action_button" class='glyphicon'> </span>
                            </button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal">
                                <span class='glyphicon glyphicon-remove'></span> Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        {{-- <script src="{{ url('assets/js/script.js')}}"></script> --}}
    </div>

@endsection
