<?php 

    $name = "";
    $email = "";
    $address = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $address = $_POST["address"];
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css
">
</head>
<body>
    <h2>Add new user</h2>
    <form class="border p-3 w-50 rounded">
        <div class="mb-3">
            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Full Name" value="<?php echo $name ?>">
        </div>
        <div class="mb-3">
            <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="E-Mail" value="<?php echo $email ?>">
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Address" value="<?php echo $address ?>">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>