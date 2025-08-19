<?php
try {
    require_once 'db.inc.php';

    $firstName = $_POST['fName'];
    $lastName = $_POST['lName'];
    $age = $_POST['age'];

    $query = "INSERT INTO users (firstName, lastName, age) VALUES (:firstName, :lastName, :age)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':firstName', $firstName);
    $stmt->bindParam(':lastName', $lastName);
    $stmt->bindParam(':age', $age);
    $stmt->execute();

    echo '<div class="alert alert-success" role="alert">
        User added successfully!
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
    <a class="btn btn-info" href="../users.php">Back</a>
 
</body>
</html>