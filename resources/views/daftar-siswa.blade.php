@include('layouts.main')

@section('title', 'Dashboard - PayDeal')

@section('containerdashboard')
    <div class="container">
        <h2>Daftar Siswa</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>SPP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($siswa as $index => $data)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $data->nisn }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->kelas->nama }}</td>
                        <td>{{ $data->spp->nama }}</td>
                        <td>
                            <a href="{{ route('siswa.show', $data->id) }}" class="btn btn-info">Lihat Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
