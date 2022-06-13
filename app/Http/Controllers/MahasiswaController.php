<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['mahasiswa'] = Mahasiswa::all();
        return view('mahasiswa.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswa.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'NRP' => 'unique:mahasiswa,NRP',
            'dokumen' => 'required|mimes:doc,docx,pdf',
        ]);

        $data = [
            'NRP' => $request->NRP,
            'Nama' => $request->Nama,
            'Kelas' => $request->Kelas,
            'Jenis_Kelamin' => $request->Jenis_Kelamin,
            'Tanggal_Lahir' => $request->Tanggal_Lahir,
            'Alamat' => $request->Alamat,

        ];

        $file = $request->file('dokumen');
        if($file){
            $nama_file = $file->getClientOriginalName();
            $file->storeAs('dokumen_files', $nama_file);
            $data['dokumen'] =$nama_file;
        }


        Mahasiswa::create($data);

        return redirect()->route('mahasiswa.index')->with('berhasil', 'Data mahasiswa berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['mahasiswa'] = Mahasiswa::find($id);

        return view('mahasiswa.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $request->validate([
            'NRP' => "unique:mahasiswa,NRP,$mahasiswa->id",
            'dokumen' => 'required|mimes:doc,docx,pdf',

        ]);

        $data = [
            'NRP' => $request->NRP,
            'Nama' => $request->Nama,
            'Kelas' => $request->Kelas,
            'Jenis_Kelamin' => $request->Jenis_Kelamin,
            'Tanggal_Lahir' => $request->Tanggal_Lahir,
            'Alamat' => $request->Alamat,
        ];

        $file = $request->file('dokumen');
        if($file){
            $nama_file = $file->getClientOriginalName();
            $file->storeAs('dokumen_files', $nama_file);
            $data['dokumen'] =$nama_file;
        }

        $mahasiswa->update($data);

        return redirect()->route('mahasiswa.index')->with('berhasil', 'Data mahasiswa berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::find($id);

        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('berhasil', 'Data mahasiswa berhasil dihapus!');
    }
}
