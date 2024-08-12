@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@endsection

@section('content')
    <p>Selamat Data di Dashboard PKH - Jamal</p>
    
    <div class="row mt-4">
        <!-- Total Users Card -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $totalUsers }}</h3>
                    <p>Total Users</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
            </div>
        </div>

        <!-- Total Predictions Card -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $totalPredictions }}</h3>
                    <p>Total Predictions</p>
                </div>
                <div class="icon">
                    <i class="fas fa-bullseye"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Chart for User Growth -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">User Growth</h3>
                </div>
                <div class="card-body">
                    <canvas id="userGrowthChart"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('userGrowthChart').getContext('2d');
            const userGrowthData = @json($userGrowthData);

            const labels = userGrowthData.map(data => data.date);
            const dataCounts = userGrowthData.map(data => data.count);

            const chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'User Growth',
                        data: dataCounts,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        x: {
                            beginAtZero: true
                        },
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
@endsection
