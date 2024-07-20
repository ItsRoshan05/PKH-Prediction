@extends('adminlte::page')

@section('title', 'Prediksi')

@section('content_header')
    <h1>Prediksi Data</h1>
@endsection

@section('content')
    <div class="container">
        <!-- Prediction Form -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Masukkan Data untuk Prediksi</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('predict.submit') }}" method="POST">
                    @csrf
                    
                    <div class="form-group">
            <label for="jumlah_keluarga">Jumlah Keluarga:</label>
            <select name="JUMLAH_KELUARGA" class="form-control" id="jumlah_keluarga">
                <option value="Keluarga Kecil">Keluarga Kecil</option>
                <option value="Keluarga Sedang">Keluarga Sedang</option>
                <option value="Keluarga Besar">Keluarga Besar</option>
            </select>
        </div>
        <div class="form-group">
            <label for="penghasilan">Penghasilan:</label>
            <select name="PENGHASILAN" class="form-control" id="penghasilan">
                <option value="Kurang">Kurang</option>
                <option value="Sedang">Sedang</option>
                <option value="Tinggi">Tinggi</option>
            </select>
        </div>
        <div class="form-group">
            <label for="pendidikan_tertinggi">Pendidikan Tertinggi:</label>
            <select name="PENDIDIKAN_TERTINGGI" class="form-control" id="pendidikan_tertinggi">
                <option value="SD">SD</option>
                <option value="SMP">SMP</option>
                <option value="SMA">SMA</option>
                <option value="SARJANA">SARJANA</option>
            </select>
        </div>
        <div class="form-group">
            <label for="setatus_rumah">Status Rumah:</label>
            <select name="SETATUS_RUMAH" class="form-control" id="setatus_rumah">
                <option value="Kurang">Kurang</option>
                <option value="Sedang">Sedang</option>
                <option value="Baik">Baik</option>
            </select>
        </div>
        <div class="form-group">
            <label for="pekerjaan">Pekerjaan:</label>
            <select name="PEKERJAAN" class="form-control" id="pekerjaan">
                <option value="petani">Petani</option>
                <option value="buruh">Buruh</option>
                <option value="Wirausaha">Wirausaha</option>
                <option value="lain-lain">Lain-lain</option>
            </select>
        </div>
        <div class="form-group">
            <label for="kondisi_kesehatan">Kondisi Kesehatan:</label>
            <select name="KONDISI_KESEHATAN" class="form-control" id="kondisi_kesehatan">
                <option value="Kurang">Kurang</option>
                <option value="Cukup">Cukup</option>
                <option value="Baik">Baik</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
            </div>
        </div>

        @if (isset($results))
<div class="card mt-4">
    <div class="card-header">
        <h3 class="card-title">Hasil Prediksi</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="alert alert-success">
                    <h4 class="alert-heading">Data berhasil disimpan ke database!</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title">Prediksi Naive Bayes</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><strong>Prediction:</strong> {{ $results['prediction_nb'] }}</p>
                        <p class="card-text"><strong>Score:</strong> {{ $results['score_nb'] }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header bg-success text-white">
                        <h5 class="card-title">Prediksi C4.5</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><strong>Prediction:</strong> {{ $results['prediction_c45'] }}</p>
                        <p class="card-text"><strong>Score:</strong> {{ $results['score_c45'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

    </div>
@endsection
