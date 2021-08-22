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
        <section class="content">
            <div class="container">
                <div class="row ml-5">
                    <div class="ml-5">
                        <h3 class="ml-5"></h3>
                    </div>
                </div>
                <img src="{{ asset('gambar/gambar.png') }}" width="70%" class="rounded mx-auto d-block">
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
