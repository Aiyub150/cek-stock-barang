<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stocks = Stock::all();
        return view('admin.stock.index', compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.stock.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
            'kode_barang' => 'required|integer',
            'artist' => 'required|string',
            'jenis' => 'required|string',
            'nama_parfum' => 'required|string',
            'satuan' => 'required|string',
            'stock_awal' => 'required|integer',
            'promosi' => 'required|string',
            'harga' => 'required|integer',
            'stok_laku' => 'required|integer',
            'sisa_stok' => 'required|integer',
            'keterangan' => 'required|string',
        ]);

        // Proses upload gambar
        if ($request->hasFile('gambar')) {
            // Ambil file gambar
            $file = $request->file('gambar');

            // Tentukan nama file dengan format kode_barang_nama_parfum.ext
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = $validatedData['kode_barang'] . '_' . str_replace(' ', '_', $validatedData['nama_parfum']) . '.' . $fileExtension;

            // Simpan file ke folder public/gambar
            $file->move(public_path('gambar'), $fileName);

            // Masukkan nama file ke data yang akan disimpan
            $validatedData['gambar'] = 'gambar/' . $fileName; // Path relatif ke folder public
        }

        // Simpan data ke database
        Stock::create($validatedData);

        // Redirect dengan pesan sukses
        return redirect()->route('stocks.index')->with('success', 'Stock created successfully.');
    }



    /**
     * Display the specified resource.
     */
    public function show(Stock $stock)
    {
        return view('stocks.show', compact('stock'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stock $stock)
    {
        return view('admin.stock.update', compact('stock'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stock $stock)
    {
        $validatedData = $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Gambar tidak wajib diisi
            'kode_barang' => 'required|integer',
            'artist' => 'required|string',
            'jenis' => 'required|string',
            'nama_parfum' => 'required|string',
            'satuan' => 'required|string',
            'stock_awal' => 'required|integer',
            'promosi' => 'required|string',
            'harga' => 'required|integer',
            'stok_laku' => 'required|integer',
            'sisa_stok' => 'required|integer',
            'keterangan' => 'required|string',
        ]);

        // Proses upload gambar jika ada
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($stock->gambar && file_exists(public_path('gambar/' . $stock->gambar))) {
                unlink(public_path('gambar/' . $stock->gambar));
            }

            // Simpan gambar baru
            $file = $request->file('gambar');
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = $validatedData['kode_barang'] . '_' . str_replace(' ', '_', $validatedData['nama_parfum']) . '.' . $fileExtension;
            $file->move(public_path('gambar'), $fileName);

            $validatedData['gambar'] = $fileName;
        } else {
            // Jika gambar tidak diubah, gunakan gambar lama
            $validatedData['gambar'] = $stock->gambar;
        }

        // Update data ke database
        $stock->update($validatedData);

        // Redirect dengan pesan sukses
        return redirect()->route('stocks.index')->with('success', 'Stock updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stock $stock)
    {
        $stock->delete();
        return redirect()->route('stocks.index')->with('success', 'Stock deleted successfully.');
    }
}
