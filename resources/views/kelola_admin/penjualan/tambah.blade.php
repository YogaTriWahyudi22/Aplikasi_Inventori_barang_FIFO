@extends('tampilan.admin')

@section('title_admin', 'Tambah Stok')

@section('admin')

    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                        <h1><i class="fas fa-boxes">Kelola Penjualan</i></h1>

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
                <div class="card card-success card-outline">
                    <div class="card-header">
                        <div class="card-title">Penjualan</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-10">
                                <input type="hidden" name="id_stok" id="id_stok">

                                <div class="row">
                                    <div class="col">
                                        <label for=""> Kode Tanaman</label>
                                        <input type="text" name="kode_tanaman" id="kode" class="form-control"
                                            placeholder="Kode Tanaman" value="{{ old('kode_tanaman') }}" readonly>
                                    </div>
                                    <div class="col">
                                        <label for=""> &nbsp; Stok Tersedia </label>
                                        <input type="text" id="stok_tersedia" class="form-control"
                                            placeholder="Stok Tersedia" readonly>
                                    </div>
                                </div>

                                <div class="row mt-2 mb-2">
                                    <div class="col">
                                        <label for=""> Harga Tanaman</label>
                                        <input type="text" id="harga_tanaman" class="form-control"
                                            placeholder="harga Tanaman" value="{{ old('harga_tanaman') }}" readonly>
                                    </div>
                                    <div class="col">
                                        <label for=""> &nbsp; Tanggal Input </label>
                                        <input type="text" id="tanggal_input" class="form-control"
                                            placeholder="Tanggal Input" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Nama Tanaman</label>
                                    <select class="form-control" onchange="tanaman(this);"
                                        aria-label="Default select example">
                                        <option selected>Nama Tanaman</option>
                                        @foreach ($tanaman as $t)
                                            <option value="{{ $t->nama_tanaman }}">{{ $t->nama_tanaman }}</option>
                                        @endforeach
                                    </select>
                                    @error('nama_tanaman')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Kuantiti Dijual </label>
                                    <input type="text" name="stok_jual" id="id_kuantiti" value="{{ old('stok_jual') }}"
                                        class="form-control form-control-sm" placeholder="Jumlah stok yang dijual" required>
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
        function tanaman(val) {
            $.ajax({
                url: "{{ route('ajax_jual') }}",
                type: 'POST',
                datatype: 'JSON',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "tanaman": val.value,
                },

                success: function(response) {
                    console.log(response);
                    $('#id_stok').val(response.id_stok)
                    $('#kode').val(response.kode_tanaman)
                    $('#stok_tersedia').val(response.stok)
                    $('#harga_tanaman').val(response.harga)
                    $('#tanggal_input').val(response.tanggal)

                }
            })
        }

        var rupiah = document.getElementById('harga_satuan');
        rupiah.addEventListener('keyup', function(e) {
            // tambahkan 'Rp.' pada saat ketik nominal di form kolom input
            // gunakan fungsi formatRupiah() untuk mengubah nominal angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value, 'Rp. ');
        });
        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
            var number_string = angka.toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka satuan ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }

        let kuantiti = document.getElementById('id_kuantiti')
        kuantiti.addEventListener("keyup", function() {
            let harga = document.getElementById('harga_tanaman').value
            let totalPembayaran = document.getElementById('harga_satuan')
            let total = harga * this.value
            totalPembayaran.value = formatRupiah(total, 'Rp. ')
        });
    </script>

@endsection
