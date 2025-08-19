<?php
    try{
        require_once 'db.inc.php';

        $course = $_POST['course'];
        $age = $_POST['age'];
        $year = $_POST['year'];

        $query = "INSERT INTO students (course, age, year) VALUES (:course, :age, :year)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':course', $course);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':year', $year);
        $stmt->execute();

        echo '<div class="alert alert-success" role="alert">
            Student added successfully!
            </div>';
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    
</body>
</html>