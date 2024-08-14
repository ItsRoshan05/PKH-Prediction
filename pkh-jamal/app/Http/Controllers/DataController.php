<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class DataController extends Controller
{
    //
    public function show()
    {
        // Path to the CSV file in storage folder
        $filePath = storage_path('app/public/databaru.csv');

        // Read CSV file
        $data = $this->readCsv($filePath);


        return view('dataset.index', compact('data'));
    }
    public function showc45()
    {
        // Path to the CSV file in storage folder
        $filePath = storage_path('app/public/databaru.csv');

        // Read CSV file
        $data = $this->readCsv($filePath);


        return view('dataset.c45', compact('data'));
    }
    protected function readCsv($filePath)
    {
        $rows = [];
        if (($handle = fopen($filePath, 'r')) !== false) {
            // Skip the header row if necessary
            $header = fgetcsv($handle);

            while (($data = fgetcsv($handle)) !== false) {
                $rows[] = array_combine($header, $data);
            }
            fclose($handle);
        }
        return $rows;
    }
    
}
