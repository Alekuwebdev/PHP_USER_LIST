<?php 

    include('connectionDB/connection.php');

    $name = "";
    $email = "";
    $address = "";

    $errorMessage = "";
    $succesMessage = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $address = $_POST["address"];

        if( empty($name) || empty($email) || empty($address) ) {
            echo "
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>All fields are required</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
            ";
        } else if(!(empty($name) || empty($email) || empty($address)) ) {
            echo "";

            // add new user in database
            $sql = "INSERT INTO users (name, email, address) VALUES ('$name', '$email', '$address')";
            $result = $connection->query($sql);

            if(!$result) {
                $errorMessage = "Invalid query: " . $connection->error;
            }

            $name = "";
            $email = "";
            $address = "";

            header("location: /PHP_USER_LIST/index.php");
            exit;
        } 
    }

?>

<?php include("components/head.php"); ?>

    <h2 class="m-5">Add new user</h2>
    <?php echo "$errorMessage"; ?>
    <?php echo "$succesMessage"; ?>
    <form class="border p-3 rounded" method="post">
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
            <button type="submit" class="btn btn-success">Submit</button>
            <a type="submit" class="btn btn-secondary" href="/PHP_USER_LIST/index.php" >Cancel</a>
        </div>
    </form>
</body>
</html>