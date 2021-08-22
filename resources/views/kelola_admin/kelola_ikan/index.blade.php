@extends('tampilan.admin')

@section('title_admin', 'Tampilan Index')

@section('admin')
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                        <h1><i class="fas fa-fish"></i> Kelola Ikan</h1>

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                            <li class="breadcrumb-item active">Kelola Ikan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <!-- Default box -->
            <a href="{{ route('ikan_tambah') }}" class="btn btn-sm btn-primary mb-2"><i class="fas fa-plus"></i> Tambah
                Data</a>

            <div class="card card-primary card-outline">
                <div class="card-header">
                    <div class="card-title">Kelola Tanaman</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example1">
                            <thead>
                                <tr class="text-center">
                                    <th>Nomor</th>
                                    <th>Nama Admin</th>
                                    <th>Kode Ikan</th>
                                    <th>Nama Ikan</th>
                                    <th>Tanggal Ikan Masuk</th>
                                    <th>Tanggal Ikan Expired</th>
                                    <th>Kualitas</th>
                                    <th>Harga Beli</th>
                                    <th>Harga Jual</th>
                                    <th>Total Laba</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $selisih = 0;
                                $harga_jual = 0;
                                ?>
                                @foreach ($index as $i)
                                    <?php
                                    $selisih1 = date_create($i->tanggal_input);
                                    $selisih2 = date_create($i->tanggal_expired);
                                    $selisih = date_diff($selisih2, $selisih1);
                                    ?>
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $i->user->name }}</td>
                                        <td>{{ $i->kode_ikan }}</td>
                                        <td>{{ $i->nama_ikan }}</td>
                                        <td>{{ $i->tanggal_input }}</td>
                                        <td>{{ $i->tanggal_expired }}</td>
                                        <td>
                                            @if ($selisih->format('%d') <= 7 and $selisih->format('%d') >= 6)
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
                                        <td>{{ number_format($i->harga_beli) }}</td>
                                        <td>{{ number_format($harga_jual) }}</td>
                                        <td>{{ number_format($harga_jual - $i->harga_beli) }}</td>
                                        <td>
                                            <a href="{{ route('ikan_edit', $i->id_kelola_ikan) }}"
                                                class="btn btn-block btn-info mb-2"><i class="fas fa-edit"></i>Edit</a>
                                            <form action="{{ route('ikan_delete', $i->id_kelola_ikan) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-block btn-danger"> <i class="fas fa-trash">
                                                    </i>Delete</button>
                                            </form>
                                        </td>
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
