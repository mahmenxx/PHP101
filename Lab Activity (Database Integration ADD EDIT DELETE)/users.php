<?php
    try{
        require_once 'includes/db.inc.php';

        $query = "SELECT * FROM users";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
<body class="container">
    <h2 class="mt-4">Add User</h2>
    <form action="includes/users.inc.php" method="POST" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">First Name</label>
    <input type="text" name="fName" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="First Name">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Last Name</label>
    <input type="text" name="lName" class="form-control" id="exampleInputPassword1" placeholder="Last Name">
  </div>
  <div class="form-group">
    <label for="age">Age</label>
    <input type="number" name="age" class="form-control" id="age" placeholder="Age">
  </div>
  
  <button type="submit" class="btn btn-primary mt-2">Add User</button>
</form>

<h2 class="mt-5">Users List</h2>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Age</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($users)): ?>
        <tr>
            <td colspan="4" class="text-center">No users found.</td>
        </tr>
        <?php endif; ?>
        <?php foreach ($users as $user): ?>
        <tr>
            <th scope="row"><?= htmlspecialchars($user['id']); ?></th>
            <td><?= htmlspecialchars($user['firstName']); ?></td>
            <td><?= htmlspecialchars($user['lastName']); ?></td>
            <td><?= htmlspecialchars($user['age']); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</body>
</html>