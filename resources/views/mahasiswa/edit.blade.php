@extends('layouts.main')
@section('title', 'Edit Mahasiswa')
@section('content')
    <div class="container mt-5">
        <div class="card-header">
            <h3>Edit Mahasiswa</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="NRP">NRP</label>
                    <input type="text" name="NRP" class="@error('NRP') is-invalid @enderror form-control" value="{{ old('NRP', $mahasiswa->id) }}" placeholder="Masukan NRP" required>

                    @error('NRP')
                        <div class="mt-1">
                            <span class="text-danger">{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="Nama">Nama</label>
                    <input type="text" name="Nama" class="form-control" value="{{ old('Nama', $mahasiswa->Nama) }}" placeholder="Masukan Nama" required>
                </div>

                <div class="form-group mb-3">
                    <label for="Kelas">Kelas</label>
                    <input type="text" name="Kelas" class="form-control" value="{{ old('Kelas', $mahasiswa->Kelas) }}" placeholder="Masukan Kelas" required>
                </div>

                <div class="form-group mb-3">
                    <label for="Jenis_Kelamin">Jenis Kelamin</label>
                    <input type="text" name="Jenis_Kelamin" class="form-control" value="{{ old('Jenis_Kelamin', $mahasiswa->Jenis_Kelamin) }}" placeholder="Masukan Jenis Kelaminr" required>
                </div>

                <div class="form-group mb-3">
                    <label for="Tanggal_Lahir">Tanggal Lahir</label>
                    <input type="date" name="Tanggal_Lahir" class="form-control" value="{{ old('Tanggal_Lahir', $mahasiswa->Tanggal_Lahir) }}" placeholder="Masukan Tanggal Lahir" required>
                </div>

                <div class="form-group mb-3">
                    <label for="Alamat">Alamat</label>
                    <textarea name="Alamat" placeholder="Masukan Alamat" class="form-control">{{ old('Alamat', $mahasiswa->Alamat) }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="dokumen">Dokumen</label>
                    <input type="file" name="dokumen" class="form-control" value="{{ old('dokumen', $mahasiswa->dokumen) }}" placeholder="Masukan Dokumen" required>
                </div>

                {{-- <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group mb-3">
                            <label for="dokumen" class="col-md-4 col-form-label text-md-right" >Dokumen*pdf</label>
                            <input type="file" name="dokumen" class="form-control" value="{{ old('dokumen') }}" placeholder="Masukan File PDF" required>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group mb-3">
                            <label for="dokumen" class="col-md-4 col-form-label text-md-right" >Dokumen*doc</label>
                            <input type="file" name="dokumen" class="form-control" value="{{ old('dokumen') }}" placeholder="Masukan File DOC" required>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group mb-3">
                            <label for="dokumen" class="col-md-4 col-form-label text-md-right" >Dokumen*docx</label>
                            <input type="file" name="dokumen" class="form-control" value="{{ old('dokumen') }}" placeholder="Masukan File DOCX" required>
                        </div>
                    </div>
                </div> --}}


                <div class="form-group d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
