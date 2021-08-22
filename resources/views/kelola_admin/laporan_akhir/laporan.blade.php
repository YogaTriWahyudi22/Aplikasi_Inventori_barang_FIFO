@extends('tampilan.admin')

@section('title_admin', 'Tampilan Index')

@section('admin')
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                        <h1>
                            <i class="fas fa-boxes"> Kelola Detail Penjualan</i>
                        </h1>

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                            <li class="breadcrumb-item active">Kelola Detail Penjualan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="card card-success card-outline">
                <div class="card-header">
                    <div class="card-title">Kelola Detail Penjualan</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        @foreach ($laporan as $l)
                            <ul class="list-group">
                                <a href="{{ route('detail', $l->id_user) }}">
                                    <li class="list-group-item" style="text-transform: Capitalize; color:black;">
                                        {{ $l->name }}</li>
                                </a>
                            </ul>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
