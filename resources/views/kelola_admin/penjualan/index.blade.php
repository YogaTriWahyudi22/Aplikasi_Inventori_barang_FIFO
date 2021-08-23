@extends('tampilan.admin')

@section('title_admin', 'Tampilan Index')

@section('admin')
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                        <h1>
                            <i class="fas fa-balance-scale"> Kelola Penjualan</i>
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
            <a href="{{ route('jual') }}" class="btn btn-sm btn-primary mb-2"><i class="fas fa-plus"></i> Penjualan
                Ikan</a>

            <div class="card card-primary card-outline">
                <div class="card-header">
                    <div class="card-title">Kelola Ikan</div>
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
                                    <th>Jumlah Stok Terjual</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Tanggal Dijual</th>
                                    <th>Harga Satuan</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($penjualan as $i)
                                    {{-- @dd($i) --}}
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $i->name }}</td>
                                        <td>{{ $i->kode_ikan }}</td>
                                        <td>{{ $i->nama_ikan }}</td>
                                        <td>{{ $i->stok_jual }}</td>
                                        <td>{{ $i->tanggal_input }}</td>
                                        <td>{{ $i->tanggal_jual }}</td>
                                        <td>Rp. {{ number_format($i->harga_jual) }}</td>
                                        <td>Rp. {{ number_format($i->harga_jual * $i->stok_jual) }}</td>

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
