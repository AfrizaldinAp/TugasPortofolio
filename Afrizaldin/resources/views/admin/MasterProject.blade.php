@extends('admin.app')
@section('title','Master Project')
@section('content-title', 'Master Project')
@section('content')
    <div class="row">
        <div class="col-lg-4">
            <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary text-center">Project Siswa</h6>
            </div>   
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <thead>
                                <th scope="col">No</th>
                                <th scope="col">NISN</th>
                                <th scope="col">Nama Siswa</th>
                                <th scope="col">Action</th>
                            </thead>
                            <tbody>
                                <?php //$i = 1; ?>
                                @foreach($data1 as $i => $item)
                                <tr>
                                    <th scope="row">{{++$i}}</th>
                                    <th scope="row">{{$item ->nisn}}</th>
                                    <th scope="row">{{$item ->nama}}</th>
                                    <td>
                                        <a  onclick="show({{$item->id}})" class="btn btn-sm btn-warning"><i class="fas fa-folder-open"></i></a>    
                                        <a href="{{ route('masterproject.create')}}?siswa={{ $item->id }}" class="btn btn-sm btn-danger"><i class="fas fa-plus"></i></a>
                                    </td>
                                </tr>
                                @endforeach 
                            <tbody>
                        </tr>     
                    </table>
                </div>
            </div>
        </div> 
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary text-center">Data Project</h6>
                </div>
                <div id="project" class="card-body">
                    <h6 class="text-center">Pilih Siswa Terlebih Dahulu</h6>
                </div>
            </div>
        </div>  
    </div>     
@endsection
@section('script')
<script>
    function show(id){
        $.get('/masterproject/' +id , function(data){
            $('#project').html(data);
        })
    }                            
</script>  
@endsection