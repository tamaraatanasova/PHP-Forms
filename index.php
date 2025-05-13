<?php

require_once __DIR__ . '/functions.php';
$message = isset($_GET['message']) ? $_GET['message'] : null;


$firstname = isset($_GET['firstname']) ? $_GET['firstname'] : '';
$lastname = isset($_GET['lastname']) ? $_GET['lastname'] : '';
$username = isset($_GET['username']) ? $_GET['username'] : '';
$phone = isset($_GET['phone']) ? $_GET['phone'] : '';
$password = isset($_GET['password']) ? $_GET['password'] : '';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Challenge PHP 03</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="row">

            <div class="m-3">
            <?php if ($message): ?>
                        <p class="alert alert-warning"><?= $message ?></p>
            <?php endif; ?>
            </div>

            <div class="col-md-6">
                <h1 class="mb-4">Register</h1>
                <form method="POST" action="register.php">

                <div class="mb-3">
                        <label for="firstname" class="form-label">First name:</label>
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Enter first name"
                            name="firstname"
                            id="firstname"  />
                    </div>

                    <div class="mb-3">
                        <label for="lastname" class="form-label">Last name:</label>
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Enter last name"
                            name="lastname"
                            id="lastname" />
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">Username:</label>
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Enter username"
                            name="username"
                            id="username"/>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number:</label>
                        <input
                            type="phone"
                            class="form-control"
                            placeholder="Enter phone number"
                            name="phone"
                            id="phone"  />
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input
                            type="password"
                            class="form-control"
                            placeholder="Enter password"
                            name="password"
                            id="password"  />
                    </div>

                    <button type="submit" class="btn btn-secondary" name="register">Register</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>
