@extends('backend/layout/app')
@section('content')
<br>
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 align="middle" class="card-title">Form Pendaftaran Proposal Proyek Akhir</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ isset($ta) ? route('ta.update', $ta->id_ta) : route('ta.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($ta))
            @isset($ta)
            @method('put')
            @endif
            @endif
            <input type="hidden" name="id_user" value="{{session('id_user')}}">
            <div class="card-body">
                <div class="form-group">
                    <label for="judul_ta">Judul Proyek Akhir</label>
                    <input type="text" class="form-control @error('judul_ta') {{ 'is-invalid' }} @enderror"
                        value="{{ old('judul_ta') ?? $ta->judul_ta ?? ''}}" name="judul_ta"
                        placeholder="Type Here">
                    @error('judul_ta')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tema_ta">Tema Proyek Akhir</label>
                    <input type="text" class="form-control @error('tema_ta') {{ 'is-invalid' }} @enderror"
                        value="{{ old('tema_ta') ?? $ta->tema_ta ?? ''}}" name="tema_ta"
                        placeholder="Type Here">
                    @error('tema_ta')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="deskripsi_ta" class=" form-control-label">Deskripsi Proyek</label>
                    <textarea id="konten" name="deskripsi_ta" rows="10" cols="50"
                        class="form-control @error('deskripsi_ta') {{ 'is-invalid' }} @enderror">{{ old('deskripsi_ta') ?? $ta->deskripsi_ta ?? ''}}</textarea>

                    @error('deskripsi_ta')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="latar_belakang_ta" class=" form-control-label">Latar Belakang Masalah</label>
                    <textarea id="konten" name="latar_belakang_ta" rows="10" cols="50"
                        class="form-control @error('latar_belakang_ta') {{ 'is-invalid' }} @enderror">{{ old('latar_belakang_ta') ?? $ta->latar_belakang_ta ?? ''}}</textarea>

                    @error('latar_belakang_ta')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tujuan_penelitian_ta" class=" form-control-label">Tujuan Penelitian</label>
                    <textarea id="konten" name="tujuan_penelitian_ta" rows="10" cols="50"
                        class="form-control @error('tujuan_penelitian_ta') {{ 'is-invalid' }} @enderror">{{ old('tujuan_penelitian_ta') ?? $ta->tujuan_penelitian_ta ?? ''}}</textarea>

                    @error('tujuan_penelitian_ta')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="rumusan_masalah_ta" class=" form-control-label">Rumusan Masalah</label>
                    <textarea id="konten" name="rumusan_masalah_ta" rows="10" cols="50"
                        class="form-control @error('rumusan_masalah_ta') {{ 'is-invalid' }} @enderror">{{ old('rumusan_masalah_ta') ?? $ta->rumusan_masalah_ta ?? ''}}</textarea>

                    @error('rumusan_masalah_ta')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="metodologi_ta" class=" form-control-label">Metodologi yang Digunakan</label>
                    <textarea id="konten" name="metodologi_ta" rows="10" cols="50"
                        class="form-control @error('metodologi_ta') {{ 'is-invalid' }} @enderror">{{ old('metodologi_ta') ?? $ta->metodologi_ta ?? ''}}</textarea>

                    @error('metodologi_ta')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="matakuliah_ta">Matakuliah yang Bersangkutan</label>
                    <input type="text" class="form-control @error('matakuliah_ta') {{ 'is-invalid' }} @enderror"
                        value="{{ old('matakuliah_ta') ?? $ta->matakuliah_ta ?? ''}}" name="matakuliah_ta"
                        placeholder="Type Here">
                    @error('matakuliah_ta')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="penelitian_ta" class=" form-control-label">Penelitian Terkait</label>
                    <textarea id="konten" name="penelitian_ta" rows="10" cols="50"
                        class="form-control @error('penelitian_ta') {{ 'is-invalid' }} @enderror">{{ old('penelitian_ta') ?? $ta->penelitian_ta ?? ''}}</textarea>

                    @error('penelitian_ta')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="ipk_ta">IPK(IP Semester 1-6)</label>
                    <input type="number" class="form-control @error('ipk_ta') {{ 'is-invalid' }} @enderror"
                        value="{{ old('ipk_ta') ?? $ta->ipk_ta ?? ''}}" name="ipk_ta"
                        placeholder="Type Here">
                    @error('ipk_ta')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <!-- /.card -->
</div>
@endsection
