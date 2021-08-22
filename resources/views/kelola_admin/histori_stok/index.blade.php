@extends('tampilan.admin')

@section('title_admin', 'Tampilan Index')

@section('admin')
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                        <h1><i class="fas fa-users"></i> Histori Stok</h1>

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                            <li class="breadcrumb-item active">Histori Stok</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">

            <div class="card card-success card-outline">
                <div class="card-header">
                    <div class="card-title">Kelola Akun</div>
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
                                    <th>Stok</th>
                                    <th>Tanggal Masuk</th>
                                    <th>harga</th>
                                    <th>Keterangan</th>
                                    <th>Jumlah Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($histori as $i)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $i->name }}</td>
                                        <td>{{ $i->kode_tanaman }}</td>
                                        <td>{{ $i->nama_tanaman }}</td>
                                        <td>{{ $i->stok }}</td>
                                        <td>{{ $i->tanggal }}</td>
                                        <td>Rp. {{ number_format($i->harga) }}</td>
                                        <td>{{ $i->keterangan }}</td>
                                        <td>Rp.{{ number_format($i->stok * $i->harga) }}</td>
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
