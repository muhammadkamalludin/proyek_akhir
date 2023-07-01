@extends('layout.template')
<!-- START FORM -->
@section('konten') 

<form action="{{ url('dosen') }}" method="post" enctype="multipart/form-data">
@csrf 
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <a href="{{ url('dosen') }}" class="btn btn-secondary"> kembali</a>
    <div class="mb-3 row">
        <label for="nip" class="col-sm-2 col-form-label">nip</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name='nip' value="{{ Session::get('nip') }}" id="nip">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nama' value="{{ Session::get('nama') }}" id="nama">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="matkul" class="col-sm-2 col-form-label">Mata Kuliah</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='matkul' value="{{ Session::get('matkul') }}" id="matkul">
        </div>
    </div> 
    <div class="mb-3 row">
        <label for="jurusan" class="col-sm-2 col-form-label">Alamat</label>
        <div class="col-sm-10">
        <textarea class="form-control" name="alamat" id="" cols="30" rows="10" value="{{ Session::get('alamat') }}"></textarea>
        </div>
    </div>
     
    <div class="mb-3 row">
        <label for="jurusan" class="col-sm-2 col-form-label">Foto</label>
        <div class="col-sm-10">
        <input type="file" name="foto" class="form-control" id=""  value="{{ Session::get('foto') }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="jurusan" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
    </div>
</div>
</form>
<!-- AKHIR FORM -->
@endsection