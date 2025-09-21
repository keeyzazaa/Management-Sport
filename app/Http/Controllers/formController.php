<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

class formController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $form = Form::all();
        return view('daftar_pengguna', compact('form'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('form.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_peminjam' => 'required|string|max:255',
            'nama_barang'   => 'required|string|max:255',
            'jumlah_barang' => 'required|integer',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date',
        ]);

        Form::create($validatedData);

        return redirect()->route('dashboard.indexadmin')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $form = Form::findOrFail($id);
        return view('form.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $form = Form::findOrFail($id);

        $validatedData = $request->validate([
            'nama_peminjam' => 'required|string|max:255',
            'nama_barang'   => 'required|string|max:255',
            'jumlah_barang' => 'required|integer',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date',
        ]);

        $form->update($validatedData);

        return redirect()->route('daftar_pengguna')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $form = Form::findOrfail($id);
        $form->delete();
        return redirect('daftar_pengguna');
    }

    public function approve($id)
{
    $form = Form::findOrFail($id);
    $form->status = 'approved'; // tambahkan kolom status di tabel form
    $form->save();

    return redirect()->back()->with('success', 'Peminjaman disetujui.');
}

public function decline($id)
{
    $form = Form::findOrFail($id);
    $form->status = 'declined'; // bisa update status jadi declined
    $form->save();

    return redirect()->back()->with('error', 'Peminjaman ditolak.');
}

}

