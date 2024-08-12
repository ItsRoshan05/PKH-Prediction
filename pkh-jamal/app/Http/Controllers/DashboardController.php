<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prediction;
use app\Models\User;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $totalUsers = User::count();
        $totalPredictions = Prediction::count();
        $userGrowthData = User::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return view('admin.dashboard', compact('totalUsers', 'totalPredictions', 'userGrowthData'));
    }
}
