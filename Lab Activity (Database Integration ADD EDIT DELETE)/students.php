<?php
    try{
        require_once 'includes/db.inc.php';

        
        $query = "SELECT * FROM students";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $students = $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    catch(PDOException $e) {
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
<body class="container">
    <h1>Add Students</h1>
    <form action="includes/students.inc.php" method="POST">
        <div class="form-group">
            <label for="course">Course</label>
            <input type="text" name="course" class="form-control" id="course" placeholder="Course">
        </div>
        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" name="age" class="form-control" id="age" placeholder="Age">
        </div>
        <div class="form-group">
            <label for="year">Year</label>
            <input type="number" name="year" class="form-control mb-2" id="year" placeholder="Year">
        </div>
        <button type="submit" class="btn btn-success mt-2">Add Student</button>
</form>

        <br>
        <br>
        <br>

        <h2>Students List</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Course</th>
                    <th scope="col">Age</th>
                    <th scope="col">Year</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($students)): ?>
                <tr>
                    <td colspan="4" class="text-center">No students found.</td>
                </tr>
                <?php endif; ?>
                <?php foreach ($students as $student): ?>
                <tr>
                    <td><?= htmlspecialchars($student['id']); ?></td>
                    <td><?= htmlspecialchars($student['course']); ?></td>
                    <td><?= htmlspecialchars($student['age']); ?></td>
                    <td><?= htmlspecialchars($student['year']); ?></td>
                    <td>
                        <form action="includes/delete.inc.php" method="POST">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($student['id']); ?>">
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                        <a href="editStudent.php?id=<?=htmlspecialchars($student['id'])?>" class="btn btn-secondary mt-2"> Edit Student</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </body>
</html>