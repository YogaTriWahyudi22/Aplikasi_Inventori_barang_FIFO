@extends('tampilan.admin')

@section('title_admin', 'Tampilan Index')

@section('admin')
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                        <h1><i class="fas fa-history"></i> Histori Stok</h1>

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

            <div class="card card-primary card-outline">
                <div class="card-header">
                    <div class="card-title">
                    </div>
                    @php
                        date_default_timezone_set('Asia/Jakarta');
                        $tgl = date('m');
                    @endphp
                    <form action="{{ route('cari') }}" method="POST">
                        @csrf
                        <div class="float-center">

                            <select class="form-control mb-2" name="periode" aria-label="Default select example">
                                @php
                                    $bulan = ['Januari' => '1', 'Februari' => '2', 'Maret' => '3', 'April' => '4', 'Mei' => '5', 'Juni' => '6', 'Juli' => '7', 'Agustus' => '8', 'September' => '9', 'Oktober' => '10', 'November' => '11', 'Desember' => '12'];
                                @endphp
                                <option value="{{ $tgl }}">Pilih Bulan</option>
                                @foreach ($bulan as $b => $value_bulan)
                                    <option value="{{ $value_bulan }}">{{ $b }} </option>
                                @endforeach

                            </select>
                            <a href="{{ route('kelola_stok') }}" class="btn btn-primary">Kembali</a>
                            <button type="submit" class="btn btn-info my-2">Cari</button>

                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example2">
                            <thead>
                                <tr class="text-center">
                                    <th>No.</th>
                                    <th>Nama Admin</th>
                                    <th>Kode Ikan</th>
                                    <th>Nama Ikan</th>
                                    <th>Kualitas</th>
                                    <th>Master Stok</th>
                                    <th>Stok terakhir</th>
                                    <th>Tanggal Masuk</th>
                                    <th>harga jual</th>
                                    <th>Jumlah Nilai</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $selisih = 0;
                                $harga_jual = 0;
                                date_default_timezone_set('Asia/Jakarta');
                                $tgl = date('Y-m-d');
                                ?>
                                @foreach ($histori as $i)
                                    <?php
                                    $selisih1 = date_create($i->tgl);
                                    $selisih2 = date_create($i->tanggal_expired);
                                    $selisih = date_diff($selisih2, $selisih1);
                                    ?>
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $i->user->name }}</td>
                                        <td>{{ $i->kode_ikan }}</td>
                                        <td>{{ $i->nama_ikan }}</td>
                                        <td>
                                            @if ($selisih->format('%d') <= 7 and $selisih->format('%d') >= 5)
                                                {{ 'A' }}
                                                @php
                                                    $harga_jual = $i->harga_jual - 0;
                                                @endphp
                                            @elseif($selisih->format('%d') <= 5 and $selisih->format('%d') >= 3)

                                                    {{ 'B' }}
                                                    @php
                                                        $harga_jual = $i->harga_jual - $i->harga_jual * 0.05;
                                                    @endphp

                                                @elseif($selisih->format('%d') <= 5 and $selisih->format('%d') >= 1)

                                                        {{ 'C' }}
                                                        @php
                                                            $harga_jual = $i->harga_jual - $i->harga_jual * 0.1;
                                                        @endphp
                                                    @else
                                                        {{ 'Ikan Rusak' }}
                                                        @php
                                                            $harga_jual = $i->harga_jual - $i->harga_jual;
                                                        @endphp

                                            @endif
                                        </td>
                                        <td>{{ $i->stok_awal }}</td>
                                        <td>{{ $i->stok }}</td>
                                        <td>{{ $i->tanggal }}</td>
                                        <td>Rp. {{ number_format($harga_jual) }}</td>
                                        <td>Rp.{{ number_format($i->stok * $harga_jual) }}
                                        </td>
                                        <td>{{ $i->keterangan }}</td>
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
