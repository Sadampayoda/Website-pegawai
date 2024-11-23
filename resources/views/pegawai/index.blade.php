@extends('component.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-11 col-10">
                <h2>Data Pegawai</h2>
                @include('component.alert')
                <a class="btn btn-dark mb-3" href="{{ route('pegawai.create') }}">Create Pegawai</a>
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <strong>Daftar Pegawai</strong>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" style="overflow-x: auto; max-height: 400px;">
                            <table id="pegawaiTable" class="table table-striped table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="detailModalLabel">Detail Pegawai</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p><strong>Nama:</strong> <span id="detailNama"></span></p>
                                <p><strong>Email:</strong> <span id="detailEmail"></span></p>
                                <p><strong>Telepon:</strong> <span id="detailTelepon"></span></p>
                                <p><strong>Alamat:</strong> <span id="detailAlamat"></span></p>
                                <p><strong>Tanggal Lahir:</strong> <span id="detailTanggalLahir"></span></p>
                                <p><strong>Jenis Kelamin:</strong> <span id="detailJenisKelamin"></span></p>
                                <p><strong>Jabatan:</strong> <span id="detailJabatan"></span></p>
                                <p><strong>Tanggal Masuk:</strong> <span id="detailTanggalMasuk"></span></p>
                                <p><strong>Gaji:</strong> <span id="detailGaji"></span></p>
                                <p><strong>Status:</strong> <span id="detailStatus"></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            let table = $('#pegawaiTable').DataTable({
                ajax: "{{ route('pegawai-data.index') }}",
                columns: [
                    { data: 'nama', title: 'Nama' },
                    { data: 'email', title: 'Email' },
                    {
                        data: 'id',
                        title: 'Aksi',
                        orderable: false,
                        render: function(data) {
                            return `
                                <button class="btn btn-info btn-detail" data-id="${data}">
                                    Detail
                                </button>
                            `;
                        }
                    }
                ]
            });

            $('#pegawaiTable').on('click', '.btn-detail', function() {
                let pegawaiId = $(this).data('id');

                $.ajax({
                    url: `/api/pegawai-data/${pegawaiId}`,
                    method: 'GET',
                    success: function(data) {
                        $('#detailNama').text(data.data.nama);
                        $('#detailEmail').text(data.data.email);
                        $('#detailTelepon').text(data.data.telepon);
                        $('#detailAlamat').text(data.data.alamat);
                        $('#detailTanggalLahir').text(data.data.tanggal_lahir);
                        $('#detailJenisKelamin').text(data.data.jenis_kelamin === 'L' ? 'Laki-Laki' : 'Perempuan');
                        $('#detailJabatan').text(data.data.jabatan);
                        $('#detailTanggalMasuk').text(data.data.tanggal_masuk);
                        $('#detailGaji').text(data.data.gaji);
                        $('#detailStatus').text(data.data.status);
                        $('#detailModal').modal('show');
                    },
                    error: function() {
                        $('#alertContainer').html(`
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error!</strong> Gagal mengambil data detail pegawai.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        `);
                    }
                });
            });
        });
    </script>
@endsection
