



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
}

.container {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

form {
    display: flex;
    flex-direction: column;
    max-width: 300px;
    margin: auto;
}

label {
    margin-bottom: 8px;
}

input {
    padding: 8px;
    margin-bottom: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    background-color: #4caf50;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}

    </style>
    <title>Exam Score Predictor</title>
</head>
<body>
    <div class="container">
        <h2>Exam Score Predictor</h2>
        <form method="post">
            <label for="exam1">Exam 1:</label>
            <input type="number" id="exam1" name="exam1" required>

            <label for="exam2">Exam 2:</label>
            <input type="number" id="exam2" name="exam2" required>

            <button type="submit">Predict Exam 3</button>
        </form>

        <?php

require 'vendor/autoload.php';

use Phpml\Regression\LeastSquares;

if($_SERVER['REQUEST_METHOD'] == 'POST')
{

$exam1 = $_POST['exam1'];
$exam2 = $_POST['exam2'];

// Your training data
$trainData = [
    [70, 75],
    [85, 80],
    [60, 65],
    [90, 95],
    [75, 70],
];

// Corresponding labels
$trainLabels = [82, 88, 75, 92, 78];

// Train the linear regression model
$model = new LeastSquares();
$model->train($trainData, $trainLabels);

// Make predictions on the test set
$predictions = $model->predict([0,100]);

// Calculate Mean Squared Error
// $mse = MeanSquaredError::score($testLabels, $predictions);
// echo "Mean Squared Error: $mse\n";

// Example new data
$newData = [
    [$exam1, $exam2],
];

// Make predictions on the new data
$newPredictions = $model->predict($newData);

$final = round($newPredictions[0],1);
echo "<p style='text-align:center; font-weight:bold;'>Predicted Exam 3 score: {$final}</p>";


}
?>

    </div>
</body>
</html>
