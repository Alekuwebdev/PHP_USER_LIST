<?php 

    include('connectionDB/connection.php');

    $name = "";
    $email = "";
    $address = "";

    $errorMessage = "";
    $succesMessage = "";

    if($_SERVER['REQUEST_METHOD'] == 'GET') {
        if(!isset($_GET["id"])) {
            header("location: /PHP_USER_LIST/index.php");
            exit;
        }

        $id = $_GET["id"];

        // read the row of the selected client from database table
        $sql = "SELECT * FROM users WHERE id=$id";
        $result = $connection->query($sql);
        $row = $result->fetch_assoc();

        if(!$row) {
            header("location: /PHP_USER_LIST/index.php");
            exit;
        }

        $name = $row["name"];
        $email = $row["email"];
        $address = $row["address"];

    } else {
        // POST method: Update the data of the users

        $id = $_POST["id"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $address = $_POST["address"];

        if( empty($id) || empty($name) || empty($email) || empty($address) ) {
            $errorMessage = "Invalid query: " . $connection->error;
        }

        $sql = " UPDATE users " . "SET name = '$name', email = '$email', address = '$address' " . "WHERE id = $id";

        $result = $connection->query($sql);

        if(!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
        }

        $succesMessage = "User updated succesful";

        header("location: /PHP_USER_LIST/index.php");

    }

?>

<?php include("components/head.php"); ?>

    <h2 class="m-5">Add new user</h2>
    <?php echo "$errorMessage"; ?>
    <?php echo "$succesMessage"; ?>
    <form class="border p-3 rounded" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="mb-3">
            <input name="name" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Full Name" value="<?php echo $name ?>">
        </div>
        <div class="mb-3">
            <input name="email" type="email" class="form-control" aria-describedby="emailHelp" placeholder="E-Mail" value="<?php echo $email ?>">
        </div>
        <div class="mb-3">
            <input name="address" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Address" value="<?php echo $address ?>">
        </div>
        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a type="submit" class="btn btn-secondary" href="/PHP_USER_LIST/index.php" >Cancel</a>
        </div>
    </form>
</body>
</html>