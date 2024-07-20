<?php


namespace App\Http\Controllers;
 
// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
class PredictController extends Controller
{
    //
    public function showForm()
    {
        return view('admin.formPrediksi');
    }

    public function predict(Request $request)
    {
        $client = new Client();
        $response = $client->post('http://localhost:5000/predict', [
            'json' => $request->except('_token') // Exclude the CSRF token from the request
        ]);

        $data = json_decode($response->getBody(), true);

        return view('admin.predict', ['data' => $data]);
    }
}
