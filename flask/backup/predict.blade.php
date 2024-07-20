<!-- resources/views/predict.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prediction Results</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Prediction Results</h2>
    @if(isset($data))
        <div class="mt-5">
            <h3>Prediction Results</h3>
            <p><strong>Prediction with Naive Bayes:</strong> {{ $data['prediction_nb'] }}</p>
            <p><strong>Score with Naive Bayes:</strong> {{ $data['score_nb'] }}</p>
            <p><strong>Prediction with C4.5:</strong> {{ $data['prediction_c45'] }}</p>
            <p><strong>Score with C4.5:</strong> {{ $data['score_c45'] }}</p>
        </div>
    @else
        <p>No prediction data available.</p>
    @endif
    <a href="{{ url('/predict') }}" class="btn btn-primary mt-3">Back to Form</a>
</div>
</body>
</html>
