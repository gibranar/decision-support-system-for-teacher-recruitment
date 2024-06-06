@extends('partials.navbar')
@section('title', 'Kriteria dan Sub Kriteria')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Tabel Profil Standar yang Dipilih</p>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="example" class="display table table-striped table-borderless expandable-table"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Kriteria</th>
                                            <th>Sub Kriteria</th>
                                            <th>Nilai Profil Standar</th>
                                        </tr>
                                    </thead>
                                    @foreach ($subKriteria as $subKriteria)
                                        <tbody>
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $subKriteria->kriteria->nama }}</td>
                                                <td>{{ $subKriteria->desc }}</td>
                                                <td>{{ $subKriteria->nilai }}</td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Tabel Nilai Profil Calon Guru</p>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="example" class="display table table-striped table-borderless expandable-table"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Kriteria</th>
                                            <th>Sub Kriteria</th>
                                            <th>Nilai Profil</th>
                                        </tr>
                                    </thead>
                                    @foreach ($nilaiProfil as $nilaiProfil)
                                        <tbody>
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $nilaiProfil->cagur->nama }}</td>
                                                <td>{{ $nilaiProfil->subKriteria->kriteria->nama }}</td>
                                                <td>{{ $nilaiProfil->subKriteria->desc }}</td>
                                                <td>{{ $nilaiProfil->nilai_profil }}</td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Tabel Perhitungan</p>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="example" class="display table table-striped table-borderless expandable-table"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Nilai Profil Calon Guru</th>
                                            <th>Nilai Profil Standar</th>
                                            <th>Gap</th>
                                            <th>Nilai Bobot Gap</th>
                                            <th>Jenis Kriteria</th>
                                            <th>Jumlah Nilai</th>
                                            <th>Rata-Rata</th>
                                            <th>Total Nilai</th>
                                        </tr>
                                    </thead>
                                    @foreach ($perhitungan as $perhitungan)
                                        <tbody>
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $perhitungan->cagur->nama }}</td>
                                                <td>{{ $perhitungan->subKriteria->nilai }}</td>
                                                <td>{{ $perhitungan->subKriteria->nilai }}</td>
                                                <td>{{ $perhitungan->gap }}</td>
                                                <td>{{ $perhitungan->bobot_gap }}</td>
                                                <td>{{ $perhitungan->subKriteria->kriteria->jenis }}</td>
                                                <td>{{ $perhitungan->jumlah_nilai }}</td>
                                                <td>{{ $perhitungan->rata_rata }}</td>
                                                <td>{{ $perhitungan->total_nilai }}</td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Tabel Ranking</p>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="example" class="display table table-striped table-borderless expandable-table"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Total Nilai</th>
                                            <th>Rank</th>
                                        </tr>
                                    </thead>
                                    @foreach ($ranking as $ranking)
                                        <tbody>
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $ranking->cagur->nama }}</td>
                                                <td>{{ $ranking->total_nilai }}</td>
                                                <td>{{ $ranking->rank }}</td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
