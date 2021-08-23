@extends('tampilan.admin')

@section('title_admin', 'Tampilan Index')

@section('admin')
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                        <h1>
                            <i class="fas fa-tasks"> Laporan Barang Expired</i>
                        </h1>

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                            <li class="breadcrumb-item active">Laporan Barang Expired</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">

            <div class="card card-primary card-outline">
                <div class="card-header">
                    <div class="card-title"><a href="{{ route('laporan') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example1">
                            <thead>
                                <tr class="text-center">
                                    <th>No.</th>
                                    <th>Nama Admin</th>
                                    <th>Kode Ikan</th>
                                    <th>Nama Ikan</th>
                                    <th>Jumlah Stok Awal</th>
                                    <th>Jumlah Stok Tesisa</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Tanggal Expired</th>
                                    <th>Harga Beli</th>
                                    <th>Harga Harga Jual</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($expired as $i)

                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $i->nama_user }}</td>
                                        <td>{{ $i->kode_ikan }}</td>
                                        <td>{{ $i->nama_ikan }}</td>
                                        <td>{{ $i->stok_awal }}</td>
                                        <td>{{ $i->stok }}</td>
                                        <td>{{ $i->tanggal_input }}</td>
                                        <td>{{ $i->tanggal_expired }}</td>
                                        <td>Rp. {{ number_format($i->harga_beli) }}</td>
                                        <td>Rp. {{ number_format($i->harga_jual) }}</td>
                                        <td>Rp. {{ number_format($i->harga_beli * $i->stok) }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
