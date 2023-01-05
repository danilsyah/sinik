@extends('layouts.admin')
@section('title', 'SINIK - Pegawai')
@section('content')
    <div class="separator-breadcrumb border-top"></div>
    <div class="row mb-4">
        <div class="col-md-12">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        Home
                    </li>
                    <li class="breadcrumb-item">
                        Tagihan
                    </li>
                    <li class="breadcrumb-item active">
                        Pemeriksaan
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-12 mb-4">
            <div class="card text-left">
                <div class="card-body">
                    <div class="card-title mb-3">Tagihan : Rp. <span
                            class="total">{{ $pemeriksaanDetails->sum('obat.harga') + $pemeriksaanDetails->sum('tindakan.harga') }}</span>
                    </div>
                    <label>Dibayarkan : </label>
                    <input type="number" class="form-control inputdibayarkan" name="dibayarkan">
                    <button class="pay-button btn btn-danger mt-2">Bayar</button>
                    <hr>
                    <div class="table-responsive">
                        <table id="zero_configuration_table" class="display table table-striped table-bordered"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Pasien</th>
                                    <th>Pemeriksa</th>
                                    <th>Obat</th>
                                    <th>Harga Obat</th>
                                    <th>Tindakan</th>
                                    <th>Tindakan Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pemeriksaanDetails as $pemeriksaanDetail)
                                    <tr>
                                        <td>{{ $pemeriksaanDetail->id }}</td>
                                        <td>{{ $pemeriksaanDetail->pemeriksaan->pasien->nama }}</td>
                                        <td>{{ $pemeriksaanDetail->pemeriksaan->employee->name }}</td>
                                        <td>{{ $pemeriksaanDetail->obat->nama }}</td>
                                        <td>{{ $pemeriksaanDetail->obat->harga }}</td>
                                        <td>{{ $pemeriksaanDetail->tindakan ? $pemeriksaanDetail->tindakan->nama : 'kosong' }}
                                        </td>
                                        <td>{{ $pemeriksaanDetail->tindakan ? $pemeriksaanDetail->tindakan->harga : 'kosong' }}
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
@endsection

@push('pembayaran')
    <script>
        $('.pay-button').click(function(event) {
            var form = $(this).closest("form");
            var dibayar = $(".inputdibayarkan").val();
            var total = $(".total").text();
            var kembalian = dibayar - total
            event.preventDefault();
            if (dibayar != null && dibayar != '' && dibayar >= total) {
                swal({
                    title: `Kembalian Rp.${kembalian}`,
                    text: "Terimakasih",
                    icon: 'info',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    }
                });
            } else if (dibayar != null && dibayar != '' && dibayar < total) {
                swal({
                    title: `Kembalian Rp.${kembalian}`,
                    text: 'Uang anda kurang',
                    icon: 'info',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                });
            }


        });
    </script>
@endpush
