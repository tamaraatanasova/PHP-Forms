<?php
require_once __DIR__ . '/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $username = trim($_POST['username']);
    $phone = trim($_POST['phone']);
    $password = trim($_POST['password']);

    $fileName = 'Users/users.txt';

    if (empty($firstname) || empty($lastname) || empty($username) || empty($phone) || empty($password)) {
        header('Location: index.php?message=All fields are required');
        exit;
    }

    if (!isValidName($firstname)) {
        header('Location: index.php?message=First name cannot be longer than 32 characters');
        exit;
    }

    if (!isValidLastName($lastname)) {
        header('Location: index.php?message=Last name cannot be longer than 32 characters');
        exit;
    }

    if (!isValidPoneNumber($phone)) {
        header('Location: index.php?message=Invalid phone format');
        exit;
    }

    if (!isValidUsername($username)) {
        header('Location: index.php?message=Username must be at least 8 characters');
        exit;
    }

    if (!isValidPassword($password)) {
        header('Location: index.php?message=Password must contain at least 1 lowercase, uppercase, number and special character.');
        exit;
    }

    if (!is_dir('Users')) {
        mkdir('Users');
    }

    if (usernameExists($username, $fileName)) {
        header('Location: index.php?message=Username already exists');
        exit;
    }else{
        saveUser($username, $fileName);

        $userFolder = 'Users/' . $firstname . '_' . $lastname;
        if (!is_dir($userFolder)) {
            mkdir($userFolder);
        }
    
        $userFile = "$userFolder/{$firstname}.txt";
        $userData = "$firstname,$lastname,$username,$phone," . password_hash($password, PASSWORD_DEFAULT) . PHP_EOL;
        file_put_contents($userFile, $userData);
    
        header('Location: index.php?message=Welcome to our page!');
        exit;
    }

    
}
?>
