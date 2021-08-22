@extends('tampilan.admin')

@section('title_admin', 'Tambah Tanaman')

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
                            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Kelola Ikan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <!-- Default box -->

            <form action="{{ route('ikan_edit', $edit->id_kelola_ikan) }}" method="POST">
                @csrf
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <div class="card-title">Edit Data Ikan</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <label for="">Kode Ikan</label>
                                    <input type="text" name="kode_ikan" value="{{ $edit->kode_ikan }}" id=""
                                        class="form-control form-control-sm" readonly>
                                    @error('kode_ikan')
                                        <small class="text-danger mt-3">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Nama Ikan</label>
                                    <input type="text" name="nama_ikan" id="" value="{{ $edit->nama_ikan }}"
                                        class="form-control form-control-sm" required>
                                </div>

                                <div class="form-group">
                                    <label for="">Tanggal Inputan</label>
                                    <input type="date" name="tanggal_input" value="{{ $edit->tanggal_input }}" id=""
                                        class="form-control form-control-sm" required>
                                </div>

                                <div class="form-group">
                                    <label for="">Harga Beli</label>
                                    <input type="text" name="harga_beli" id="harga_satuan"
                                        class="form-control form-control-sm" value="{{ $edit->harga_beli }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="">Harga Jual</label>
                                    <input type="text" name="harga_jual" value="{{ $edit->harga_jual }}" id="harga_beli"
                                        class="form-control form-control-sm" required>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('kelola_ikan') }}" class="btn btn-warning">Back</a>
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>

    <script type="text/javascript">
        var rupiah = document.getElementById('harga_satuan');
        rupiah.addEventListener('keyup', function(e) {
            // tambahkan 'Rp.' pada saat ketik nominal di form kolom input
            // gunakan fungsi formatRupiah() untuk mengubah nominal angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value, 'Rp. ');
        });
        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
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


        var harga_beli = document.getElementById('harga_beli');
        harga_beli.addEventListener('keyup', function(e) {
            // tambahkan 'Rp.' pada saat ketik nominal di form kolom input
            // gunakan fungsi formatharga_beli() untuk mengubah nominal angka yang di ketik menjadi format angka
            harga_beli.value = formatRupiah(this.value, 'Rp. ');
        });
        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
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
