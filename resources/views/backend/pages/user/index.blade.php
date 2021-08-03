@extends('backend/layout/app')
@section('content')
<br>
<br>
<title>Data Mahasiswa</title>
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <!-- /.row -->
        <!-- Main row -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Mahasiswa Mendaftar</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Mahasiswa</th>
                            <th>NIM</th>
                            <th>Kelas</th>
                            <th>No. HP</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $no=>$user )
                            <tr>
                                <td>{{$no + 1}}</td>
                                <td>{{$user->nama_user}}</td>
                                <td>{{$user->username_user}}</td>
                                <td>{{$user->kelas_user}}</td>
                                <td><a href="http://wa.me/{{$user->nohp_user}}" class="fas fa-phone" target="#">  {{$user->nohp_user}}</td>
                                <td>{{$user->alamat_user}}</td>
                                @if($user->level_user=='admin')
                                <td>
                                    <a href="{{ route('user.edit', $user->id_user) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="{{ route('user.delete', $user->id_user) }}" class="btn btn-danger btn-sm" onclick="mHapus('{{ route('user.delete', $user->id_user) }}')">Hapus<i class="fa fa-trash">
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Nama Mahasiswa</th>
                            <th>NIM</th>
                            <th>Kelas</th>
                            <th>No. HP</th>
                            <th>Alamat</th>
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
