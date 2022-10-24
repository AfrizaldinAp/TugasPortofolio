@extends('admin.app')
@section('title','Show Siswa')
@section('content-title', 'Show Siswa')
@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-body text-center">
                <h6 class="font-weight-bold text-primary">PROFIL</h6>
                <img src="{{ asset('/template/img/'.$data->foto) }}" width="300" class="img-thumbnail">
                <h4 class="font-weight-bold text-primary">{{ $data->nama }}</h4>
                <h4>{{ $data->nisn }}</h4>
                <h4>{{ $data->jk }}</h4>
                <h4>{{ $data->alamat }}</h4>    
                <h4>{{ $data->email }}</h4>
            </div> 
        </div>
      <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row aligns-items-center justify-conten-beetwen">
            <h6 class="font-weight-bold text-primary">Kontak Siswa</h6>
            </div>
            <div class="card col-lg-12">
            <div class="card-body">
                <!-- <h4>{{ $data->kontak}}</h4> -->
                @foreach ($data->kontak as $k)
                {{$k->deskripsi}} <br>
                @endforeach
           </div>
        </div>      
</div>
</div>
    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row aligns-items-center justify-conten-beetwen">
            <h6 class="font-weight-bold text-primary">About Siswa</h6>
            </div>
            <div class="card-body">
                <h4>{{ $data->about}}</h4>
        </div>
    </div>
    <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row aligns-items-center justify-conten-beetwen">
            <h6 class="font-weight-bold text-primary">Project Siswa</h6>
            </div>
            <div class="card-body">
                <!-- <h4>{{ $data->Project}}</h4> -->
                @foreach ($data->project as $p)
                {{$p->nama_project}} <br>
                @endforeach
            </div>
    </div>
</div>
</div>    
</div>
@endsection            

