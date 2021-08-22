@extends('tampilan.admin')

@section('title_admin', 'Tampilan Index')

@section('admin')
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                        <h1>
                            <i class="fas fa-boxes"> Kelola Stok</i>
                        </h1>

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                            <li class="breadcrumb-item active">Kelola Stok</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <!-- Default box -->
            <a href="{{ route('stok_tambah') }}" class="btn btn-sm btn-primary mb-2"><i class="fas fa-plus"></i> Tambah
                Data</a>

            <a href="{{ route('histori') }}" class="btn btn-sm btn-info mb-2"><i class="fas fa-history"></i> Histori
                Stok</a>

            <div class="card card-primary card-outline">
                <div class="card-header">
                    <div class="card-title">Kelola Stok Ikan</div>
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
                                    <th>Master Stok</th>
                                    <th>Stok Terakhir</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($index as $i)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $i->user->name }}</td>
                                        <td>{{ $i->kode_tanaman }}</td>
                                        <td>{{ $i->tanaman->nama_tanaman }}</td>
                                        <td>{{ $i->stok }}</td>
                                        <td>
                                            <a href="{{ route('stok_edit', $i->id_stok) }}"
                                                class="btn btn-block btn-info mb-2"><i class="fas fa-edit"></i>Edit</a>
                                        </td>
                                    </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
