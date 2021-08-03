@extends('backend/layout/app')
@section('content')
<br>
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 align="middle" class="card-title">Form Penilaian Proposal Proyek Akhir</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form
            action="{{ isset($kriteria) ? route('kriteria.update', $kriteria->id_kriteria) : route('kriteria.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($kriteria))
            @isset($kriteria)
            @method('put')
            @endif
            @endif
            <input type="hidden" name="id_user" value="{{session('id_user')}}">
            <input type="hidden" name="id_ta" value="<?= $id_ta?>">
            <div class="card-body">
                <div class="form-group">
                    <label for="judul_ta">Judul Tugas Akhir</label>
                    <input type="text" readonly class="form-control" value="{{$ta->judul_ta}}" placeholder="Type Here">
                </div>
                <div class="form-group">
                    <label for="judul_ta">Nilai Originalitas & Kemutakhiran TA</label>
                    <input type="number"
                        class="form-control @error('originalitas_kriteria') {{ 'is-invalid' }} @enderror"
                        value="{{ old('originalitas_kriteria') ?? $kriteria->originalitas_kriteria ?? ''}}"
                        name="originalitas_kriteria" placeholder="Type Here">
                    @error('originalitas_kriteria')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="judul_ta">Nilai Sasaran & Kontribusi</label>
                    <input type="number" class="form-control @error('sasaran_kriteria') {{ 'is-invalid' }} @enderror"
                        value="{{ old('sasaran_kriteria') ?? $kriteria->sasaran_kriteria ?? ''}}"
                        name="sasaran_kriteria" placeholder="Type Here">
                    @error('sasaran_kriteria')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="judul_ta">Nilai Metodologi yang Digunakan</label>
                    <input type="number" class="form-control @error('metodologi_kriteria') {{ 'is-invalid' }} @enderror"
                        value="{{ old('metodologi_kriteria') ?? $kriteria->metodologi_kriteria ?? ''}}"
                        name="metodologi_kriteria" placeholder="Type Here">
                    @error('metodologi_kriteria')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="judul_ta">Nilai Kemiripan dengan yang Sudah Ada</label>
                    <input type="number" class="form-control @error('kemiripan_kriteria') {{ 'is-invalid' }} @enderror"
                        value="{{ old('kemiripan_kriteria') ?? $kriteria->kemiripan_kriteria ?? ''}}"
                        name="kemiripan_kriteria" placeholder="Type Here">
                    @error('kemiripan_kriteria')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="judul_ta">Nilai IPK Mahasiswa</label>
                    <input readonly type="number" class="form-control @error('ipk_kriteria') {{ 'is-invalid' }} @enderror"
                        value="{{ $ipk_ta->ipk_ta ?? $kriteria->ipk_kriteria ?? ''}}" name="ipk_kriteria"
                        placeholder="Type Here">
                    @error('ipk_kriteria')
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
