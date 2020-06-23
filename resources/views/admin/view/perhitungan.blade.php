@extends('../layouts.master')

@section('pwd', 'Insert')

@section('url', url('/perhitungan') )

@section('icon', 'icon-user')

@section('now', 'Perhitungan')

@section('link-active-perhitungan', 'active')
@section('menu-perhitungan', 'nav-item-expanded nav-item-open')

@section('content')
    
    <div class="container-fluid mt-2">
        <div class="card">
            <div class="card-header">
                <h3>Hasil Analisa</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>Nama</th>
                            @foreach ($kriteria as $krit)
                                <th>{{$krit['nama_kriteria']}}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $al)
                            <tr>
                                <td>{{$al['nama_alternatif']}}</td>
                                @foreach ($al->nilai as $nilai)
                                    <td>{{ $nilai['nilai'] == "3" ? "Baik" : ($nilai['nilai'] == "2" ? "Sedang" : "Buruk") }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <table class="table table-bordered mt-2">
                    <thead>
                        <tr class="text-center">
                            <th>Nama</th>
                            @foreach ($kriteria as $krit)
                                <th>{{$krit['nama_kriteria']}}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $al)
                            <tr>
                                <td>{{$al['nama_alternatif']}}</td>
                                @foreach ($al->nilai as $nilai)
                                    <td>
                                        {{ $nilai['nilai'] }}
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>

       

        {{-- Contoh --}}
        <div class="card">
            <div class="card-header">
                <h3 class="float-left">Normalisasi</h3>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Nama</th>
                                <?php $bobot = [] ?>
                                @foreach($kriteria as $krit)
                                    <?php $bobot[$krit->id] = $krit->bobot_kriteria ?>
                                    <th class="text-center">{{$krit->nama_kriteria}}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <?php $rangking = []; ?>
                            @foreach($alternatif as $al)
                                <tr>
                                    <td>{{$al->nama_alternatif}}</td>
                                    <?php $total = 0;?>
                                    @foreach($al->nilai as $crip)
                                        @if($crip->kriteria->tipe_kriteria == 'Cost')
                                            <?php $normalisasi = ($kode_krit[$crip->kriteria->id]/$crip->nilai); ?>
                                        @elseif($crip->kriteria->tipe_kriteria == 'Benefit')
                                            <?php $normalisasi = ($crip->nilai/$kode_krit[$crip->kriteria->id]); ?>
                                        @endif
                                            <?php $total = $total+($bobot[$crip->kriteria->id]*$normalisasi);?>
                                            <td>{{round($normalisasi, 2)}}</td>
                                    @endforeach
                                    <?php $ranking[] = [
                                        // 'kode'  => $al->kode_alternatif,
                                        'nama'  => $al->nama_alternatif,
                                        'total' => $total
                                    ]; ?>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="table-responsive mt-4">
                    <p><i><strong><sup>*</sup> Nilai setelah normalisasi * dengan bobot setiap kriteria</strong></i></p>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Nama</th>
                                <?php $bobot = [] ?>
                                @foreach($kriteria as $krit)
                                    <?php $bobot[$krit->id] = $krit->bobot_kriteria ?>
                                    <th class="text-center">{{$krit->nama_kriteria}} ({{$krit->bobot_kriteria}})</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($alternatif as $al)
                                <tr>
                                    <td>{{$al->nama_alternatif}}</td>
                                    <?php $total = 0;?>
                                    @foreach($al->nilai->where('user_id', Auth::user()->id) as $crip)
                                        @if($crip->kriteria->tipe_kriteria == 'Cost')
                                            <?php $normalisasi = ($kode_krit[$crip->kriteria->id]/$crip->nilai) * $crip->kriteria->bobot_kriteria; ?>
                                        @elseif($crip->kriteria->tipe_kriteria == 'Benefit')
                                            <?php $normalisasi = ($crip->nilai/$kode_krit[$crip->kriteria->id]) * $crip->kriteria->bobot_kriteria; ?>
                                        @endif
                                        <?php $total = round($total+($bobot[$crip->kriteria->id]*$normalisasi), 2);?>
                                        <td>{{round($normalisasi, 2)}}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        {{-- Ranking --}}
        <div class="card">
            <div class="card-header">
                <h2>Ranking</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>Nama</th>
                                <th>Total</th>
                                <th>Ranking</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // usort($ranking, function($a, $b) {
                                //     return $a['total']<=>$b['total'];
                                // });
                                // rsort($ranking);
                                // $a = 1;

                                usort($ranking, function($a, $b) {
                                    if($a['total']==$b['total']) return 0;
                                    return $a['total'] < $b['total'];
                                });
                                // rsort($ranking);
                                $a = 1;
                            ?>
                            @foreach ($ranking as $posisi)
                                <tr>
                                    <td>{{$posisi['nama']}}</td>
                                    <td>{{round($posisi['total'], 2)}}</td>
                                    <td>{{$a++}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection