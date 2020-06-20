<?php
function getLogin()
{

    $db = dbConnect();

    $query = $db->prepare('SELECT * FROM users WHERE mail = :mail AND password = :password');
    $query->execute([
        'password' => md5($_POST['password']),
        'mail' => $_POST['mail'],
    ]);
    $userLog = $query->fetch();

    //si couple email/md5(password) trouvé, connecter l'utilisateur
    if ($userLog != false) {
        $_SESSION['user'] = [
            'first_name' => $userLog['first_name'],
            'last_name' => $userLog['last_name'],
            'mail' => $userLog['mail'],
            'is_admin' => $userLog['is_admin'],
        ];
    }
    return $userLog;
}

