@extends('tampilan.admin')

@section('title_admin', 'Tambah Stok')

@section('admin')

    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                        <h1><i class="fas fa-balance-scale">Kelola Penjualan</i></h1>

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Kelola Penjualan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <!-- Default box -->

            <form action="{{ route('jual') }}" method="POST">
                @csrf
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <div class="card-title">Penjualan</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-10">
                                <input type="hidden" name="id_stok" id="id_stok">

                                <div class="row" id="kode">

                                </div>

                                <div class="row mt-2 mb-2" id="tanggal">

                                </div>

                                <div class="row mt-2 mb-2">
                                    <div class="col">
                                        <label for=""> Kualitas</label>
                                        <input type="text" id="kualitas" class="form-control" placeholder="Kualitas Ikan"
                                            value="{{ old('harga_jual') }}" readonly>
                                    </div>
                                    <div class="col">
                                        <label for=""> Harga Ikan</label>
                                        <input type="text" id="harga_jual" name="harga_jual" class="form-control"
                                            placeholder="harga Jual" value="{{ old('harga_jual') }}" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    @php
                                        date_default_timezone_set('Asia/Jakarta');
                                        $tgl = date('Y-m-d');
                                    @endphp
                                    <label for="">Nama Ikan</label>
                                    <select class="form-control" onchange="ikan(this);" aria-label="Default select example">
                                        <option selected>Nama Ikan</option>
                                        @foreach ($ikan as $t)
                                            @if ($t->tanggal_expired > $tgl || $t->tanggal_expired == '')
                                                <option value="{{ $t->nama_ikan }}">{{ $t->nama_ikan }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('nama_tanaman')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Kuantiti Dijual </label>
                                    <input type="text" name="stok_jual" onkeyup="kuantiti(this.value)"
                                        value="{{ old('stok_jual') }}" class="form-control form-control-sm"
                                        placeholder="Jumlah stok yang dijual" required>
                                </div>

                                <div class="form-group">
                                    <label for="">Tanggal</label>
                                    <input type="date" name="tanggal_jual" value="{{ old('tanggal') }}"
                                        class="form-control form-control-sm" required>
                                </div>

                                <div class="form-group">
                                    <label for="">Tipe Pembayaran</label>
                                    <select class="form-control" name="pembayaran" aria-label="Default select example">
                                        <option selected>Pilih Pembayaran</option>
                                        <option value="tunai">Tunai</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">Total Pembayaran</label>
                                    <input type="text" name="total_pembayaran" value="{{ old('total_bayar') }}"
                                        id="harga_satuan" class="form-control form-control-sm" required>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('kelola_penjualan') }}" class="btn btn-warning">Back</a>
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>

    <script type="text/javascript">
        function ikan(val) {
            $.ajax({
                url: "{{ route('ajax_jual') }}",
                type: 'POST',
                datatype: 'JSON',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "ikan": val.value,
                },

                success: function(response) {
                    // console.log(response);
                    $('#harga_jual').val(response.harga_jual)
                    $('#kualitas').val(response.kualitas)
                    let data = response.ajax
                    let view = "";
                    let view1 = "";
                    view = `<div class="col">
                                        <label for=""> Kode Ikan</label>
                                        <input type="hidden" name="id_stok" value="${data.id_stok}">
                                        <input type="text" name="kode_ikan" class="form-control"
                                            placeholder="Kode Tanaman" value="${data.kode_ikan}" readonly>
                                    </div>
                                    <div class="col">
                                        <label for=""> &nbsp; Stok Tersedia </label>
                                        <input type="text" class="form-control" value="${data.stok}" placeholder="Stok Tersedia" readonly>
                                    </div>`
                    view1 = `<div class="col">
                                        <label for=""> &nbsp; Tanggal Input </label>
                                        <input type="text" value="${data.tanggal_input}" class="form-control"
                                            placeholder="Tanggal Input" readonly>
                                    </div>

                                    <div class="col">
                                        <label for=""> &nbsp; Tanggal Expired </label>
                                        <input type="text" value="${data.tanggal_expired}" class="form-control"
                                            placeholder="Tanggal Input" readonly>
                                    </div>`

                    document.getElementById('kode').innerHTML = view;
                    document.getElementById('tanggal').innerHTML = view1;

                }
            })
        }

        function kuantiti(id) {
            var k = id
            var harga = document.getElementById('harga_jual').value
            var harga_akhir = harga * k
            document.getElementById('harga_satuan').value = formatRupiah(harga_akhir, 'Rp. ')



        }

        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
            var number_string = angka.toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                harga_beli = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka satuan ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                harga_beli += separator + ribuan.join('.');
            }

            harga_beli = split[1] != undefined ? harga_beli + ',' + split[1] : harga_beli;
            return prefix == undefined ? harga_beli : (harga_beli ? 'Rp. ' + harga_beli : '');
        }
    </script>

@endsection
