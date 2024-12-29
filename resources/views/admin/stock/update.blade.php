@extends('layouts.app')

@section('content')
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Barang</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" method="POST" action="{{ route('stocks.update', $stock->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="gambar">Gambar</label>
                                        <input type="file" id="gambar" class="form-control" name="gambar" onchange="previewImage(event)">
                                        <img id="preview" src="{{ asset('gambar/' . $stock->gambar) }}" alt="Preview Gambar" width="100" height="100" style="margin-top: 10px; object-fit: cover;">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="kode_barang">Kode Barang</label>
                                        <input type="number" id="kode_barang" class="form-control" name="kode_barang" value="{{ $stock->kode_barang }}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="artist">Artist</label>
                                        <input type="text" id="artist" class="form-control" name="artist" value="{{ $stock->artist }}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="jenis">Jenis</label>
                                        <input type="text" id="jenis" class="form-control" name="jenis" value="{{ $stock->jenis }}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="nama_parfum">Nama Parfum</label>
                                        <input type="text" id="nama_parfum" class="form-control" name="nama_parfum" value="{{ $stock->nama_parfum }}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="satuan">Satuan</label>
                                        <input type="text" id="satuan" class="form-control" name="satuan" value="{{ $stock->satuan }}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="stock_awal">Stock Awal</label>
                                        <input type="number" id="stock_awal" class="form-control" name="stock_awal" value="{{ $stock->stock_awal }}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="promosi">Promosi</label>
                                        <input type="text" id="promosi" class="form-control" name="promosi" value="{{ $stock->promosi }}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="harga">Harga</label>
                                        <input type="number" id="harga" class="form-control" name="harga" value="{{ $stock->harga }}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="stok_laku">Stok Laku</label>
                                        <input type="number" id="stok_laku" class="form-control" name="stok_laku" value="{{ $stock->stok_laku }}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="sisa_stok">Sisa Stok</label>
                                        <input type="number" id="sisa_stok" class="form-control" name="sisa_stok" value="{{ $stock->sisa_stok }}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <textarea id="keterangan" class="form-control" name="keterangan">{{ $stock->keterangan }}</textarea>
                                    </div>
                                </div>

                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Update</button>
                                    <a href="{{ route('stocks.index') }}" class="btn btn-light-secondary me-1 mb-1">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function(){
        const preview = document.getElementById('preview');
        preview.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}
</script>
@endsection
