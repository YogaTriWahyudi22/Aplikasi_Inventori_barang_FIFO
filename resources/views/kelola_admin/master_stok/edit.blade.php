@extends('tampilan.admin')

@section('title_admin', 'Edit Stok')

@section('admin')

    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                        <h1><i class="fas fa-boxes">Kelola Stok</i></h1>

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Kelola Stok</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <!-- Default box -->

            <form action="{{ route('stok_edit', $edit->id_stok) }}" method="POST">
                @csrf
                <div class="card card-success card-outline">
                    <div class="card-header">
                        <div class="card-title">Edit data stok</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-10">

                                <div class="form-group">
                                    <label for="">Kode Ikan</label>
                                    <input type="text" name="kode_ikan" value="{{ $edit->kode_ikan }}"
                                        class="form-control" id="kode" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="">Nama Ikan</label>
                                    <input type="text" value="{{ $edit->nama_ikan }}" class="form-control" id="kode"
                                        readonly>
                                </div>

                                <div class="form-group">
                                    <label for="">Jumlah Stok</label>
                                    <input type="text" value="{{ $edit->stok }}" class="form-control form-control-sm"
                                        readonly>
                                </div>

                                <div class="form-group">
                                    <label for="">Restok</label>
                                    <input type="text" name="stok" class="form-control form-control-sm" required>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('kelola_stok') }}" class="btn btn-warning">Back</a>
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>

    <script>
        function tanaman(val) {
            $.ajax({
                url: "{{ route('ajax_stok') }}",
                type: 'POST',
                datatype: 'JSON',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "stok": val.value
                },

                success: function(response) {
                    console.log(response);
                    $('#kode').val(response.kode_tanaman)
                }
            })
        }
    </script>

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
    </script>

@endsection
