<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Prediction;

class PredictController extends Controller
{
    public function index(){
        $predictions = Prediction::all();
        return view('predictions.index', compact('predictions'));
    }

    public function showForm()
    {
        return view('predict');
    }

    public function predict(Request $request)
    {
        // Validasi input
        $request->validate([
            'JUMLAH_KELUARGA' => 'required',
            'PENGHASILAN' => 'required',
            'PENDIDIKAN_TERTINGGI' => 'required',
            'SETATUS_RUMAH' => 'required',
            'PEKERJAAN' => 'required',
            'KONDISI_KESEHATAN' => 'required',
        ]);

        // Kirim data ke API Flask
        $response = Http::post('http://127.0.0.1:5000/predict', $request->all());

        // Ambil hasil prediksi dari API
        $data = $response->json();

        // Simpan hasil dan parameter ke database
        Prediction::create([
            'JUMLAH_KELUARGA' => $request->JUMLAH_KELUARGA,
            'PENGHASILAN' => $request->PENGHASILAN,
            'PENDIDIKAN_TERTINGGI' => $request->PENDIDIKAN_TERTINGGI,
            'SETATUS_RUMAH' => $request->SETATUS_RUMAH,
            'PEKERJAAN' => $request->PEKERJAAN,
            'KONDISI_KESEHATAN' => $request->KONDISI_KESEHATAN,
            'prediction_nb' => $data['prediction_nb'],
            'prediction_c45' => $data['prediction_c45'],
            'score_nb' => $data['score_nb'],
            'score_c45' => $data['score_c45'],
        ]);

        // Tampilkan hasil prediksi
        return view('predict')->with('results', $data);
    }

    public function destroy($id){
        $prediction = Prediction::findorFail($id);
        $prediction->delete();

        return redirect()->route('prediction.index')->with('success', 'User deleted successfully.');
    }
}
