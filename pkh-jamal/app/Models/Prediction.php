<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prediction extends Model
{
    use HasFactory;

    protected $fillable = [
        'JUMLAH_KELUARGA',
        'PENGHASILAN',
        'PENDIDIKAN_TERTINGGI',
        'SETATUS_RUMAH',
        'PEKERJAAN',
        'KONDISI_KESEHATAN',
        'prediction_nb',
        'prediction_c45',
        'score_nb',
        'score_c45',
    ];
}
