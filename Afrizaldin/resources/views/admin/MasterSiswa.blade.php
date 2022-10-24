@extends('admin.app')
@section('title','Master Siswa')
@section('content-title', 'Master Siswa')
@section('content')
    <a class="btn btn-success" href="{{ route('mastersiswa.create') }}"> Tambah Data</a>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
            <div class="card-header py-3">
                <!-- <h6 class="m-0 font-weight-bold text-primary"></h6> -->
        
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <thead>
                                <th scope="col">Nisn</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                            </thead>
                            <tbody>
                                @foreach($data as $item)
                                <tr>
                                    <th scope="row">{{$item ->nisn}}</th>
                                    <th scope="row">{{$item ->nama}}</th>
                                    <th scope="row">{{$item ->jk}}</th>
                                    <th scope="row">{{$item ->alamat}}</th>
                                    <th scope="row">{{$item ->email}}</th>
                                    <td>
                                        <a href="{{ route('mastersiswa.show', $item->id) }}" class="btn btn-info btn-circle btn-sm"><i class="fas fa-info-circle"></i></a>
                                        <a href="{{ route('mastersiswa.edit', $item->id) }}" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('mastersiswa.hapus', $item->id) }}" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach 
                            <tbody>
                        </tr>     
                    </table>
                </div>
            </div>
        </div>   
    </div>                          
        
    @endsection