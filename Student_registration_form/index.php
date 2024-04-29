<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registered Students | PHP</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }
    th, td {
      border-bottom: 1px solid black;
      padding: 8px;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
    }
    #btn {
      margin-bottom: 8px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Registered Students</h2>
    <a id="btn" class="btn btn-primary" href="/Student_Registration_Form/create.php" role="button">New Student</a>
    <br>
    <table class="tble">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Address</th>
          <th>Student ID</th>
          <th>Create At</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>

      <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "registration form";

      $connection = new mysqli($servername, $username, $password, $database);

      if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
      }

      $sql = "SELECT * FROM students";
      $result = $connection->query($sql);

      if (!$result) {
        die("Invalid query: " . $connection->error);
      }

      while($row = $result->fetch_assoc()) {
        echo "
        <tr>
          <td>$row[id]</td>
          <td>$row[name]</td>
          <td>$row[email]</td>
          <td>$row[phone]</td>
          <td>$row[address]</td>
          <td>$row[student_id]</td>
          <td>$row[created_at]</td>
          <td>
            <a class='btn btn-primary btn-sm' href='/Student_Registration_Form/edit.php?id=$row[id]'>Edit</a>
            <a class='btn btn-danger btn-sm' href='/Student_Registration_Form/delete.php?id=$row[id]'>Delete</a>
          </td>
        </tr>
        ";
      }
      ?>

      </tbody>
    </table>
  </div>
</body>
</html>