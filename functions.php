<?php
function authenticate(string $username, string $password, $fileName): bool {
    $data = file_get_contents($fileName);
    $users = explode(PHP_EOL, $data);

    foreach ($users as $user) {
        if (trim($user) == "") continue;
        [$usernameFile, $passwordFile] = explode('|', $user);
        if ($username === $usernameFile) {
            return password_verify($password, $passwordFile);
        }
    }
    return false;
}

function isValidName(string $firstname): bool {
    return strlen($firstname) <= 32;
}

function isValidLastName(string $lastname): bool {
    return strlen($lastname) <= 32;
}

function isValidUsername(string $username): bool {
    return strlen($username) >= 8;
}

function isValidPoneNumber(string $phone): bool {
    return preg_match('/^\d{9}$/', $phone);
}
function isValidPassword(string $password): bool {
    if (!preg_match('/[a-z]+/', $password)  
        || !preg_match('/[A-Z]+/', $password)
        || !preg_match('/[0-9]+/', $password)
        || !preg_match('/[!@#\$%\^&\*]+/', $password)
    ) {
        return false;
    }
    return true;
}

function usernameExists(string $username, string $fileName): bool {
    
    $data = file_get_contents($fileName);
    $users = explode(PHP_EOL, $data);

    foreach ($users as $user) {
        if (trim($user) == "") continue;
        if ($user === $username) {
            return true;
        }
    }
    return false;
}

function saveUser(string $username, string $fileName): void {
    $newUser = $username. PHP_EOL;
    file_put_contents($fileName, $newUser, FILE_APPEND);
}
?>
