{{-- @extends('layouts.app')

@section('content') --}}
<div class="container">
    <h2>Edit Data Kelas</h2>
    <form action="{{ route('kelas.update', $kelas->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_kelas" class="form-label">Nama Kelas</label>
            <input type="text" name="nama_kelas" class="form-control" value="{{ $kelas->nama_kelas }}" required>
        </div>
        <div class="mb-3">
            <label for="keahlian" class="form-label">Keahlian</label>
            <input type="text" name="keahlian" class="form-control" value="{{ $kelas->keahlian }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
{{-- @endsection --}}
