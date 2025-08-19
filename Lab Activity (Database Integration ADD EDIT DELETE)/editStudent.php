<?php
    try{
        require_once 'includes/db.inc.php';

        $id = $_GET['id'];
        $query = "SELECT * FROM students WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $users = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
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
    <div class="container">
        <h2 class="mt-4">Edit Student <?=$users["id"]?></h2>
        <form action="includes/editStudent.inc.php" method="POST">
            <input type="hidden" name="id" value="<?= htmlspecialchars($users['id']); ?>">
            <div class="form-group">
                <label for="course">Course</label>
                <input type="text" name="course" class="form-control" id="course" value="<?= htmlspecialchars($users['course']); ?>" required>
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" name="age" class="form-control" id="age" value="<?= htmlspecialchars($users['age']); ?>" required>
            </div>
            <div class="form-group">
                <label for="year">Year</label>
                <input type="number" name="year" class="form-control mb-2" id="year" value="<?= htmlspecialchars($users['year']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Update Student</button>
        </form>
        <a href="students.php" class="btn btn-secondary mt-2">Back to Students List</a>
    </div>
</body>
</html>