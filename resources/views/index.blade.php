@extends('partials.navbar')
@section('title', 'Dashboard')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Rekrutmen Guru</h3>
                    <h6 class="font-weight-normal mb-0">Mengajar dengan Hati, Menuntun Masa Depan!
                    </h6>
                </div>
                <div class="col-12 col-xl-4">
                    <div class="justify-content-end d-flex">
                        <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                            <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button"
                                id="dropdownMenuDate2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <i class="mdi mdi-calendar" id="datetime" style="font-style: normal;"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                <a class="dropdown-item" href="#">January</a>
                                <a class="dropdown-item" href="#">February</a>
                                <a class="dropdown-item" href="#">March</a>
                                <a class="dropdown-item" href="#">April</a>
                                <a class="dropdown-item" href="#">May</a>
                                <a class="dropdown-item" href="#">June</a>
                                <a class="dropdown-item" href="#">July</a>
                                <a class="dropdown-item" href="#">August</a>
                                <a class="dropdown-item" href="#">September</a>
                                <a class="dropdown-item" href="#">October</a>
                                <a class="dropdown-item" href="#">November</a>
                                <a class="dropdown-item" href="#">December</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card tale-bg">
                <div class="card-people mt-auto">
                    <img src="{{ asset('assets/images/dashboard/people.svg') }}" alt="people">
                    <div class="weather-info">
                        <div class="d-flex">
                            <div>
                                <h2 class="mb-0 font-weight-normal"><i class="icon-sun me-2"></i></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin transparent">
            <div class="row">
                <div class="col-md-12 mb-4 stretch-card transparent">
                    <div class="card bg-success">
                        <div class="card-body text-white">
                            <p class="mb-4 fs-4 fw-bold">Top 1</p>
                            <p class="fs-30 mb-3 lh-sm">{{ $top1 ? $top1->cagur->nama : 'Belum Ada' }} (Skor:
                                {{ $top1 ? $top1->total_nilai : '0' }})</p>
                            <p>081-225-445-621</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-tale">
                        <div class="card-body">
                            <p class="mb-4 fs-4 fw-bold">Top 2</p>
                            <p class="fs-30 mb-3 lh-sm">{{ $top2 ? $top2->cagur->nama : 'Belum Ada' }} (Skor:
                                {{ $top2 ? $top2->total_nilai : '0' }})</p>
                            <p>081-225-445-621</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-dark-blue">
                        <div class="card-body">
                            <p class="mb-4 fs-4 fw-bold">Top 3</p>
                            <p class="fs-30 mb-3 lh-sm">{{ $top3 ? $top3->cagur->nama : 'Belum Ada' }} (Skor:
                                {{ $top3 ? $top3->total_nilai : '0' }})</p>
                            <p>081-225-445-621</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                    <div class="card card-light-blue">
                        <div class="card-body">
                            <p class="mb-4 fs-4 fw-bold">Top 4</p>
                            <p class="fs-30 mb-3 lh-sm">{{ $top4 ? $top4->cagur->nama : 'Belum Ada' }} (Skor:
                                {{ $top4 ? $top4->total_nilai : '0' }})</p>
                            <p>081-225-445-621</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                    <div class="card card-light-danger">
                        <div class="card-body">
                            <p class="mb-4 fs-4 fw-bold">Top 5</p>
                            <p class="fs-30 mb-3 lh-sm">{{ $top5 ? $top5->cagur->nama : 'Belum Ada' }} (Skor:
                                {{ $top5 ? $top5->total_nilai : '0' }})</p>
                            <p>081-225-445-621</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card position-relative">
                <div class="card-body">
                    <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2"
                        data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-12 grid-margin stretch-card">
                                        <div class="card">
                                            <div class="card-body">
                                                <p class="card-title mb-0">{{ $kriteria1->nama }}</p>
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-borderless">
                                                        <thead>
                                                            <tr>
                                                                <th>Sub-Kriteria</th>
                                                                <th>Nilai</th>
                                                                <th>Ideal State</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($sub_kriteria1 as $subkriteria1)
                                                                <tr>
                                                                    <td>{{ $subkriteria1->desc }}</td>
                                                                    <td class="font-weight-bold">{{ $subkriteria1->nilai }}
                                                                    </td>
                                                                    <td>
                                                                        @if ($subkriteria1->selected == 1)
                                                                            <div class="badge badge-success">Dipilih</div>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @foreach ($kriteria as $kriteria)
                                <div class="carousel-item">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-md-12 grid-margin stretch-card">
                                            <div class="card">
                                                <div class="card-body">
                                                    <p class="card-title mb-0">{{ $kriteria->nama }}</p>
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-borderless">
                                                            <thead>
                                                                <tr>
                                                                    <th>Sub-Kriteria</th>
                                                                    <th>Nilai</th>
                                                                    <th>Ideal State</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($sub_kriteria[$kriteria->id] ?? [] as $subkriteria)
                                                                    <tr>
                                                                        <td>{{ $subkriteria->desc }}</td>
                                                                        <td class="font-weight-bold">
                                                                            {{ $subkriteria->nilai }}</td>
                                                                        <td>
                                                                            @if ($subkriteria->selected == 1)
                                                                                <div class="badge badge-success">Dipilih
                                                                                </div>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#detailedReports" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next" href="#detailedReports" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-sm-around">
        <div class="col-md-8 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">
                    <p class="card-title mb-0">Gap</p>
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th class="ps-0  pb-2 border-bottom">#</th>
                                    <th class="border-bottom pb-2">Selisih</th>
                                    <th class="border-bottom pb-2">Bobot Nilai</th>
                                    <th class="border-bottom pb-2">Keterangan</th>
                                </tr>
                            </thead>
                            @foreach ($gaps as $gap)
                            <tbody>
                                <tr>
                                    <td class="ps-0 pb-0">{{ $loop->iteration }}</td>
                                    <td class="pb-0">
                                        <p class="mb-0">{{ $gap->gap }}</p>
                                    </td>
                                    <td class="pb-0">{{ $gap->bobot_nilai }}</td>
                                    <td class="text-wrap">{{ $gap->keterangan }}
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card" style="height: fit-content">
                <div class="card-body">
                    <p class="card-title mb-0">Factor Percent</p>
                    <div class="daoughnutchart-wrapper">
                        <canvas id="north-america-chart"></canvas>
                    </div>
                    <div id="north-america-chart-legend">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
