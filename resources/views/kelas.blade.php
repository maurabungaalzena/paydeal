{{-- @extends('layouts.app')

@section('content') --}}
<div class="container">
    <h2>Data Kelas</h2>
    <a href="{{ route('kelas.create') }}" class="btn btn-primary">Tambah Kelas</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kelas</th>
                <th>Keahlian</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kelas as $key => $k)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $k->nama_kelas }}</td>
                <td>{{ $k->keahlian }}</td>
                <td>
                    <a href="{{ route('kelas.edit', $k->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('kelas.destroy', $k->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{-- @endsection --}}
