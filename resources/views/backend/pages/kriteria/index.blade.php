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
            <a href="{{route('kriteria.create', '0')}}" class="btn btn-success mb-2">Tambah Data</a>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr align="center">
                            <th>No.</th>
                            <th>Dosen Penilai</th>
                            <th>Judul TA</th>
                            <th>Originalitas & Kemutakhiran</th>
                            <th>Sasaran & Kontibusi</th>
                            <th>Metodologi</th>
                            <th>Kemiripan TA</th>
                            <th>IPK</th>
                            <th>Penilaian WP</th>
                            <th>Penilaian SAW</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kriteria as $no=>$kriteria )
                            <tr align="center">
                                <td>{{$no + 1}}</td>
                                <td>{{$kriteria->nama_user}}</td>
                                <td>{{$kriteria->judul_ta}}</td>
                                <td>{{$kriteria->originalitas_kriteria}}</td>
                                <td>{{$kriteria->sasaran_kriteria}}</td>
                                <td>{{$kriteria->metodologi_kriteria}}</td>
                                <td>{{$kriteria->kemiripan_kriteria}}</td>
                                <td>{{$kriteria->ipk_kriteria}}</td>
                                <td>{{$kriteria->nilai_final_kriteria_wp}}</td>
                                <td>{{$kriteria->nilai_final_kriteria_saw}}</td>
                                <td width="15%">
                                    <a href="{{ route('kriteria.edit', $kriteria->id_kriteria) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('kriteria.delete', $kriteria->id_kriteria) }}" class="btn btn-danger btn-sm" onclick="mHapus('{{ route('kriteria.delete', $kriteria->id_kriteria) }}')"><i class="fa fa-trash">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Dosen Penilai</th>
                            <th>Judul TA</th>
                            <th>Originalitas & Kemutakhiran</th>
                            <th>Sasaran & Kontibusi</th>
                            <th>Metodologi</th>
                            <th>Kemiripan TA</th>
                            <th>IPK</th>
                            <th>Penilaian WP</th>
                            <th>Penilaian SAW</th>
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
