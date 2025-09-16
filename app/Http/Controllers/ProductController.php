<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return view('product.index', compact('product'));
    }

    /**
     * For welcome page to display data from Product
     */
    public function welcome()
    {
        $product = Product::all();
        return view('welcome', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required|string',
            'status_barang' => 'required|string',
            'gambar_barang' => 'nullable|image|mimes:jpg,jpeg,png,jfif,webp|max:5120',
            'jumlah_barang' => 'required|integer',
        ]);

        if ($request->hasFile('gambar_barang')) {
            $path = $request->file('gambar_barang')->store('images', 'public');
            $validatedData['gambar_barang'] = $path;
        };

        Product::create($validatedData);

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $validatedData = $request->validate([
            'nama_barang' => 'required|string',
            'status_barang' => 'required|string',
            'gambar_barang' => 'nullable|image|mimes:jpg,jpeg,png,jfif,webp|max:5120',
            'jumlah_barang' => 'required|integer',
        ]);

        if ($request->hasFile('gambar_barang')) {
            // hapus file lama kalau ada
            if ($product->gambar_barang) {
                Storage::disk('public')->delete($product->gambar_barang);
            }

            // simpan file baru
            $path = $request->file('gambar_barang')->store('images', 'public');
            $validatedData['gambar_barang'] = $path;
        }
        
        $product->update($validatedData);

        return redirect()->route('product.index')->with('success', 'Produk berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->gambar_barang) {
            Storage::disk('public')->delete($product->gambar_barang);
        }

        $product->delete();
        return redirect()->route('product.index');
    }
}
