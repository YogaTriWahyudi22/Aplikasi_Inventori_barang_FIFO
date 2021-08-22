@extends('tampilan.admin')

@section('title_admin', 'Tampilan Index')

@section('admin')
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                        <h1>
                            <i class="fas fa-boxes"> Kelola Penjualan</i>
                        </h1>

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                            <li class="breadcrumb-item active">Kelola Penjualan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <!-- Default box -->
            <a href="{{ route('jual') }}" class="btn btn-sm btn-success mb-2"><i class="fas fa-plus"></i> Penjualan
                Tanaman</a>

            <div class="card card-success card-outline">
                <div class="card-header">
                    <div class="card-title">Kelola Penjualan</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example1">
                            <thead>
                                <tr class="text-center">
                                    <th>No.</th>
                                    <th>Nama Admin</th>
                                    <th>Kode Tanaman</th>
                                    <th>Nama Tanaman</th>
                                    <th>Jumlah Stok Terjual</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Tanggal Dijual</th>
                                    <th>Harga Satuan</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($index as $i)

                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $i->user_nama }}</td>
                                        <td>{{ $i->kode_tanaman }}</td>
                                        <td>{{ $i->nm_tanaman }}</td>
                                        <td>{{ $i->stok_jual }}</td>
                                        <td>{{ $i->tanggal }}</td>
                                        <td>{{ $i->tanggal_jual }}</td>
                                        <td>Rp. {{ number_format($i->harga) }}</td>
                                        <td>Rp. {{ number_format($i->harga * $i->stok_jual) }}</td>

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
