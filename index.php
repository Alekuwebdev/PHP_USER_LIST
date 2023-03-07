
<?php include("components/head.php"); ?>

    <h1>List of users</h1>
<a type="button" class="btn btn-primary m-5" href="/PHP_USER_LIST/create.php">Add new user</a>
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

      include('connectionDB/connection.php');

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
        while($row = $result->fetch_assoc()) {
          echo "

            <tr>
              <td>$row[id]</td>
              <td>$row[name]</td>
              <td>$row[email]</td>
              <td>$row[address]</td>
              <td>$row[created_at]</td>
                <td>
                  <a class='btn btn-primary btn-sm' href='/PHP_USER_LIST/edit.php?id=$row[id]'>Edit</a>
                  <a class='btn btn-danger btn-sm' href='/PHP_USER_LIST/delete.php?id=$row[id]'>Delete</a>
                </td>
            </tr>
          
          ";
        }
      
      ?>

    </tbody>
</table>
</body>
</html>