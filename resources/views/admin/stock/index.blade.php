@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Stock</h3>
                <p class="text-subtitle text-muted">Sekumpulan data mengenai stock</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data stock</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Basic Tables start -->
    <section class="section">
        <div class="card">

            <div class="card-header">
                Data Stock
            </div>
            <a href="{{ route('stocks.create') }}" class="btn btn-primary rounded-pill">Buat Data Baru</a>
            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Kode Barang</th>
                            <th>Artist</th>
                            <th>Jenis</th>
                            <th>Nama Parfum</th>
                            <th>Satuan</th>
                            <th>Stock Awal</th>
                            <th>Promosi</th>
                            <th>Harga</th>
                            <th>Stok Laku</th>
                            <th>Sisa Stok</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stocks as $index => $stock)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <img src="{{ asset('gambar/' . $stock->gambar) }}" alt="Gambar {{ $stock->nama_parfum }}" width="50" height="50" style="object-fit: cover;">
                            </td>
                            <td>{{ $stock->kode_barang }}</td>
                            <td>{{ $stock->artist }}</td>
                            <td>{{ $stock->jenis }}</td>
                            <td>{{ $stock->nama_parfum }}</td>
                            <td>{{ $stock->satuan }}</td>
                            <td>{{ $stock->stock_awal }}</td>
                            <td>{{ $stock->promosi }}</td>
                            <td>{{ $stock->harga }}</td>
                            <td>{{ $stock->stok_laku }}</td>
                            <td>{{ $stock->sisa_stok }}</td>
                            <td>{{ $stock->keterangan }}</td>
                            <td>
                                <a href="{{ route('stocks.show', $stock->id) }}" class="btn btn-info btn-sm">Detail</a>
                                <a href="{{ route('stocks.edit', $stock->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('stocks.destroy', $stock->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- Basic Tables end -->
</div>
@endsection
