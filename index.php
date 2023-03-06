<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css
">
</head>
<body>
    <h1>List of users</h1>
<button type="button" class="btn btn-primary">Add new user</button>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
      <th scope="col">Created</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

    <?php 
    
        $servername = "localhost";
        $username = "shaun";
        $password = "wt@gv)F]iGFqnC5Q";
        $database = "myuserlist";

        // Create connection
        $connection = new mysqli($servername, $username, $password, $database);

        // Check connection
        if($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }

        // read all row from database table
        $sql = "SELECT * FROM users";
        $result = $connection->query($sql);

        if(!$result) {
            die("Invalid query: " . $connection->error);
        }

        // read data
        $row = $result->fetch_assoc();
    
    ?>

    <tr>
      <th scope="row">1</th>
      <td><?php echo $row["id"] ?></td>
      <td><?php echo $row["email"] ?></td>
      <td><?php echo $row["address"] ?></td>
      <td><?php echo $row["created_at"] ?></td>
      <td>
      <button type="button" class="btn btn-primary">Edit</button>
      <button type="button" class="btn btn-danger">Delete</button>
      </td>
    </tr>
  </tbody>
</table>
</body>
</html>