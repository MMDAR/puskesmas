@extends('main')
@section('content')
     <div class="container">
        <h1>Daftar Pasien</h1>
        <br>
        <a href="/pasien/create" class="btn btn-primary">+ Tambah Pasien</a>
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
                @foreach ($pasiens as $item)
                <tr>
                    <td>@php echo $iteration++ @endphp</td>
                    <td>@php echo $item['nama']@endphp</td>
                    <td>@if($item['jk'] == 'L')
                            Laki-laki
                        @else
                            Perempuan
                        @endif
                    </td>
                    <td>@php echo $item['tgl_lahir']@endphp</td>
                    <td>@php echo $item['alamat']@endphp</td>
                    <td>@php echo $item['telp']@endphp  </td>
                    <td>
                        <a href="/pasien/edit/{{$item->id}}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="/pasien" method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <input type="hidden" value="{{$item->id}}" name="id">
                            <button class="btn btn-danger btnx-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                    @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
@endsection