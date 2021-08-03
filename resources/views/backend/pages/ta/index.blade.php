@extends('backend/layout/app')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <!-- /.row -->
        <!-- Main row -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Proyek Akhir</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <a href="{{route('ta.create')}}" class="btn btn-success mb-2">Tambah Data</a>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Mahasiswa</th>
                            <th>Judul </th>
                            <th>Tema </th>
                            <th>Deskripsi </th>
                            <th>Latar Belakang </th>
                            <th>Tujuan Penelitian </th>
                            <th>Rumusan Masalah </th>
                            <th>Metodologi </th>
                            <th>Matakuliah Bersangkutan</th>
                            <th>Penelitian Terkait</th>
                            <th>IPK</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ta as $no=>$ta )
                            <tr>
                                <td>{{$no + 1}}</td>
                                <td>{{$ta->nama_user}}</td>
                                <td>{{$ta->judul_ta}}</td>
                                <td>{{$ta->tema_ta}}</td>
                                <td>{{$ta->deskripsi_ta}}</td>
                                <td>{{$ta->latar_belakang_ta}}</td>
                                <td>{{$ta->tujuan_penelitian_ta}}</td>
                                <td>{{$ta->rumusan_masalah_ta}}</td>
                                <td>{{$ta->metodologi_ta}}</td>
                                <td>{{$ta->matakuliah_ta}}</td>
                                <td>{{$ta->penelitian_ta}}</td>
                                <td>{{$ta->ipk_ta}}</td>
                                <td>
                                    <a href="{{route('kriteria.create',$ta->id_ta)}}" class="btn btn-primary btn-sm"><i class="fas fa-clipboard-check"></i> Nilai</a>
                                    <a href="{{ route('ta.edit', $ta->id_ta) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="{{ route('ta.delete', $ta->id_ta) }}" class="btn btn-danger btn-sm" onclick="mHapus('{{ route('ta.delete', $ta->id_ta) }}')">Hapus<i class="fa fa-trash">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                            <th>No.</th>
                            <th>Nama Mahasiswa</th>
                            <th>Judul </th>
                            <th>Tema </th>
                            <th>Deskripsi </th>
                            <th>Latar Belakang </th>
                            <th>Tujuan Penelitian </th>
                            <th>Rumusan Masalah </th>
                            <th>Metodologi </th>
                            <th>Matakuliah Bersangkutan</th>
                            <th>Penelitian Terkait</th>
                            <th>IPK</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.row (main row) -->
    </div>
    <!-- /.container-fluid -->
</section>
@endsection
