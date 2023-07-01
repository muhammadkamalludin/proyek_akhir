@extends('layout.template')
<!-- START DATA -->
@section('konten')    
<div class="my-3 p-3 bg-body rounded shadow-sm">
<marquee><h3>Selamat Datang di <strong>Dashboard</strong></h3></marquee>
<br>

<a href="{{ route('logout') }}" class="btn btn-danger" style="float:right"  >Logout</a>
<br>
<br>
    <!-- FORM PENCARIAN -->
    <div class="pb-3">
        <form class="d-flex" action="{{ url('dosen') }}" method="get">
            <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Cari</button>
        </form>
    </div>
    
    <!-- TOMBOL TAMBAH DATA -->
    <div class="pb-3">
        <a href='{{ url('dosen/create') }}' class="btn btn-primary">+ Tambah Data</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th class="col-md-1">No</th>
                <th class="col-md-3">NIP</th>
                <th class="col-md-2">Nama</th>
                <th class="col-md-2">Mata Kuliah</th>
                <th class="col-md-2">Alamat</th>
                <th class="col-md-2">Foto</th>
                <th class="col-md-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = $data->firstItem() ?>
            @foreach ($data as $item)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $item->nip }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->matkul }}</td>
                <td>{{ $item->alamat }}</td>
                <td>
                <img src="{{ Storage::url('public/dosen/').$item->foto }}" class="rounded" style="width: 150px">
                <td>
                    <a href='{{ url('dosen/'.$item->nip.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                    <form onsubmit="return confirm('Yakin akan menghapus data?')" class='d-inline' action="{{ url('dosen/'.$item->nip) }}" method="post">
                        @csrf 
                        @method('DELETE')
                        <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                    </form>
                </td>
            </tr>
            <?php $i++ ?>
            @endforeach
        </tbody>
    </table>
    {{ $data->withQueryString()->links() }}
</div>
<!-- AKHIR DATA -->
@endsection
    