@extends('main')
@section('content')
    <div class="container">
        <h1>Daftar Dokter</h1>
        <br>
        <a href="/dokter/create" class="btn btn-primary">+ Tambah Dokter</a>
        <hr>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>No. Telp</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $iteration = 1 @endphp
                @foreach ($dokters as $item)
                <tr>
                    <td>@php echo $iteration++ @endphp</td>
                    <td>@php echo $item['nama']@endphp</td>
                    <td>@php echo $item['jk']@endphp</td>
                    <td>@php echo $item['tgl_lahir']@endphp</td>
                    <td>@php echo $item['alamat']@endphp</td>
                    <td>@php echo $item['telp']@endphp  </td>
                    <td>
                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                        <form action="#" method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                    @endforeach
            </tbody>
        </table>
    </div>
@endsection