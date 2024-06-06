@extends('partials.navbar')
@section('title', 'Calon Guru')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Tambah Calon Guru</p>
                    <div class="row">
                        <div class="col-12">
                            <form class="forms-sample" action="{{ route('cagur.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        placeholder="Nama">
                                </div>
                                <div class="form-group">
                                    <label for="telp">Nomor Telpon</label>
                                    <input type="text" class="form-control" id="telp" name="telp"
                                        placeholder="Nomor Telpon">
                                </div>
                                @foreach ($kriteria as $kriteria)
                                    <div class="form-group">
                                        <label for="{{ $kriteria->name }}">{{ $kriteria->nama }}</label>
                                        <select class="form-select text-black" id="{{ $kriteria->nama }}"
                                            name="{{ $kriteria->nama }}">
                                            <option selected disabled>-- Pilih Opsi --</option>
                                            @foreach ($sub_kriteria[$kriteria->id] ?? [] as $subkriteria)
                                                <option value="{{ $subkriteria->desc }}">{{ $subkriteria->desc }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endforeach
                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                                <button class="btn btn-light">Cancel</button>
                            </form>
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
                    <p class="card-title">Tabel Calon Guru</p>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="example" class="display table table-striped table-borderless expandable-table"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Nomor Telepon</th>
                                            <th>Pendidikan</th>
                                            <th>IPK</th>
                                            <th>Umur</th>
                                            <th>Psikotes</th>
                                            <th>Pengalaman Mengajar</th>
                                            <th>Sertifikasi Keahlian</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    @foreach ($cagur as $cagur)
                                        <tbody>
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $cagur->nama }}</td>
                                                <td>{{ $cagur->telp }}</td>
                                                <td>{{ $cagur->Pendidikan }}</td>
                                                <td>{{ $cagur->IPK }}</td>
                                                <td>{{ $cagur->Umur }}</td>
                                                <td>{{ $cagur->Psikotes }}</td>
                                                <td>{{ $cagur->Pengalaman_Mengajar }}</td>
                                                <td>{{ $cagur->Sertifikasi_Keahlian }}</td>
                                                <td>
                                                    <form action="{{ route('cagur.destroy', $cagur->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" data-bs-toggle="modal"
                                                            data-id="{{ $cagur->id }}" data-bs-target="#staticBackdrop"
                                                            class="btn btn-primary text-light fw-medium">Edit</button>
                                                        <button type="submit"
                                                            class="btn btn-danger text-light fw-medium">Delete</button>
                                                    </form>
                                                </td>
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

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" action="{{ route('cagur.update', ['cagur' => ':cagurId']) }}"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label for="telp">Nomor Telpon</label>
                            <input type="text" class="form-control" id="telp" name="telp"
                                placeholder="Nomor Telpon">
                        </div>
                        <div class="form-group">
                            <label for="pendidikan">Pendidikan</label>
                            <select class="form-select text-black" id="pendidikan" name="pendidikan">
                                <option selected disabled>-- Pilih Opsi --</option>
                                <option value="D3">D3</option>
                                <option value="D4">D4</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ipk">IPK</label>
                            <select class="form-select text-black" id="ipk" name="ipk">
                                <option selected disabled>-- Pilih Opsi --</option>
                                <option value="<2">
                                    <2< /option>
                                <option value=">=2 dan <2,5">>=2 dan <2,5< /option>
                                <option value=">= 2,5 dan <3">>= 2,5 dan <3< /option>
                                <option value=">=3 dan <3,5">>=3 dan <3,5< /option>
                                <option value=">=3,5">>=3,5</option>
                            </select>
                        </div>
                        {{-- <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button class="btn btn-light">Cancel</button> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const editButtons = document.querySelectorAll('.edit-btn');
        const form = document.querySelector('#staticBackdrop form');

        editButtons.forEach(button => {
            button.addEventListener('click', function() {
                const cagurId = this.dataset.id;
                const actionUrl = form.getAttribute('action').replace('cagurId', cagurId);
                form.setAttribute('action', actionUrl);
            });
        });
    });
</script>
