<!-- resources/views/predict.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prediction Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Prediction Form</h2>
    <form action="/predict" method="POST">
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

    @if(isset($data))
        <div class="mt-5">
            <h3>Prediction Results</h3>
            <p><strong>Prediction with Naive Bayes:</strong> {{ $data['prediction_nb'] }}</p>
            <p><strong>Prediction with C4.5:</strong> {{ $data['prediction_c45'] }}</p>
        </div>
    @endif
</div>
</body>
</html>
