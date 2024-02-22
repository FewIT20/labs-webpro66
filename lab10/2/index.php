<?php

class FewDB extends SQLite3
{

    public function __construct(string $filename)
    {
        $this->open($filename);
    }
}

$conn = new FewDB("questions.db");
if (!$conn) {
    echo $conn->lastErrorMsg();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>65070159 - Peeranat Matsor</title>
    <link href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" rel="stylesheet">
    <link href="http://10.0.15.21/lab/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;700&display=swap" rel="stylesheet">
    <script src="http://10.0.15.21/lab/bootstrap/js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: Kanit;
        }
    </style>
</head>

<body>
    <div class="container mt-3">
        <h1>Quiz Questions</h1>
        <hr>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <form method="post">
                            <?php
                            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                $totalCorrect = 0;
                                foreach ($_POST as $key => $value) {
                                    $questionNumber = substr($key, strpos($key, '_') + 1);
                                    $correctAnswer = '';
                                    $stmt = $conn->prepare('SELECT Correct FROM questions WHERE QID = :qid');
                                    $stmt->bindValue(':qid', $questionNumber, SQLITE3_INTEGER);
                                    $result = $stmt->execute();
                                    while ($row = $result->fetchArray()) {
                                        $correctAnswer = $row['Correct']; // Get correct answer from database
                                    }
                                    if ($value === $correctAnswer) {
                                        $totalCorrect++;
                                    }
                                }
                                echo '<div class="alert alert-primary" role="alert">';
                                echo 'Total Correct Answers: ' . $totalCorrect;
                                echo '</div>';
                            }
                            $query = "SELECT * FROM questions";
                            $result = $conn->query($query);
                            while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                                echo '<div class="form-group">';
                                echo '<label>' . $row['QID'] . '. ' . $row['Stem'] . '</label><br>';
                                echo '<div class="form-check">';
                                echo '<input class="form-check-input" type="radio" name="question_' . $row['QID'] . '" id="question_' . $row['QID'] . '_alt_a" value="A">';
                                echo '<label class="form-check-label" for="question_' . $row['QID'] . '_alt_a">' . $row['Alt_A'] . '</label><br>';
                                echo '<input class="form-check-input" type="radio" name="question_' . $row['QID'] . '" id="question_' . $row['QID'] . '_alt_b" value="B">';
                                echo '<label class="form-check-label" for="question_' . $row['QID'] . '_alt_b">' . $row['Alt_B'] . '</label><br>';
                                echo '<input class="form-check-input" type="radio" name="question_' . $row['QID'] . '" id="question_' . $row['QID'] . '_alt_c" value="C">';
                                echo '<label class="form-check-label" for="question_' . $row['QID'] . '_alt_c">' . $row['Alt_C'] . '</label><br>';
                                echo '<input class="form-check-input" type="radio" name="question_' . $row['QID'] . '" id="question_' . $row['QID'] . '_alt_d" value="D">';
                                echo '<label class="form-check-label" for="question_' . $row['QID'] . '_alt_d">' . $row['Alt_D'] . '</label><br>';
                                echo '</div>';
                                echo '</div>';
                            }
                            ?>
                            <button type="submit" class="btn btn-primary mt-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
$conn->close();
?>