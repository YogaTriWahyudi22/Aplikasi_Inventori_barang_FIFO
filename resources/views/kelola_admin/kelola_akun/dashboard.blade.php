@extends('tampilan.admin')

@section('title', 'Dashboard')

@section('admin')

    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->

                        <div class="small-box bg-info">
                            <div class="inner">
                                @php
                                    $jumlah_masuk = DB::table('kelola_ikan')->count();
                                @endphp
                                <h3>
                                    @if ($jumlah_masuk != null)

                                        {{ $jumlah_masuk }}
                                    @else
                                        {{ '0' }}
                                    @endif
                                </h3>
                                <p>Jumlah Ikan Masuk</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{ route('kelola_ikan') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <!-- small box -->

                        <div class="small-box bg-success">
                            <div class="inner">
                                @php
                                    $jumlah_jual = DB::table('kelola_ikan')->count();
                                @endphp
                                <h3>
                                    @if ($jumlah_jual != null)

                                        {{ $jumlah_jual }}
                                    @else
                                        {{ '0' }}
                                    @endif
                                </h3>
                                <p>Jumlah Ikan Jual</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{ route('kelola_penjualan') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                @php
                                    date_default_timezone_set('Asia/Jakarta');
                                    $tgl = date('Y-m-d');
                                    $jumlah_expired = DB::table('kelola_ikan')
                                        ->where('tanggal_expired', '<=', $tgl)
                                        ->count();
                                @endphp
                                <h3>
                                    @if ($jumlah_expired != null)
                                        {{ $jumlah_expired }}
                                    @else
                                        {{ '0' }}
                                    @endif
                                </h3>

                                <p>Jumlah Ikan Expired</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-hourglass-half"></i>
                            </div>
                            <a href="{{ route('laporan_expired') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
