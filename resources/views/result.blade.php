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
                                    @foreach ($nilaiProfils as $nilaiProfil)
                                        <tbody>
                                            <tr>
                                                <td>{{ ($nilaiProfils->currentPage() - 1) * $nilaiProfils->perPage() + $loop->iteration }}
                                                </td>
                                                <td>{{ $nilaiProfil->cagur->nama }}</td>
                                                <td>{{ $nilaiProfil->subKriteria->kriteria->nama }}</td>
                                                <td>{{ $nilaiProfil->subKriteria->desc }}</td>
                                                <td>{{ $nilaiProfil->nilai_profil }}</td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>

                                {{-- PAGINATED --}}
                                <div class="mt-4" style="width: fit-content; height: fit-content">
                                    <ul class="pagination">
                                        {{-- Previous Page Link --}}
                                        @if ($nilaiProfils->onFirstPage())
                                            <li class="page-item disabled" aria-disabled="true"
                                                aria-label="@lang('pagination.previous')">
                                                <span class="page-link" aria-hidden="true">&lsaquo;</span>
                                            </li>
                                        @else
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $nilaiProfils->previousPageUrl() }}"
                                                    rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                                            </li>
                                        @endif

                                        {{-- Numbered Page Links --}}
                                        @for ($i = 1; $i <= $nilaiProfils->lastPage(); $i++)
                                            <li class="page-item {{ $nilaiProfils->currentPage() == $i ? 'active' : '' }}">
                                                <a class="page-link"
                                                    href="{{ $nilaiProfils->url($i) }}">{{ $i }}</a>
                                            </li>
                                        @endfor

                                        {{-- Next Page Link --}}
                                        @if ($nilaiProfils->hasMorePages())
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $nilaiProfils->nextPageUrl() }}"
                                                    rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                                            </li>
                                        @else
                                            <li class="page-item disabled" aria-disabled="true"
                                                aria-label="@lang('pagination.next')">
                                                <span class="page-link" aria-hidden="true">&rsaquo;</span>
                                            </li>
                                        @endif
                                    </ul>
                                    <div class="pagination-info">
                                        Total data: {{ $nilaiProfils->total() }} | Halaman:
                                        {{ $nilaiProfils->currentPage() }} dari
                                        {{ $nilaiProfils->lastPage() }}
                                    </div>
                                </div>
                                {{-- PAGINATED END --}}

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
                    <p class="card-title">Tabel Perhitungan Gap</p>
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
                                            <th>Nilai Profil Calon Guru</th>
                                            <th>Nilai Profil Standar</th>
                                            <th>Gap</th>
                                            <th>Nilai Bobot Gap</th>
                                            <th>Jenis Kriteria</th>
                                        </tr>
                                    </thead>
                                    @foreach ($perhitunganGaps as $perhitungan)
                                        <tbody>
                                            <tr>
                                                <td>{{ ($perhitunganGaps->currentPage() - 1) * $perhitunganGaps->perPage() + $loop->iteration }}
                                                </td>
                                                <td>{{ $perhitungan->cagur->nama }}</td>
                                                <td>{{ $perhitungan->subKriteria->kriteria->nama }}</td>
                                                <td>{{ $perhitungan->subKriteria->nilai }}</td>
                                                <td>{{ $perhitungan->ideal_profil }}</td>
                                                <td>{{ $perhitungan->gap }}</td>
                                                <td>{{ $perhitungan->bobot_gap }}</td>
                                                <td>{{ $perhitungan->subKriteria->kriteria->jenis }}</td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>

                                {{-- PAGINATED --}}
                                <div class="mt-4" style="width: fit-content; height: fit-content">
                                    <ul class="pagination">
                                        {{-- Previous Page Link --}}
                                        @if ($perhitunganGaps->onFirstPage())
                                            <li class="page-item disabled" aria-disabled="true"
                                                aria-label="@lang('pagination.previous')">
                                                <span class="page-link" aria-hidden="true">&lsaquo;</span>
                                            </li>
                                        @else
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $perhitunganGaps->previousPageUrl() }}"
                                                    rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                                            </li>
                                        @endif

                                        {{-- Numbered Page Links --}}
                                        @for ($i = 1; $i <= $perhitunganGaps->lastPage(); $i++)
                                            <li
                                                class="page-item {{ $perhitunganGaps->currentPage() == $i ? 'active' : '' }}">
                                                <a class="page-link"
                                                    href="{{ $perhitunganGaps->url($i) }}">{{ $i }}</a>
                                            </li>
                                        @endfor

                                        {{-- Next Page Link --}}
                                        @if ($perhitunganGaps->hasMorePages())
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $perhitunganGaps->nextPageUrl() }}"
                                                    rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                                            </li>
                                        @else
                                            <li class="page-item disabled" aria-disabled="true"
                                                aria-label="@lang('pagination.next')">
                                                <span class="page-link" aria-hidden="true">&rsaquo;</span>
                                            </li>
                                        @endif
                                    </ul>
                                    <div class="pagination-info">
                                        Total data: {{ $perhitunganGaps->total() }} | Halaman:
                                        {{ $perhitunganGaps->currentPage() }} dari
                                        {{ $perhitunganGaps->lastPage() }}
                                    </div>
                                </div>
                                {{-- PAGINATED END --}}

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
                    <p class="card-title">Tabel Perhitungan Akhir</p>
                    <form action="{{ route('storeResult') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success text-light fw-medium mb-4">Lakukan
                            Perhitungan</button>
                    </form>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="example" class="display table table-striped table-borderless expandable-table"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Jenis Kriteria</th>
                                            <th>Jumlah Nilai</th>
                                            <th>Rata-Rata</th>
                                            <th>Total Rata-Rata</th>
                                        </tr>
                                    </thead>
                                    @foreach ($perhitunganAkhirs as $perhitungan)
                                        <tbody>
                                            <tr>
                                                <td>{{ ($perhitunganAkhirs->currentPage() - 1) * $perhitunganAkhirs->perPage() + $loop->iteration }}
                                                </td>
                                                <td>{{ $perhitungan->cagur->nama }}</td>
                                                <td>{{ $perhitungan->subKriteria->kriteria->jenis }}</td>
                                                <td>{{ $perhitungan->jumlah_nilai }}</td>
                                                <td>{{ $perhitungan->rata_rata }}</td>
                                                <td>{{ $perhitungan->total_rata_rata }}</td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>

                                {{-- PAGINATED --}}
                                <div class="mt-4" style="width: fit-content; height: fit-content">
                                    <ul class="pagination">
                                        {{-- Previous Page Link --}}
                                        @if ($perhitunganAkhirs->onFirstPage())
                                            <li class="page-item disabled" aria-disabled="true"
                                                aria-label="@lang('pagination.previous')">
                                                <span class="page-link" aria-hidden="true">&lsaquo;</span>
                                            </li>
                                        @else
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $perhitunganAkhirs->previousPageUrl() }}"
                                                    rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                                            </li>
                                        @endif

                                        {{-- Numbered Page Links --}}
                                        @for ($i = 1; $i <= $perhitunganAkhirs->lastPage(); $i++)
                                            <li
                                                class="page-item {{ $perhitunganAkhirs->currentPage() == $i ? 'active' : '' }}">
                                                <a class="page-link"
                                                    href="{{ $perhitunganAkhirs->url($i) }}">{{ $i }}</a>
                                            </li>
                                        @endfor

                                        {{-- Next Page Link --}}
                                        @if ($perhitunganAkhirs->hasMorePages())
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $perhitunganAkhirs->nextPageUrl() }}"
                                                    rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                                            </li>
                                        @else
                                            <li class="page-item disabled" aria-disabled="true"
                                                aria-label="@lang('pagination.next')">
                                                <span class="page-link" aria-hidden="true">&rsaquo;</span>
                                            </li>
                                        @endif
                                    </ul>
                                    <div class="pagination-info">
                                        Total data: {{ $perhitunganAkhirs->total() }} | Halaman:
                                        {{ $perhitunganAkhirs->currentPage() }} dari
                                        {{ $perhitunganAkhirs->lastPage() }}
                                    </div>
                                </div>
                                {{-- PAGINATED END --}}

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
                    <form action="{{ route('storeRank') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success text-light fw-medium mb-4">Lihat Ranking</button>
                    </form>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="example"
                                    class="display table table-striped table-borderless expandable-table"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Total Nilai</th>
                                            <th>Rank</th>
                                        </tr>
                                    </thead>
                                    @foreach ($rankings as $ranking)
                                        <tbody>
                                            <tr>
                                                <td>{{ ($rankings->currentPage() - 1) * $rankings->perPage() + $loop->iteration }}</td>
                                                <td>{{ $ranking->cagur->nama }}</td>
                                                <td>{{ $ranking->total_nilai }}</td>
                                                <td>{{ $ranking->rank }}</td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>

                                {{-- PAGINATED --}}
                                <div class="mt-4" style="width: fit-content; height: fit-content">
                                    <ul class="pagination">
                                        {{-- Previous Page Link --}}
                                        @if ($rankings->onFirstPage())
                                            <li class="page-item disabled" aria-disabled="true"
                                                aria-label="@lang('pagination.previous')">
                                                <span class="page-link" aria-hidden="true">&lsaquo;</span>
                                            </li>
                                        @else
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $rankings->previousPageUrl() }}"
                                                    rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                                            </li>
                                        @endif

                                        {{-- Numbered Page Links --}}
                                        @for ($i = 1; $i <= $rankings->lastPage(); $i++)
                                            <li
                                                class="page-item {{ $rankings->currentPage() == $i ? 'active' : '' }}">
                                                <a class="page-link"
                                                    href="{{ $rankings->url($i) }}">{{ $i }}</a>
                                            </li>
                                        @endfor

                                        {{-- Next Page Link --}}
                                        @if ($rankings->hasMorePages())
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $rankings->nextPageUrl() }}"
                                                    rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                                            </li>
                                        @else
                                            <li class="page-item disabled" aria-disabled="true"
                                                aria-label="@lang('pagination.next')">
                                                <span class="page-link" aria-hidden="true">&rsaquo;</span>
                                            </li>
                                        @endif
                                    </ul>
                                    <div class="pagination-info">
                                        Total data: {{ $rankings->total() }} | Halaman:
                                        {{ $rankings->currentPage() }} dari
                                        {{ $rankings->lastPage() }}
                                    </div>
                                </div>
                                {{-- PAGINATED END --}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
