<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = Admin::all();
        return view('dashboard', compact('admin'));
    }

    public function indexadmin()
    {
        $admin = Admin::where('status_barang', 'baik')->get();
        return view('admin.index', compact('admin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'nama_barang'   => 'required|string|max:255',
        'jumlah_barang' => 'required|integer',
        'status_barang' => 'required|string|max:100',
        'image'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // Simpan image kalau ada
    if ($request->hasFile('image')) {
        $validatedData['image'] = $request->file('image')->store('images', 'public');
    }

    // Simpan data ke tabel admin
    Admin::create($validatedData);

    // Redirect ke dashboard
    return redirect()->route('dashboard')->with('success', 'Barang berhasil ditambahkan!');
}

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $admin = Admin::findOrFail($id); // ambil data dari DB sesuai id
        return view('admin.show', compact('admin')); // kirim $admin ke view
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admin = Admin::findOrfail($id);
        return view('admin.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $admin = Admin::findOrFail($id);

    $validatedData = $request->validate([
        'nama_barang'   => 'required|string|max:255',
        'status_barang' => 'required|string|max:100',
        'image'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // Simpan image kalau ada
    if ($request->hasFile('image')) {
        $validatedData['image'] = $request->file('image')->store('images', 'public');
    }

    // Update data lama
    $admin->update($validatedData);

    // Redirect ke dashboard
    return redirect()->route('dashboard')->with('success', 'Barang berhasil diupdate!');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = Admin::findOrfail($id);
        $admin->delete();
        return redirect('dashboard');
    }
}