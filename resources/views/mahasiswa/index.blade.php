@extends('layouts.main')
@section('title', 'Data Mahasiswa')
@section('content')

@if (session()->has('berhasil'))
    <div class="alert alert-success">
        {{ session()->get('berhasil') }}
    </div>
@endif
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3>Data Mahasiswa</h3>
            </div>

            <div class="card-body">
                <div class="form-group d-flex justify-content-between">
                    <a href="{{ route('mahasiswa.create') }}" class="btn btn-success">Tambah Data</a>
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary">Home</a>
                </div>

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NRP</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Dokumen</th>
                            <th>Download</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $increment = 1;
                        @endphp
                        @foreach ($mahasiswa as $item)
                            <tr>
                                <td>{{ $increment++ }}</td>
                                <td>{{ $item->NRP }}</td>
                                <td>{{ $item->Nama }}</td>
                                <td>{{ $item->Kelas }}</td>
                                <td>{{ $item->Jenis_Kelamin }}</td>
                                <td>{{ $item->Tanggal_Lahir }}
                                <td>{{ $item->Alamat }}
                                <td>{{ $item->dokumen }}
                                <td>
                                    <p>
                                        <a href="{{ $item->dokumen }}" class="btn btn-xs btn-primary" download="">Download Dokumen</a>

                                        {{-- <a href="{{ $item->dokumen_pdf }}" class="btn btn-xs btn-success" download="">Download Dokumen PDF</a>

                                        <a href="{{ $item->dokumen_doc }}" class="btn btn-xs btn-success" download="">Download Dokumen DOC</a>

                                        <a href="{{ $item->dokumen_docx }}" class="btn btn-xs btn-success" download="">Download Dokumen DOCX</a> --}}
                                    </p>
                                </td>
                                <td>
                                    <a href="{{ route('mahasiswa.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('mahasiswa.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')" class="btn btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
