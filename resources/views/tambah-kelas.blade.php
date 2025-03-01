{{-- @extends('layouts.app')

@section('content') --}}
<div class="container">
    <h2>Tambah Kelas</h2>
    <form action="{{ route('kelas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Kelas</label>
            <input type="text" name="nama_kelas" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Keahlian</label>
            <input type="text" name="keahlian" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
{{-- @endsection --}}
