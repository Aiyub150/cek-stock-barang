@extends('layouts.app')

@section('content')
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Barang</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" method="POST" action="{{ route('stocks.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="gambar">Gambar</label>
                                        <input type="file" id="gambar" class="form-control" name="gambar">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="kode_barang">Kode Barang</label>
                                        <input type="number" id="kode_barang" class="form-control" name="kode_barang" placeholder="Masukkan Kode Barang">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="artist">Artist</label>
                                        <input type="text" id="artist" class="form-control" name="artist" placeholder="Masukkan Nama Artist">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="jenis">Jenis</label>
                                        <input type="text" id="jenis" class="form-control" name="jenis" placeholder="Masukkan Jenis">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="nama_parfum">Nama Parfum</label>
                                        <input type="text" id="nama_parfum" class="form-control" name="nama_parfum" placeholder="Masukkan Nama Parfum">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="satuan">Satuan</label>
                                        <input type="text" id="satuan" class="form-control" name="satuan" placeholder="Masukkan Satuan">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="stock_awal">Stock Awal</label>
                                        <input type="number" id="stock_awal" class="form-control" name="stock_awal" placeholder="Masukkan Stock Awal">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="promosi">Promosi</label>
                                        <input type="text" id="promosi" class="form-control" name="promosi" placeholder="Masukkan Promosi">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="harga">Harga</label>
                                        <input type="number" id="harga" class="form-control" name="harga" placeholder="Masukkan Harga">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="stok_laku">Stok Laku</label>
                                        <input type="number" id="stok_laku" class="form-control" name="stok_laku" placeholder="Masukkan Stok Laku">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="sisa_stok">Sisa Stok</label>
                                        <input type="number" id="sisa_stok" class="form-control" name="sisa_stok" placeholder="Masukkan Sisa Stok">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <textarea id="keterangan" class="form-control" name="keterangan" placeholder="Masukkan Keterangan"></textarea>
                                    </div>
                                </div>

                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                    <a href="{{ route('stocks.index') }}" class="btn btn-light-secondary me-1 mb-1">Batal</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
